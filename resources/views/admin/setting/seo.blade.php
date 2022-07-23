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
                            <li class="breadcrumb-item active">OnPage SEO</li>
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
                                <h3 class="card-title"> your SEO Setting </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{route('seo.setting.update', $data->id)}}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="meta_title">Meta Title</label>
                                        <input type="text" class="form-control" name="meta_title" value="{{$data->meta_title}}" id="meta_title"
                                            placeholder="Meta Title">
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_author">Meta Author</label>
                                        <input type="text" class="form-control" name="meta_author" value="{{$data->meta_author}}" id="meta_author"
                                            placeholder="Meta Author">
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_tags">Meta Tags</label>
                                        <input type="text" class="form-control" name="meta_tag" value="{{$data->meta_tag}}" id="meta_tags"
                                            placeholder="Meta Tags">
                                    </div>
                                    <div class="form-group">
                                        <label for="google_verification">Meta Keyword</label>
                                        <input type="text" class="form-control" name="meta_keyword" value="{{$data->meta_keyword}}" id="meta_keyword"
                                            placeholder="Meta keyword">
                                            <small>Example:ecommerce ,onlne shop , online market</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_description">Meta Description</label>
                                        <textarea name="meta_description" id="meta_description" class="form-control" >{{$data->meta_description}}</textarea>
                                    </div>

                                    <strong class="text-center text-success">---other----</strong><br>
                                    <div class="form-group">
                                        <label for="google_verification">Google  Verification</label>
                                        <input type="text" class="form-control" name="google_verification" value="{{$data->google_verification}}" id="google_verification"
                                            placeholder="Meta keyword">
                                            <small>Put here only verification Code</small>
                                    </div>

                                    <div class="form-group">
                                        <label for="google_analytics">Google Analytics</label>
                                        <textarea name="google_analytics" id="google_analytics" class="form-control" >{{$data->google_analytics}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="google_adsense">Google Adsense</label>
                                        <textarea name="google_adsense" id="google_adsense" class="form-control" >{{$data->google_adsense}}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="alexa_verification">Alexa Verification</label>
                                        <input type="text" class="form-control" name="alexa_verification" value="{{$data->meta_keyword}}" id="alexa_verification"
                                            placeholder="Alexa Verification">
                                            <small>Example:ecommerce ,onlne shop , online market</small>
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
