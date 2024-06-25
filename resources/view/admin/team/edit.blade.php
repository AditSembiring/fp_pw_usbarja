<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Project PT Usbarja</title>
    <link rel="shortcut icon" href="{{ asset('assets/images/adit.png') }}">
    <link rel="stylesheet" href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body>

    <h1 style="text-align: center;">Halaman Dashboard Admin PT Usbarja</h1>
    <h2 style="text-align: center;">Edit team</h2>
    <div style="text-align: center; margin-bottom: 20px; padding-top:20px;">
        <a href="/team" style="background-color: #4CAF50; color: #ffffff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Kembali ke Team</a>
    </div>
    <form action="{{ route('team.update', $team->id) }}" method="POST" enctype="multipart/form-data" style="max-width: 500px; margin: 40px auto; padding: 20px; background-color: #f9f9f9; border: 1px solid #ddd; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        @csrf

        <div class="form-group mb-4">
            <label for="" style="display: block; margin-bottom: 10px; font-weight: bold; color: #333;">Masukan Nama</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" style="width: 100%; height: 40px; padding: 10px; font-size: 16px; border: 1px solid #ccc; border-radius: 5px;">
            @error('nama')
            <div class="invalid-feedback" style="color: red; font-size: 14px; margin-top: 10px;">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group mb-4">
            <label for="" style="display: block; margin-bottom: 10px; font-weight: bold; color: #333;">Masukan Nim</label>
            <input type="text" class="form-control @error('nim') is-invalid @enderror" name="nim" value="{{ old('nim') }}" style="width: 100%; height: 40px; padding: 10px; font-size: 16px; border: 1px solid #ccc; border-radius: 5px;">
            @error('nim')
            <div class="invalid-feedback" style="color: red; font-size: 14px; margin-top: 10px;">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group mb-4">
            <label for="" style="display: block; margin-bottom: 10px; font-weight: bold; color: #333;">Masukan Tugas</label>
            <input type="text" class="form-control @error('nim') is-invalid @enderror" name="tugas" value="{{ old('tugas') }}" style="width: 100%; height: 40px; padding: 10px; font-size: 16px; border: 1px solid #ccc; border-radius: 5px;">
            @error('tugas')
            <div class="invalid-feedback" style="color: red; font-size: 14px; margin-top: 10px;">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group mb-4">
            <label for="" style="display: block; margin-bottom: 10px; font-weight: bold; color: #333;">Pilih Photo Untuk team</label>
            <input type="hidden" name="old_image" value="{{$team->image}}">
            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" style="width: 100%; height: 40px; padding: 10px; font-size: 16px; border: 1px solid #ccc; border-radius: 5px;">
            @error('image')
            <div class="invalid-feedback" style="color: red; font-size: 14px; margin-top: 10px;">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button type="submit" style="background-color: #4CAF50; color: #fff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; ">Submit</button>
    </form>



    @auth
    <form action="/logout" method="POST" style="text-align:center;">
        @csrf
        <button type="submit" class="btn btn-dark" style="background-color: #343a40; color: #fff; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">Logout</button>
    </form>
    @else
    <button class="btn btn-danger" style="background-color: #dc3545; color: #fff; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">Register</button>
    @endauth

</body>
<script src="{{ asset('js/script.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 10,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            575: {
                slidesPerView: 2,
                spaceBetween: 40,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 50,
            },
        },
    });
</script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>
</body>

</html>