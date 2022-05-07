<!DOCTYPE html>
<html lang="vi">

<head>
    @include('head')
</head>

<body>
    @include('header')
    <!-- code cho nut like share facebook  -->
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0"></script>
    <!-- thanh tieu de "danh muc sach" + hotline + ho tro truc tuyen -->
    <section class="duoinavbar">
        <div class="container text-white">
            <div class="row justify">
                <div class="col-md-3">
                    <div class="categoryheader">
                        <div class="noidungheader text-white">
                            <i class="fa fa-bars"></i>
                            <span class="text-uppercase font-weight-bold ml-1">Danh mục sản phẩm</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="benphai float-right">
                        <div class="hotline">
                            <i class="fa fa-phone"></i>
                            <span>Hotline:<b>1900 1999</b> </span>
                        </div>
                        <i class="fas fa-comments-dollar"></i>
                        <a href="#">Hỗ trợ trực tuyến </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- noi dung danh muc sach(categories) + banner slider -->
    <section class="header bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-3" style="margin-right: -15px;">
                    <!-- CATEGORIES -->
                    <div class="categorycontent">
                        <ul>
                            @foreach($categories as $category)
                            <li> <a href="sach-kinh-te.html"> {{ $category->name }}</a><i class="fa fa-chevron-right float-right"></i>
                                @if($category->CategoryChild->count())
                                <ul>
                                    <li class="liheader"><a href="#" class="header text-uppercase">{{ $category->name }}</a></li>
                                    <div class="content trai">
                                        @foreach($category->CategoryChild as $categoryChild)
                                        <li>
                                            <a href=" {{ route('category.product', ['slug' => $categoryChild->slug, 'id' => $categoryChild->id]) }}">{{ $categoryChild->name }}</a>
                                        </li>
                                        @endforeach
                                    </div>
                                    <div class="content phai">
                                        <li><a href="#">Sản phẩm dưới 20 triệu</a></li>
                                        <li><a href="#">Sản phẩm từ 20-25 triệu</a></li>
                                        <li><a href="#">Sản phẩm từ 25-35 triệu</a></li>
                                        <li><a href="#">Sản phẩm trên 35 triệu</a></li>
                                    </div>
                                </ul>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- banner slider  -->
                @include('slider')
            </div>
        </div>
    </section>

    <!-- khoi sach moi  -->
    @include('feature_product')

    <!-- khoi sach combo hot  -->
    @include('recommend_product')

    <!-- khoi sach sap phathanh  -->
    @include('product_apple')

    @include('product_montior')

    @include('product_keyboard')

    @include('product_mouse')


    <!-- div _1khoi -- khoi sachnendoc -->
    <section class="_1khoi sachnendoc bg-white mt-4">
        <div class="container">
            <div class="noidung" style=" width: 100%;">
                <div class="row">
                    <!--header-->
                    <div class="col-12 d-flex justify-content-between align-items-center pb-2 bg-transparent pt-4">
                        <h2 class="header text-uppercase" style="font-weight: 400;">TIN TỨC CÔNG NGHỆ</h2>
                        <a href="#" class="btn btn-warning btn-sm text-white">Xem tất cả</a>
                    </div>
                    <!-- 1 san pham -->
                    <div class="col-lg col-sm-4">
                        <div class="card">
                            <a href="#" class="motsanpham" style="text-decoration: none; color: black;" data-toggle="tooltip" data-placement="bottom" title="Nvidia ra mắt keycap RTX On bản giới hạn, có tiền chưa chắc mua được">
                                <img class="card-img-top anh" src="/source/page/images/tin_1.jpg" alt="tung-buoc-chan-no-hoa">
                                <div class="card-body noidungsp mt-3">
                                    <h3 class="card-title ten">Nvidia ra mắt keycap RTX On bản giới hạn, có tiền chưa chắc mua được</h3>
                                    <small class="thoigian text-muted">03/04/2020</small>
                                    <div><a class="detail" href="#">Xem chi tiết</a></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg col-sm-4">
                        <div class="card">
                            <a href="#" class="motsanpham" style="text-decoration: none; color: black;" data-toggle="tooltip" data-placement="bottom" title="CEO Nvidia Jensen Huang sẽ giới thiệu sản phẩm và công nghệ AI tiên tiến tại GTC 2022">
                                <img class="card-img-top anh" src="/source/page/images/tin_2.jpg" alt="cam-on-vi-da-duoc-thuong">
                                <div class="card-body noidungsp mt-3">
                                    <h3 class="card-title ten">CEO Nvidia Jensen Huang sẽ giới thiệu sản phẩm và công nghệ AI tiên tiến tại GTC 2022</h3>
                                    <small class="thoigian text-muted">31/03/2020</small>
                                    <div><a class="detail" href="#">Xem chi tiết</a></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg col-sm-4">
                        <div class="card">
                            <a href="#" class="motsanpham" style="text-decoration: none; color: black;" data-toggle="tooltip" data-placement="bottom" title="Intel ra mắt CPU Core i9-12900KS ">
                                <img class="card-img-top anh" src="/source/page/images/tin_3.jpg" alt="vua-gia-long">
                                <div class="card-body noidungsp mt-3">
                                    <h3 class="card-title ten">Intel ra mắt CPU Core i9-12900KS </h3>
                                    <small class="thoigian text-muted">21/03/2020</small>
                                    <div><a class="detail" href="#">Xem chi tiết</a></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg col-sm-4">
                        <div class="card">
                            <a href="#" class="motsanpham" style="text-decoration: none; color: black;" data-toggle="tooltip" data-placement="bottom" title="Alienware ra mắt màn hình QD-OLED 34 inch đạt chuẩn G-Sync Ultimate, giá 1300 đô">
                                <img class="card-img-top anh" src="/source/page/images/tin_4.jpg" alt="suoi-nguon-va-cai-toi-trong-tung-ca-the">
                                <div class="card-body noidungsp mt-3">
                                    <h3 class="card-title ten">"Alienware ra mắt màn hình QD-OLED 34 inch đạt chuẩn G-Sync Ultimate, giá 1300 đô</h3>
                                    <small class="thoigian text-muted">16/03/2020</small>
                                    <div><a class="detail" href="#">Xem chi tiết</a></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg col-sm-4">
                        <div class="card cuoicung">
                            <a href="#" class="motsanpham" style="text-decoration: none; color: black;" data-toggle="tooltip" data-placement="bottom" title="Game NFT khiến nhân viên mất lòng tin vào ban lãnh đạo Ubisoft, quan hệ ngày càng căng thẳng">
                                <img class="card-img-top anh" src="/source/page/images/tin_5.jpg" alt="dai-dich-tren-con-duong-to-lua">
                                <div class="card-body noidungsp mt-3">
                                    <h3 class="card-title ten">Game NFT khiến nhân viên mất lòng tin vào ban lãnh đạo Ubisoft, quan hệ ngày càng căng thẳng</h3>
                                    <small class="thoigian text-muted">16/03/2020</small>
                                    <div><a class="detail" href="#">Xem chi tiết</a></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </section>



</body>
@include('footer')

</html>