<div class="about" id="about">
    @foreach ($abouts as $about)
    <div class="container">
        <div class="about-box">
            <div class="box">
                <img src="{{ asset('storage/about/' . $about->image) }}" alt="about-img">
            </div>
            <div class="box">
                <h1 data-aos="fade-up" data-aos-duration="1000" class="aos-init aos-animate">
                    {{$about->judul}}
                </h1>
                <p>
                    {{$about->subjudul}}
                </p>
            </div>
        </div>
    </div>
    @endforeach
</div>