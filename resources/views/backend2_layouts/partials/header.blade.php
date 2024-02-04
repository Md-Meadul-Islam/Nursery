<header id="header" class="header fixed-top d-flex align-items-center" style="z-index: 10000">
  <div class="d-flex align-items-center justify-content-between">
    <a href="{{route('welcome')}}" class="logo d-flex align-items-center">
      <img src="{{asset('backend2')}}/img/logo.png" alt="">
      <span class="d-none d-lg-block">Nursery</span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
  </div><!-- End Logo -->
  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">
      <li class="nav-item d-none d-sm-inline-block px-3">
        <a href="{{route('welcome')}}" class="nav-link">Home</a>
      </li>
      @php
      $user_ip = getenv('REMOTE_ADDR');
      $geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
      $countryName = $geo["geoplugin_countryName"];
      $restcountriesApiUrl = "https://restcountries.com/v2/name/$countryName?fullText=true";
      $countryInfo = json_decode(file_get_contents($restcountriesApiUrl), true);
      $countryCode = 'bd';
      if (isset($countryInfo)) {
      $countryCode = strtolower($countryInfo[0]['alpha2Code']);
      }
      @endphp
      <div class="dropdown px-3">
        <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" title="{{$countryInfo[0]['languages'][0]['nativeName']}}">
          <i class="flag-icon flag-icon-{{$countryCode}}"></i>
        </a>      
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#"><i
            class="flag-icon flag-icon-{{$countryCode}}"></i>{{$countryInfo[0]['languages'][0]['nativeName']}}</a></li>
          <li><a class="dropdown-item" href="#"><i class="flag-icon flag-icon-us"></i> English</a></li>
        </ul>
      </div>
      <li class="nav-item dropdown pe-3">
        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <img src="{{asset('')}}{{Auth::user()->photo}}" alt="Profile" class="rounded-circle">
          <span class="d-none d-md-block dropdown-toggle ps-2">{{Auth::user()->name}}</span>
        </a><!-- End Profile Iamge Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
            <h6>Kevin Anderson</h6>
            <span>Web Designer</span>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
              <i class="bi bi-person"></i>
              <span>My Profile</span>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
              <i class="bi bi-gear"></i>
              <span>Account Settings</span>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
              <i class="bi bi-question-circle"></i>
              <span>Need Help?</span>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="#">
              <i class="bi bi-box-arrow-right"></i>
              <span>Sign Out</span>
            </a>
          </li>

        </ul><!-- End Profile Dropdown Items -->
      </li><!-- End Profile Nav -->
    </ul>
  </nav><!-- End Icons Navigation -->
</header><!-- End Header -->