<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
   @include('includes.style')
  </head>
  <body>
        <!-- navbar -->
       @include('includes.navbar')
        <!-- akhir navbar -->

        @yield('content')

      @include('includes.footer')

        @include('includes.script')
  </body>
</html>
