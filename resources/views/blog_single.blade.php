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

    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-12">
        <img src="{{asset($blog->media->media_location)}}" alt="" class="single-blog-img">
        <div class="single-blog-content">
          <div class="single-blog-info-sec">
            <h2>{{$blog->title}}</h2>
            <p class="grey-text">
              <i>
                Date posted: {{date_format($blog->created_at, 'F j, Y')}} <br>
                Author: <a href="#">{{$blog->user->name}}</a> <br>
                Category: <a href="#">{{$blog->category->category_name}}</a>
              </i>
            </p>
          </div>
          <p>{{$blog->content}}</p>
        </div>
      </div>

      <div class="col-lg-4 col-md-4 col-sm-12">
        @if ($related_blogs != null)
          <div class="row sub-section">
            <div class="col-sm-12 col-md-12 col-lg-12">
              <h2 class="page-section-title">Similar Blogs</h2>
              <br>
              @foreach ($related_blogs as $rblog)
                <div class="row most-popular-blogs-item">
                  <div class="col-md-4">
                    <a href="#">
                      <img class="img-responsive" src="{{ asset($rblog->media->media_location) }}" alt="">
                    </a>
                  </div>
                  <div class="col-md-8">
                    <h5><a href="#" class="link-text">{{$rblog->title}}</a></h5>
                    <p class="grey-text"> <i class="fa fa-calendar"></i> {{date_format($rblog->created_at, 'F j, Y')}}</p>
                  </div>
                </div>
                <br>
              @endforeach
            </div>
          </div>
        @endif

        <div class="row sub-section">
          <div class="col-sm-12 col-md-12 col-lg-12">
            <h2 class="page-section-title">Categories</h2>
            <br>
            @foreach ($categories as $category)
              <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 category-image">
                  <div class="img-tint">
                    <h5 class="category-name">{{$category->category_name}}</h5>
                    <img class="img-responsive" src="{{ asset($category->media->media_location) }}" alt="">
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>

    </div>
  </div> <!-- end container -->
@endsection
