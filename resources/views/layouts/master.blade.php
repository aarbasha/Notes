<!DOCTYPE html>
<html lang="en">

<head>
@include('layouts.css')
</head>

<body>

  <!-- ======= Header ======= -->
 @include('layouts.navbar')
  <!-- ======= Hero Section ======= -->
 @yield('content')

  <!-- Vendor JS Files -->
  @include('layouts.js')

</body>

</html>
