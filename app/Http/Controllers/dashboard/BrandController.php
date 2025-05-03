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
        return view('dashboard/create-brand', compact('role'));
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

        return $brands ? redirect()->route('brand.index')->with('success', '  برند با موفقیت ثبت شد') :  redirect()->route('brand.index')->with('error', 'خطایی رخ داده است');
    }


    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $role = Auth::user()->role;
        $brand = Brand::find($id);
        return $brand ? view('dashboard/edit-brand', compact(['brand', 'role'])) : redirect()->route('brand.index')->with('error', ' برند مورد نظر پیدا نشد.');
    }

    public function update(Request $request, string $id)
    {
        $brand = Brand::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255|unique:brands,name,' . $brand->id,
            'slug' => 'required|string|unique:brands,slug,' . $brand->id,
            'thumbnail' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
        ]);

        $data = [
            'name' => $request->name,
            'slug' => $request->slug,
        ];

        if ($request->hasFile('thumbnail')) {
            // حذف عکس قبلی
            if ($brand->thumbnail && file_exists(public_path('storage/' . $brand->thumbnail))) {
                unlink(public_path('storage/' . $brand->thumbnail));
            }

            // ذخیره عکس جدید
            $path = $request->file('thumbnail')->store('images/brands', 'public');
            $data['thumbnail'] = $path;
        }

        $brand->update($data);

        return redirect()->route('brand.index')->with('success', 'برند با موفقیت بروزرسانی شد.');
    }


    public function destroy(string $id)
    {
        $brand = Brand::findOrFail($id);

        // حذف فایل عکس
        if ($brand->thumbnail && file_exists(public_path('storage/' . $brand->thumbnail))) {
            unlink(public_path('storage/' . $brand->thumbnail));
        }

        $brandDestroy = $brand->delete();

        return $brandDestroy
            ? redirect()->route('brand.index')->with('success', 'برند با موفقیت حذف شد.')
            : redirect()->route('brand.index')->with('error', 'خطایی در حذف برند رخ داده است.');
    }
}
