<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use Session;
use Image;
use App\Product;
use App\Category;
use App\ProductsAttribute;
use App\Products_image;
use App\Cart;
use Input;

class ProductsController extends Controller
{
    public function getProducts(Category $category){
        $products = Product::where(['category_id'=>$category->id])->get();
        return view('admin.products.view-product',['products'=>$products,'category'=>$category]);
    }
    public function getAddProduct(){
        $categories=Category::where(['parent_id'=>0])->get();

        return view('admin.products.add-product',['categories'=>$categories]);
    }
    public function addProduct(Request $request){
        $product= new Product;
        $data=$request->all();
        $product->category_id=$request->category_id;
        $product->product_name=$request->product_name;
        $product->product_code=$request->product_code;
        $product->product_color=$request->product_color;
        $product->description=$request->description;
        $product->price=$request->product_price;
        // upload image
        if($request->hasFile('product_image')){
            $image_tmp = Input::file('product_image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename=rand(111,99999).'.'.$extension;
                $large_image_path='img/backend_img/products/large/'.$filename;
                $medium_image_path='img/backend_img/products/medium/'.$filename;
                $small_image_path='img/backend_img/products/small/'.$filename;
                // Resize Images
                Image::make($image_tmp)->save($large_image_path);
                Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                Image::make($image_tmp)->resize(300,300)->save($small_image_path);
               // Store image name in products table
               $product->image = $filename; 
            }
        }
        $product->save();
        
        return redirect()->route('get.products',[$request->category_id])->with('flush_errors','product added successfully');
    }
    public function getEditProduct(Product $product){
        $categories=Category::where(['parent_id'=>0])->get();
        return view('admin.products.edit-product',['product'=>$product,'categories'=>$categories]);
    }
    public function updateProduct(Request $request,$id){
        $product=Product::find($id);
        $data=$request->all();
        $product->category_id=$request->category_id;
        $product->product_name=$request->product_name;
        $product->product_code=$request->product_code;
        $product->product_color=$request->product_color;
        $product->description=$request->description;
        $product->price=$request->product_price;
        // upload image
        if($request->hasFile('product_image')){
            $image_tmp = Input::file('product_image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename=rand(111,99999).'.'.$extension;
                $large_image_path='img/backend_img/products/large/'.$filename;
                $medium_image_path='img/backend_img/products/medium/'.$filename;
                $small_image_path='img/backend_img/products/small/'.$filename;
                // Resize Images
                Image::make($image_tmp)->save($large_image_path);
                Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                Image::make($image_tmp)->resize(300,300)->save($small_image_path);
               // Store image name in products table
               $product->image = $filename; 
            }
        }
        $product->update();
        return redirect()->route('get.products',[$request->category_id])->with('flush_errors','product updated successfully');
    }
    public function deleteProduct($id){
        $product=Product::find($id);
        $product->delete();
        return redirect()->back()->with('flush_errors','Product deleted successfully');
    }
    public function getAddAttributes($id){
        $product = Product::where('id',$id)->first();
        $attributes = ProductsAttribute::where('product_id',$id)->get();
        // echo ($attributes);die;
        
        return view('admin.products.add-attributes',['product'=>$product ,'attributes'=>$attributes]);
    }
    public function addAttributes(Request $request,$id){
        $data = $request->all();
        foreach($data['sku'] as $key=>$val ){
            if(!empty($val)){
                $attribute=new ProductsAttribute;
                $attribute->product_id = $id;
                $attribute->sku = $val;
                $attribute->size = $data['size'][$key];
                $attribute->price = $data['price'][$key];
                $attribute->stock = $data['stock'][$key];
                $attribute->save();
            }
        }
        return redirect()->back()->with('flush_errors','attributes added successfully');
    }
    public function updateAttribute(Request $request,$id){
        $attribute=ProductsAttribute::find($id);
        $attribute->sku=$request->attribute_sku;
        $attribute->size=$request->attribute_size;
        $attribute->price=$request->attribute_price;
        $attribute->stock=$request->stock;
        $attribute->update();
        return redirect()->back()->with('flush_errors','Attribute updated successfully');

    }
    public function deleteAttribute($id){
        $attribute=ProductsAttribute::find($id);
        $attribute->delete();
        return redirect()->back()->with('flush_errors','Attribute deleted successfully');
    }
    public function products($categoryname){
        $countcategory=Category::where('name',$categoryname)->count();
        if($countcategory==0){
            abort(404);
        }
        $category=Category::where('name',$categoryname)->first();
        $categories=Category::get();
        $products=Product::where('category_id',$category->id)->get();
        return view('category-products',['category'=>$category,'products'=>$products ,'categories'=>$categories]);

    }
    public function getDetails($id){
        $productDetails=Product::where('id',$id)->first();
        $attributes=ProductsAttribute::where('product_id',$id)->get();
        $productImages=Products_image::where('product_id',$id)->get();
        $categories=Category::get();
        $recommendedProducts=Product::where('id','!=',$id)->where('category_id',$productDetails->category_id)->get();
        $sumOfProducts=ProductsAttribute::where('product_id',$id)->sum('stock');
        return view('product-details',['productDetails'=>$productDetails,'recommendedProducts'=>$recommendedProducts,'categories'=>$categories,'attributes'=>$attributes,'productImages'=>$productImages,'sumOfProducts'=>$sumOfProducts]);
    }
    public function getProductPrice(Request $request){
        $attribute=ProductsAttribute::where('sku',$request->attributesSku)->first();

        return $attribute->price;
    }
    public function getAddImages( $id ){
        $product = Product::where('id',$id)->first();
        $attributes = ProductsAttribute::where('product_id',$id)->get();
        $productImages=Products_image::where('product_id',$id)->get();

        return view('admin.products.add-images',['product'=>$product ,'attributes'=>$attributes,'productImages'=>$productImages]);

    }
    public function addImages(Request $request, $id){
        $data=$request->all();
        if($request->hasFile('product_image')){
            $files = $request->file('product_image');
            foreach($files as $file){
                $image = new Products_image;
            $extension = $file->getClientOriginalExtension();
            $filename=rand(111,99999).'.'.$extension;
            $large_image_path='img/backend_img/products/large/'.$filename;
            $medium_image_path='img/backend_img/products/medium/'.$filename;
            $small_image_path='img/backend_img/products/small/'.$filename;
            // Resize Images
            Image::make($file)->save($large_image_path);
            Image::make($file)->resize(600,600)->save($medium_image_path);
            Image::make($file)->resize(300,300)->save($small_image_path);
            // Store image name in products table
            $image->image = $filename;
            $image->product_id = $id;
            $image->save();
            }
        }
        return redirect()->back()->with('flush_errors','images added successfully');
    }
    public function deleteImage($id){
        $productImage=Products_image::find($id);
        $productImage->delete();
        return redirect()->back()->with('flush_errors','Image deleted successfully');
    }
    public function addTocart(Request $request){
        if(empty($request->user_email)){
            $request->user_email='';
        }
        $session_id = Session::get('session_id');
        if(empty($session_id)){
            $session_id=Str::random(40);
            Session::put('session_id',$session_id);
        }
        $countProduct=Cart::where(['product_id'=>$request->product_id],['product_color'=>$request->product_color],['session_id'=>$session_id])->count();
        if($countProduct>0){
            return redirect()->back()->with('flush_errors','Product already in Cart !');
        }else{
            $cart = new Cart ;
            $cart->product_id = $request->product_id;
            $cart->product_name = $request->product_name;
            $cart->product_code = $request->product_code;
            $cart->product_color = $request->product_color;
            $cart->size = $request->product_sku;
            $cart->price = $request->price;
            $cart->quantity = $request->quantity;
            $cart->user_email = $request->user_email;
            $cart->session_id = $session_id;
            $cart->save();
            return redirect('cartProducts')->with('flush_success','Products has been added in Cart !');
        }
    }
    public function cartProducts(){
        $categories=Category::get();
        $session_id = Session::get('session_id');
        $userCart = Cart::where('session_id',$session_id)->get();
        foreach($userCart as $key=>$product){
            $productDetails = Product::where('id',$product->product_id)->first();
            $productQty=ProductsAttribute::where(['product_id'=>$product->product_id,'sku'=>$product->size])->first()->stock;
            $userCart[$key]->image = $productDetails->image;
            $userCart[$key]->stock=$productQty;
        }
        return view('cart',)->with(compact('userCart','categories'));
    }
    public function deleteCartProduct($id){
        $cartProduct=Cart::find($id);
        $cartProduct->delete();
        return redirect()->back()->with('flush_success','Item deleted successfully');
    }
    public function updateCartQuantity($id,$quantity){
            $quantity=Cart::where('id',$id)->increment('quantity',$quantity);
            return redirect()->back();
        
        
    }
}
