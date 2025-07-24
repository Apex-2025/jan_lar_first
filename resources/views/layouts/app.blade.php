<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Laravel Quickstart - Basic</title>

        <!-- CSS и JavaScript -->

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>

    <body>
    <div class="container">
        <nav class="navbar navbar-default">
            <!-- Содержимое Navbar -->

            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/">First laravel site</a>
                </div>
                <ul class="nav navbar-nav">

                    <li><a href="{{ route('task.index') }}">Tasks</a></li>
{{--                    <li><a href="#">Page 2</a></li>--}}
{{--                    <li><a href="#">Page 3</a></li>--}}
                </ul>
            </div>

        </nav>
{{-- повідомлення про успіх --}}
        @include('common.success')
    </div>

    @yield('content')
    </body>
</html>