@extends('layouts.adminlayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
    <h1>Coupons</h1>
  </div>
  @if (session()->has('flush_success'))
  <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>{!! session()->get('flush_success') !!}</strong>
  </div>
  @endif
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-plus-sign"></i> </span>
            <a type="submit" style="height:75%;" href="{{route('get.addCoupon')}}" id="addcouponbutton"class="btn btn-primary">Add coupon</a>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th style="background-color:#DDD9CD;"><h4>coupon code</h4></th>
                  <th style="background-color:#DDD9CD;"><h4>Amount</h4></th>
                  <th style="background-color:#DDD9CD;"><h4>Amount type</h4></th>
                  <th style="background-color:#DDD9CD;"><h4>Expiry date</h4></th>
                  <th style="background-color:#DDD9CD;"><h4>created date</h4></th>
                  <th style="background-color:#DDD9CD;"><h4>status</h4></th>
                  <th style="background-color:#DDD9CD;"><h4>Action</h4></th>

                </tr>
              </thead>
              <tbody>
                @foreach($coupons as $coupon)
                <tr class="gradeX">
                  <td ><div class="user-thumb"> <img width="40" height="40" alt="User" src="{{URL::to('img/backend_img/demo/av1.jpg')}}"></div><h6 style="font-size:20px;color:blue;">{{$coupon->coupon_code}}</h6></td>
                  <td style="text-align:center;"><h6>{{$coupon->amount}}@if($coupon->amount_type=="Percentage") % @else $ @endif</h6></td>
                  <td style="text-align:center;"><h6>{{$coupon->amount_type}}</h6></td>
                  <td style="text-align:center;"><h6>{{$coupon->expiry_date}}</h6></td>
                  <td style="text-align:center;"><h6>{{$coupon->created_at}}</h6></td>
                  <td style="text-align:center;background-color:#ef5356;<?php if($coupon->status==1){?>background-color:#28B779;<?php }?> "><h6>@if($coupon->status==1)Active @else Inactive @endif</h6></td>
                  <td style="text-align:center;"class="center"><a href="" class="btn btn-primary">Edit</a> <a onclick="return confirm('Are you sure ?')" href="" class="btn btn-danger">Delete</a></td>
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