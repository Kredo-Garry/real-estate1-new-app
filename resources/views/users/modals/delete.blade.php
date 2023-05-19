<div class="modal fade" id="delete-property-{{$p_property->id}}">
    <div class="modal-dialog">
        <div class="modal-content border-danger">
            <div class="modal-header border-danger">
                <h3 class="h5 modal-title text-danger">
                    <i class="fa-solid fa-triangle-exclamation text-danger"></i> Delete Property
                </h3>
            </div>
            <div class="modal-body">
                <p>Confirm you want to delete this property details</p>
                <div class="mt-3">
                    <img src="{{asset('storage/images/' . $p_property->image)}}" alt="{{$p_property->image}}" class="img-lg w-100">
                    <p class="mt-1 text-muted">{{$p_property->description}}</p>
                </div>
            </div>
            <div class="modal-footer border-0">
                <form action="{{ route('property.destroy', $p_property->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>