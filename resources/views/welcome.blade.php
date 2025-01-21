<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="./css/style.css">
    </head>
    <body class="antialiased">
        <div class="body_one">

            <div class="divForm">
                {{-- <form action="{{ route('MakeUser') }}" method="post">
                    @csrf
                    <label for="">name</label>
                    <input type="text" name="name" value="name">
                    <label for="">phone</label>
                    <input type="text" name="phone" value="phone">
                    <label for="">email</label>
                    <input type="email" name="email" value="email">
                    <label for="">password</label>
                    <input type="password" name="password" value="pass">
                    <button type="submit">save</button>
                </form> --}}
            </div>

        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
