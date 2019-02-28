@extends('dashboard-layouts.layout-1.main')

@section('content')
  <div class="content-body">
    <div class="container-fluid">

      <div class="row">
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
        <div class="col-sm-12 col-md-5 col-lg-5">
          <div class="panel panel-primary">
            <div class="panel-body">A Basic Panel</div>
          </div>
        </div>
        <div class="col-sm-12 col-md-7 col-lg-7">
          <div class="panel panel-default">
            <div class="panel-body">A Basic Panel</div>
          </div>
        </div>
      </div>

    </div><!-- end container -->
  </div><!-- end content body -->
@endsection
