@extends('layouts.adminlayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
    <h1>Add Coupon</h1>
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
            <h5>add coupon</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{route('add.Coupon')}}" name="add_coupon" id="add_coupon">
            @csrf 
              <div class="control-group">
                <label class="control-label">coupon Code</label>
                <div class="controls">
                  <input type="text" name="coupon_code" id="coupon_code" required minlength="5" maxlength="15">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">amount</label>
                <div class="controls">
                  <input type="number" name="amount" id="amount" required min='1'>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Amount Type</label>
                <div class="controls"style="width:15%;">
                  <select name="amount_type" id="amount_type">
                    <option name="selection"value="Percentage">Percentage</option>
                    <option name="selection"value="Fixed">Fixed</option>
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Expiry Date</label>
                <div class="controls">
                  <input type="date" name="expiry_date" id="expiry_date" required min=date>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Enable</label>
                <div class="controls">
                  <input type="hidden"   name="status" value="0" />
                  <input type="checkbox" name="status" value="1" id="status">
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="add Coupon" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
