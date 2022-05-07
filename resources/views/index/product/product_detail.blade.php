<!DOCTYPE html>
<html lang="li">

<head>
    @include('index.layouts.head')
    <link rel="stylesheet" href="/source/page/css/product-item.css">
</head>

<body>
    <!-- code cho nut like share facebook  -->
    <!-- <div id="fb-root"></div>
    <script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0"></script> -->
        <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v13.0" nonce="AtSURvnn"></script>

    <!-- header -->
    @include('index.layouts.header')

    <!-- thanh "danh muc sach" đã được ẩn bên trong + hotline + ho tro truc tuyen -->
    @include('index.layouts.list_product')

    <!-- breadcrumb  -->
    <section class="breadcrumbbar">
        <div class="container">
            <ol class="breadcrumb mb-0 p-0 bg-transparent">
                <li class="breadcrumb-item"><a href="/index">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="#">{{ $product->category->name }}</a></li>
                <li class="breadcrumb-item active"><a href="#">{{ $product->name }}</a></li>
            </ol>
        </div>
    </section>

    <!-- nội dung của trang  -->
    <section class="product-page mb-4">
        <div class="container">
            <!-- chi tiết 1 sản phẩm -->
            <div class="product-detail bg-white p-4">
                <div class="row">
                    <!-- ảnh  -->
                    <div class="col-md-5 khoianh">
                        <div class="anhto mb-4">
                            <a class="active" href="{{ $product->feature_image_path }}" data-fancybox="thumb-img">
                                <img class="product-image" src="{{ $product->feature_image_path }}" alt="lap-ke-hoach-kinh-doanh-hieu-qua-mt" style="width: 100%;">
                            </a>
                            <a href="{{ $product->feature_image_path }}" data-fancybox="thumb-img"></a>
                        </div>
                        <div class="list-anhchitiet d-flex mb-4" style="margin-left: 2rem;">
                            @foreach ($product->images as $productImageItem)
                                <img class="thumb-img thumb1 mr-3" src="{{ $productImageItem->image_path }}" class="img-fluid" alt="lap-ke-hoach-kinh-doanh-hieu-qua-mt">
                            @endforeach
                        </div>
                    </div>
                    <!-- thông tin sản phẩm: tên, giá bìa giá bán tiết kiệm, các khuyến mãi, nút chọn mua.... -->
                    <div class="col-md-7 khoithongtin">
                        <div class="row">
                            <div class="col-md-12 header">
                                <h4 class="ten">{{ $product->name }}</h4>
                                <div class="rate">
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star "></i>
                                </div>
                                <hr>
                            </div>
                            <div class="col-md-7">
                                <div class="gia">
                                    <div class="giabia">Giá cũ:<span class="giacu ml-2">{{ number_format($product->price*2) }} ₫</span></div>
                                    <div class="giaban">Giá bán tại OwO: <span
                                            class="giamoi font-weight-bold">{{ number_format($product->price) }} đ</span></div>
                                    <div class="tietkiem">Tiết kiệm: <b>27.800 ₫</b> <span class="sale">-20%</span>
                                    </div>
                                </div>
                                <div class="uudai my-3">
                                    <h6 class="header font-weight-bold">Khuyến mãi & Ưu đãi tại OwO:</h6>
                                    <ul>
                                        <li><b>Miễn phí giao hàng </b>cho đơn hàng từ 150.000đ ở TP.HCM và 300.000đ ở
                                            Tỉnh/Thành khác <a href="#">>> Chi tiết</a></li>
                                        <li><b>Ưu đãi đặc biệt khi mua kèm LAPTOP: </b><a href="#">>>Xem ngay</a></li>
                                        <li>Mua kèm màn hình giảm sốc lên đên 49%</li>
                                        <li>Hỗ trợ trả góp MPOS (Thẻ tín dụng), HDSAISON.</li>
                                    </ul>
                                </div>
                                <form action="/add-cart" method="POST">
                                @csrf
                                    <div class="soluong d-flex">
                                        <label class="font-weight-bold">Số lượng: </label>
                                        <div class="input-number input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text btn-spin btn-dec">-</span>
                                            </div>
                                            <input type="text" name="num_product" value="1" class="soluongsp text-center">
                                            <div class="input-group-append">
                                                <span class="input-group-text btn-spin btn-inc">+</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="nutmua btn w-100 text-uppercase">
                                        <input class="nutmua btn w-100 text-uppercase" type="hidden" name="product_id" value="{{ $product->id }}">
                                        <button class="nutmua btn w-100 text-uppercase" type="submit">Chọn mua</button>
                                    </div>
                                    <a class="huongdanmuahang text-decoration-none" href="#">(Vui lòng xem hướng dẫn mua
                                        hàng)</a>
                                    <small class="share">Share:  
                                        <div class="fb-share-button" data-href="{{ $url }}" data-layout="button_count" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ $url }}" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
                                    </small>
                                    <!-- <div class="fb-like" data-href=""
                                        data-width="300px" data-layout="button" data-action="like" data-size="small"
                                        data-share="true"></div> -->
                                </form>
                            </div>
                            <!-- thông tin khác của sản phẩm:  tác giả, ngày xuất bản, kích thước ....  -->
                            <div class="col-md-5">
                                <div class="thongtinsach">
                                    <ul>
                                        <li>Khuyến mãi: <a href="#" class="tacgia">Bàn phím Dare-U LK135 trị giá 240,000đ.</a></li>
                                        <li><b>Quà tặng:</b></li>
                                        <li>🎁 Chuột gaming Sharkoon</li>
                                        <li>🎁 Balo cao cấp gaming Acer SUV</li>
                                        <li>🎁 Cài đặt phần mềm miễn phí trọn đời máy</li>
                                        <li>🎁 Giảm 10% khi mua đế tản nhiệt, balo</li>
                                        <li>🎁 Giảm 10% khi mua đế tản nhiệt, balo</li>
                                        <li>Mua kèm các sản phẩm khác giảm giá hấp dẫn <b>(xem chi tiết)</b></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- decripstion của 1 sản phẩm: giới thiệu , đánh giá độc giả  -->
                    <div class="product-description col-md-9">
                        <!-- 2 tab ở trên  -->
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active text-uppercase" id="nav-gioithieu-tab"
                                    data-toggle="tab" href="#nav-gioithieu" role="tab" aria-controls="nav-gioithieu"
                                    aria-selected="true">Giới thiệu</a>
                                <a class="nav-item nav-link text-uppercase" id="nav-danhgia-tab" data-toggle="tab"
                                    href="#nav-danhgia" role="tab" aria-controls="nav-danhgia"
                                    aria-selected="false">Đánh
                                    giá của khách hàng</a>
                                <a class="nav-item nav-link text-uppercase" id="nav-danhgia-tab" data-toggle="tab"
                                    href="#nav-binhluan" role="tab" aria-controls="nav-danhgia"
                                    aria-selected="false">Đánh
                                    giá</a>
                            </div>
                        </nav>
                        <!-- nội dung của từng tab  -->
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active ml-3" id="nav-gioithieu" role="tabpanel"
                                aria-labelledby="nav-gioithieu-tab">
                                <br>
                                {!! $product->content !!}
                            </div>
                            <div class="tab-pane fade" id="nav-danhgia" role="tabpanel" aria-labelledby="nav-danhgia-tab">
                                <div class="row">
                                    <div class="col-md-3 text-center">
                                        <p class="tieude">Đánh giá trung bình</p>
                                        <div class="diem">0/5</div>
                                        <div class="sao">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <p class="sonhanxet text-muted">(0 nhận xét)</p>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="tiledanhgia text-center">
                                            <div class="motthanh d-flex align-items-center">5 <i class="fa fa-star"></i>
                                                <div class="progress mx-2">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="0"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div> 0%
                                            </div>
                                            <div class="motthanh d-flex align-items-center">4 <i class="fa fa-star"></i>
                                                <div class="progress mx-2">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="0"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div> 0%
                                            </div>
                                            <div class="motthanh d-flex align-items-center">3 <i class="fa fa-star"></i>
                                                <div class="progress mx-2">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="0"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div> 0%
                                            </div>
                                            <div class="motthanh d-flex align-items-center">2 <i class="fa fa-star"></i>
                                                <div class="progress mx-2">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="0"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div> 0%
                                            </div>
                                            <div class="motthanh d-flex align-items-center">1 <i class="fa fa-star"></i>
                                                <div class="progress mx-2">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="0"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div> 0%
                                            </div>
                                            <div class="btn vietdanhgia mt-3">Viết đánh giá của bạn</div>
                                        </div>
                                        <!-- nội dung của form đánh giá  -->
                                        <div class="formdanhgia">
                                            <h6 class="tieude text-uppercase">GỬI ĐÁNH GIÁ CỦA BẠN</h6>
                                            <span class="danhgiacuaban">Đánh giá của bạn về sản phẩm này:</span>
                                            <div class="rating d-flex flex-row-reverse align-items-center justify-content-end">
                                                <input type="radio" name="star" id="star1"><label for="star1"></label>
                                                <input type="radio" name="star" id="star2"><label for="star2"></label>
                                                <input type="radio" name="star" id="star3"><label for="star3"></label>
                                                <input type="radio" name="star" id="star4"><label for="star4"></label>
                                                <input type="radio" name="star" id="star5"><label for="star5"></label>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="txtFullname w-100" placeholder="Mời bạn nhập tên(Bắt buộc)">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="txtEmail w-100" placeholder="Mời bạn nhập email(Bắt buộc)">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="txtComment w-100" placeholder="Đánh giá của bạn về sản phẩm này">
                                            </div>
                                            <div class="btn nutguibl">Gửi bình luận</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show active ml-3" id="nav-binhluan" role="tabpanel"
                                aria-labelledby="nav-gioithieu-tab">
                                <div class="fb-comments" data-href="{{ $url }}" data-width="" data-numposts="5"></div>
                            </div>
                            <hr>
                            <!-- het tab nav-danhgia  -->
                        </div>
                        <!-- het tab-content  -->
                    </div>
                    <!-- het product-description -->
                </div>
                <!-- het row  -->
            </div>
            <!-- het product-detail -->
        </div>
        <!-- het container  -->
    </section>
    <!-- het product-page -->

    <!-- khối sản phẩm tương tự -->
    <section class="_1khoi sachmoi">
        <div class="container">
            <div class="noidung bg-white" style=" width: 100%;">
                <div class="row">
                    <!--header-->
                    <div class="col-12 d-flex justify-content-between align-items-center pb-2 bg-light pt-4">
                        <h5 class="header text-uppercase" style="font-weight: 400;">Sản phẩm tương tự</h5>
                        <a href="sach-moi-tuyen-chon.html" class="btn btn-warning btn-sm text-white">Xem tất cả</a>
                    </div>
                </div>
                <div class="khoisanpham" style="padding-bottom: 2rem;">
                    <!-- 1 sản phẩm -->
                    @foreach($product_similars as $product_similar)
                    <div class="card">
                        <a href="{{ URL::to('/product/'.$product_similar->id) }}" class="motsanpham" style="text-decoration: none; color: black;" data-toggle="tooltip"
                            data-placement="bottom" title="">
                            <img class="card-img-top anh" src="{{ $product_similar->feature_image_path }}" alt="lap-ke-hoach-kinh-doanh-hieu-qua">
                            <div class="card-body noidungsp mt-3">
                                <h6 class="card-title ten">{{ $product_similar->name }}</h6>
                                <small class="tacgia text-muted">{{ $product_similar->category->name }}</small>
                                <div class="gia d-flex align-items-baseline">
                                    <div class="giamoi">{{ number_format($product_similar->price) }} ₫</div>
                                    <div class="giacu text-muted">{{ number_format($product_similar->price*2) }} ₫</div>
                                    <div class="sale">-20%</div>
                                </div>
                                <div class="danhgia">
                                    <ul class="d-flex" style="list-style: none;">
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><span class="text-muted">0 nhận xét</span></li>
                                    </ul>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>


    <!-- thanh cac dich vu :mien phi giao hang, qua tang mien phi ........ -->
    @include('index.layouts.footer')


</body>

</html>