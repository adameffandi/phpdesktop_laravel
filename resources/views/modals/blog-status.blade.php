<div id="blog-status-{{$blog->id}}" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Blog Status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form class="" action="{{route('home.blog.status', $blog->id)}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="modal-body">
          <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" name="status" required>
              <optgroup label="Current">
                <option value="{{$blog->status->id}}">{{$blog->status->status_name}}</option>
              </optgroup>
              <optgroup label="Options">
                @foreach ($statuses as $status)
                  <option value="{{$status->id}}">{{$status->status_name}}</option>
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
