@extends('admin.layouts.master')

@section('title')
    <title>Trang Chủ</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('source/admin2/slider/style.css') }}">
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('admin.partials.content-header', ['name' => 'Slider', 'key' => 'Edit'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('slider.update', ['id' => $slider->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="">Tên slider</label>
                          <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nhập tên slider" value="{{ $slider->name }}">
                          @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Hình ảnh</label>
                            <input type="file" name="image_path" class="form-control-file @error('image_path') is-invalid @enderror">
                            @error('image_path')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="col-md-4">
                                <div class="row">
                                    <img class="image_slider_edit" src="{{ $slider->image_path }}" alt="">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
