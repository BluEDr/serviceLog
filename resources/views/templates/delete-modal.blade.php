  <!-- Modal for deleting the Vehicles at home page-->
  @if(isset($v))
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete...</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Do you want to delete the <span id="itemBrand"></span> permanently?
          </div>
          <div class="modal-footer">
            <button id="confirmDeleteBtn" type="button" class="btn btn-danger" data-bs-dismiss="modal">Yes</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
          </div>
        </div>
      </div>
    </div>
  @endif



@if(isset($collection))
  <div class="modal fade" id="delFuelConsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete...</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Do you want to delete the entry with <span id="itemKm"></span>km permanently?
          </div>
          <div class="modal-footer">
            <button id="confirmDeleteBtn" type="button" class="btn btn-danger" data-bs-dismiss="modal">Yes</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
          </div>
        </div>
      </div>
    </div>
  
 @endif