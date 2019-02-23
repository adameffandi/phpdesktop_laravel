<nav class="navbar navbar-expand-lg navbar-custom">
    <a class="navbar-brand" href="{{route('landing')}}">PHP Desktop</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto topnav">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Blogs</a>
            </li>
						@if (Auth::check())
							<li class="nav-item">
	                <a class="nav-link" href="#">My Account</a>
	            </li>
							<li class="nav-item">
	                <a class="nav-link" href="#">Sign Out</a>
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
