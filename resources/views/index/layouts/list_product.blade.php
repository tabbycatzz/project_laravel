<section class="duoinavbar">
    <div class="container text-white">
        <div class="row justify">
            <div class="col-lg-3 col-md-5">
                <div class="categoryheader">
                    <div class="noidungheader text-white">
                        <i class="fa fa-bars"></i>
                        <span class="text-uppercase font-weight-bold ml-1">Danh mục sản phẩm</span>
                    </div>
                    <!-- CATEGORIES -->
                    <div class="categorycontent">
                        <ul>
                            @foreach($categories as $category)
                            <li> <a href="#"> {{ $category->name }}</a><i class="fa fa-chevron-right float-right"></i>
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
            </div>
            <div class="col-md-5 ml-auto contact d-none d-md-block">
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