<section class="_1khoi sachmoi bg-white">
    <div class="container">
        <div class="noidung" style=" width: 100%;">
            <div class="row">
                <!--header-->
                <div class="col-12 d-flex justify-content-between align-items-center pb-2 bg-transparent pt-4">
                    <h1 class="header text-uppercase" style="font-weight: 400;">SẢN PHẨM MỚI TUYỂN CHỌN</h1>
                    <a href="#" class="btn btn-warning btn-sm text-white">Xem tất cả</a>
                </div>
            </div>
            <div class="khoisanpham" style="padding-bottom: 2rem;">
                <!-- 1 san pham -->
                @foreach($products as $product)
                <div class="card">
                    <a href="{{ URL::to('/product/'.$product->id) }}" class="motsanpham" style="text-decoration: none; color: black;" data-toggle="tooltip" data-placement="bottom" title="Lập Kế Hoạch Kinh Doanh Hiệu Quả">
                        <img class="card-img-top anh" src="{{ $product->feature_image_path }}" alt="lap-ke-hoach-kinh-doanh-hieu-qua">
                        <div class="card-body noidungsp mt-3">
                            <h3 class="card-title ten">{{ $product->name }}</h3>
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