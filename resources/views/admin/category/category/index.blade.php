@extends('layouts.admin')
@section('admin_content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Category</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
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
                                <h3 class="card-title">DataTable with default features</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Category Name</th>
                                            <th>Category Slug</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($data as $key => $row)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $row->category_name }}
                                            </td>
                                            <td>{{ $row->category_slug }}</td>
                                            <td>
                                                <a href="#"class="btn btn-info btn-sm edit" data-bs-toggle="modal"
                                                    data-id="{{ $row->id }}" data-bs-target="#editCategory"><i
                                                        class="fas fa-edit"></i></a>
                                                <a
                                                    href="{{ route('category.destroy', $row->id) }}"class="btn btn-danger btn-sm"><i
                                                        class="fas fa-trash"></i></a>
                                            </td>

                                        </tr>
                                    @endforeach
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
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('category.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label"> Category Name</label>
                            <input type="text" class="form-control" name="category_name" value=""
                                id="exampleInputEmail1" aria-describedby="emailHelp">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
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
                <form action="{{route('category.update')}}" method="POST">
                    @csrf
                    {{-- @method('PUT') --}}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="category_name">Categoroy Name</label>
                            <input type="text" name="category_name" class="form-control" id="e_category_name">
                            <input type="hidden" name="id" class="form-control" id="e_category_id">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $('body').on('click','.edit', function() {
            let cat_id = $(this).data('id');
            $.get("category/edit/"+cat_id, function(data){
                // console.log(data);
                $('#e_category_name').val(data.category_name);
                $('#e_category_id').val(data.id);

            });
        });

    </script>

@endsection
