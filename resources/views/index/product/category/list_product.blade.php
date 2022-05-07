<!DOCTYPE html>
<html lang="vi">

<head>
    @include('index.layouts.head')
    <link rel="stylesheet" href="/source/page/css/sach-moi-tuyen-chon.css">
</head>

<body>
    <!-- code cho nut like share facebook  -->
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0"></script>

    <!-- header -->
    @include('index.layouts.header')

    <!-- thanh "danh muc sach" đã được ẩn bên trong + hotline + ho tro truc tuyen -->
    @include('index.layouts.list_product')

    <!-- breadcrumb  -->
    <section class="breadcrumbbar">
        <div class="container">
            <ol class="breadcrumb mb-0 p-0 bg-transparent">
                <li class="breadcrumb-item"><a href="/index">Trang chủ</a></li>
                <li class="breadcrumb-item active"><a href="#">Danh mục sản phẩm</a></li>
            </ol>
        </div>
    </section>

    <!-- ảnh banner -->
    <!-- <section class="banner">
        <div class="container">
            <a href="sach-moi-tuyen-chon.html"><img src="/source/page/images/sach-moi-full-banner.jpg" alt="sach-moi-full-banner"
                    class="img-fluid"></a>
        </div>
    </section> -->

    <!-- các sản phẩm  -->
    <section class="content my-4">
        <div class="container">
            <div class="noidung bg-white" style=" width: 100%;">
                <div class="items">
                    <div class="row">
                        @foreach($products as $product)
                        <div class="col-lg-3 col-md-4 col-xs-6">
                            <!-- 1 sản phẩm  -->
                            <div class="card">
                                <a href="{{ route('product.detail', $product->id) }}" class="motsanpham"
                                    style="text-decoration: none; color: black;" data-toggle="tooltip"
                                    data-placement="bottom" title="">
                                    <img class="card-img-top anh" src="{{ $product->feature_image_path }}" alt="lap-ke-hoach-kinh-doanh-hieu-qua">
                                    <div class="card-body noidungsp mt-3">
                                        <h6 class="card-title ten">{{ $product->name }}</h6>
                                        <small class="tacgia text-muted">{{ $product->category->name }}</small>
                                        <div class="gia d-flex align-items-baseline">
                                            <div class="giamoi">{{ number_format($product->price) }} ₫</div>
                                            <div class="giacu text-muted">{{ number_format($product->price*2) }} ₫</div>
                                            <div class="sale">-20%</div>
                                        </div>
                                        <div class="danhgia">
                                            <ul class="d-flex" style="list-style: none;">
                                                <li class="active"><i class="fa fa-star"></i></li>
                                                <li class="active"><i class="fa fa-star"></i></li>
                                                <li class="active"><i class="fa fa-star"></i></li>
                                                <li class="active"><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <span class="text-muted">0 nhận xét</span>
                                            </ul>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                
                <!-- pagination bar  -->
                <div class="pagination-bar my-3">
                    <div class="row">
                        <div class="col-12">
                            <nav>
                                <ul class="pagination justify-content-center">
                                    {{ $products->links('pagination::bootstrap-4') }}
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>

                <!--het khoi san pham-->
            </div>
            <!--het div noidung-->
        </div>
        <!--het container-->
    </section>


    <!-- thanh cac dich vu :mien phi giao hang, qua tang mien phi ........ -->
    @include('index.layouts.footer')


</body>

</html>