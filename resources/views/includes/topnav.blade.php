<!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:void(0)">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
              
              <ul class="navbar-nav">
              
              <li class="nav-item dropdown">
                <a class="nav-link" href="javscript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i> {{ Auth::user()->name }}
                  <i class="material-icons">keyboard_arrow_down</i>
                  <!-- <span class="notification">5</span> -->
                  <p class="d-lg-none d-md-block">
                    Action
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="{{ route('user_profile') }}">My Profile</a>
                  <a class="dropdown-item" href="{{ route('price_chart') }}">Plans</a>
                  <a class="dropdown-item" href="{{ route('contact_us') }}">Contact Us</a>
                  <a class="dropdown-item" href="{{ route('grievance') }}">Grievance</a>
                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('Logout') }}</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                  
                </div>
              </li>              
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->