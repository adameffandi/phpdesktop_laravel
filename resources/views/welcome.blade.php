@extends('landing-layouts.main')

@section('content')
  <div class="container">
    <div class="landing-blogs page-section">
      <div class="row blogs-lg">
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="landing-blog-title-category-lg">
            <p class="landing-blog-category-lg">{{$blog_trending_main->category->category_name}}</p>
            <h3 class="landing-blog-title-lg">{{$blog_trending_main->title}}</h3>
          </div>
          <img class="img-responsive" src="{{ asset($blog_trending_main->media->media_location) }}" alt="">
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="row new-sm new-sm-1">
            @foreach ($blog_trending_ones as $blog_trending_one)
              <div class="col-lg-6 col-sm-12">
                <div class="landing-blog-title-category">
                  <p class="landing-blog-category">{{$blog_trending_one->category->category_name}}</p>
                  <h5 class="landing-blog-title">{{$blog_trending_one->title}}</h5>
                </div>
                <img class="img-responsive" src="{{ asset($blog_trending_one->media->media_location) }}" alt="">
              </div>
            @endforeach
          </div>
          <div class="row new-sm new-sm-2">
            @foreach ($blog_trending_twos as $blog_trending_two)
              <div class="col-lg-6 col-sm-12">
                <div class="landing-blog-title-category">
                  <p class="landing-blog-category">{{$blog_trending_two->category->category_name}}</p>
                  <h5 class="landing-blog-title">{{$blog_trending_two->title}}</h5>
                </div>
                <img class="img-responsive" src="{{ asset($blog_trending_two->media->media_location) }}" alt="">
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>

    <div class="trending-blogs page-section">
      <div class="row">
        <div class="col-sm-8">
          <h2 class="page-section-title">Trending</h2>
          <br>
          @foreach ($blogs as $blog)
            @if ($blog->homepage_tag_id == 2)
              <div class="row trending-blogs-item">
                <div class="col-md-6">
                  <img class="img-responsive" src="{{ asset($blog->media->media_location) }}" alt="">
                </div>
                <div class="col-md-6">
                  <p class="category-text"><b> // {{$blog->category->category_name}} </b></p>
                  <h4><a href="#" class="link-text">{{$blog->title}}</a></h4>
                  <hr>
                  <p class="grey-text"> <i class="fa fa-calendar"></i> <i>{{date_format($blog->created_at, 'F j, Y')}}, 8 comments</i> </p>
                  <p>
                    {{substr($blog->content, 0, 300) . "..."}}
                  </p>
                  <button type="button" class="btn btn-secondary">Read More <i class="fa fa-arrow-right"></i> </button>
                </div>
              </div>
              <br>
            @endif
          @endforeach
        </div>

        <div class="col-sm-4">
          <div class="row sub-section">
            <div class="col-sm-12 col-md-12 col-lg-12">
              <h2 class="page-section-title">Most Popular</h2>
              <br>
              @foreach ($blogs as $blog)
                @if ($blog->homepage_tag_id == 3)
                  <div class="row most-popular-blogs-item">
                    <div class="col-md-4">
                      <img class="img-responsive" src="{{ asset($blog->media->media_location) }}" alt="">
                    </div>
                    <div class="col-md-8">
                      <h5><a href="#" class="link-text">{{$blog->title}}</a></h5>
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
    </div>
  </div> <!-- end container -->



  {{-- <div class="latest-blogs page-section full-width-div">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="page-section-title-white text-center">Latest Blogs</h2>
        </div>
      </div>
    </div> <!--ed container -->
  </div> --}}
@endsection
