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
          <button type="button" class="dashboard-btn" data-toggle="modal" data-target="blog-user-create">
            Create Blog
          </button>
          @include('modals.blog-user-create')
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
            <div class="row all-blog-section">
              @foreach ($blogs as $blog)
                <div class="col-lg-4 col-md-6 col-sm-12 all-blog-one-row">
                  <div class="all-blog-item">
                    <a href="{{route('view.blog', $blog->id)}}" class="all-blog-link" target="_blank">
                        <img src="{{asset($blog->media->media_location)}}" alt="" class="all-blog-img">
                        <div class="all-blog-summary">
                          <h4 class="all-blog-title">{{$blog->title}}</h4>
                          <p>{{substr($blog->content, 0, 150) . "..."}}</p>
                          <p class="grey-text"> <i class="fa fa-calendar"></i> <i>{{date_format($blog->created_at, 'F j, Y')}}, 8 comments</i> </p>
                        </div> <!--end col, all-blog-summary -->
                    </a>
                  </div> <!-- end all-blog-item -->
                </div>
              @endforeach
            </div>
          </div><!-- end tab panel -->

          <div role="tab-panel" class="tab-pane" id="user-blog-table">
            <table class="table table-responsive" id="blogMgtTable">
              <thead>
                <th>No.</th>
                <th>Title</th>
                <th>Content</th>
                <th>Category</th>
                <th>Content Status</th>
                <th>Status</th>
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
                  <td align="center">{{$blog->status->status_name}}</td>
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
