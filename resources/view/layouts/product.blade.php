<!-- Our Product Start -->

<div class="our-house" id="our-product">
    <div class="container">
        <h1 data-aos="fade-up" data-aos-duration="1000" class="aos-init aos-animate">Produk Kami</h1>
        <p data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000" class="aos-init aos-animate">
            Produk terbaik Rice Milling Kami
        </p>
        <!-- Swiper -->
        <div class="swiper mySwiper swiper-initialized swiper-horizontal swiper-backface-hidden">
            <div class="swiper-wrapper" id="swiper-wrapper-b2320e7b108bad34c" aria-live="polite">

                @foreach ($produks as $item)
                <div class="swiper-slide swiper-slide-active" role="group" aria-label="1 / 4" style="width: 414px; margin-right: 40px;">
                    <img src="{{ asset('storage/produk/' . $item->image) }}" alt="house-img">
                    <div class="house-desc">
                        <h2>{{$item-> judul}}</h2>
                        <h4>☑ {{$item-> spek1}}</h4>
                        <h4>☑ {{$item-> spek2}}</h4>
                        <h4>☑ {{$item-> spek3}}</h4>
                        <h4>☑ {{$item-> spek4}}</h4>

                    </div>
                </div>
                @endforeach

            </div>
            <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal"><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 1" aria-current="true"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 2"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 3"></span></div>
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
        </div>
    </div>
</div>
<!-- Our Product End -->