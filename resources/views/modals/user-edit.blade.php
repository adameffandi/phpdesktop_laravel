<div id="user-edit-{{$user->id}}" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form class="" action="{{route('user.edit', $user->id)}}" method="post">
        {{csrf_field()}}
        <div class="modal-body">
          <div class="form-group">
            <label for="user_name">Name</label>
            <input type="text" class="form-control" name="user_name" id="user_name" value="{{$user->name}}">
          </div>
          <div class="form-group">
            <label for="user_email">Email address</label>
            <input type="email" class="form-control" name="user_email" id="user_email" value="{{$user->email}}">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
