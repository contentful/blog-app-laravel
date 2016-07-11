<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js" defer="defer"></script>
    <script src="{{asset('js/bootstrap.js')}}" defer="defer"></script>
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{route('index')}}">Blog</a>
        </div>

        <div class="collapse navbar-collapse" id="navbar">
          <ul class="nav navbar-nav">
            <li><a href="{{route('categories')}}">Categories</a></li>
            <li><a href="{{route('authors')}}">Authors</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
      @yield('content')
    </div>
  </body>
</html>
