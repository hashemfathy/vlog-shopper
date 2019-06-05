@extends('layouts.adminlayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
    <h1>Add Product attributes</h1>
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
            <h5>add product attribute</h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{route('add.attributes',[$product->id])}}" name="add_attributes" id="add_attributes" >
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
                <label class="control-label">Product color</label>
                <label class="control-label"><strong>{{$product->product_color}}</label>
              </div>
              <div class="control-group">
                <label class="control-label"></label>
                <div class="field_wrapper">
                    <div>
                        <input type="hidden" name="product_id" id="product_id"/>
                        <input required type="text" name="sku[]" id="sku" placeholder="SKU"style="width:120px;"/>
                        <input required type="text" name="size[]" id="sku" placeholder="size"style="width:120px;"/>
                        <input required type="text" name="price[]" id="price" placeholder="price"style="width:120px;"/>
                        <input required type="text" name="stock[]" id="stock" placeholder="stock"style="width:120px;"/>
                        <a href="javascript:void(0);" class="add_button icon-plus" title="Add field"></a>
                    </div>
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="add attribute" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>view attributes</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th style="background-color:#DDD9CD;"><h4>Product SKU</h4></th>
                  <th style="background-color:#DDD9CD;"><h4>Product Size</h4></th>
                  <th style="background-color:#DDD9CD;"><h4>Product Price</h4></th>
                  <th style="background-color:#DDD9CD;"><h4>stock</h4></th>
                  <th style="background-color:#DDD9CD;"><h4>Action</h4></th>
                </tr>
              </thead>
              <tbody>
                @foreach($attributes as $attribute)
                <tr class="gradeX">
                  <td ><h6 style="font-size:20px;color:blue;">{{$attribute->sku}}</h6></td>
                  <td style="text-align:center;"><h6>{{$attribute->size}}</h6></td>
                  <td style="text-align:center;"><h6>{{$attribute->price}}</h6></td>
                  <td style="text-align:center;"><h6>{{$attribute->stock}}</h6></td>
                  <td style="text-align:center;"class="center"><a href="#myModal{{$attribute->id}}" data-toggle="modal" class="btn btn-primary">Edit</a> <a onclick="return confirm('Are you sure ?')" href="{{route('delete.attribute',[$attribute->id])}}" class="btn btn-danger">Delete</a></td>
                </tr>
                <!-- ----------edit attribute modal------- -->
                <div id="myModal{{$attribute->id}}" class="modal hide">
                  <div class="modal-header">
                    <button data-dismiss="modal" class="close" type="button">×</button>
                    <h2>{{$product->product_name}}</h2>
                  </div>
                  <div class="modal-body">
                  <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{route('update.attribute',[$attribute->id])}}" name="edit_attribute" id="edit_attribute">
                    @csrf 
                    <div class="control-group">
                        <label class="control-label">SKU</label>
                        <div class="controls">
                        <input required type="text" value="{{$attribute->sku}}"name="attribute_sku" id="attribute_sku">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Size</label>
                        <div class="controls">
                        <input required type="text"value="{{$attribute->size}}" name="attribute_size" id="attribute_size">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Price</label>
                        <div class="controls">
                        <input required type="text"value="{{$attribute->price}}" name="attribute_price" id="attribute_price">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Stock</label>
                        <div class="controls">
                        <textarea required name="stock" id="stock">{{$attribute->stock}}</textarea>
                        </div>
                    </div>
                    <div class="form-actions">
                        <input type="submit" value="Save" class="btn btn-success">
                    </div>
                </form>
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