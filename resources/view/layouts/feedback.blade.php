<!-- Feedback -->
<div class="feedback" id="feedback">
    <div class="container">
        <h1 data-aos="fade-up" data-aos-duration="1000" class="aos-init aos-animate">
            Testimoni<br>
            Dari Customer Kami
        </h1>

        <div class="feedback-box">
            @foreach ($testimonis as $item)
            <div class="box">
                <p>
                    {{$item-> katakata}}
                </p>
                <div class="people">
                    <img src="{{ asset('storage/testimoni/' . $item->image) }}" alt="feedback-people">
                    <div class="people-desc">
                        <h3>{{$item-> nama}}</h3>
                        <p>{{$item-> pekerjaan}}</p>
                        <p><i class="fa-solid fa-map-location-dot"></i> {{$item-> alamat}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Feedback End -->