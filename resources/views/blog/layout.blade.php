<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title', 'Welcome to My Blog')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand" href="/">Laravel Blog</a>
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/archives">Archives</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/comments">Comments</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="jumbotron jumbotron-fluid bg-dark text-white">
        <div class="container">
            <h1 class="display-4">@yield('message', 'Welcome to My Blog')</h1>
            <p class="lead">@yield('message_note', 'This blog contains my personal thoughts and experiences.')</p>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                @yield('content')
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-8 d-flex justify-content-center">
                <br><br>
                2019. All rights reserved.
                <br><br>
            </div>
        </div>
    </div>

</body>

</html>