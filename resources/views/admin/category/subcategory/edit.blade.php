<form action="{{ route('subcategory.update') }}" method="POST">
    @csrf
    <div class="modal-body">
        <div class="form-group">
            <label for="category_name">Category Name</label>
            <select class="form-control" name="category_id" required="">
                @foreach ($category as $row)
                    <option value="">Category Name</option>
                    <option value="{{ $row->id }}" @if ($row->id == $data->category_id) selected @endif>{{ $row->category_name }}</option>
                @endforeach
                <input type="hidden" name="id" value="{{$data->id}}">
            </select>
        </div>

        <div class="form-group">
            <label for="category_name">Sub_Categoroy Name</label>
            <input type="text" class="form-control" name="sub_category_name" value="{{$data->sub_category_name}}">
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>
