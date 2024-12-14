<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clean n CLear</title>
    @yield('css')
</head>

<body>
    @if ($errors->any())
        <div id="error">
            @foreach ($errors->all() as $error)
                {{ $error }} </br>
            @endforeach
        </div>
    @endif
    @yield('content')
</body>

</html>