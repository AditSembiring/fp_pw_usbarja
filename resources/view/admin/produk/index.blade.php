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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin PT Usbarja</title>
</head>

<body style="font-family: Arial, sans-serif; background: #f4f4f9; margin: 0; padding: 20px;">

    <h1 style="text-align: center; color: #333;">Halaman Dashboard Admin PT Usbarja</h1>
    <h2 style="text-align: center; color: #555;">Edit produk</h2>

    <div style="text-align: center; margin-bottom: 20px;">
        <a href="{{ route('produk.create') }}" style="background-color: #337ab7; color: #ffffff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; text-decoration: none; display: inline-block;">Buat produk</a>
        <a href="/dashboard" style="background-color: #4CAF50; color: #ffffff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Kembali ke Dashboard</a>
    </div>

    <div style="overflow-x: auto; width: 100%; padding: 10px; border: 1px solid #ddd; background: #fff; border-radius: 10px;">
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr>
                    <th style="background-color: #f0f0f0; border-bottom: 1px solid #ddd; padding: 10px; text-align: left;">Image</th>
                    <th style="background-color: #f0f0f0; border-bottom: 1px solid #ddd; padding: 10px; text-align: left;">Judul</th>
                    <th style="background-color: #f0f0f0; border-bottom: 1px solid #ddd; padding: 10px; text-align: left;">Spek1</th>
                    <th style="background-color: #f0f0f0; border-bottom: 1px solid #ddd; padding: 10px; text-align: left;">Spek2</th>
                    <th style="background-color: #f0f0f0; border-bottom: 1px solid #ddd; padding: 10px; text-align: left;">Spek3</th>
                    <th style="background-color: #f0f0f0; border-bottom: 1px solid #ddd; padding: 10px; text-align: left;">Spek4</th>
                    <th style="background-color: #f0f0f0; border-bottom: 1px solid #ddd; padding: 10px; text-align: left;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produks as $produk)
                <tr style="background-color: #f9f9f9;">
                    <td style="width: 150px; padding: 10px;">
                        <img src="{{ asset('storage/produk/'.$produk->image) }}" height="100" style="border-radius: 10px; width: 100%; object-fit: cover;">
                    </td>
                    <td style="width: 200px; padding: 10px;">{{ $produk->judul }}</td>
                    <td style="width: 150px; padding: 10px;">{{ $produk->spek1 }}</td>
                    <td style="width: 150px; padding: 10px;">{{ $produk->spek2 }}</td>
                    <td style="width: 150px; padding: 10px;">{{ $produk->spek3 }}</td>
                    <td style="width: 150px; padding: 10px;">{{ $produk->spek4 }}</td>
                    <td style="width: 150px; text-align: center; padding: 10px;">
                        <a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-warning" style="background-color: #ffc107; color: #ffffff; padding: 5px 10px; border: none; border-radius: 5px; cursor: pointer; text-decoration: none;">Edit</a>
                        <form action="{{ route('produk.destroy', $produk->id) }}" method="POST" class="d-inline" style="display: inline;">
                            @csrf
                            @method('POST')
                            <button type="submit" class="btn btn-danger" style="background-color: #dc3545; color: #ffffff; padding: 5px 10px; border: none; border-radius: 5px; cursor: pointer;">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div style="text-align: center; margin-top: 20px;">
        @auth
        <form action="/logout" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="btn btn-dark" style="background-color: #343a40; color: #fff; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">Logout</button>
        </form>
        @else
        <button class="btn btn-danger" style="background-color: #dc3545; color: #fff; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">Register</button>
        @endauth
    </div>

</body>

</html>

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