@extends('admin.layouts.master')

@section('title')
    <title>Trang Sản Phẩm</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('source/admin2/product/style.css') }}">
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('admin.partials.content-header', ['name' => 'Product', 'key' => 'List'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
        <div class="container-fluid">
            <form class="form-inline" action="/admin/product/search-product" method="GET">
              <div class="input-group">
                <input class="form-control form-control-sidebar" name="key" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button type="submit" class="btn" style="background-color: #CF111A; color: white;">
                    <i class="fas fa-search fa-fw"></i>
                  </button>
                </div>
              </div>
            </form>
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('product.create') }}" class="btn btn-success float-right m-2">Add</a>
                </div>
                <div class="col-md-12">
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Hình ảnh</th>
                            <th>Danh mục</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($products as $productItem)
                            <tr>
                              <th scope="row">{{ $productItem->id }}</th>
                              <td>{{ $productItem->name }}</td>
                              <td>{{ number_format($productItem->price) }}</td>
                              <td>
                                  <img src="{{ $productItem->feature_image_path }}" alt="" class="product_image">
                              </td>
                              <td>{{ optional($productItem->category)->name }}</td>
                              <td>
                                <a href="{{ route('product.edit', ['id'=>$productItem->id]) }}" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>
                                <a href="" data-url="{{ route('product.delete', ['id'=>$productItem->id]) }}" class="btn btn-danger action_delete"><i class="fas fa-trash"></i></a>
                              </td>
                            </tr>                          
                          @endforeach
                        </tbody>
                    </table>
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
    <script src="{{ asset('source/admin2/product/list.js') }}"></script>
@endsection
