@extends('layouts.adminlayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
    <h1>Add Product</h1>
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
            <h5>add product</h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{route('add.product')}}" name="add_product" id="add_product" novalidate="novalidate">
            @csrf 
              <div class="control-group">
                <label class="control-label">Select Category</label>
                <div class="controls"style="width:15%;">
                  <select name="category_id">
                    @foreach($categories as $category)
                    <option name="selection"value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Product Name</label>
                <div class="controls">
                  <input type="text" name="product_name" id="product_name">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Product code</label>
                <div class="controls">
                  <input type="text" name="product_code" id="product_code">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Product color</label>
                <div class="controls">
                  <input type="text" name="product_color" id="product_color">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Description</label>
                <div class="controls">
                  <textarea name="description" id="description"></textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Price</label>
                <div class="controls">
                  <input type="text" name="product_price" id="product_price">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Image</label>
                <div class="controls">
                  <input name="product_image"id="product_image"type="file" />
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="add product" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection