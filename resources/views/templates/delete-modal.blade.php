  <!-- Modal -->
  @if(isset($v))
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete...</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <!-- Modal body content goes here -->
            Do you want to delete the <span id="itemBrand"></span> permanently?
          </div>
          <div class="modal-footer">
            <button onclick="window.location='{{route('delete-vehicle',['id' => $v->id])}}';" type="button" class="btn btn-danger" data-bs-dismiss="modal">Yes</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
            <!-- Additional buttons or actions -->
          </div>
        </div>
      </div>
    </div>
  @endif
  