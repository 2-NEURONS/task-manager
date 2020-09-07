<html>
  <head>
<!-- csrf token -->
<meta name = "csrf-token" cntent =" {{csrf_token()}}">
<meta charset="utf-8"> <!-- character encoding -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <!-- scripts -->
 <script src="{{ mix('js/app.js') }} defer"></script>

 <!-- fonts -->
 <link rel="dns-prefetch" href="//fonts.gstatic.com">
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">

 <!-- styles -->
 <link rel="stylesheet" href="{{ asset('css/app.css') }}">


    <title>Personal Task Manager</title>
  </head>
  <body>
   @yield('content')
  </body>
</html>
