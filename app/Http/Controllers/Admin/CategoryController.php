<?php

namespace App\Http\Controllers\Admin;
use Session;
use App\Categoryy;
use App\Http\Requests\Category\categorystore;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Database\QueryException;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Categoryy::where('Active','=',1)->orderBy('created_at','DESC')->get();
        return view('Admin.category',compact('category'));
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
    public function store(categorystore $request)
    {
        try{
           if($request->file('image')->isValid()){
                $path = $request->file('image')->store('public/images');
                $path = str_replace('public/images/', '', $path);
               // print_r($path);
                $data = [
                    'category_name' =>$request->get('category_name'),
                    'image'    =>$path,
                    'active'  =>$request->get('active')
                ];
                try{
                    Categoryy::create($data);
                }catch (FileException $exception){
                    return response()->json($exception->getMessage());
                }
            }

        }
        catch (FileException $exception){
            return response()->json($exception->getMessage());
        }
        Session::flash('message', 'Inserted Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Categoryy::find($id);
        return view('Admin.editCategory',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      // return $id;

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
