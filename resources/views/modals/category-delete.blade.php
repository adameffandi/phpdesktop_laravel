<div id="category-delete-{{$category->id}}" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <div class="alert alert-danger" role="alert">
          You are about to delete this category. Are you sure?
        </div>
      </div>
      <div class="modal-footer">
        <form class="" action="{{route('home.category.delete', $category->id)}}" method="post">
          {{csrf_field()}}
          <button type="submit" class="btn btn-danger">Yes, delete category</button>
        </form>
      </div>

    </div>
  </div>
</div>
