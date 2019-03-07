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
        <h1 class="text-center">Download Links</h1>
        <div class="text-center"><br>
          <a href="#" class="read-more-btn">PHPDesktop With Remote Database (MySQL)</a> <br><br><br>
          <a href="https://cloud.amkde.com/index.php/s/5pzHSy9G5qQRjii" class="read-more-btn">PHPDesktop With Local Database (SQLite)</a>
        </div>
      </div>
    </div>

  </div> <!-- end container -->
@endsection
