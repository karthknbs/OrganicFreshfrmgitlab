<?php

namespace App\Http\Controllers\Admin;

use App\Categoryy;
use App\Http\Requests\Product\ProductStore;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Contracts\Database\QueryException;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Categoryy::get();
        $products = Product::where('Active','=',1)->orderBy('created_at','DESC')->get();
        return view('Admin.products',compact('products','category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStore $request)
    {
        return "hi";

      /*  try{
            if($request->file('image')->isValid()){
                $path = $request->file('image')->store('public/images');
                $path = str_replace('public/images/', '', $path);
              // print_r($request->get('category_id'));
                $data = [
                    'product_name' =>$request->get('product_name'),
                    'category_id'  =>$request->get('category_id'),
                    'image'    =>$path,
                    'active'  =>$request->get('active'),
                    'quantity' =>$request->get('quantiy'),
                    'price'  =>$request->get('price'),
                    'unit'  =>$request->get('unit')
                ];
                try{
                    Product::create($data);
                }catch (FileException $exception){
                    return response()->json($exception->getMessage());
                }
            }

        }
        catch (FileException $exception){
            return response()->json($exception->getMessage());
        }
        Session::flash('message', 'Inserted Successfully');
        return redirect()->back();*/
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
