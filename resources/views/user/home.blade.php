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
            <div class="panel-heading">
              Profile
              <div class="float-right">
                <a href="#" class="edit-profile-link" data-toggle="modal" data-target="#edit-profile-{{$user->id}}"> <i class="fas fa-edit"></i> Edit Profile</a>
                @include('modals.user-edit-profile')
              </div>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-4">
                  @if (isset($user->profile_picture_id))
                    <img src="{{asset($user->profile_picture->media_location)}}" alt="" class="img-responsive">
                  @else
                    <img src="{{asset('img/profile_pictures/user-placeholder.jpg')}}" alt="" class="img-responsive">
                  @endif
                </div>
                <div class="col-sm-12 col-md-12 col-lg-8">
                  <h3>{{$user->name}}</h3>
                  <h5>{{$user->email}}</h5>
                </div>
              </div>
            </div>
          </div>

          <div class="panel panel-default">
            <div class="panel-body">
              <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6">
                  <div class="user-statistic user-statistic-box-1 text-center">
                    <h4>Blogs Posted</h4>
                    <h2>{{$count_blogs_posted}}</h2>
                  </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6">
                  <div class="user-statistic user-statistic-box-2 text-center">
                    <h4>Blogs Pending</h4>
                    <h2>{{$count_blogs_pending}}</h2>
                  </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6">
                  <div class="user-statistic user-statistic-box-3 text-center">
                    <h4>Blogs Archived</h4>
                    <h2>{{$count_blogs_archived}}</h2>
                  </div>
                </div>
                {{-- <div class="col-sm-12 col-md-12 col-lg-6">
                  <div class="user-statistic user-statistic-box-4 text-center">
                    <h4>Comments Made</h4>
                    <h2>{{$count_comments}}</h2>
                  </div>
                </div> --}}
              </div> <!-- end inner row 2 -->
            </div>
          </div>

        </div> <!-- end main col-->

        <div class="col-sm-12 col-md-7 col-lg-7">
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                  <h2>Your Recent Blogs</h2>
                  <hr>
                </div>
              </div>
              @foreach ($your_blogs as $blog)
                <div class="row">
                  <div class="col-sm-12 col-md-4 col-lg-4">
                    @if (isset($blog->media_id))
                      <img src="{{asset($blog->media->media_location)}}" alt="" class="img-responsive">
                    @else
                      <img src="{{asset('img/profile_pictures/user-placeholder.jpg')}}" alt="" class="img-responsive">
                    @endif
                  </div>
                  <div class="col-sm-12 col-md-8 col-lg-8">
                    <h3>{{$blog->title}}</h3>
                    <p>{{substr($blog->content, 0, 150) . "..."}}</p>
                    <p class="grey-text"> <i class="fa fa-calendar"></i> <i>{{date_format($blog->created_at, 'F j, Y')}}</i> </p>
                  </div>
                </div>
                <br>
              @endforeach
            </div>
          </div>
        </div>
      </div>

    </div><!-- end container -->
  </div><!-- end content body -->
@endsection
