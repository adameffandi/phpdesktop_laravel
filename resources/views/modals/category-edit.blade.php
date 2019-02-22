<div id="category-edit-{{$category->id}}" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form class="" action="{{route('home.category.edit', $category->id)}}" method="post">
        {{csrf_field()}}
        <div class="modal-body">
          {{-- <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Uvuvwevwevwe Onyetenyevwe Ugwemubwem Ossas">
          </div> --}}
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
