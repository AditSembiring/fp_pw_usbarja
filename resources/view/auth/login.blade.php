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



    <!--
    <div class="container3">
        <div class="login-form">
            <h2>Login Backend PT Usbarja</h2>
            <form action="/login" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <button type="submit">Login</button>
                </div>
            </form>
        </div>

    </div> -->

    <body style="display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; background: linear-gradient(135deg, #74ebd5, #ACB6E5); font-family: Arial, sans-serif;">

        <div class="container3" style="width: 100%; max-width: 400px; padding: 20px; background: white; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
            <div class="login-form" style="text-align: center;">
                <h2 style="margin-bottom: 20px; color: #333;">Login Backend PT Usbarja</h2>
                <form action="/login" method="POST">
                    @csrf
                    <div class="form-group" style="margin-bottom: 15px; text-align: left;">
                        <label for="email" style="display: block; margin-bottom: 5px; color: #555;">Email</label>
                        <input type="email" id="email" name="email" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;">
                    </div>
                    <div class="form-group" style="margin-bottom: 20px; text-align: left;">
                        <label for="password" style="display: block; margin-bottom: 5px; color: #555;">Password</label>
                        <input type="password" id="password" name="password" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;">
                    </div>
                    <div class="form-group" style="text-align: center;">
                        <button type="submit" style="width: 100%; padding: 10px 15px; background: #74ebd5; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; transition: background 0.3s ease;">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </body>



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