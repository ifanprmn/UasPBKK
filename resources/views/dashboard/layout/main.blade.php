<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard</title>

  

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    
    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">
    <link href="../../css/dashboard.css" rel="stylesheet">
    <link href="../../../css/dashboard.css" rel="stylesheet">

    {{-- trix editor --}}

    <link rel="stylesheet" type="text/css" href="../css/trix.css">
    <link rel="stylesheet" type="text/css" href="../../css/trix.css">
    <link rel="stylesheet" type="text/css" href="../../../css/trix.css">
    <script type="text/javascript" src="../js/trix.js"></script>
    <script type="text/javascript" src="../../js/trix.js"></script>
    <script type="text/javascript" src="../../../js/trix.js"></script>

    <style>
      trix-toolbar [data-trix-button-group='file-tools']{
        display: none;
      }
    </style>

  </head>
  <body class="mb-5">
    
@include('dashboard.layout.header')

<div class="container-fluid">
  <div class="row">
@include('dashboard.layout.sidebar')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        @yield('container') 
    </main>
  </div>
</div>


      <script src="../js/bootstrap.bundle.min.js"></script>
      <script src="../dist/feather.min.js"></script>
      <script src="../js/dashboard.js"></script>

      <script src="../../js/bootstrap.bundle.min.js"></script>
      <script src="../../dist/feather.min.js"></script>
      <script src="../../js/dashboard.js"></script>

      <script src="../../../js/bootstrap.bundle.min.js"></script>
      <script src="../../../dist/feather.min.js"></script>
      <script src="../../../js/dashboard.js"></script>

  </body>
</html>
