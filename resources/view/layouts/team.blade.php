<!-- product Start -->
<div class="feedback2" id="feedback2" style="width: 100%; height: 40px">
    <div class="container">
        <h1 data-aos="fade-up" data-aos-duration="1000" class="aos-init">
            Kami Dari Informatika 3 <br>
        </h1>
        <h1 data-aos="fade-up" data-aos-duration="1000" class="aos-init">
            Universitas Amikom Yogyakarta<br>
        </h1>

        <div class="feedback-box">
            @foreach ($teams as $item)
            <div class="box">
                <div class="people">
                    <img src="{{ asset('storage/team/' . $item->image) }}" alt="feedback-people">
                    <div class="people-desc">
                        <h3>{{$item-> nama}}</h3>
                        <p>{{$item-> nim}}</p>
                        <p><i class="fa-solid fa-map-location-dot"></i> {{$item-> tugas}}</p>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- product End -->