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
  </div> <!-- end container -->

  <div class="container-fluid">
    <div class="landing-blogs page-section">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 landing-blogs-item">
          <div class="hovereffect">
            <a href="{{route('view.blog', $trending_blog->id)}}">
              <img class="img-responsive" src="{{$trending_blog->media->media_location}}" alt="">
              <div class="overlay">
                 <h2>{{$trending_blog->title}}</h2>
                 <br>
                 <a class="info read-more-btn" href="{{route('view.blog', $trending_blog->id)}}">Read More</a>
              </div>
            </a>
          </div>
        </div> <!--end col -->
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="row">
            @foreach ($second_trending_blogs as $tblog)
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 landing-blogs-item">
                <div class="hovereffect">
                  <a href="{{route('view.blog', $tblog->id)}}">
                    <img class="img-responsive" src="{{$tblog->media->media_location}}" alt="">
                    <div class="overlay">
                       <h2>
                         @if (strlen($tblog->title) >= 30)
                           {{substr($tblog->title, 0, 30) . "..."}}
                         @else
                           {{$tblog->title}}
                         @endif
                       </h2>
                       <br>
                       <a class="info read-more-btn" href="{{route('view.blog', $tblog->id)}}">Read More</a>
                    </div>
                  </a>
                </div>
              </div>
            @endforeach
          </div>
        </div><!--end col -->
      </div> <!-- end row -->
    </div>
  </div><!-- container -->

  {{-- <div class="container"> --}}
    <div class="trending-blogs page-section" style="background-color: #cccccc;">
      <div class="container">


      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-8">
          <h2 class="page-section-title">Trending</h2>
          <br>
          @foreach ($blogs as $blog)
            @if ($blog->homepage_tag_id == 2)
              <div class="row trending-blogs-item">
                <div class="col-sm-12 col-md-12 col-lg-6">
                  <a href="{{route('view.blog', $blog->id)}}">
                    <img class="img-responsive" src="{{ asset($blog->media->media_location) }}" alt="">
                  </a>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6">
                  <a href="{{route('view.blog.with.category', $blog->category->id)}}" class="link-text">
                    <p class="category-text"><b> // {{$blog->category->category_name}} </b></p>
                  </a>
                  <h4><a href="{{route('view.blog', $blog->id)}}" class="link-text">
                    @if (strlen($blog->title) >= 27)
                      {{substr($blog->title, 0, 27) . "..."}}
                    @else
                      {{$blog->title}}
                    @endif
                    {{-- {{$blog->title}} --}}
                  </a></h4>
                  <hr>
                  <p class="author-link">By <a href="{{route('view.author', $blog->user_id)}}">{{$blog->user->name}}</a> </p>
                  <p class="grey-text"> <i class="fa fa-calendar"></i> <i>{{date_format($blog->created_at, 'F j, Y')}}</i></p>
                  <p>

                    @if (strlen($blog->content) >= 150)
                      {{substr($blog->content, 0, 150) . " ..."}}
                    @else
                      {{$blog->content}}
                    @endif
                  </p>
                  <a class="read-more-btn" href="{{route('view.blog', $blog->id)}}">Read More <i class="fa fa-arrow-right"></i></a>
                </div>
              </div>
              <br>
            @endif
          @endforeach
        </div>

        <div class="col-sm-12 col-md-12 col-lg-4">
          <div class="row sub-section">
            <div class="col-sm-12 col-md-12 col-lg-12">
              <h2 class="page-section-title">Most Popular</h2>
              <br>
              @foreach ($blogs as $blog)
                @if ($blog->homepage_tag_id == 3)
                  <div class="row most-popular-blogs-item">
                    <div class="col-md-4">
                      <a href="{{route('view.blog', $blog->id)}}">
                        <img class="img-responsive" src="{{ asset($blog->media->media_location) }}" alt="">
                      </a>
                    </div>
                    <div class="col-md-8">
                      <h5><a href="{{route('view.blog', $blog->id)}}" class="link-text">{{$blog->title}}</a></h5>
                      <p class="grey-text"> <i class="fa fa-calendar"></i> {{date_format($blog->created_at, 'F j, Y')}}</p>
                    </div>
                  </div>
                  <br>
                @endif
              @endforeach
            </div>
          </div>

          <div class="row sub-section">
            <div class="col-sm-12 col-md-12 col-lg-12">
              <h2 class="page-section-title">Categories</h2>
              <br>
              @foreach ($categories as $category)
                <a href="{{route('view.blog.with.category', $category->id)}}">
                  <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 category-image">
                      <div class="img-tint">
                        <h5 class="category-name">{{$category->category_name}}</h5>
                        <img class="img-responsive" src="{{ asset($category->media->media_location) }}" alt="">
                      </div>
                    </div>
                  </div>
                </a>
              @endforeach
            </div>
          </div>

        </div>
      </div>
      </div>
    </div>
  {{-- </div> <!-- end container --> --}}
@endsection
