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

    <div class="row all-blog-section">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <h1 class="text-center">{{$category->category_name}} Blogs</h1>
        <p class="text-center">We found {{$count_blog}} blog(s)</p>
      </div>
    </div>

    <div class="row all-blog-section">
      @if (isset($blogs) && !empty($blogs))
        @foreach ($blogs as $blog)
          <div class="col-lg-4 col-md-6 col-sm-12 all-blog-one-row">
            <div class="all-blog-item">
              <a href="{{route('view.blog', $blog->id)}}" class="all-blog-link">
                  <img src="{{asset($blog->media->media_location)}}" alt="" class="all-blog-img">
                  <div class="all-blog-summary">
                    <h4 class="all-blog-title">{{$blog->title}}</h4>
                    <p>{{substr($blog->content, 0, 150) . "..."}}</p>
                    <p class="grey-text"> <i class="fa fa-calendar"></i> <i>{{date_format($blog->created_at, 'F j, Y')}}, 8 comments</i> </p>
                  </div> <!--end col, all-blog-summary -->
              </a>
            </div> <!-- end all-blog-item -->
          </div>
        @endforeach
      @endif

    </div>
  </div> <!-- end container -->
@endsection
