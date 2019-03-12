<div id="user-edit-{{$user->id}}" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form class="" action="{{route('home.user.edit', $user->id)}}" method="post">
        {{csrf_field()}}
        <div class="modal-body">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" value="{{$user->name}}">
          </div>
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" name="email" value="{{$user->email}}">
          </div>
          <div class="form-group">
            <label for="role">Role</label>
            <select class="form-control" name="role">
              <optgroup label="Current">
                <option value="{{$user->role_id}}">{{$user->role->name}}</option>
              </optgroup>
              <optgroup label="Options">
                @foreach ($roles as $role)
                  <option value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
              </optgroup>
            </select>
          </div>
          <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" name="status">
              <optgroup label="Current">
                <option value="{{$user->status_id}}">{{$user->status->status_name}}</option>
              </optgroup>
              <optgroup label="Options">
                @foreach ($statuses as $status)
                  @if ($status->id == 1 || $status->id == 2)
                    <option value="{{$status->id}}">{{$status->status_name}}</option>
                  @endif
                @endforeach
              </optgroup>
            </select>
          </div>
        </div> <!-- end modal body -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
