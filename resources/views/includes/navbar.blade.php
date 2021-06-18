<nav class="navbar navbar-expand-lg main-navbar">
  <form class="form-inline mr-auto">
    <ul class="navbar-nav mr-3">
      <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
      <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
    </ul>
  </form>
  <ul class="navbar-nav navbar-right">

    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
      <img alt="image" src="{{ asset('../assets/img/avatar/avatar-3.png')}} " class="rounded-circle mr-1">
      <div class="d-sm-none d-lg-inline-block">Hai, {{ Auth::user()->name }}</div></a>
      <div class="dropdown-menu dropdown-menu-right">
        <form action="{{ url ('logout')}}" method="POST">
          @csrf
          <div class="d-flex justify-content-center align-item-center">

            <button type="submit" class="btn btn-outline-danger ">
              <i class="fas fa-sign-out-alt"></i>Logout
            </button>
          </div>
          </form>

        {{-- <a href="{{ url ('logout')}}" class="dropdown-item has-icon text-danger">
          <i class="fas fa-sign-out-alt"></i> Logout
        </a> --}}
      </div>
    </li>
  </ul>
</nav>