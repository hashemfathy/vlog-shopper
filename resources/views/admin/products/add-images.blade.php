@extends('layouts.adminlayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
    <h1>Add Product images</h1>
  </div>
  @if (session()->has('flush_errors'))
      <div class="alert alert-success alert-block">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>
              {!! session()->get('flush_errors') !!}
          </strong>
      </div>
    @endif
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>add product image</h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{route('add.images',[$product->id])}}" name="add_images" id="add_images" >
            @csrf 
              <div class="control-group">
                <label class="control-label">Product Name</label>
                <label class="control-label"><strong>{{$product->product_name}}</strong></label>
              </div>
              <div class="control-group">
                <label class="control-label">Product code</label>
                <label class="control-label"><strong>{{$product->product_code}}</label>
              </div>
              <div class="control-group">
                <label class="control-label">Image</label>
                <div class="controls">
                  <input required name="product_image[]"id="product_image"type="file" multiple="multiple">
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="add image" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>view images</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th style="background-color:#DDD9CD;"><h4>Product id</h4></th>
                  <th style="background-color:#DDD9CD;"><h4>image</h4></th>
                  <th style="background-color:#DDD9CD;"><h4>Action</h4></th>
                </tr>
              </thead>
              <tbody>
                @foreach($productImages as $productImages)
                <tr class="gradeX">
                  <td ><div class="user-thumb"> <img width="40" height="40" alt="User" src="{{URL::to('img/backend_img/demo/av1.jpg')}}"></div><h6 style="font-size:20px;color:blue;">{{$productImages->id}}</h6></td>
                  <td style="text-align:center;"><h6><img style="width:50px;" src="{{URL::to('img/backend_img/products/small/'.$productImages->image)}}"></h6></td>
                  <td style="text-align:center;"class="center"><a onclick="return confirm('Are you sure ?')" href="{{route('delete.image',[$productImages->id])}}" class="btn btn-danger">Delete</a></td>
                </tr>
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