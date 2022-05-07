<section class="_1khoi combohot mt-4">
    <div class="container">
        <div class="noidung bg-white" style=" width: 100%;">
            <div class="row">
                <!--header -->
                <div class="col-12 d-flex justify-content-between align-items-center pb-2 bg-light">
                    <h2 class="header text-uppercase" style="font-weight: 400;">COMBO SẢN PHẨM HOT - BÁN CHẠY - GIẢM ĐẾN 25%</h2>
                    <a href="#" class="btn btn-warning btn-sm text-white">Xem tất cả</a>
                </div>
            </div>
            <div class="khoisanpham">
                @foreach($productsRecommend as $productsRecommendItem)
                <div class="card">
                    <a href="{{ URL::to('/product/'.$productsRecommendItem->id) }}" class="motsanpham" style="text-decoration: none; color: black;" data-toggle="tooltip" data-placement="bottom" title="Chuyện Nghề Và Chuyện Đời - Bộ 4 Cuốn">
                        <img class="card-img-top anh" src="{{ $productsRecommendItem->feature_image_path }}" alt="combo-chuyen-nghe-chuyen-doi">
                        <div class="card-body noidungsp mt-3">
                            <h3 class="card-title ten">{{ $productsRecommendItem->name }}</h3>
                            <small class="tacgia text-muted">{{ $productsRecommendItem->category->name }}</small>
                            <div class="gia d-flex align-items-baseline">
                                <div class="giamoi">{{ number_format($productsRecommendItem->price) }} ₫</div>
                                <div class="giacu text-muted">{{ number_format($productsRecommendItem->price*2) }} ₫</div>
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