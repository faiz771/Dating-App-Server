<?php

namespace App\Http\Controllers;

use App\Models\PackageCategory;
use Illuminate\Http\Request;
use App\Http\Requests\StorePackageCategoryRequest;
use App\Http\Requests\UpdatePackageCategoryRequest;

class PackageCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $package_cats = PackageCategory::all();
        $n = 1;
        return view('admin.packages.pkg_cat.index',compact('package_cats','n'));
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
     * @param  \App\Http\Requests\StorePackageCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePackageCategoryRequest $request)
    {
        $State = PackageCategory::create([
            'name' => $request->input('name'),                                              
            'status' => 0,                      
        ]);

        return redirect()->route('pkg_cat.index')->with('success','Package Category has been Added.!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PackageCategory  $packageCategory
     * @return \Illuminate\Http\Response
     */
    public function show(PackageCategory $packageCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PackageCategory  $packageCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $category = PackageCategory::findOrFail($request->id);
       
        $data['cat_name'] = $category->name;
        $data['cat_id'] = $category->id;
        return response()->json($data);  
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePackageCategoryRequest  $request
     * @param  \App\Models\PackageCategory  $packageCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $category = PackageCategory::findOrFail($request->id);
        $category->update([
            'name' => $request->name,
        ]);

        $data = "successfully";
        return response()->json($data);  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PackageCategory  $packageCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($val)
    {
        $State = PackageCategory::findorFail($val)->delete();
        return back()->with('delete','Package Category deleted successfully');
    }
}
