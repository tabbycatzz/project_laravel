@extends('admin.layouts.master')

@section('title')
    <title>Thêm sản phẩm</title>
@endsection

@section('css')
    <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('source/admin2/product/add.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('admin.partials.content-header', ['name' => 'Product', 'key' => 'Edit'])
        <!-- /.content-header -->

        <!-- Main content -->
        <form action="{{ route('product.update', ['id'=>$product->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Tên sản phẩm</label>
                            <input type="text" name="name" class="form-control" value="{{ $product->name }}" placeholder="Nhập tên sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="">Giá sản phẩm</label>
                            <input type="text" name="price" class="form-control" value="{{ $product->price }}" placeholder="Nhập giá sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="">Ảnh sản phẩm</label>
                            <input type="file" name="feature_image_path" class="form-control-file">
                            <div class="col-md-6 container_future_img_detail">
                                <div class="row">
                                    <img class="future_image_detail" src="{{ $product->feature_image_path }}" alt="">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="">Ảnh chi tiết sản phẩm</label>
                            <input type="file" multiple name="image_path[]" class="form-control-file">
                            <div class="col-md-12 container_img_detail">
                                <div class="row">
                                    @foreach ($product->images as $productImageItem)
                                        <div class="col-md-6">
                                            <img class="image_detail" src="{{ $productImageItem->image_path }}" alt="">
                                        </div>
                                    @endforeach    
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Danh mục sản phẩm</label>
                            <select class="form-control" name="category_id">
                                <option value="">Chọn danh mục sản phẩm</option>
                                {!! $htmlOption !!}
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Tags</label>
                            <select class="form-control tags-select-choose" name="tags[]" multiple="multiple">                        
                                @foreach ($product->tags as $tagItem)
                                    <option value="{{ $tagItem->name }}" selected>{{ $tagItem->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Nội dung sản phẩm</label>
                            <textarea id="ckeditor_noidung" name="contents" class="form-control">{{ $product->content }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            <!-- /.row -->
            </div><!-- /.container-fluid -->
            </div>
        </form>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('js')
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('source/admin2/product/add.js') }}"></script>
@endsection
