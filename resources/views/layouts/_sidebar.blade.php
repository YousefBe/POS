<div class="vertical-nav bg-white collapse show" id="sidebar">

  @guest
  <div class="h-100 bg-light p-3">
    <h1 class="diplay-4 m-0 ">
      Hello there
    </h1>
    <p class="lead text-muted p-2">
      to be able to use our system , you should either sign in or signup ..
      whats it gona be ?
    </p>

    <div class="card card-body mb-5" style="margin-top: 100px">

      <div class="text-left">
        <a href="{{route('register')}}" class="btn btn-primary px-3 rounded-pill">Signup</a>
      </div>
      <hr>
      <p class="lead text-center">or</p>
      <hr>

      <div class="text-right">
        <a href="{{route('login')}}" class="btn btn-danger px-3 rounded-pill">Login</a>
      </div>

    </div>

    <div class="mt-auto">
      <div class="text-muted">
        this has nothing to do with Matrix Movie
      </div>
    </div>
  </div>
  @endguest
  <!-- Nav Header -->
  @auth
  <div class="py-4 mb-3 bg-light">
    <div class="media d-flex align-items-center">
      <img src="{{asset(auth::user()->UserImage())}}" alt=""
        class="img-fluid rounded-circle mr-3 img-thumbnail shadow-sm" width="75" />
      <div class="media-body">
        <h4 class="m-0">{{ Auth::user()->FName }}</h4>
        <p class="font-weight-light text-muted mb-0">{{Auth::user()->roles[0]->display_name}}</p>
      </div>
    </div>
  </div>

  <p class="px-3 small pb-4 mb-0 font-weight-bold text-uppercase">Main</p>

  <!-- Nav Section 1 -->
  <ul class="nav bg-white flex-column">
    <li class="nav-item">
      <a href="{{route('home')}}" class="nav-link font-italic text-dark bg-light">
        <i class="fa fa-th-large mr-3 text-danger fa-fw"></i>Home</a>
    </li>
    <li class="nav-item">
      <a href="{{route('order.index')}}" class="nav-link font-italic text-dark">
        <i class="fa fa-shopping-basket mr-3 text-primary fa-fw"></i>Orders</a>
    </li>
    <li class="nav-item">
      <a href="{{route('client.index')}}" class="nav-link font-italic text-dark">
        <i class="fa fa-users mr-3 text-primary fa-fw"></i>Clients</a>
    </li>
    <li class="nav-item">
      <a href="{{route('product.index')}}" class="nav-link font-italic text-dark">
        <i class="fa fa-hand-o-right mr-3 text-primary fa-fw"></i>Products</a>
    </li>
    <li class="nav-item">
      <a href="{{route('category.index')}}" class="nav-link font-italic text-dark">
        <i class="fa fa-folder mr-3 text-primary fa-fw"></i>Categories</a>
    </li>
  </ul>
  <!-- End of nav Section 1  -->

  <p class="px-3 py-4 mb-0 small font-weight-bold text-uppercase">Actions</p>
  <!-- Nav Section 2 -->

  <ul class="bg-white nav mb-0 flex-column">

    @role('Super_admin')
    <li class="nav-item">
      <a href="{{route('user.index')}}" class="nav-link">
        <i class="fa fa-user-circle-o mr-3" aria-hidden="true"></i> Manage Admins
      </a>
    </li>
    @endrole
    <li class="nav-item">
      <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
      document.getElementById('logout-form').submit();">
        <i class="fa fa-sign-out mr-3" aria-hidden="true"></i>
        {{ __('Logout') }}
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>

    </li>
  </ul>
  @endauth

  <!-- End Section 2 -->
</div>
<!-- End of navbar -->