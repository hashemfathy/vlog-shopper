@extends('layouts.adminlayout.admin_design')
@section('content')
<div id="content">
    <div id="content-header">
        <h1>Categories</h1>
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
            <div class="widget-title"> <span class="icon"> <i class="icon-plus-sign"></i> </span>
               <a type="submit" style="height:75%;" href="{{route('getadd.category')}}" id="addcategorybutton"class="btn btn-primary">Add Category</a>
            </div>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
            <thead>
                <tr>
                <th style="background-color:#DDD9CD;"><h4>Category Name</h4></th>
                <th style="background-color:#DDD9CD;"><h4>Description</h4></th>
                <th style="background-color:#DDD9CD;"><h4>URL</h4></th>
                <th style="background-color:#DDD9CD;"><h4>Action</h4></th>
                </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr class="gradeX">
                <td ><div class="user-thumb"> <img width="40" height="40" alt="User" src="{{URL::to('img/backend_img/demo/av1.jpg')}}"></div><h6 style="font-size:20px;color:blue;">{{$category->name}}</h6></td>
                  <td style="text-align:center;"><h6>{{$category->description}}</h6></td>
                  <td style="text-align:center;"><h6><a>{{$category->url}}</a></h6></td>
                  <td style="text-align:center;"class="center"><a href="{{route('get.products',[$category->id])}}" class="btn btn-success">view products</a> <a href="{{route('getedit.category',[$category->id])}}" class="btn btn-primary">Edit</a> <a onclick="return confirm('Are you sure ?')" href="{{route('delete.category',[$category->id])}}" class="btn btn-danger">Delete</a></td>
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