<form action="{{ route('childcategory.update') }}" method="POST" id="add-form">
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Category /Sub Category Name</label>
        <select class="form-control" name="subcategory_id" required="">
            @foreach ($category as $row)
            @php
                $subcategory = DB::table('sub_categories')->where('category_id',$row->id)->get();
            @endphp
            <option disabled="" style="color: blue;">{{$row->category_name}}</option>
            @foreach ( $subcategory as $row)
            <option value="{{ $row->id }}" @if ($row->id == $data->subcategory_id) selected

            @endif>--{{ $row->sub_category_name }}</option>
            @endforeach
            @endforeach
        </select>
    </div>
    <input type="hidden" name="id" value="{{$data->id}}">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Child Category Name</label>
        <input type="text" class="form-control" name="childcategory_name" value="{{$data->childcategory_name}}"
            id="exampleInputEmail1" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted"> This is your ChildCategory Category</small>
    </div>
    <div class="modal-footer">
        {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"></button> --}}
        <button type="submit" class="btn btn-primary"><span class="d-none">loading.... </span>Update </button>
    </div>
</form>
