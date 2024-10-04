<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title><?= $title ?></title>
</head>
<body class="bg-gradient-to-t from-blue-100 to-blue-300 flex justify-center items-center h-full">
    @yield('content')
</body>
</html>