<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @php
        $pesan = "Hello"
    @endphp
    {{-- @auth
        <h1>User Sudah login</h1>
    @else
        <h1>User Belum Login</h1>
    @endauth --}}

    <h1>Hello World</h1>

    <x-tombol :pesan="$pesan"/>
</body>
</html>