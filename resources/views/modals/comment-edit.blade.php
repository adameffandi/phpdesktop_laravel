<div id="comment-edit-{{$comment->id}}" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Comment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form class="" action="{{route('home.comment.edit', $comment->id)}}" method="post">
        {{csrf_field()}}
        <div class="modal-body">
          {{-- <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Uvuvwevwevwe Onyetenyevwe Ugwemubwem Ossas">
          </div> --}}
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
