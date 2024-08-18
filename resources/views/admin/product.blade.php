<!DOCTYPE html>
<html lang="en">
  <head>
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
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
        <!-- partial:partials/_navbar.html -->
        @include('admin.header')

        <div class="main-panel">
          <div class="content-wrapper">
            <div class="div_center">
                <h1 class="font_size">Add Product</h1>

                <form action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="div_design">
                        <label for="">Product Title</label>
                        <input class="text_color" type="text" required="" name="title" placeholder="Title...">
                    </div>
                    <div class="div_design">
                        <label for="">Description</label>
                        <input class="text_color" type="text" required="" name="description" placeholder="description...">
                    </div>
                    <div class="div_design">
                        <label for="">Price</label>
                        <input class="text_color" type="number" required="" name="price" placeholder="price...">
                    </div>
                    <div class="div_design">
                        <label for="">Discount Price</label>
                        <input class="text_color" type="number" name="discount_price" placeholder="discount price...">
                    </div>
                    <div class="div_design">
                        <label for="">Quantity</label>
                        <input class="text_color" type="number" required="" name="quantity" placeholder="quantity..." min="0">
                    </div>
                    <div class="div_design">
                        <label for="">Product Images</label>
                        <input type="file" name="image" required="">
                    </div>
                    <div class="div_design">
                        <label for="">Product Category</label>
                        
                        <select class="text_color" name="category" required="" id="">  
                            <option value="" selected="">Choose Category</option>
                             @foreach($category as $category)  
                                <option value="">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <input type="submit" name="" value="Add Product" class="btn btn-primary">
                    </div>
                </form>
            </div>
          </div>
        </div>
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
