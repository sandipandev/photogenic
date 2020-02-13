@extends('app')
 @section('main-content')
 <style type="text/css">
    .pricingTable{
        color: #333;
        font-family: 'Lato', sans-serif;
        text-align: center;
        margin: 0 10px;
    }
    .pricingTable .pricingTable-header{
        padding: 0 10px 10px;
        margin: 0 0 10px 0;
    }
    .pricingTable .price-value{
        color: #fff;
        background: #F3C;
        font-size: 30px;
        font-weight: 600;
        line-height: 100px;
        width: 100px;
        height: 100px;
        border-radius: 100px;
        margin: 0 auto;
    }
    .pricingTable .title{
        background: #fff;
        font-size: 30px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        padding: 17px 10px;
        margin: 0;
        border-radius: 10px 10px;
        box-shadow: 0 0 0 10px #F3C, 0 0 10px rgba(0,0,0,0.3) inset;
    }
    .title2{
        background: #ddd;
        border-radius: 10px;
        padding: 10px;
        font-size: 14px;
        text-transform: unset;
    }
    .pricingTable .pricing-content{
        padding: 0;
        margin: 0 0 20px;
        list-style: none;
    }
    li > span{
       font-weight: bold;
       font-size: 25px;
    }
    .pricingTable .pricing-content li{
        color: #fff;
        background: #F3C;
        font-size: 16px;
        font-weight: 600;
        letter-spacing: 1px;
        text-transform: uppercase;
        padding: 15px 10px;
        margin-bottom: 10px;
        border-radius: 15px 15px;
    }
    .pricingTable .pricing-content li.disable{
        color: #666;
        letter-spacing: 0;
    }
    .pricingTable .pricingTable-signup a{
        color: #333;
        background-color:#fff;
        font-size: 26px;
        font-weight: 800;
        letter-spacing: 1px;
        text-transform: uppercase;
        padding: 4px 12px;
        margin: 0 10px 10px;
        border-radius: 15px;
        box-shadow: 0 0 0 10px #F3C, 0 0 10px rgba(0,0,0,0.3) inset;
        display: block;
        transition: all 0.3s;
    }
    .pricingTable .pricingTable-signup a:hover{
        color: #F3C;
        letter-spacing: 3px;
        text-shadow: 0 0 1px #555;
    }
    .pricingTable.green .price-value,
    .pricingTable.green .pricing-content li{
        background: #3EC497;
    }
    .pricingTable.green .title,
    .pricingTable.green .pricingTable-signup a{
        box-shadow: 0 0 0 10px #3EC497, 0 0 10px rgba(0,0,0,0.3) inset;
    }
    .pricingTable.green .pricingTable-signup a:hover{ color: #3EC497; }
    .pricingTable.blue .price-value,
    .pricingTable.blue .pricing-content li{
        background: #36BBC7;
    }
    .pricingTable.blue .title,
    .pricingTable.blue .pricingTable-signup a{
        box-shadow: 0 0 0 10px #36BBC7, 0 0 10px rgba(0,0,0,0.3) inset;
    }
    .pricingTable.blue .pricingTable-signup a:hover{ color: #36BBC7; }
    @media only screen and (max-width: 990px){
        .pricingTable{ margin: 0 0 30px; }
    }
    .blink_me {
      color: red;
      animation: blinker 1s linear infinite;
    }

    @keyframes blinker {
      50% {
        opacity: 0;
      }
    }
  </style>     
      <div class="content">
        <div class="container-fluid">
          <div class="demo">
              <div class="container">
                  <div class="row">
                      @can('isModel')
                      <div class="col-md64 col-sm-6 offset-md-3">
                            <div class="pricingTable">
                                <div class="pricingTable-header">
                                    <div class="price-value">@if ($plan->plan_price == 0)
                                        {{"FREE"}}
                                    @else
                                        {{$plan->plan_price}}
                                    @endif</div>
                                    <h3 class="title">Model</h3>
                                    
                                </div>
                                <h6 class="title2">
                                    <span class="blink_me"><i class="fas fa-certificate"></i> Hurry Up! <i class="fas fa-certificate"></i> </span> 
                                    Registration Free for first 3 Month</h6>
                                <ul class="pricing-content">
                                    <li>Personal Gallery<span>~ {{ $plan->no_of_picture_in_personal_gallery }} Pics ~</span></li>
                                    <li>Award <span>~ {{$plan->no_of_picture_in_award}} ~</span></li>
                                    <li>Registration Validity  <span>~ {{$plan->registration_validity}} Days ~</span></li>
                                    <li>Number of Photographer Contact <span>~ {{$plan->no_of_photographer_contact}} ~  </span></li>
                                    <li>Every Photographer Contact  <span> <i class="fa fa-inr"></i> {{$plan->photographer_contact_addon_price}}</span></li>
                                    <li>Every Makeup Artist Contact  <span> <i class="fa fa-inr"></i> {{$plan->makeup_artist_contact_addon_price}}</span></li>
                                </ul>
                                <div class="pricingTable-signup">
                                    <a href="{{ route('purchase') }}">Purchase</a>
                                </div>
                            </div>
                        </div> 
                      @endcan
                      
                      @can('isPhotographer')
                      <div class="col-md-6 col-sm-6  offset-md-3">
                            <div class="pricingTable blue">
                                <div class="pricingTable-header">
                                <div class="price-value"> <i class="fa fa-inr"></i>{{$plan->plan_price}}</div>
                                    <h3 class="title">Photographer</h3>
                                </div>
                                <h6 class="title2"><span class="blink_me">Hurry Up!</span> Registration Fees will be  <i class="fa fa-inr"></i> 750/- after 6 Months</h6>
                                <ul class="pricing-content">
                                    <li>Personal Gallery<span>~ {{ $plan->no_of_picture_in_personal_gallery }} Pics ~</span></li>
                                    <li>Award  <span>~ {{$plan->no_of_picture_in_award}} ~</span></li>
                                    <li>Registration Validity  <span>~ {{$plan->registration_validity}} Days ~</span></li>
                                    <li>Number of Model Contact <span>~ {{$plan->no_of_model_contact}} ~  </span></li>
                                     <li>Add on Every Model Contact  <span> <i class="fa fa-inr"></i> {{$plan->model_contact_addon_price}} </span></li>
                                    <li>Every Makeup Artist Contact  <span> <i class="fa fa-inr"></i> {{$plan->makeup_artist_contact_addon_price}} </span></li>
                                </ul>
                                <div class="pricingTable-signup">
                                    <a href="{{ route('purchase') }}">Purchase</a>
                                </div>
                            </div>
                        </div>
                      @endcan

                      @can('isMakeupArtist')
                      <div class="col-md-6 col-sm-6  offset-md-3">
                            <div class="pricingTable green">
                                <div class="pricingTable-header">
                                    <div class="price-value"> <i class="fa fa-inr"></i> {{$plan->plan_price}}/-</div>
                                    <h3 class="title">Makeup Artist</h3>
                                </div>
                                <h6 class="title2"><span class="blink_me">Hurry Up!</span> Registration Fees will be  <i class="fa fa-inr"></i> 500/- after 6 Months</h6>
                                <ul class="pricing-content">
                                    <li>Personal Gallery<span>~  {{ $plan->no_of_picture_in_personal_gallery }} Pics ~</span></li>
                                    <li>Award  <span>~ {{$plan->no_of_picture_in_award}} ~</span></li>
                                    <li>Registration Validity  <span>~ {{$plan->registration_validity}} Days ~</span></li>
                                    <li>Number of Model Contact <span>~ {{$plan->no_of_model_contact}} ~  </span></li>
                                    <li>Add on Every Model Contact  <span> <i class="fa fa-inr"></i>  {{$plan->model_contact_addon_price}}</span></li>
                                    <li>Number of Photographer Contact <span>~ {{$plan->no_of_photographer_contact}} ~  </span></li>
                                    <li>Add on Every Photographer Contact  <span> <i class="fa fa-inr"></i> {{$plan->photographer_contact_addon_price}} </span></li>
                                </ul>
                                <div class="pricingTable-signup">
                                    <a href="{{ route('purchase') }}">Purchase</a>
                                </div>
                            </div>
                        </div>
                      @endcan
                  </div>
              </div>
          </div>
        </div>
      </div>
    @endsection
    <!-- footer -->  
          