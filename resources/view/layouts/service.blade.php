<!-- Services Star -->
<div class="services" id="services">
    <div class="container">
        <h1 data-aos="fade-up" data-aos-duration="1000" class="aos-init aos-animate">Kenapa</h1>
        <h2 data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200" class="aos-init aos-animate">
            Harus Membeli Produk Dari Kami
        </h2>

        <div class="service-box">
            @foreach ($kenapas as $kenapa)
            <div class="box aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                <img src="{{ asset('storage/kenapa/' . $kenapa->image) }}" alt="icon" class="small-icon" style="width: 40px; height: 40px; margin-bottom: 15px;">
                <h3>{{$kenapa-> judul}}</h3>
                <p>
                    {{$kenapa-> katakata}}
                </p>
            </div>
            @endforeach

        </div>


    </div>
</div>
<!-- Services End -->