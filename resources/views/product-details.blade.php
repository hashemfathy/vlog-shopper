@extends('layouts.frontlayout.front_design')
@section('content')
<section>
    <div class="container">
        <div class="row">
			@if (session()->has('flush_errors'))
            <div class="alert alert-error alert-block"style="background-color:#F7ADAD;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>
                    {!! session()->get('flush_errors') !!}
                </strong>
            </div>
            @endif
            <div class="col-sm-3">
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
            <div class="col-sm-9 padding-right">
				<div class="product-details"><!--product-details-->
					<div class="col-sm-5">
						<div class="view-product">
							<img class="mainImage" src="{{URL::to('img/backend_img/products/medium/'.$productDetails->image)}}" alt="" />
						</div>
						<div id="similar-product" class="carousel slide" data-ride="carousel">
							
							<!-- Wrapper for slides -->
							<div class="carousel-inner">
								<div class="item active">
									<img class="changeImage"  style="width:75px;cursor:pointer;" src="{{URL::to('img/backend_img/products/medium/'.$productDetails->image)}}" alt="" />
									@foreach($productImages as $productImages)
									<img class="changeImage" style="width:75px;"src="{{URL::to('img/backend_img/products/small/'.$productImages->image)}}" alt="">
									@endforeach
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-7">
						<form name="addtocartForm" id="addtocartForm" method="post" action="{{route('add.cart')}}">@csrf
							<input type="hidden" name="product_id" value="{{$productDetails->id}}">
							<input type="hidden" name="product_name" value="{{$productDetails->product_name}}">
							<input type="hidden" name="product_code" value="{{$productDetails->product_code}}">
							<input type="hidden" name="product_color" value="{{$productDetails->product_color}}">
							<input type="hidden" name="price" id="price" value="{{$productDetails->price}}">
							<div class="product-information"><!--/product-information-->
								<img src="{{URL::to('img/frontend_img/product-details/new.jpg')}}" class="newarrival" alt="" />
								<h2>{{$productDetails->product_name}}</h2>
								<p>Code: {{$productDetails->product_code}}</p>
								<p> 
									Size/color:  <select style="width:35%;" id="product_sku" name="product_sku">
												@foreach($attributes as $attributes)
												<option value="{{$attributes->sku}}">{{$attributes->sku}}</option>
												@endforeach
											</select>
								</p>
								<span>
									<span id="productPrice">US ${{$productDetails->price}}</span>
									<label>Quantity:</label>
									<input type="number" name="quantity" min="1" max="{{$attributes->stock}}" />
									@if($sumOfProducts>0)
									<button type="submit" class="btn btn-fefault cart" id="cartButton">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
									@endif
								</span>
								<p><b>Availability:</b>@if($sumOfProducts>0) In Stock @else Out of Stock @endif</p>
								<p><b>Condition:</b> New</p>
							</div><!--/product-information-->
						</form>
					</div>
				</div><!--/product-details-->
				<div class="category-tab shop-details-tab"><!--category-tab-->
					<div class="col-sm-12">
						<ul class="nav nav-tabs">
							<li><a href="#details" data-toggle="tab">Details</a></li>
							<li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
							<li><a href="#tag" data-toggle="tab">Tag</a></li>
							<li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
						</ul>
					</div>
					<div class="tab-content">
						<div class="tab-pane fade" id="details" >
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{URL::to('img/frontend_img/home/gallery1.jpg')}}" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{URL::to('img/frontend_img/home/gallery2.jpg')}}" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{URL::to('img/frontend_img/home/gallery3.jpg')}}" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{URL::to('img/frontend_img/home/gallery4.jpg')}}" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="tab-pane fade" id="companyprofile" >
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{URL::to('img/frontend_img/home/gallery1.jpg')}}" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{URL::to('img/frontend_img/home/gallery3.jpg')}}" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{URL::to('img/frontend_img/home/gallery2.jpg')}}" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{URL::to('img/frontend_img/home/gallery4.jpg')}}" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="tab-pane fade" id="tag" >
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{URL::to('img/frontend_img/home/gallery1.jpg')}}" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{URL::to('img/frontend_img/home/gallery2.jpg')}}" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{URL::to('img/frontend_img/home/gallery3.jpg')}}" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{URL::to('img/frontend_img/home/gallery4.jpg')}}" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="tab-pane fade active in" id="reviews" >
							<div class="col-sm-12">
								<ul>
									<li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
									<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
									<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
								</ul>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
								<p><b>Write Your Review</b></p>
								
								<form action="#">
									<span>
										<input type="text" placeholder="Your Name"/>
										<input type="email" placeholder="Email Address"/>
									</span>
									<textarea name="" ></textarea>
									<b>Rating: </b> <img src="{{URL::to('img/frontend_img/product-details/rating.png')}}" alt="" />
									<button type="button" class="btn btn-default pull-right">
										Submit
									</button>
								</form>
							</div>
						</div>
						
					</div>
				</div><!--/category-tab-->	
				<div class="recommended_items"><!--recommended_items-->
					<h2 class="title text-center">recommended items</h2>
					<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">
							<?php $count=1; ?>
							@foreach($recommendedProducts->chunk(3) as $chunk)
							<div <?php if($count==1){ ?> class="item active" <?php }else{ ?> class="item" <?php } ?>>	
								@foreach($chunk as $item)
								<div class="col-sm-4">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{URL::to('img/backend_img/products/small/'.$item->image)}}" alt="" />
												<h2>${{$item->price}}</h2>
												<p>{{$item->product_name}}</p>
												<a href="{{route('get.details',[$item->id])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							<?php $count++; ?>
							@endforeach
						</div>
							<a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							</a>
							<a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							</a>			
						</div>
					</div><!--/recommended_items-->
				</div>
        	</div>
		</div>
	</div>
</section>
@endsection