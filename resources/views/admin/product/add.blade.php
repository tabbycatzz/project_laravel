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
        @include('admin.partials.content-header', ['name' => 'Product', 'key' => 'Add'])
        <!-- /.content-header -->
        <div class="col-md-12">
            {{-- @if ($errors->any())
                <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                </div>
            @endif --}}
        </div>
        <!-- Main content -->
        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Tên sản phẩm</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value ="{{ old('name') }}" placeholder="Nhập tên sản phẩm">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Giá sản phẩm</label>
                            <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value ="{{ old('price') }}" placeholder="Nhập giá sản phẩm">
                            @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror                      
                        </div>
                        <div class="form-group">
                            <label for="">Ảnh sản phẩm</label>
                            <input type="file" name="feature_image_path" class="form-control-file">
                        </div>
                        
                        <div class="form-group">
                            <label for="">Ảnh chi tiết sản phẩm</label>
                            <input type="file" multiple name="image_path[]" class="form-control-file">
                        </div>
                        <div class="form-group">
                            <label for="">Danh mục sản phẩm</label>
                            <select class="form-control @error('category_id') @enderror" name="category_id">
                                <option value="">Chọn danh mục sản phẩm</option>
                                {!! $htmlOption !!}
                            </select>
                            @error('category_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Tags</label>
                            <select class="form-control tags-select-choose" name="tags[]" multiple="multiple">                        
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Nội dung sản phẩm</label>
                            <textarea id="ckeditor_noidung" name="contents" class="form-control @error('contents') is-invalid @enderror">
                                {{ old('contents') }}
                            </textarea>
                        </div>
                        @error('contents')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
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
