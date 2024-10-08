<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <style>
        table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
        }
        .center{
            text-align: center;
            margin-top: 40px;
            margin-bottom: 20px;
        }
</style>
  </head>
  <body>
    <div class="container-scroller">
        @include('admin.sidebar')
        @include('admin.header')

    <div class="main-panel">
          <div class="content-wrapper">
            
            @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('message')}}
                </div>
            @endif
            <h1 class="center">All Products</h1>

            <a class="btn btn-primary" href="{{url('add_product')}}">Add More Product</a>

            <table >
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Discount Price</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th>Action</th>

                </tr>
                @foreach($products as $product)
                <tr >
                    <td>{{$product->title}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->category}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->discount_price}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>
                        <img src="/product_image/{{$product->image}}" alt="" width="100px">
                    </td>
                    <td>
                        <a class="btn btn-warning" href="{{url('edit_product', $product->id)}}">Edit</a>
                        <a class="btn btn-danger" onclick="return confirm('Delete data?')" href="{{url('delete_product', $product->id)}}">Delete</a>
                    </td>                    
                </tr>
                @endforeach
            </table>
          </div>
    </div>

        @include('admin.script')
  </body>
</html>
