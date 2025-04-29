<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Requests\dashboard\category\StoreUpdateCategory;
use Illuminate\Support\Facades\Auth;


class BrandController extends Controller
{


    public function getClasses($brandId)
    {
        $classes = \App\Models\Classe::where('brand_id', $brandId)
            ->pluck('name', 'id');

        return response()->json($classes);
    }

    public function index()
    {
        $role = Auth::user()->role;

        $brands = Brand::all();
        return view('dashboard/brand', compact('brands', 'role'));
    }

    public function create()
    {
        $role = Auth::user()->role;

        return view('dashboard/create-brand',compact('role'));
    }

    public function store(StoreUpdateCategory $request)
    {
        $brands = $request->validated();
        if ($request->hasFile('thumbnail')) {

            $file = $request->file('thumbnail');
            $imagePath = $file->store('images/brands', 'public');

            $brands['thumbnail'] = $imagePath;
        }

        $brands = Brand::create($brands);

        return $brands ? redirect()->route('brand.index')->with('success', 'دسته بندی شما با موفقیت ثبت شد') :  redirect()->route('brand.index')->with('error', 'خطایی رخ داده است');
    }


    public function show(string $id)
    {
        //
    }


    public function edit(Brand $brand)
    {
        return view('brand.edit', compact('brand'));
    }

    public function update(Request $request,  Brand $brand)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $brand->update([
            'name' => $request->name,
        ]);

        return redirect()->route('brand.index')->with('success', 'برند با موفقیت بروزرسانی شد.');
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('brand.index')->with('success', 'برند حذف شد.');
    }
}
