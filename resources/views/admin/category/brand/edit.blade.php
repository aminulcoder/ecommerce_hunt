<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css"  />
<form action="{{ route('brand.update') }}" method="Post" enctype="multipart/form-data" id="add-form">
    @csrf
    <div class="modal-body">

        <div class="form-group">
          <label for="brand_name">Brand Name</label>
          <input id="brand_name" type="text" class="form-control"  name="brand_name" value="{{$data->brand_name}}" required="">
          <small  class="form-text text-muted">This is your brand Name</small>
        </div>

        <input type="hidden" name="id" value="{{$data->id}}">
        <div class="form-group">
          <label for="brand_logo">Brand Logo</label>
          <input id="brand_logo" type="file" class="form-control dropify" data-hight="140" name="brand_logo" >
          <input type="hidden" name="old_logo" value="{{$data->brand_logo}}">
          <small  class="form-text text-muted ">This is your brand logo</small>
        </div>
    </div>
    <div class="modal-footer">
      <button type="Submit" class="btn btn-primary"> <span class="d-none"> loading..... </span>  Update</button>
    </div>
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <SCript>
        $('.dropify').dropify({
        messages: {
            'default': 'Drag and  click',
            'replace': 'Drag and drop or click to replace',
            'remove':  'Remove',
            'error':   'Ooops, something wrong happended.'
        }
    });


