<div class="col-md-9 px-0">
    <div id="carouselId" class="carousel slide" data-ride="carousel">
        <ol class="nutcarousel carousel-indicators rounded-circle">
            <li data-target="#carouselId" data-slide-to="0" class="active"></li>
            <li data-target="#carouselId" data-slide-to="1"></li>
            <li data-target="#carouselId" data-slide-to="2"></li>
            <li data-target="#carouselId" data-slide-to="3"></li>
            <li data-target="#carouselId" data-slide-to="4"></li>
        </ol>
        <div class="carousel-inner">
            @foreach($sliders as $key => $slider)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <a href="#"><img src="{{ $slider->image_path }}" class="img-fluid" style="height: 386px;" width="900px" alt="First slide"></a>
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselId" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselId" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>