<div id="blog-user-create" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Create Blog</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form class="" action="{{route('user.blog.create')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="modal-body">
          <div class="form-group">
            <label for="blog_title">Title</label>
            <input type="text" class="form-control" name="blog_title" required>
          </div>
          <div class="form-group">
            <label for="blog_content">Content</label>
            <textarea class="form-control" name="blog_content" rows="8" cols="5" required></textarea>
          </div>
          <div class="form-group">
            <label for="media">Image</label>
            <input type="file" class="form-control" name="media" accept="image/*" required>
          </div>
          <div class="form-group">
            <label for="blog_category">Category</label>
            <select class="form-control" name="blog_category" required>
              @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->category_name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="blog_content_status">Content Status</label>
            <select class="form-control" name="blog_content_status" required>
              @foreach ($contentstatuses as $contentstatus)
                <option value="{{$contentstatus->id}}">{{$contentstatus->status}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Create Blog</button>
        </div>
      </form>
    </div>
  </div>
</div>
