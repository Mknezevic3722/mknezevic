<!DOCTYPE html>
<html lang="en">
<head>
  <title>@yield("title")</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-light">

  <div class="container-fluid">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="{{route("admin")}}">Pocetna</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route("admin.product")}}">Katalog</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route("profile.edit")}}">Moj Profil</a>
      </li>
      <li class="nav-item">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-link">Logout</button>
        </form>
      </li>
    </ul>
  </div>

</nav>

@if(Session::has('success'))
    <div class="container-fluis bg-success">
        {{Session::get('success')}}
    </div>
@endif

@if(Session::has('error'))
    <div class="container-fluis bg-danger">
        {{Session::get('error')}}
    </div>
@endif


<div class="container-fluid">
    @yield("content")
</div>





</body>
</html>
