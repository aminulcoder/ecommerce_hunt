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
                            <li class="breadcrumb-item active">Website Setting</li>
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
                    <div class="col-8 offset-2">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title"> Website Setting</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('website.setting.update', $setting->id) }}"  method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="currency">Currency</label>
                                        <select name="currency" class="form-control" id="currency">
                                            <option value="$" {{($setting->currency== '$') ? 'selected': ''}}>USD ($)</option>
                                            <option value="৳" {{($setting->currency== '৳') ? 'selected': ''}}>taka (৳)</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_author">Phone_one</label>
                                        <input type="text" class="form-control" name="phone_one"
                                            value="{{ $setting->phone_one }}" id="meta_author" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="Phone_two">Phone_two</label>
                                        <input type="text" class="form-control" name="phone_two"
                                            value="{{ $setting->phone_two }}" id="Phone_two" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="main_email">Main Email</label>
                                        <input type="text" class="form-control" name="main_email"
                                            value="{{ $setting->main_email }}" id="main_email">
                                    </div>
                                    <div class="form-group">
                                        <label for="support_email">Support Email</label>
                                        <input type="text" class="form-control" name="support_email"
                                            value="{{ $setting->support_email }}" id="support_email">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" name="address"
                                            value="{{ $setting->address }}" id="address">
                                    </div>

                                    <strong class="text-center text-success">---social link----</strong><br>

                                    <div class="form-group">
                                        <label for="facebook">facebook</label>
                                        <input type="text" class="form-control" name="facebook"
                                            value="{{ $setting->facebook }}" id="facebook" placeholder="Facebok">
                                    </div>
                                    <div class="form-group">
                                        <label for="twitter">Twitter</label>
                                        <input type="text" class="form-control" name="twitter"
                                            value="{{ $setting->twitter }}" id="twitter" placeholder="Twitter">
                                    </div>
                                    <div class="form-group">
                                        <label for="instagram">Instagram</label>
                                        <input type="text" class="form-control" name="instagram"
                                            value="{{ $setting->instagram }}" id="instagram" placeholder="Instagram">
                                    </div>
                                    <div class="form-group">
                                        <label for="linkedin">Linkedin</label>
                                        <input type="text" class="form-control" name="linkedin"
                                            value="{{ $setting->linkedin }}" id="linkedin" placeholder="Linkedin">
                                    </div>
                                    <div class="form-group">
                                        <label for="youtube">Youtube</label>
                                        <input type="text" class="form-control" name="youtube"
                                            value="{{ $setting->youtube }}" id="youtube" placeholder="Youtube">
                                    </div>

                                    <strong class="text-center text-success">---Logo & favicon----</strong><br>

                                    <div class="form-group">
                                        <label for="logo">Logo</label>
                                        <input type="file" class="form-control" name="logo"
                                            value="{{ $setting->logo }}" id="logo"
                                            placeholder="Logo setting">
                                            <input type="hidden" name="old_logo" value="{{$setting->logo}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="favicon">Favicon</label>
                                        <input type="file" class="form-control" name="favicon"
                                            value="{{ $setting->favicon }}" id="favicon"
                                            placeholder="favicon setting">
                                        <input type="hidden" name="old_favicon" value="{{$setting->favicon}}">
                                    </div>



                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Update</button>
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
