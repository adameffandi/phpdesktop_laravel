<div id="blog-edit-{{$blog->id}}" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Blog</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form class="" action="{{route('home.blog.edit', $blog->id)}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="modal-body">
          <div class="form-group">
            <label for="blog_title">Title</label>
            <input type="text" class="form-control" name="blog_title" value="{{$blog->title}}" required>
          </div>
          <div class="form-group">
            <label for="blog_content">Content</label>
            <textarea class="form-control" name="blog_content" rows="8" cols="5" required>{{$blog->content}}</textarea>
          </div>
          <div class="form-group">
            <label for="media">Image</label>
            <input type="file" class="form-control" name="media" accept="image/*">
          </div>
          <div class="form-group">
            <label for="blog_category">Category</label>
            <select class="form-control" name="blog_category" required>
              <optgroup label="Current">
                <option value="{{$blog->category->id}}">{{$blog->category->category_name}}</option>
              </optgroup>
              <optgroup label="Options">
                @foreach ($categories as $category)
                  <option value="{{$category->id}}">{{$category->category_name}}</option>
                @endforeach
              </optgroup>
            </select>
          </div>
          <div class="form-group">
            <label for="blog_homepage_tag">Homepage Tag</label>
            <select class="form-control" name="blog_homepage_tag" required>
              <optgroup label="Current">
                <option value="{{$blog->homepagetag->id}}">{{$blog->homepagetag->homepage_tag_name}}</option>
              </optgroup>
              <optgroup label="Options">
                @foreach ($homepagetags as $homepagetag)
                  <option value="{{$homepagetag->id}}">{{$homepagetag->homepage_tag_name}}</option>
                @endforeach
              </optgroup>
            </select>
          </div>
          <div class="form-group">
            <label for="blog_content_status">Content Status</label>
            <select class="form-control" name="blog_content_status" required>
              <optgroup label="Current">
                <option value="{{$blog->content_status->id}}">{{$blog->content_status->status}}</option>
              </optgroup>
              <optgroup label="Options">
                @foreach ($contentstatuses as $contentstatus)
                  <option value="{{$contentstatus->id}}">{{$contentstatus->status}}</option>
                @endforeach
              </optgroup>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
