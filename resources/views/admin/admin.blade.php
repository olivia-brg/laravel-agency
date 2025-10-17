<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | Administration </title>
</head>
<body>

<div class="container mt-5">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif
    @yield('content')
</div>

</body>
</html>
