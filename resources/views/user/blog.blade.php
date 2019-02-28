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
        <div class="col-lg-12 col-md-12 col-sm-12">
          <h2>My Blogs</h2>
          <div class="float-right">
            <a href="#" class="dashboard-btn" data-toggle="modal" data-target="#blog-user-create"> <i class="fa fa-plus"></i> Add Blog</a>
            @include('modals.blog-user-create')
          </div>
        </div>
      </div><!-- end row -->

      <br>

      <div class="card">
        <ul class="nav nav-tabs card-header-tabs" role="tablist" id="userBlogTabMenu">
          <li class="nav-item active" role="presentation">
            <a href="#user-blog" aria-controls="user-blog" role="tab" data-toggle="tab">Blogs</a>
          </li>
          <li class="nav-item" role="presentation">
            <a href="#user-blog-table" aria-controls="user-blog-table" role="tab" data-toggle="tab">Blogs (Table view)</a>
          </li>
        </ul>

        <div class="tab-content">
          <div role="tab-panel" class="tab-pane active" id="user-blog">
            test 1
          </div><!-- end tab panel -->
          <div role="tab-panel" class="tab-pane" id="user-blog-table">
            <table class="table table-responsive" id="blogMgtTable">
              <thead>
                <th>No.</th>
                <th>Title</th>
                <th>Content</th>
                <th>Category</th>
                <th>Content Status</th>
                <th>Created By</th>
                <th>Action</th>
              </thead>
              <tbody>
                @foreach ($blogs as $blog)
                <tr>
                  <td align="center"></td>
                  <td align="center">{{$blog->title}}</td>
                  <td align="center">{{substr($blog->content, 0, 50) . "..."}}</td>
                  <td align="center">{{$blog->category->category_name}}</td>
                  <td align="center">{{$blog->content_status->status}}</td>
                  <td align="center">{{$blog->user->name}}</td>
                  <td align="center" style="width: 150px;">
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <button type="button" class="btn btn-info btn-action" data-toggle="modal" data-target="#blog-view-{{$blog->id}}"><i class="fas fa-eye"></i></button>
                      <button type="button" class="btn btn-primary btn-action" data-toggle="modal" data-target="#blog-user-edit-{{$blog->id}}"><i class="fas fa-pencil-alt"></i></button>
                      <button type="button" class="btn btn-danger btn-action" data-toggle="modal" data-target="#blog-user-delete-{{$blog->id}}"><i class="fas fa-times"></i></button>
                    </div>

                    @include('modals.blog-view')
                    @include('modals.blog-user-edit')
                    @include('modals.blog-user-delete')
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div><!-- end tab panel -->
        </div><!-- end tab content -->

      </div><!-- end card -->


    </div><!-- end container -->
  </div><!-- end content body -->
@endsection
