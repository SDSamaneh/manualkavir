<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\classe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassController extends Controller
{
    public function getClasses($brandId)
{
    $classes = \App\Models\Classe::where('brand_id', $brandId)->get();
    return response()->json($classes);
}

    public function index()
    {
        $role = Auth::user()->role;

        $classes = classe::with('brand')->get();
        return view('dashboard/classe', compact('classes','role'));
    }

    public function create()
    {
        $brands = Brand::all();
        $role = Auth::user()->role;

        return view('dashboard/create-classe', compact('brands','role'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand_id' => 'required|exists:brands,id',
            'name' => 'required|string|max:255',
        ]);

        classe::create([
            'brand_id' => $request->brand_id,
            'name' => $request->name,
        ]);

        return redirect()->route('class.index')->with('success', 'کلاس با موفقیت اضافه شد.');

    }

    public function edit(classe $class)
    {
        $brands = Brand::all();
        return view('class.edit', compact('class', 'brands'));
    }

    public function update(Request $request, classe $class)
    {
        $request->validate([
            'brand_id' => 'required|exists:brands,id',
            'name' => 'required|string|max:255',
        ]);

        $class->update([
            'brand_id' => $request->brand_id,
            'name' => $request->name,
        ]);

        return redirect()->route('class.index')->with('success', 'کلاس بروزرسانی شد.');
    }

    public function destroy(classe $class)
    {
        $class->delete();
        return redirect()->route('class.index')->with('success', 'کلاس حذف شد.');
    }
}
