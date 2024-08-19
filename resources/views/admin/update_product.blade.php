

<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    @include('admin.css')
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
     <style type="text/css">
        .div_center{
            text-align: center;
            padding-top: 40px;
        }
        .font_size{
            font-size: 40px;
            padding-bottom: 40px;
        }
        .text_color{
            color: black;
            padding-bottom: 20px;
        }
        .div_design{
            padding-bottom: 15px;
        }

        label{
            display: inline-block;
            width: 200px;
        }
     </style>

  </head>

  <body> 
    <div class="container-scroller">
        @include('admin.sidebar')
        @include('admin.script')
        @include('admin.header')

        <div class="main-panel">
          <div class="content-wrapper">

            @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('message')}}
                </div>
            @endif

            <div class="div_center">
                <h1 class="font_size">Add Product</h1>

                <form action="{{url('/update_product', $product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="div_design">
                        <label for="">Product Title</label>
                        <input class="text_color" type="text" required="" name="title" value="{{$product->title}}">
                    </div>

                    <div class="div_design">
                        <label for="">Description</label>
                        <input class="text_color" type="text" required="" name="description" value="{{$product->description}}">
                    </div>

                    <div class="div_design">
                        <label for="">Price</label>
                        <input class="text_color" type="number" required="" name="price" value="{{$product->price}}">
                    </div>

                    <div class="div_design">
                        <label for="">Discount Price</label>
                        <input class="text_color" type="number" name="discount_price" value="{{$product->discount_price}}">
                    </div>

                    <div class="div_design">
                        <label for="">Quantity</label>
                        <input class="text_color" type="number" required="" name="quantity" value="{{$product->quantity}}" min="0">
                    </div>

                    <div class="div_design">
                        <label for="">Current Image</label>
                        <img style="margin: auto;" height="100" width="100" src="/product_image/{{$product->image}}" alt="" >
                    </div>

                    <div class="div_design">
                        <label for="">Change Image</label>
                        <input type="file" name="image" required="">
                    </div>

                    <div class="div_design">
                        <label for="">Product Category</label>                       
                        <select class="text_color" name="category" required="" id="">  
                            <option value="{{$product->category}}" selected="">{{$product->category}}</option>
                        </select>
                    </div>
                    <div>
                        <input type="submit" name="" value="Update Product" class="btn btn-primary">
                    </div>
                </form>
            </div>
          </div>
        </div>
 
  </body>
</html>
