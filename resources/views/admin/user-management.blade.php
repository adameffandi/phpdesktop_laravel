@extends('dashboard-layouts.layout-1.main')

@section('content')
  <div class="content-body">
    <div class="container-fluid">

      <div class="row">
        <div class="col-md-12">
          {{-- <div class="panel panel-default">
            <div class="panel-heading">Panel Heading</div>
            <div class="panel-body">Panel Content</div>
          </div> --}}
          @if(Session::has('success'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
          @elseif($errors->any())
            <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ implode('', $errors->all(':message. ')) }}</p>
          @elseif (Session::has('fail'))
            <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('fail') }}</p>
          @endif

          <div class="card text-center">
            <ul class="nav nav-tabs card-header-tabs" role="tablist" id="dashboardTabMenu">
              <li class="nav-item active" role="presentation">
                <a href="#user-management" aria-controls="user-management" role="tab" data-toggle="tab">User Management</a>
              </li>
              <li class="nav-item" role="presentation">
                <a href="#user-permission" aria-controls="user-permission" role="tab" data-toggle="tab">Permission</a>
              </li>
            </ul>
            <div class="tab-content">

              <div role="tab-panel" class="tab-pane active" id="user-management">
                <h3 class="card-title">User Management</h3>
                <button type="button" class="dashboard-btn" data-toggle="modal" data-target="#user-create">
                  Create User
                </button>
                @include('modals.user-create')

                <table class="table table-responsive  table-striped table-hover table-bordered" id="userMgtTable">
                  <thead>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Action</th>
                  </thead>
                  <tbody>
                    @foreach ($users as $user)
                    <tr>
                      <td></td>
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->role->name}}</td>
                      <td>
                        @if ($user->status_id == 1)
                          <span class="green-text">{{$user->status->status_name}}</span>
                        @else
                          <span class="red-text">{{$user->status->status_name}}</span>
                        @endif
                      </td>
                      <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                          <button type="button" class="btn btn-primary btn-action" data-toggle="modal" data-target="#user-edit-{{$user->id}}"><i class="fas fa-edit"></i></button>
                          {{-- <button type="button" class="btn btn-danger btn-action" data-toggle="modal" data-target="#user-delete-{{$user->id}}"><i class="fas fa-times"></i></button> --}}
                        </div>

                        @include('modals.user-edit')
                        {{-- @include('modals.user-delete') --}}
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div> <!-- end user-management tab pane -->

              <div role="tab-panel" class="tab-pane" id="user-permission">
                <h3 class="card-title">Permission Management</h3>
                <form class="" action="{{route('home.user.permission')}}" method="post">
                  {{ csrf_field() }}

                  <table class="table table-responsive  table-striped table-hover table-bordered">
                    <tr>
                      <th>No</th>
                      <th>Functionality</th>
                      <td text-align="center">Permission</td>
                    </tr>
                    <tr>
                      <th>1</th>
                      <th>Edit Profile</th>
                      <td>
                        @if ($user_permission->edit_profile == 1)
                          <label class="switch">
                            <input type="checkbox" name="edit_profile" checked>
                            <span class="slider"></span>
                          </label>
                        @else
                          <label class="switch">
                            <input type="checkbox" name="edit_profile">
                            <span class="slider"></span>
                          </label>
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <th>2</th>
                      <th>Create Blog</th>
                      <td>
                        @if ($user_permission->create_blog == 1)
                          <label class="switch">
                            <input type="checkbox" name="create_blog" checked>
                            <span class="slider"></span>
                          </label>
                        @else
                          <label class="switch">
                            <input type="checkbox" name="create_blog">
                            <span class="slider"></span>
                          </label>
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <th>3</th>
                      <th>Edit Blog</th>
                      <td>
                        @if ($user_permission->edit_blog == 1)
                          <label class="switch">
                            <input type="checkbox" name="edit_blog" checked>
                            <span class="slider"></span>
                          </label>
                        @else
                          <label class="switch">
                            <input type="checkbox" name="edit_blog">
                            <span class="slider"></span>
                          </label>
                        @endif
                      </td>
                    </tr>
                  </table>
                  <div class="form-group">
                    <button type="submit" name="button" class="btn btn-success">Save Changes</button>
                  </div>
                </form>
              </div> <!-- end dunno tab pane -->

            </div>
          </div>

        </div>
      </div>

    </div><!-- end container -->
  </div><!-- end content body -->

  {{-- <script type="text/javascript">
    $(document).ready( function () {
      // $('#userMgtTable').DataTable();
      console.log('keluar la celaka');
    } );
  </script> --}}
@endsection
