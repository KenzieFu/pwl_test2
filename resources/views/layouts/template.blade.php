<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link
    href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap"
    rel="stylesheet">

  <title>AllT Blog - Posts</title>

  <!-- Bootstrap core CSS -->
  <link href="/vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet">


  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="/css/fontawesome.css">
  <link rel="stylesheet" href="/css/templatemo-stand-blog.css">
  <link rel="stylesheet" href="/css/owl.css">
  <!--

TemplateMo 551 Stand Blog

https://templatemo.com/tm-551-stand-blog

-->
</head>

<body>
  <!-- Header -->
  @include('partials.navbar')

  @yield('content')

  <!-- Bootstrap core JavaScript -->
  <script src="/vendors/jquery/jquery.min.js"></script>
  <script src="/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Additional Scripts -->
  <script src="/js/custom.js"></script>
  <script src="/js/owl.js"></script>
  <script src="/js/slick.js"></script>
  <script src="/js/isotope.js"></script>
  <script src="/js/accordions.js"></script>

  <script language="text/Javascript">
    cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
    function clearField(t) {                   //declaring the array outside of the
      if (!cleared[t.id]) {                      // function makes it static and global
        cleared[t.id] = 1;  // you could use true and false, but that's more typing
        t.value = '';         // with more chance of typos
        t.style.color = '#fff';
      }
    }
  </script>

</body>

</html>