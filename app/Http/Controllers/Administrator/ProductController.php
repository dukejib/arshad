<?php

namespace App\Http\Controllers\Administrator;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('backend.products.index')
        ->with('products',$products);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->all());
        $this->validate($request,[
            'title' => 'required|min:4',
            'cut_source' => 'required|min:4',
            'best_for' => 'required',
            'description' => 'required',
            'price_per_kg' => 'required|numeric',
            'image' => 'required|image|max:1024',
            'category' => 'required'
        ]);
        //Get The File
        $image = $request->image;
        //Actual Name
        $image_new_name = time(). $image->getClientOriginalName();
        //Move file to Directory
        $image->move( public_path() . '/images/products/' , $image_new_name);
        //Now Save The Data
        $product = new Product();
        $product->title = $request->title;
        $product->cut_source = $request->cut_source;
        $product->best_for = $request->best_for;
        $product->description = $request->description;
        $product->price_per_kg = $request->price_per_kg;
        $product->image = $image_new_name;
        $product->slug = str_slug($request->title);
        $product->category = $request->category;
        $product->save();
        
        Session::flash('success','Product Created');
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('backend.products.show')
        ->with('product' ,Product::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('backend.products.edit')
        ->with('product' ,Product::find($id));
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
        // dd($request);
        // return $request->category;
        $this->validate($request,[
            'title' => 'required|min:4',
            'cut_source' => 'required|min:4',
            'best_for' => 'required',
            'description' => 'required',
            'price_per_kg' => 'required|numeric',
            'category' => 'required'
        ]);
        //Update Product
        $product = Product::find($id);
        //Upload New Image File - If Any
        if($request->hasFile('image')){
            $this->validate($request,[
                'image' => 'required|image|max:1024'
            ]);
            ///Delete old file
            $oldImage = $product->image;
            //Get the file
            $image = $request->image;
            //The Actual name is now this
            $image_new_name =  time() . $image->getClientOriginalName();
            //Save the file in required directory
            $image->move(public_path() . '/images/products/' ,$image_new_name);
            //Set the name for new Image
            $product->image = $image_new_name;
            //basefile name with url
            $basename = public_path() . '/images/products/' . $oldImage;
            //Delete the file from disk
            if(file_exists($basename)){
                unlink($basename);
            }
            // Deleted
            $product->save();
        }
        //Now Save The Product
        $product->title = $request->title;
        $product->cut_source = $request->cut_source;
        $product->best_for = $request->best_for;
        $product->description = $request->description;
        $product->price_per_kg = $request->price_per_kg;
        $product->category = $request->category;
        $product->slug = str_slug($request->title);
        $product->save();

        Session::flash('success','Product Updated');
        return redirect()->route('product.index');
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
        $image = $product->image;

        //basefile name with url
        $basename = public_path() . '/images/products/' . $image;
        if(file_exists($basename)){
            unlink($basename);
        }
        //Now Delete Product
        $product->delete();

        Session::flash('success','Product Deleted');
        return redirect()->back();
    }
}
