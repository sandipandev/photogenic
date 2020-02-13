
    <div class="sidebar" data-color="purple" data-background-color="black" data-image="./assets/img/sidebar-3.jpg">
      <!--
              Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

              Tip 2: you can also add an image using data-image tag
          -->
      <div class="logo">
        <a class="simple-text logo-normal" href="{{ url('home') }}">
          <img src=" {{asset('assets/img/ephotogenics_logo_dark.png')}} " alt="">
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          @foreach ( $menus as $menu )
          @if (Request::path() == $menu->link)
            <li class="nav-item active"> 
              @else
                <li class="nav-item">
          @endif
             
              <a class="nav-link" href="{{$menu->link}}">
              <i class="material-icons">{{$menu->icon}}</i>
              <p>{{$menu->name}}</p>
              </a>
            </li>
          @endforeach
          <!-- your sidebar here -->
        </ul>
      </div>
    </div>
    <div class="main-panel">