<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

      <!-- Required meta tags -->
    <!----------------------Common use--------------------------------->
    <link rel="stylesheet" href="{{asset('backend/vendors/iconfonts/font-awesome/css/all.min.css')}}">
       <link rel="stylesheet" href="{{asset('backend/vendors/css/vendor.bundle.base.css')}}">
       <link rel="stylesheet" href="{{asset('backend/vendors/css/vendor.bundle.addons.css')}}">
       <!-- endinject -->
       <!-- inject:css -->
       <link rel="stylesheet" href="{{asset('backend/css/style.css')}}">
       <!-- endinject -->
       <link rel="shortcut icon" href="{{asset('backend/images/logo.svg')}}" />
       <!-----------------Text Editor----------------------------------->
          <link rel="stylesheet" href="{{asset('backend/vendors/summernote/dist/summernote-bs4.css')}}">
       <!------------------------------------------------------>

  </head>
<body>
  @yield('content')
</body>
</html>
