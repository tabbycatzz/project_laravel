@extends('admin.layouts.master')

@section('title')
    <title>Trang Danh Mục</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('admin.partials.content-header', ['name' => 'Category', 'key' => 'List'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
        <div class="container-fluid">
            <form class="form-inline" action="/admin/categories/search-category" method="GET">
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
                    <a href="{{ route('categories.create') }}" class="btn btn-success float-right m-2">Add</a>
                </div>
                <div class="col-md-12">
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Tên danh mục</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($categories as $category)
                            <tr>
                              <th scope="row">{{ $category->id }}</th>
                              <td>{{ $category->name }}</td>
                              <td>
                                <a href="{{ route('categories.edit', ['id'=>$category->id]) }}" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>
                                <a href="{{ route('categories.delete', ['id'=>$category->id]) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                              </td>
                            </tr>                          
                          @endforeach
                        </tbody>
                    </table>
                    <div class="col-md-12">
                      {{ $categories->links('pagination::bootstrap-4') }}
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
