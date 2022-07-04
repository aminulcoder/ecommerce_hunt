@extends('layouts.admin')
@section('admin_content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Child Category</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#addModal">
                                +Add New
                            </button>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All Child Categories list here</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="" class="table table-bordered  table-sm ytable">
                                    <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Child Category Name</th>
                                            <th>Category Name</th>
                                            <th>Sub Category Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
    </div>
    {{-- data insert modal --}}

    <!-- Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('childcategory.store') }}" method="POST" id="add-form">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category /Sub Category Name</label>
                            <select class="form-control" name="subcategory_id" required="">
                                @foreach ($category as $row)
                                @php
                                    $subcategory = DB::table('sub_categories')->where('category_id',$row->id)->get();
                                @endphp
                                <option>{{$row->category_name}}</option>
                                @foreach ( $subcategory as $row)
                                <option value="{{ $row->id }}">--{{ $row->sub_category_name }}</option>
                                @endforeach
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Child Category Name</label>
                            <input type="text" class="form-control" name="childcategory_name" value=""
                                id="exampleInputEmail1" aria-describedby="emailHelp">
                                <small id="emailHelp" class="form-text text-muted"> This is your ChildCategory Category</small>
                        </div>
                        <div class="modal-footer">
                            {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"></button> --}}
                            <button type="submit" class="btn btn-primary"><span class="d-none">loading.... </span>Submit </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    {{-- Edit modal --}}

    <!-- Modal -->
    <div class="modal fade" id="editCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="modal_body">

                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
       $( function childcategory(){
        var table = $('.ytable').DataTable({
            processing:true,
            ServerSide:true,
            ajax:"{{route('childcategory.index')}}",
            columns:[
                {data:'DT_RowIndex' ,name: 'DT_RowIndex'},
                {data:'childcategory_name' ,name: 'childcategory_name'},
                {data:'category_name' ,name: 'category_name'},
                {data:'sub_category_name' ,name: 'sub_category_name'},
                {data:'action' ,name: 'action',orderable:true,searchable:true},

            ]
        });
       });


       $('body').on('click', '.edit', function() {
            let id = $(this).data('id');
            $.get("childcategory/edit/" + id, function(data) {
                // console.log(data);
                $('#modal_body').html(data);

            });
        });
    </script>
@endsection
