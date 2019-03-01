<div id="mySidenav" class="sidenav">
  <a id="close-icon" href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  @if (Auth::user()->role_id == 1)
    <a href="{{route('home')}}">Home</a>
    <a href="{{route('home.user')}}">Users</a>
    <a href="{{route('home.blog')}}">Blogs</a>
    {{-- <a href="{{route('home.comment')}}">Comments</a> --}}
  @elseif (Auth::user()->role_id == 2)
    <a href="{{route('user')}}">Home</a>
    <a href="{{route('user.blog')}}">My Blogs</a>
    {{-- <a href="{{route('user.comment')}}">My Comments</a> --}}
  @else
    <a href="{{route('logout')}}">Logout</a>
  @endif

</div>
