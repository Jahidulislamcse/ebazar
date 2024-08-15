<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
    <style type="text/css">
        .div_center{
            text-align: center;
            padding: 40px;
        }
        .h1_font{
            font-size: 40px;
            padding-bottom: 40px;
        }
        .input_color{
            color: black;
        }
        .center{
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 30px;
            border: 2px solid white;
        }
    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
        <!-- partial:partials/_navbar.html -->
        @include('admin.header')

        <!-- partial -->
    <div class="main-panel">
          <div class="content-wrapper">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('message')}}
                </div>
            @endif
            <div class="div_center">
                <h1 class="h1_font">Add Category</h1>
                <form action="{{url('/add_category')}}" method="POST" >
                    @csrf
                    <input type="text" name="category_name" class="input_color" placeholder="category name">
                    <input type="submit" class="btn btn-primary" name="submit" value="Add Category">
                </form>
            </div>
            <table class="center">
                <tr class="center">
                    <td>Category</td>
                    <td>Action</td>
                </tr>
                @foreach($data as $data)
                <tr>
                    <td>{{$data->category_name}}</td>
                    <td>
                    <a class="btn btn-warning" href="">Edit</a>
                    <a onclick="return confirm('Delete Category')" class="btn btn-danger" href="{{url('delete_category', $data->id)}}">Delete</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>

    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
