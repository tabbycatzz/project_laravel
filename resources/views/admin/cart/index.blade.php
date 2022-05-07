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
        @include('admin.partials.content-header', ['name' => 'Order', 'key' => 'List'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Tên khách hàng</th>
                            <th>SĐT</th>
                            <th>Email</th>
                            <th>Địa chỉ</th>
                            <th>Khu vực</th>
                            <th>Tỉnh (TP)</th>
                            <th>Ghi chú</th>
                            <th>Ngày đặt hàng</th>
                            <th>Trạng thái</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($customers as $customer)
                            <tr>
                              <th scope="row">{{ $customer->id }}</th>
                              <td>{{ $customer->name }}</td>
                              <td>{{ $customer->phone }}</td>
                              <td>{{ $customer->email }}</td>
                              <td>{{ $customer->address }}</td>
                              <td>{{ $customer->district }}</td>
                              <td>{{ $customer->city }}</td>
                              <td>{{ $customer->note }}</td>
                              <td>{{ $customer->created_at }}</td>
                              <td>
                                @if ($customer->status == 1)
                                  <a href="#" class="badge badge-success">Đã xử lý</a>
                                @else
                                  <a href="{{ route('customers.active', $customer->id) }}" class="badge badge-secondary">Chờ xử lý</a>
                                @endif
                              </td>
                              <td>
                                <a href="/admin/customers/view/{{ $customer->id }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                <a href="" data-url="{{ route('customers.delete', ['id' => $customer->id]) }}" class="btn btn-danger action_delete"><i class="fas fa-trash"></i></a>
                              </td>
                            </tr>                          
                          @endforeach
                        </tbody>
                    </table>
                    <div class="col-md-12">
                        {{ $customers->links('pagination::bootstrap-4') }}
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
    <script src="{{ asset('source/admin2/product/list.js') }}"></script>
@endsection
