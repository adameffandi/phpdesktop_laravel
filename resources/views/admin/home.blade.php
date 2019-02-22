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

          This is home

        </div>
      </div>

    </div><!-- end container -->
  </div><!-- end content body -->
@endsection
