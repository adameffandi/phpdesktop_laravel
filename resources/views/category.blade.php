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
        <h1 class="text-center">All Categories</h1>
      </div>
    </div>

    <div class="row">
      @foreach ($categories as $category)
          <div class="col-lg-4 col-md-6 col-sm-12 category-image">
            <a href="{{route('view.blog.with.category', $category->id)}}">
              <div class="img-tint">
                <h5 class="category-name">{{$category->category_name}}</h5>
                <img class="img-responsive" src="{{ asset($category->media->media_location) }}" alt="">
              </div>
            </a>
          </div>
      @endforeach
    </div>
  </div> <!-- end container -->
@endsection
