@extends('layouts.adminlayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
    <h1>{{$category->name}} Products</h1>
  </div>
  @if (session()->has('flush_errors'))
  <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>{!! session()->get('flush_errors') !!}</strong>
  </div>
  @endif
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-plus-sign"></i> </span>
            <a type="submit" style="height:75%;" href="{{route('getadd.product')}}" id="addproductbutton"class="btn btn-primary">Add Product</a>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th style="background-color:#DDD9CD;"><h4>Product Name</h4></th>
                  <th style="background-color:#DDD9CD;"><h4>Product code</h4></th>
                  <th style="background-color:#DDD9CD;"><h4>Product color</h4></th>
                  <th style="background-color:#DDD9CD;"><h4>description</h4></th>
                  <th style="background-color:#DDD9CD;"><h4>Price</h4></th>
                  <th style="background-color:#DDD9CD;"><h4>Image</h4></th>
                  <th style="background-color:#DDD9CD;"><h4>Action</h4></th>
                </tr>
              </thead>
              <tbody>
                @foreach($products as $product)
                <tr class="gradeX">
                  <td ><div class="user-thumb"> <img width="40" height="40" alt="User" src="{{URL::to('img/backend_img/demo/av1.jpg')}}"></div><h6 style="font-size:20px;color:blue;">{{$product->product_name}}</h6></td>
                  <td style="text-align:center;"><h6>{{$product->product_code}}</h6></td>
                  <td style="text-align:center;"><h6>{{$product->product_color}}</h6></td>
                  <td style="text-align:center;"><h6>{{$product->description}}</h6></td>
                  <td style="text-align:center;"><h6>{{$product->price}} $</h6></td>
                  <td style="text-align:center;"><h6><img style="width:50px;" src="{{URL::to('img/backend_img/products/small/'.$product->image)}}"></h6></td>
                  <td style="text-align:center;"class="center"><a href="#myModal{{$product->id}}" data-toggle="modal" class="btn btn-success">View</a> <a href="{{route('getadd.attributes',[$product->id])}}" class="btn btn-warning">add attribute</a> <a href="{{route('getedit.product',[$product->id])}}" class="btn btn-primary">Edit</a> <a onclick="return confirm('Are you sure ?')" href="{{route('delete.product',[$product->id])}}" class="btn btn-danger">Delete</a></td>
                </tr>
                <!-- ----------view product modal------- -->
                <div id="myModal{{$product->id}}" class="modal hide">
                  <div class="modal-header">
                    <button data-dismiss="modal" class="close" type="button">×</button>
                    <h2>{{$product->product_name}}</h2>
                  </div>
                  <div class="modal-body">
                    <div class="col">
                      <div class="">
                        <img src="{{URL::to('img/backend_img/products/small/'.$product->image)}}">
                        <p><h4>Price : </h4><b>{{$product->price}} $</b></p>
                        <p><h4>Code : </h4><b>{{$product->product_code}}</b></p>
                        <p><h4>Color : </h4><b>{{$product->product_color}}</b></p>
                        <p><h4>Description : </h4><b>{{$product->description}}</b></p>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- ------------------------------------ -->
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection