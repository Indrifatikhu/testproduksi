{{-- Main Blade for Login and Register Page --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" http-equiv="X-UA-Compatible" content="{{ csrf_token() }}">
    <title>Sistem Produksi | {{ $tittle }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        #auth {
            min-height: 100vh;
        }
    </style>
</head>
<body class="bg-primary">

    @yield('auth')
    <div class="container mt-4">
        @yield('container')
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script>
        const form = document.querySelector('form');
        form.addEventListener('submit', (e) => {
            const password = document.querySelector('#password').value;
            const verify_password = document.querySelector('#verify_password').value;
            if (password !== verify_password) {
                e.preventDefault();
                document.querySelector('#alert').classList.remove('d-none');
            }
        })
    </script>
</body>
</html>