@extends('landing-layouts.main')

@section('content')
  <div class="container">
    <div class="row message-section">
      <div class="col-md-12">
        @if(Session::has('success'))
          <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
        @elseif($errors->any())
          <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ implode('', $errors->all(':message. ')) }}</p>
        @elseif (Session::has('fail'))
          <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('fail') }}</p>
        @endif
      </div>
    </div>

    <div class="row public-profile-section">
      <div class="col-sm-12 col-md-4 col-lg-2">
        @if (isset($user->profile_picture_id))
          <img src="{{asset($user->profile_picture->media_location)}}" alt="" class="img-responsive">
        @else
          <img src="{{asset('img/profile_pictures/user-placeholder.jpg')}}" alt="" class="img-responsive">
        @endif
      </div>
      <div class="col-sm-12 col-md-8 col-lg-10">
        <h1>{{$user->name}}</h1>
        @if (isset($user->created_at))
          <p name="grey-text-2">Member since <i>{{date_format($user->created_at, 'j F Y')}}</i> </p>
        @endif
        @if (isset($count_blog))
          <p>{{$count_blog}} blog(s) published.</p>
        @endif
      </div>
    </div>

    <hr>

    <div class="row all-blog-section">
      @foreach ($blogs as $blog)
        <div class="col-lg-4 col-md-6 col-sm-12 all-blog-one-row">
          <div class="all-blog-item">
            <a href="{{route('view.blog', $blog->id)}}" class="all-blog-link">
                <img src="{{asset($blog->media->media_location)}}" alt="" class="all-blog-img">
                <div class="all-blog-summary">
                  <h4 class="all-blog-title">{{$blog->title}}</h4>
                  <p>{{substr($blog->content, 0, 150) . "..."}}</p>
                  <p class="grey-text"> <i class="fa fa-calendar"></i> <i>{{date_format($blog->created_at, 'F j, Y')}}</i> </p>
                </div> <!--end col, all-blog-summary -->
            </a>
          </div> <!-- end all-blog-item -->
        </div>
      @endforeach
    </div>

    <div class="row all-blog-section">

    </div>
  </div> <!-- end container -->
@endsection
