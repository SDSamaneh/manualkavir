<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\MotorModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MotorModelController extends Controller
{

    public function getModels($classId)
    {
        // گرفتن مدل‌ها با classe_id مشخص
        $motormodels = \App\Models\MotorModel::where('classe_id', $classId)
            ->pluck('name', 'id');

        return response()->json($motormodels);
    }

    public function index()
    {
        // دریافت تمام مدل‌ها با برند و کلاس مربوط به هر مدل
        $motormodels = MotorModel::with('brand', 'classe')->get();

        // شمارش کل مدل‌ها
        $modelsCount = MotorModel::count();
        $role = Auth::user()->role;

        // بازگشت به نما
        return view('dashboard/motormodel', compact('motormodels', 'modelsCount','role'));
    }

    public function create()
    {
        $brands = Brand::all();
        $role = Auth::user()->role;

        return view('dashboard/create-motorModel', compact('brands','role'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand_id' => 'required|exists:brands,id',
            'classe_id' => 'required|exists:classes,id',
            'name' => 'required|string|max:255',
        ]);

        MotorModel::create([
            'brand_id' => $request->brand_id,
            'classe_id' => $request->classe_id,
            'name' => $request->name,
        ]);

        return redirect()->route('motormodel.index')->with('success', 'مدل با موفقیت اضافه شد.');
    }

    public function edit(motormodel $motormodel)
    {
        $brands = Brand::all();
        $motormodels = MotorModel::all();
        return view('motormodel.edit', compact('motormodels', 'brands'));
    }

    public function update(Request $request, motormodel $motormodel)
    {
        $request->validate([
            'brand_id' => 'required|exists:brands,id',
            'classe_id' => 'required|exists:classes,id',
            'name' => 'required|string|max:255',
        ]);

        $motormodel->update([
            'brand_id' => $request->brand_id,
            'classe_id' => $request->classe_id,
            'name' => $request->name,
        ]);

        return redirect()->route('motormodel.index')->with('success', 'مدل بروزرسانی شد.');
    }

    public function destroy(motormodel $motormodel)
    {
    
    }
}
