<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
  <title>Gam3na @yield('title')</title>
  <link rel="shortcut icon" href= {{ asset("web/images/small_logo.png") }} />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href={{ asset("web/bootstrap-3.3.7-dist/css/bootstrap.min.css") }} >
  <link rel="stylesheet" href={{ asset("web/font-awesome-4.7.0/css/font-awesome.min.css") }} >
  <link href={{ asset("web/css/main.css") }} rel="stylesheet" type="text/css">
  <link href={{ asset("web/css/admin.css") }} rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  {{-- <script src={{ asset("web/js/event.js")}}></script> --}}
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  @yield('head')
  <script>
      window.Laravel = {!! json_encode([
          'csrfToken' => csrf_token(),
      ]) !!};
  </script>
    <style>
    .unread{background-color:red;}
    </style>
</head>
  <body>
@yield('content')
  <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>
