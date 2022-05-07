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
    @include('admin.partials.content-header', ['name' => 'Order', 'key' => 'Detail'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="customer mt-3">
            <div class="col-md-12">
                <a href="{{ route('customers.index') }}" class="btn btn-info float-right m-2">Trở Lại</a>
            </div>
            <ul>
                <h4 scope="row"><strong>ĐƠN HÀNG: #{{ $customer->id }}, đặt lúc - {{ $customer->created_at }}</strong></h4>
                <li>Tên khách hàng: <strong>{{ $customer->name }}</strong></li>
                <li>SĐT: <strong>{{ $customer->phone }}</strong></li>
                <li>Email: <strong>{{ $customer->email }}</strong></li>
                <li>Địa chỉ: <strong>{{ $customer->address }}</strong></li>
                <li>Khu vực: <strong>{{ $customer->district }}</strong></li>
                <li>Tỉnh (TP): <strong>{{ $customer->city }}</strong></li>
                <li>Ghi chú: <strong>{{ $customer->note }}</strong></li>
            </ul>
        </div>
        <div class="carts">
            <table class="table table-hover">
                @php 
                    $total = 0; 
                @endphp
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Sản phẩm</th>
                        <th>Hình ảnh sản phẩm</th>
                        <th>Giá tiền</th>
                        <th>Số lượng</th>
                        <th>Tổng tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carts as $cart)
                        @php
                            $price = $cart->price * $cart->quantily;
                            $total += $price;
                        @endphp
                    <tr>
                        <th scope="row">{{ $cart->id }}</th>
                        <td>{{ $cart->product->name }}</td>
                        <td>
                            <img src="{{ $cart->product->feature_image_path }}" class="product_image" alt="anhsp1" style="width:120px">
                        </td>
                        <td>{{ number_format($cart->price) }} đ</td>
                        <td>{{ $cart->quantily }}</td>
                        <td>{{ number_format($price) }} đ</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="5" class="text-right"><strong>Tổng Thanh Toán: </strong></td>
                        <td><strong>{{ number_format($total) }} đ</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('source/admin2/product/list.js') }}"></script>
@endsection