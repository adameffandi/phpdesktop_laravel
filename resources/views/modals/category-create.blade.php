<div id="category-create" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form class="" action="{{route('home.category.create')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="modal-body">
          <div class="form-group">
            <label for="category">Category Name</label>
            <input type="text" class="form-control" name="category" placeholder="Travel, Car, etc" required>
          </div>
          <div class="form-group">
            <label for="media">Background Image (used in landing page)</label>
            <input type="file" class="form-control" name="media" accept="image/*" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Add Category</button>
        </div>
      </form>
    </div>
  </div>
</div>
