<section id="slider" class="slick-carousel clearfix include-header">
    <div class="slider-parallax-inner">
        <div class="swiper-container swiper-parent">
            <div class="slick-wrapper" id="banner">
                <div class="swiper-slide d-flex align-items-center justify-content-center" style="background-image: url('{{asset('theme/images/no-image.jpg')}}'); background-size: cover; padding: 120px 0;">
                    <div class="container clearfix" style="text-align:center;">
                        <h1 class="mb-0 text-white">{{$page->name}}</h1>
                        <p class="text-white"><a href="{{ route('home') }}" class="text-white"><i class="icon-home"></i></a> / {{$page->name}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>