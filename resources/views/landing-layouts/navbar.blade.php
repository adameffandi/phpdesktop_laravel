<nav class="navbar navbar-expand-lg navbar-custom">
    <a class="navbar-brand" href="{{route('landing')}}">PHP Desktop</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"> <i class="fas fa-bars"></i> </span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto topnav">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('landing')}}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('all.blog')}}">Blogs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('view.category')}}">Categories</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://cloud.amkde.com/index.php/s/M97i6Di5pbFfkFZ" target="_blank">Download</a>
            </li>
						@if (Auth::check())
							<li class="nav-item">
                @if (Auth::user()->role_id == 1)
                  <a class="nav-link" href="{{route('home')}}">My Account</a>
                @else
                  <a class="nav-link" href="{{route('user')}}">My Account</a>
                @endif
	            </li>
							<li class="nav-item">
	                <a class="nav-link" href="{{route('logout')}}">Sign Out</a>
	            </li>
						@else
							<li class="nav-item">
	                <a class="nav-link" href="#" data-toggle="modal" data-target="#sign-in-modal">Sign In</a>
	            </li>
	            <li class="nav-item">
	                <a class="nav-link" href="#" data-toggle="modal" data-target="#register-modal">Register</a>
	            </li>
						@endif
        </ul>
    </div>

		@include('modals.sign-in')
		@include('modals.register')
</nav>
