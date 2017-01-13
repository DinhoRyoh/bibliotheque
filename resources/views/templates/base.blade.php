<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>@yield('title')</title>
  </head>
  <body>
      <header id="nav">
          <h2>bibliotheque en ligne</h2>
          @if(Auth::check())
          <span>{{Auth::user()->name}}</span>
          @endif
            <ul>
              <li><a href="/">Home</a></li>
              {{-- <li><a href="/contact">contact</a></li> --}}
              <li><a href="/livre">Books</a></li>
              @if(Auth::check())
              <li><a href="/logout">logout</a></li>
              <li><a href="/ajoutlivre">add a book</a></li>
              @else
              <li><a href="/login">login</a></li>
              <li><a href="/register">register</a></li>
              @endif
            </ul>
      </header>
      <div class="container content">
        @yield('content')
      </div>
      <footer id="footer">
        <p>© ITAkademy 2017</p>
      </footer>
  </body>
</html>
