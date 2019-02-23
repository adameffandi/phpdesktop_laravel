@extends('landing-layouts.main')

@section('content')
  <div class="container">
    <div class="landing-blogs page-section">
      <div class="row blogs-lg">
        <div class="col-lg-6 col-sm-12">
          <img class="img-responsive" src="{{ asset('/img/image-placeholder.png') }}" alt="">
        </div>
        <div class="col-lg-6 col-sm-12">
          <div class="row blogs-md">
            <div class="col-lg-12 col-sm-12">
              <img class="img-responsive" src="{{ asset('/img/image-placeholder.png') }}" alt="">
            </div>
          </div>
          <div class="row new-sm">
            <div class="col-lg-6 col-sm-12">
              <img class="img-responsive" src="{{ asset('/img/image-placeholder.png') }}" alt="">
            </div>
            <div class="col-lg-6 col-sm-12">
              <img class="img-responsive" src="{{ asset('/img/image-placeholder.png') }}" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="trending-blogs page-section">
      <div class="row">
        <div class="col-sm-8">
          <h2 class="page-section-title">Trending</h2>
          <br>
          <div class="row trending-blogs-item">
            <div class="col-md-6">
              <img class="img-responsive" src="{{ asset('/img/image-placeholder.png') }}" alt="">
            </div>
            <div class="col-md-6">
              <p class="category-text"><b> // Lifestyle </b></p>
              <h4><a href="#" class="link-text">Lorem ipsum dolor sit amet</a></h4>
              <hr>
              <p class="grey-text"> <i class="fa fa-calendar"></i> <i>3 January 2019, 8 comments</i> </p>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
              </p>
              <button type="button" class="btn btn-secondary">Read More <i class="fa fa-arrow-right"></i> </button>
            </div>
          </div>
          <br>

          <div class="row trending-blogs-item">
            <div class="col-md-6">
              <img class="img-responsive" src="{{ asset('/img/image-placeholder.png') }}" alt="">
            </div>
            <div class="col-md-6">
              <p class="category-text"><b> // Lifestyle </b></p>
              <h4><a href="#" class="link-text">Lorem ipsum dolor sit amet</a></h4>
              <hr>
              <p class="grey-text"> <i class="fa fa-calendar"></i> <i>3 January 2019, 8 comments</i> </p>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
              </p>
              <button type="button" class="btn btn-secondary">Read More <i class="fa fa-arrow-right"></i> </button>
            </div>
          </div>
          <br>

          <div class="row trending-blogs-item">
            <div class="col-md-6">
              <img class="img-responsive" src="{{ asset('/img/image-placeholder.png') }}" alt="">
            </div>
            <div class="col-md-6">
              <p class="category-text"><b> // Lifestyle </b></p>
              <h4><a href="#" class="link-text">Lorem ipsum dolor sit amet</a></h4>
              <hr>
              <p class="grey-text"> <i class="fa fa-calendar"></i> <i>3 January 2019, 8 comments</i> </p>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
              </p>
              <button type="button" class="btn btn-secondary">Read More <i class="fa fa-arrow-right"></i> </button>
            </div>
          </div>
          <br>
        </div>

        <div class="col-sm-4">
          <div class="row sub-section">
            <div class="col-sm-12 col-md-12 col-lg-12">
              <h2 class="page-section-title">Most Popular</h2>
              <br>
              <div class="row most-popular-blogs-item">
                <div class="col-md-4">
                  <img class="img-responsive" src="{{ asset('/img/image-placeholder.png') }}" alt="">
                </div>
                <div class="col-md-8">
                  <h5><a href="#" class="link-text">Lorem ipsum dolor sit amet</a></h5>
                  <p class="grey-text"> <i class="fa fa-calendar"></i> Jan 21, 2018</p>
                </div>
              </div>
              <br>
              <div class="row most-popular-blogs-item">
                <div class="col-md-4">
                  <img class="img-responsive" src="{{ asset('/img/image-placeholder.png') }}" alt="">
                </div>
                <div class="col-md-8">
                  <h5><a href="#" class="link-text">Lorem ipsum dolor sit amet</a></h5>
                  <p class="grey-text"> <i class="fa fa-calendar"></i> Jan 21, 2018</p>
                </div>
              </div>
              <br>
              <div class="row most-popular-blogs-item">
                <div class="col-md-4">
                  <img class="img-responsive" src="{{ asset('/img/image-placeholder.png') }}" alt="">
                </div>
                <div class="col-md-8">
                  <h5><a href="#" class="link-text">Lorem ipsum dolor sit amet</a></h5>
                  <p class="grey-text"> <i class="fa fa-calendar"></i> Jan 21, 2018</p>
                </div>
              </div>
            </div>
          </div>

          <div class="row sub-section">
            <div class="col-sm-12 col-md-12 col-lg-12">
              <h2 class="page-section-title">Categories</h2>
              <br>
              <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 category-image">
                  <img class="img-responsive" src="{{ asset('/img/image-placeholder.png') }}" alt="">
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 category-image">
                  <img class="img-responsive" src="{{ asset('/img/image-placeholder.png') }}" alt="">
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 category-image">
                  <img class="img-responsive" src="{{ asset('/img/image-placeholder.png') }}" alt="">
                </div>
              </div>
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
