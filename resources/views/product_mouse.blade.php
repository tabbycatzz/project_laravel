<section class="_1khoi sapphathanh mt-4">
    <div class="container">
        <div class="noidung bg-white" style=" width: 100%;">
            <div class="row">
                <!--header-->
                <div class="col-12 d-flex justify-content-between align-items-center pb-2 bg-light">
                    <h2 class="header text-uppercase" style="font-weight: 400;">CHUỘT - MOUSE</h2>
                    <a href="/category/chuot-logitech/43" class="btn btn-warning btn-sm text-white">Xem tất cả</a>
                </div>
            </div>
            <div class="khoisanpham">
                <!-- 1 san pham -->
                @foreach($productsMouseLogitech as $productsMouseItem)
                <div class="card">
                    <a href="{{ URL::to('/product/'.$productsMouseItem->id) }}" class="motsanpham" style="text-decoration: none; color: black;" data-toggle="tooltip" data-placement="bottom" title="Ngoại Giao Của Chính Quyền Sài Gòn">
                        <img class="card-img-top anh" src="{{ $productsMouseItem->feature_image_path }}" alt="">
                        <div class="card-body noidungsp mt-3">
                            <h3 class="card-title ten">{{ $productsMouseItem->name }}</h3>
                            <small class="tacgia text-muted">{{ $productsMouseItem->category->name }}</small>
                            <div class="gia d-flex align-items-baseline">
                                <div class="giamoi">{{ number_format($productsMouseItem->price) }} ₫</div>
                                <div class="giacu text-muted">{{ number_format($productsMouseItem->price*2) }} ₫</div>
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