@extends('app')
@section('main-content')
    
    <div class="content">
        <div class="container-fluid">
            <div class="demo">
                <div class="container">
                    <div class="row">
                        <div class="offset-md-3"></div>
                        <div class="col-md-5">
                            <div class="card">
                                    <div class="card-header card-header-primary">
                                            <h4 class="card-title">Plans</h4>
                                            <p class="card-category">Choose Your Plans!!</p>
                                            </div>
                                <div class="card-body">
                                        <form action="/update_user_profile" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table class="table table-striped table-dark">
                                                        <tr>
                                                            <td>Basci Plan {{ $plan->plan_price }}/-</td>
                                                            <td><input type="checkbox" name="" id="basic_plan" onclick="calculate()"></td>
                                                            <input type="number" name="" id="basic_plan_value" value="{{ $plan->plan_price }}" hidden>
                                                        </tr>
                                                        @if ($plan->client_entity==2)
                                                            <tr style="display:none;"> 
                                                        @else
                                                            <tr>
                                                        @endif
                                                        
                                                            <td>Photographer ({{ $plan->photographer_contact_addon_price }}/- Per Photographer)</td>
                                                            <td><input type="checkbox" id="photographer_check" onclick="check()"></td>
                                                        </tr>
                                                        @if ($plan->client_entity==2)
                                                            <tr style="display:none;"> 
                                                        @else
                                                            <tr>
                                                        @endif
                                                            <td>No of Photographer</td>
                                                            <td><input type="number" name="" id="no_of_photographer" style="width:50px;visibility:hidden;" min="0" oninput="calculate()" value="0"></td>
                                                        </tr>
                                                        @if ($plan->client_entity==1)
                                                            <tr style="display:none;"> 
                                                        @else
                                                            <tr>
                                                        @endif
                                                            <td>Model ({{ $plan->model_contact_addon_price }}/- Per Model)</td>
                                                            <td><input type="checkbox" id="model_check" onclick="check()"></td>
                                                        </tr>
                                                        @if ($plan->client_entity==1)
                                                            <tr style="display:none;"> 
                                                        @else
                                                            <tr>
                                                        @endif
                                                            <td>No of Model</td>
                                                            <td><input type="number" name="" id="no_of_model" style="width:50px;visibility:hidden;" min="0" oninput="calculate()" value="0"></td>
                                                        </tr>
                                                        @if ($plan->client_entity==3)
                                                            <tr style="display:none;"> 
                                                        @else
                                                            <tr>
                                                        @endif
                                                            <td>Makeup Artist ({{ $plan->makeup_artist_contact_addon_price }}/- Per Makeup Artist)</td>
                                                            <td><input type="checkbox" id="makeup_artist_check" onclick="check()"></td>
                                                        </tr>
                                                        @if ($plan->client_entity==3)
                                                            <tr style="display:none;"> 
                                                        @else
                                                            <tr>
                                                        @endif
                                                            <td>No of Makeup Artist</td>
                                                            <td><input type="number" name="" id="no_of_makeup_artist" style="width:50px;visibility:hidden;" min="0" oninput="calculate()" value="0"></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </form>   
                                        <div class="alert alert-primary" >
                                            <h4>Final Payment - <a id="final_payment_amount">0</a>/-</h4>
                                        </div>
                                        <form action="{{ route('purchase_request') }}" method="POST">
                                            @csrf
                                            <input type="text" name="amount" id="amount_input" hidden>
                                            <input type="text" name="customer_id" value="{{ $user_detail->name }}" hidden>
                                            <input type="text" name="email" value="{{ $user_detail->email }}" hidden>
                                            <button type="submit" class="btn btn-primary pull-right">PAY</button>
                                            <div class="clearfix"></div>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function calculate(){
            var checkBoxBasic = document.getElementById("basic_plan");
            if (checkBoxBasic.checked == true){
                var basic_plan_amount =  document.getElementById("basic_plan_value").value; 
                var basic_plan_amount =  parseInt(basic_plan_amount);
                    
            } else {
                var basic_plan_amount = 0;
            }
            //alert(basic_plan_amount);

            var no_of_photographer = document.getElementById('no_of_photographer').value;
            var no_of_model = document.getElementById('no_of_model').value;
            var no_of_makeup_artist = document.getElementById('no_of_makeup_artist').value;

            var no_of_photographer = parseInt(no_of_photographer);
            var no_of_model = parseInt(no_of_model);
            var no_of_makeup_artist = parseInt(no_of_makeup_artist);
            
            var charge_per_photographer = {{ $plan->photographer_contact_addon_price }};
            var charge_per_model = {{ $plan->model_contact_addon_price }};
            var charge_per_makeup_artist ={{ $plan->makeup_artist_contact_addon_price }};

            var total_amount_for_photographer = no_of_photographer * charge_per_photographer;
            var total_amount_for_model = no_of_model * charge_per_model;
            var total_amount_for_makeup_artist = no_of_makeup_artist * charge_per_makeup_artist;

            var final_amount_to_be_paid = total_amount_for_photographer + total_amount_for_model + total_amount_for_makeup_artist + basic_plan_amount;
            // alert(final_amount_to_be_paid);
            document.getElementById("final_payment_amount").innerHTML = final_amount_to_be_paid;
            document.getElementById('amount_input').value=final_amount_to_be_paid;
        }
        function check(){
            var checkBoxPhotographer = document.getElementById("photographer_check");
            var checkBoxModel = document.getElementById("model_check");
            var checkBoxMakeupArtist = document.getElementById("makeup_artist_check");
            
            if (checkBoxPhotographer.checked == true){
                //alert("Checked");
                no_of_photographer.style.visibility = "visible";
                calculate();
                
            } else {
                no_of_photographer.style.visibility = "hidden";
                document.getElementById('no_of_photographer').value="0";
                calculate();
            }
            if (checkBoxModel.checked == true){
                //alert("Checked");
                no_of_model.style.visibility = "visible";
                calculate();
                
            } else {
                no_of_model.style.visibility = "hidden";
                document.getElementById('no_of_model').value="0";
                calculate();
            }
            if (checkBoxMakeupArtist.checked == true){
                //alert("Checked");
                no_of_makeup_artist.style.visibility = "visible";
                calculate();
                
            } else {
                no_of_makeup_artist.style.visibility = "hidden";
                document.getElementById('no_of_makeup_artist').value="0";
                calculate();
            }
        }
    </script>
    <script type="text/javascript">
        window.onbeforeunload = function (e) {
        e = e || window.event;

        // For IE and Firefox prior to version 4
        if (e) {
            e.returnValue = 'Sure?';
        }

        // For Safari
        return 'Sure?';
        };
    </script>
    @endsection
