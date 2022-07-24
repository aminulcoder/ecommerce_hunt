@extends('layouts.admin')

@section('admin_content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"> Admin Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                            <li class="breadcrumb-item active">page Update</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Info boxes -->
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title"> Page Update</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{route('page.update',$page->id)}}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="pageposition">Page Position</label>
                                        <select name="page_position"  class="form-control" id="pageposition">
                                            <option value="1" @if($page->page_position==1) selected @endif>Line One</option>
                                            <option value="2" {{($page->page_position==2) ? "selected" :"" }}>Line two</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="pagename">Page Name</label>
                                        <input type="text" class="form-control" name="page_name" id="pagename"
                                          value="{{$page->page_name}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="page_title">Page title </label>
                                        <input type="text" class="form-control" name="page_title" id="page_title"
                                        value="{{$page->page_title}}">


                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword3">Page Description </label>
                                        <textarea   class="form-control summernote" name="page_description" id="summernote">{!!$page->page_description!!}</textarea>
                                        <small>This data will show on your webpage</small>
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Update page</button>
                                    </div>
                            </form>
                        </div>
                    </div>


                </div>
                <!-- /.row -->

            </div>
            <!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
