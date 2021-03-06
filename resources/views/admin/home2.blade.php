@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

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
                  <a href="#todo-list" aria-controls="todo-list" role="tab" data-toggle="tab">To Do List</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a href="#dunno-yet" aria-controls="dunno-yet" role="tab" data-toggle="tab">Dunno Yet</a>
                </li>
              </ul>
              <div class="tab-content">

                <div role="tab-panel" class="tab-pane active" id="user-management">
                  <h3 class="card-title">User Management</h3>
                  <button type="button" class="btn btn-primary btn-action" data-toggle="modal" data-target="#user-create">
                    Create User
                  </button>
                  @include('modals.user-create')

                  <table class="table table-responsive">
                    <thead>
                      <th>No.</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Action</th>
                    </thead>
                    <tbody>
                      @foreach ($users as $user)
                      <tr>
                        <td></td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                          <div class="btn-group" role="group" aria-label="Basic example">
                            {{-- <button type="button" class="btn btn-primary btn-action" data-toggle="modal" data-target="#user-view-{{$user->id}}"><i class="fas fa-eye"></i></button> --}}
                            <button type="button" class="btn btn-primary btn-action" data-toggle="modal" data-target="#user-edit-{{$user->id}}"><i class="fas fa-pencil-alt"></i></button>
                            <button type="button" class="btn btn-danger btn-action" data-toggle="modal" data-target="#user-delete-{{$user->id}}"><i class="fas fa-times"></i></button>
                          </div>

                          {{-- @include('modals.user-view') --}}
                          @include('modals.user-edit')
                          @include('modals.user-delete')
                          {{-- <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-primary btn-action" data-toggle="tooltip" data-placement="bottom" title="View"><i class="fas fa-eye"></i></button>
                            <button type="button" class="btn btn-success btn-action" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fas fa-pencil-alt"></i></button>
                            <button type="button" class="btn btn-danger btn-action" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-times"></i></button>
                          </div> --}}
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div> <!-- end user-management tab pane -->

                <div role="tab-panel" class="tab-pane" id="todo-list">
                  <h3 class="card-title">To Do List</h3>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div> <!-- end todolist tab pane -->

                <div role="tab-panel" class="tab-pane" id="dunno-yet">
                  <h3 class="card-title">Dunno Yet</h3>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div> <!-- end dunno tab pane -->

              </div>
          </div>

          <!-- <div class="panel panel-default">
              <div class="panel-heading">Dashboard</div>

              <div class="panel-body">
                  You are logged in!
              </div>
          </div> -->
        </div><!-- end col -->
    </div>
</div>
@endsection
