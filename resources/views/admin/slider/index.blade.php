@extends('admin.layouts.master')

@section('title')
    <title>Trang Danh Mục</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('source/admin2/slider/style.css') }}">
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('admin.partials.content-header', ['name' => 'Slider', 'key' => 'List'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('slider.create') }}" class="btn btn-success float-right m-2">Add</a>
                </div>
                <div class="col-md-12">
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Tên slider</th>
                            <th>Hình ảnh</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($sliders as $slider)
                            <tr>
                              <th scope="row">{{ $slider->id }}</th>
                              <td>{{ $slider->name }}</td>
                              <td>
                                <img class="image_slider" src="{{ $slider->image_path }}" alt="">
                              </td>
                              <td>
                                <a href="{{ route('slider.edit', ['id' => $slider->id]) }}" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>
                                <a href="" data-url="{{ route('slider.delete', ['id' => $slider->id]) }}" class="btn btn-danger action_delete"><i class="fas fa-trash"></i></a>
                              </td>
                            </tr>                          
                          @endforeach
                        </tbody>
                    </table>
                    <div class="col-md-12">
                      {{ $sliders->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('source/admin2/slider/index.js') }}"></script>
@endsection