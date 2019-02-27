<div id="user-create" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form class="" action="{{route('home.user.create')}}" method="post">
        {{csrf_field()}}
        <div class="modal-body">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Uvuvwevwevwe Onyetenyevwe Ugwemubwem Ossas">
          </div>
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" name="email" placeholder="user@email.com">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password">
          </div>
          <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" class="form-control" name="password_confirmation">
          </div>
          <div class="form-group">
            <label for="role">Role</label>
            <select class="form-control" name="role">
                @foreach ($roles as $role)
                  <option value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" name="status">
                @foreach ($statuses as $status)
                  <option value="{{$status->id}}">{{$status->status_name}}</option>
                @endforeach
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
