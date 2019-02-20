@extends('landing-layouts.main')

@section('content')
  <div class="landing-blogs">
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

  <div class="trending-blogs">
    <div class="row">
      <div class="col-sm-7">
        <h1>Trending</h1>
        <div class="row trending-blogs-item">
          <div class="col-md-4">
            <img class="img-responsive" src="{{ asset('/img/image-placeholder.png') }}" alt="">
          </div>
          <div class="col-md-8">
            <h3>Test</h3>
            <hr>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </p>
          </div>
        </div>
        <div class="row trending-blogs-item">
          <div class="col-md-4">
            <img class="img-responsive" src="{{ asset('/img/image-placeholder.png') }}" alt="">
          </div>
          <div class="col-md-8">
            <h3>Test</h3>
            <hr>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </p>
          </div>
        </div>
        <div class="row trending-blogs-item">
          <div class="col-md-4">
            <img class="img-responsive" src="{{ asset('/img/image-placeholder.png') }}" alt="">
          </div>
          <div class="col-md-8">
            <h3>Test</h3>
            <hr>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </p>
          </div>
        </div>
      </div>
      <div class="col-sm-5">
        Most Popular
      </div>
    </div>
  </div>

  <h1>Hello, world!</h1>
@endsection
