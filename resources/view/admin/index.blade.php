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

<body style="font-family: Arial, sans-serif; background: #f4f4f9; margin: 0; padding: 0;">

    <h1 style="text-align: center; margin-top: 30px; color: #333;">Halaman Dashboard Admin PT Usbarja</h1>
    <h3 style="text-align: center; margin-top: 30px; color: #333;">Masih Dalam Perbaikan Hehe :D Dan Akan Terus DiTingkatkan</h3>
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 15px; padding: 50px;">
        <div style="background-color: #fff; border: 1px solid rgba(0,0,0,0.1); box-shadow: 0 4px 8px rgba(0,0,0,0.1); border-radius: 1rem; overflow: hidden;">
            <img src="{{ asset('assets/images/kelolaabout.jpg') }}" style="width: 100%; height: 200px; object-fit: cover;" alt="">
            <div style="padding: 1.25rem;">
                <h5 style="font-weight: bold; margin-bottom: 0.5rem; color: #007bff;">About</h5>
                <p style="font-size: 1rem; margin-bottom: 1rem; color: #555;">Kelola About</p>
                <a href="{{route('about')}}" style="background-color: #007bff; color: white; padding: 0.5rem 1rem; border: none; border-radius: 0.25rem; text-decoration: none; display: inline-block;">Detail</a>
            </div>
        </div>

        <div style="background-color: #fff; border: 1px solid rgba(0,0,0,0.1); box-shadow: 0 4px 8px rgba(0,0,0,0.1); border-radius: 1rem; overflow: hidden;">
            <img src="{{ asset('assets/images/kelolaproduk.jpg') }}" style="width: 100%; height: 200px; object-fit: cover;" alt="">
            <div style="padding: 1.25rem;">
                <h5 style="font-weight: bold; margin-bottom: 0.5rem; color: #007bff;">Product</h5>
                <p style="font-size: 1rem; margin-bottom: 1rem; color: #555;">Kelola Product</p>
                <a href="{{route('produk')}}" style="background-color: #007bff; color: white; padding: 0.5rem 1rem; border: none; border-radius: 0.25rem; text-decoration: none; display: inline-block;">Detail</a>
            </div>
        </div>

        <div style="background-color: #fff; border: 1px solid rgba(0,0,0,0.1); box-shadow: 0 4px 8px rgba(0,0,0,0.1); border-radius: 1rem; overflow: hidden;">
            <img src="{{ asset('assets/images/kelolateam.jpg') }}" style="width: 100%; height: 200px; object-fit: cover;" alt="">
            <div style="padding: 1.25rem;">
                <h5 style="font-weight: bold; margin-bottom: 0.5rem; color: #007bff;">Team</h5>
                <p style="font-size: 1rem; margin-bottom: 1rem; color: #555;">Kelola Team</p>
                <a href="{{route('team')}}" style="background-color: #007bff; color: white; padding: 0.5rem 1rem; border: none; border-radius: 0.25rem; text-decoration: none; display: inline-block;">Detail</a>
            </div>
        </div>
        <!-- Kenapa -->
        <div style="background-color: #fff; border: 1px solid rgba(0,0,0,0.1); box-shadow: 0 4px 8px rgba(0,0,0,0.1); border-radius: 1rem; overflow: hidden;">
            <img src="{{ asset('assets/images/KELOLAKENAPA.jpg') }}" style="width: 100%; height: 200px; object-fit: cover;" alt="">
            <div style="padding: 1.25rem;">
                <h5 style="font-weight: bold; margin-bottom: 0.5rem; color: #007bff;">Kenapa</h5>
                <p style="font-size: 1rem; margin-bottom: 1rem; color: #555;">Kelola Kenapa</p>
                <a href="{{route('kenapa')}}" style="background-color: #007bff; color: white; padding: 0.5rem 1rem; border: none; border-radius: 0.25rem; text-decoration: none; display: inline-block;">Detail</a>
            </div>
        </div>
        <!-- testimoni -->
        <div style="background-color: #fff; border: 1px solid rgba(0,0,0,0.1); box-shadow: 0 4px 8px rgba(0,0,0,0.1); border-radius: 1rem; overflow: hidden;">
            <img src="{{ asset('assets/images/kelolatestimoni.jpg') }}" style="width: 100%; height: 200px; object-fit: cover;" alt="">
            <div style="padding: 1.25rem;">
                <h5 style="font-weight: bold; margin-bottom: 0.5rem; color: #007bff;">Testimoni</h5>
                <p style="font-size: 1rem; margin-bottom: 1rem; color: #555;">Kelola Testimoni</p>
                <a href="{{route('testimoni')}}" style="background-color: #007bff; color: white; padding: 0.5rem 1rem; border: none; border-radius: 0.25rem; text-decoration: none; display: inline-block;">Detail</a>
            </div>
        </div>
    </div>

    <div style="text-align: center; padding-bottom: 20px;">
        @auth
        <form action="/logout" method="POST" style="display: inline;">
            @csrf
            <button type="submit" style="background-color: #343a40; color: #fff; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">Logout</button>
        </form>
        @else
        <a href="/register" style="background-color: #dc3545; color: #fff; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; text-decoration: none;">Register</a>
        @endauth
    </div>

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