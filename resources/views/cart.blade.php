@extends('layouts.frontlayout.front_design')
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="row">
            @if (session()->has('flush_success'))
            <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>
                    {!! session()->get('flush_success') !!}
                </strong>
            </div>
            @endif
            @if (session()->has('flush_errors'))
            <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>
                    {!! session()->get('flush_errors') !!}
                </strong>
            </div>
            @endif
            <div class="col-sm-2">
                <div class="left-sidebar">
                    <h2>Category</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="{{route('get.index')}}">All Products</a></h4>
                            </div>
                        </div>
                        @foreach($categories as $category)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="{{route('get.CategoryProducts',[$category->name])}}">{{$category->name}}</a></h4>
                            </div>
                    	</div>
                        @endforeach
                    </div><!--/category-products--> 
                </div>
            </div>
            <div class="col-sm-10 padding-left">
                <div class="table-responsive cart_info">
                    <table class="table table-condensed">
                        <thead>
                            <tr class="cart_menu">
                                <td class="image">Item</td>
                                <td class="description"></td>
                                <td class="price">Price</td>
                                <td class="quantity">Quantity</td>
                                <td class="total">Total</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $totalamount=0; ?>
                            @foreach($userCart as $cart)
                            <tr>
                                <td class="cart_product">
                                    <a href=""><img style="width:100px;"src="{{URL::to('img/backend_img/products/small/'.$cart->image)}}" alt=""></a>
                                </td>
                                <td class="cart_description">
                                    <h4><a style="margin-left:40px;" href="">{{$cart->product_name}}</a></h4>
                                    <p style="margin-left:40px;">Code: {{$cart->product_code}}</p>
                                    <p style="margin-left:40px;">Sku: {{$cart->size}}</p>

                                </td>
                                <td class="cart_price">
                                    <p>${{$cart->price}}</p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <input id="qtyId"type="hidden"value="{{$cart->id}}">
                                        <input id="stockQty"type="hidden"value="{{$cart->stock}}">
                                        @if($cart->quantity<$cart->stock)
                                        <a class="cart_quantity_up" id="qtyIncrement" href="{{ url('/cart/update-quantity/'.$cart->id.'/1')}}"> + </a>
                                        @endif
                                        <input class="cart_quantity_input" id="qtyCart" type="number" name="quantity" value="{{$cart->quantity}}" autocomplete="off" min="1" max="{{$cart->stock}}"size="2">
                                        <span id="errorMsg" style="display:none;">quantity is not available !</span>
                                        @if($cart->quantity>1)
                                        <a class="cart_quantity_down" id="qtyDecrement" href="{{ url('/cart/update-quantity/'.$cart->id.'/-1')}}"> - </a>
                                        @endif
                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">${{$cart->price * $cart->quantity}}</p>
                                </td>
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete" href="{{route('delete.productCart',[$cart->id])}}"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                            <?php $totalamount=$totalamount+($cart->price * $cart->quantity); ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        	</div>
		</div>
	</div>
</section>
<section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>What would you like to do next?</h3>
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="chose_area">
                    <ul class="user_option">
                        <li>
                            <input type="checkbox">
                            <label>Use Coupon Code</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Use Gift Voucher</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Estimate Shipping & Taxes</label>
                        </li>
                    </ul>
                    <ul class="user_info">
                        <li class="single_field">
                            <label>Country:</label>
                            <select>
                                <option>United States</option>
                                <option>Bangladesh</option>
                                <option>UK</option>
                                <option>India</option>
                                <option>Pakistan</option>
                                <option>Ucrane</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>
                            
                        </li>
                        <li class="single_field">
                            <label>Region / State:</label>
                            <select>
                                <option>Select</option>
                                <option>Dhaka</option>
                                <option>London</option>
                                <option>Dillih</option>
                                <option>Lahore</option>
                                <option>Alaska</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>
                        
                        </li>
                        <li class="single_field zip-field">
                            <label>Zip Code:</label>
                            <input type="text">
                        </li>
                    </ul>
                    <a class="btn btn-default update" href="">Get Quotes</a>
                    <a class="btn btn-default check_out" href="">Continue</a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Total <span>$<?php echo $totalamount ?></span></li>
                    </ul>
                        <a class="btn btn-default update" href="">Update</a>
                        <a class="btn btn-default check_out" href="">Check Out</a>
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->
@endsection