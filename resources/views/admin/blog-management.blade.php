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

          <div class="card">
            <ul class="nav nav-tabs card-header-tabs" role="tablist" id="blogMgtDashboardTabMenu">
              <li class="nav-item active" role="presentation">
                <a href="#blog-management" aria-controls="blog-management" role="tab" data-toggle="tab">Blog</a>
              </li>
              <li class="nav-item" role="presentation">
                <a href="#category-management" aria-controls="category-management" role="tab" data-toggle="tab">Category</a>
              </li>
              <li class="nav-item" role="presentation">
                <a href="#comment-management" aria-controls="comment-management" role="tab" data-toggle="tab">Comment</a>
              </li>
            </ul>
            <div class="tab-content">

              <div role="tab-panel" class="tab-pane active" id="blog-management">
                <h3 class="card-title">Manage Blogs</h3>
                <button type="button" class="dashboard-btn" data-toggle="modal" data-target="#blog-create">
                  Create Blog
                </button>
                @include('modals.blog-create')

                <table class="table table-responsive" id="blogMgtTable">
                  <thead>
                    <th>No.</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Category</th>
                    <th>Homepage Tag</th>
                    <th>Content Status</th>
                    <th>Created By</th>
                    <th>Action</th>
                  </thead>
                  <tbody>
                    @foreach ($blogs as $blog)
                    <tr>
                      <td></td>
                      <td>{{$blog->title}}</td>
                      <td>{{substr($blog->content, 0, 50) . "..."}}</td>
                      <td>{{$blog->category->category_name}}</td>
                      <td>{{$blog->homepagetag->homepage_tag_name}}</td>
                      <td>{{$blog->content_status->status}}</td>
                      <td>{{$blog->user->name}}</td>
                      <td style="width: 150px;">
                        <div class="btn-group" role="group" aria-label="Basic example">
                          <button type="button" class="btn btn-info btn-action" data-toggle="modal" data-target="#blog-view-{{$blog->id}}"><i class="fas fa-eye"></i></button>
                          <button type="button" class="btn btn-primary btn-action" data-toggle="modal" data-target="#blog-edit-{{$blog->id}}"><i class="fas fa-pencil-alt"></i></button>
                          <button type="button" class="btn btn-danger btn-action" data-toggle="modal" data-target="#blog-delete-{{$blog->id}}"><i class="fas fa-times"></i></button>
                        </div>

                        @include('modals.blog-view')
                        @include('modals.blog-edit')
                        @include('modals.blog-delete')
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div> <!-- end blog-management tab pane -->

              <div role="tab-panel" class="tab-pane" id="category-management">
                <h3 class="card-title">Manage Categories</h3>
                <button type="button" class="btn btn-primary btn-action" data-toggle="modal" data-target="#category-create">
                  Add Category
                </button>
                @include('modals.category-create')

                <table class="table table-responsive" id="categoryMgtTable">
                  <thead>
                    <th>No.</th>
                    <th>Category</th>
                    <th>Action</th>
                  </thead>
                  <tbody>
                    @foreach ($categories as $category)
                    <tr>
                      <td></td>
                      <td>{{$category->category_name}}</td>
                      <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                          <button type="button" class="btn btn-primary btn-action" data-toggle="modal" data-target="#category-edit-{{$category->id}}"><i class="fas fa-pencil-alt"></i></button>
                          @if ($category->id != 1 && $category->id != 2)
                            <button type="button" class="btn btn-danger btn-action" data-toggle="modal" data-target="#category-delete-{{$category->id}}"><i class="fas fa-times"></i></button>
                          @else
                            <button type="button" class="btn btn-danger btn-action" data-toggle="modal" data-target="#category-delete-{{$category->id}}" disabled><i class="fas fa-times"></i></button>
                          @endif
                        </div>

                        @include('modals.category-edit')
                        @include('modals.category-delete')
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div> <!-- end category-management tab pane -->

              <div role="tab-panel" class="tab-pane" id="comment-management">
                <h3 class="card-title">Manage Comments</h3>

                <table class="table table-responsive">
                  <thead>
                    <th>No.</th>
                    <th>Title</th>
                    <th>Comment</th>
                    <th>Blog Commented</th>
                    <th>From User</th>
                    <th>Action</th>
                  </thead>
                  <tbody>
                    @foreach ($comments as $comment)
                    <tr>
                      <td></td>
                      <td>{{$comment->comment_title}}</td>
                      <td>{{$comment->comment_content}}</td>
                      <td>{{$comment->blog->title}}</td>
                      <td>{{$comment->user->name}}</td>
                      <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                          <button type="button" class="btn btn-primary btn-action" data-toggle="modal" data-target="#comment-edit-{{$comment->id}}"><i class="fas fa-pencil-alt"></i></button>
                          <button type="button" class="btn btn-danger btn-action" data-toggle="modal" data-target="#comment-delete-{{$comment->id}}"><i class="fas fa-times"></i></button>
                        </div>

                        @include('modals.comment-edit')
                        @include('modals.comment-delete')
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div> <!-- end category-management tab pane -->

            </div>
          </div>

        </div>
      </div>

    </div><!-- end container -->
  </div><!-- end content body -->
@endsection
