<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductImage;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->get();
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required | unique:products',
            'category_id' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image[]' => 'nullable|image'

        ],
        [
            'name.unique' => 'Please provide a Unique name',
        ]

            );

        $product = new Product();

        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->brand_id = 1;
        $product->slug = Str::slug($product->name);
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->admin_id = 1;
        $product->save();


        $image = $request->image;



        if (isset($image)){
            if (count($image) > 0){
                foreach ($image as $img){
                    $currentdate = Carbon::now()->toDateString();
                    $slug = $product->slug;
                    $imageName = $slug.'-'.$currentdate.'-'.uniqid().'.'.$img->getClientOriginalExtension();
                    // Check Category directory is exists
                    if (!Storage::disk('public')->exists('products'))
                    {
                        Storage::disk('public')->makeDirectory('products');
                    }
                    $productImage = Image::make($img)->resize(800,800)->stream();
                    Storage::disk('public')->put('products/'.$imageName,$productImage);

                    $productImage = new ProductImage();
                    $productImage->product_id = $product->id;
                    $productImage->image = $imageName;
                    $productImage->save();
                }
            }
        }else{
            $imageName = "default.png";
            $productImage = new ProductImage();
            $productImage->product_id = $product->id;
            $productImage->image = $imageName;
            $productImage->save();
        }

        Toastr::success('Product Successfully Saved', 'Success');
        return redirect()->route('admin.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image[]' => 'nullable|image'

        ],
            [
                'name.unique' => 'Please provide a Unique name',
            ]

        );

        $product = Product::find($id);

        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->brand_id = 1;
        $product->slug = Str::slug($product->name);
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->admin_id = 1;
        $product->save();


        $image = $request->image;

        if (isset($image)){
            if (count($image) > 0){
                foreach ($image as $img){
                    $currentdate = Carbon::now()->toDateString();
                    $slug = $product->slug;
                    $imageName = $slug.'-'.$currentdate.'-'.uniqid().'.'.$img->getClientOriginalExtension();
                    // Check Category directory is exists
                    if (!Storage::disk('public')->exists('products'))
                    {
                        Storage::disk('public')->makeDirectory('products');
                    }
                    if (Storage::disk('public')->exists('products/'.$img->image));
                    {
                        Storage::disk('public')->delete('products/'.$img->image);
                    }
                    $productImage = Image::make($img)->resize(800,800)->stream();
                    Storage::disk('public')->put('products/'.$imageName,$productImage);




                    $productImage = ProductImage::find($img->id);
                    $productImage->product_id = $product->id;
                    $productImage->image = $imageName;
                    $productImage->save();
                }
            }
        }else{
//            $imageName = "default.png";
//            $productImage = ProductImage::find($image);
//            $productImage->product_id = $product->id;
//            $productImage->image = $imageName;
//            $productImage->save();
        }

        Toastr::success('Product Successfully Saved', 'Success');
        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        foreach($product->images as $image){
            if (Storage::disk('public')->exists('products/'.$image->image));
            {
                Storage::disk('public')->delete('products/'.$image->image);
            }
        }

        $product->delete();
        Toastr::success('Product Successfully Deleted', 'Success');
        return redirect()->back();

    }
}
