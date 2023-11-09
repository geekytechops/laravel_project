<!doctype html>

<html>

<head>

   @include('includes.head')

</head>

<body>

<div class="main-container">

   <header class="row">

       @include('includes.header')

   </header>

   <div id="main-content">

           @yield('content')

   </div>

   <footer class="row">

       @include('includes.footer')

   </footer>

</div>

</body>

</html>