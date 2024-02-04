 <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
      @if (Auth::check() && Auth::user()->type === 'buyer')
      <li class="nav-item pull-up">
        <a href="{{route('buyer.dashboard')}}" class="nav-link">
          <i class="bi bi-grid"></i>
         <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item pull-up">
        <a href="#" class="nav-link">
          <i class="nav-icon bi bi-cart-check"></i>
          <span>Your Cart</span>
          <p>
            <span class="right badge badge-danger">10</span>
          </p>
        </a>
      </li>
      <li class="nav-item pull-up">
        <a href="#" class="nav-link">
          <i class="nav-icon bi bi-stack"></i>
          <span>Buying Plants</span>
          <p>
            <span class="right badge badge-danger">New</span>
          </p>
        </a>
      </li>          
      @else
      <li class="nav-item pull-up">
        <a href="{{route('seller.dashboard')}}" class="nav-link">
          <i class="bi bi-grid"></i>
         <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item pull-up">
        <a href="#" class="nav-link">
          <i class="nav-icon bi bi-layers"></i>
          <span>All Orders</span>
          <p>
            <span class="right badge badge-danger">New</span>
          </p>
        </a>
      </li>
      <li class="nav-item pull-up">
        <a href="{{route('allplants.index')}}" class="nav-link">
          <i class="nav-icon bi bi-tree"></i>
          <span>All Plants</span>
          <p>
            <span class="right badge badge-danger">New</span>
          </p>
        </a>
      </li>         
      <li class="nav-item pull-up">
        <a href="#" class="nav-link">
          <i class="nav-icon bi bi-calculator"></i><span>All Sells</span>
          <p>            
            <span class="right badge badge-danger">New</span>
          </p>
        </a>
      </li>
      <li class="nav-item pull-up">
        <a href="#" class="nav-link">
          <i class="nav-icon bi bi-person-fill-up"></i><span>Top Buyers</span>
          <p>
            <span class="right badge badge-danger">New</span>
          </p>
        </a>
      </li>
      @endif
      <li class="nav-item pull-up">
        <a href="#" class="nav-link">
          <i class="nav-icon bi bi-graph-up-arrow"></i><span>Trendings</span>
          <p>
            <span class="right badge badge-danger">New</span>
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link pull-up" href="#faq">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        <a class="nav-link pull-up" href="#contact">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li><!-- End Contact Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->