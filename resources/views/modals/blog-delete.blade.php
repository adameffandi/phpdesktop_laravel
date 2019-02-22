<div id="blog-delete-{{$blog->id}}" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete Blog</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <div class="modal-body">
          <div class="alert alert-danger" role="alert">
            You are about to delete this blog. Are you sure?
          </div>
        </div>

        <div class="modal-footer">
          <form class="" action="{{route('home.blog.delete', $blog->id)}}" method="post">
            {{csrf_field()}}
            <button type="submit" class="btn btn-danger">Yes, delete blog</button>
          </form>
        </div>

    </div>
  </div>
</div>
