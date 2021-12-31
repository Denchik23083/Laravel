<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    @section('valid')
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-success text-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto dont-weight-normal">ItShop</h5>
    <nav class="my-2 my-md-0 mr-md-3">
        @show
    </nav>
    </div>
    @yield('content')
</body>
</html>