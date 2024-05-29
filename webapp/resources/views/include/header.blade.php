<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <!-- <a class="navbar-brand" href="#">{{config('app.name')}}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
      @auth

      @if(auth()->user()->profile && auth()->user()->profile->role == 'admin')
      <li class="nav-item">
          <a class="nav-link" href="{{route('register')}}">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('showMessages')}}">Messages</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('logout')}}">Logout</a>
        </li>
    @else

        <li class="nav-item">
          <a class="nav-link" href="{{route('home')}}">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{route('showFeed')}}">Content</a>
        </li>
        @if(auth()->user()->profile && auth()->user()->profile->role == 'student')
        <li class="nav-item">
          <a class="nav-link" href="{{route('onlyUpload')}}">Upload</a>
        </li>
        @endif
        <li class="nav-item">
          <a class="nav-link" href="{{route('reviews')}}">Reviews</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('contact')}}">Contact Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('about')}}">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('assignment')}}">Assignment</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="{{route('logout')}}">Logout</a>
        </li>


        @endif
      
      @else
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('login')}}">Login</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="{{route('register')}}">Register</a>
        </li> -->
      
        @endauth
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li> -->
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>