<div id="blog-view-{{$blog->id}}" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">{{$blog->title}}</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <div class="blog-info">
          <div class="float-left">
            @if ($blog->content_status_id == 1)
              <h4 class="status-text-blue">{{$blog->content_status->status}}</h4>
            @elseif ($blog->content_status_id == 2)
              <h4 class="status-text-red">{{$blog->content_status->status}}</h4>
            @else
              <h4 class="status-text-orange">{{$blog->content_status->status}}</h4>
            @endif
          </div>
          <div class="float-right">
            <h4 class="category-text">//// {{$blog->category->category_name}}</h4>
          </div>
        </div>
        <div class="blog-image">
          <img class="img-responsive" src="{{ asset('/img/image-placeholder.png') }}" alt="">
        </div>
        <br>
        <div class="blog-content">
          <p>
            {{$blog->content}}
          </p>
        </div>
        <br>
        <div class="blog-details">
          <div class="row">
            <div class="col-sm-4">
              <p class="grey-text"> <i>Author: {{$blog->user->name}}</i> </p>
            </div>
            <div class="col-sm-4">
              <p class="grey-text"> <i>Date: {{date_format($blog->created_at, 'd F y')}}</i> </p>
            </div>
            <div class="col-sm-4">
              <p class="grey-text"> <i>Tag: {{$blog->homepagetag->homepage_tag_name}}</i> </p>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        {{-- <button type="submit" class="btn btn-success">Save changes</button> --}}
      </div>

    </div>
  </div>
</div>
