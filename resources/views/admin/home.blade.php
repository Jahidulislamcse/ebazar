<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
  </head>
  <body>
    <div class="container-scroller">
        @include('admin.sidebar')
        @include('admin.header')
        @include('admin.body')
        @include('admin.script')
  </body>
</html>
