<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;

use App\Models\classe;
use App\Models\Brand;
use App\Models\Manual;
use App\Models\motormodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ManualsController extends Controller
{
    public function getClasses(Brand $brand)
    {
        $classes = $brand->classes()->pluck('name', 'id');
        return response()->json($classes);
    }

    public function getModels(Classe $class)
    {
        $motormodels = $class->motormodels()->pluck('name', 'id');
        return response()->json($motormodels);
    }

    public function index()
    {
        // دریافت برندها به همراه کلاس‌ها و مدل‌های موتور و راهنماها
        $brands = Brand::with(['classes.motormodels.manuals'])->get();
        $manualaccount = Manual::count();
        // دریافت تمامی کلاس‌ها و مدل‌ها و راهنماها
        $classes = Classe::all();
        $motormodels = MotorModel::all();
        $manuals = Manual::all();
        $role = Auth::user()->role;

        return view('dashboard.allManual', compact('brands', 'classes', 'motormodels', 'manuals', 'role', 'manualaccount'));
    }


    public function create()
    {
        $brands = Brand::all();
        $classe = classe::all();
        $models = motormodel::all();
        $role = Auth::user()->role;

        return view('dashboard/create-manual', compact('classe', 'brands', 'models', 'role'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'brand_id' => 'required|exists:brands,id',
            'classe_id' => 'required|exists:classes,id',
            'motormodel_id' => 'required|exists:motormodels,id',
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:manuals,slug',
            'year' => 'required|integer',
            'urlkavir' => 'nullable|url',
            'urlother' => 'nullable|url',
            'urlnetwork' => 'nullable|url',
            'fileCoc' => 'nullable|file|mimes:pdf,docx|max:10240',
            'userGuideFa' => 'nullable|file|mimes:pdf,docx|max:10240',
            'userGuideEn' => 'nullable|file|mimes:pdf,docx|max:10240',
            'repairGuideFa' => 'nullable|file|mimes:pdf,docx|max:10240',
            'repairGuideEn' => 'nullable|file|mimes:pdf,docx|max:10240',
            'partsGuide' => 'nullable|file|mimes:pdf,docx|max:10240',
            'pdi' => 'nullable|file|mimes:pdf,docx|max:10240',
            'periodicService' => 'nullable|file|mimes:pdf,docx|max:10240',
            'Bulletin1' => 'nullable|file|mimes:pdf,docx|max:10240',
            'Bulletin2' => 'nullable|file|mimes:pdf,docx|max:10240',
            'Bulletin3' => 'nullable|file|mimes:pdf,docx|max:10240',
            'Bulletins' => 'nullable|file|mimes:pdf,docx|max:10240',
        ]);

        $data = [
            'brand_id' => $validated['brand_id'],
            'classe_id' => $validated['classe_id'],
            'motormodel_id' => $validated['motormodel_id'],
            'title' => $validated['title'],
            'slug' => $validated['slug'],
            'year' => $validated['year'],
            'urlkavir' => $validated['urlkavir'] ?? null,
            'urlother' => $validated['urlother'] ?? null,
            'urlnetwork' => $validated['urlnetwork'] ?? null
        ];


        // آپلود فایل ها
        $fileFields = [
            'fileCoc',
            'userGuideFa',
            'userGuideEn',
            'repairGuideFa',
            'repairGuideEn',
            'partsGuide',
            'pdi',
            'periodicService',
            'Bulletin1',
            'Bulletin2',
            'Bulletin3',
            'Bulletins'
        ];

        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $fileName = Str::random(40) . '.' . $file->getClientOriginalExtension();
                $data[$field] = $file->storeAs('documents/' . $field, $fileName, 'public');
            }
        }

        Manual::create($data);

        return redirect()->route('manuals.index')->with('success', 'راهنما با موفقیت ثبت شد.');
    }

    public function download($id, $field)
    {
        $manual = Manual::findOrFail($id);


        if (!in_array($field, ['fileCoc', 'userGuideFa', 'userGuideEn', 'repairGuideFa', 'repairGuideEn', 'partsGuide', 'pdi', 'periodicService', 'Bulletin1', 'Bulletin2', 'Bulletin3', 'Bulletins'])) {
            abort(404, 'نوع فایل نامعتبر است.');
        }

        $path = $manual->{$field};

        if (!$path || !Storage::disk('public')->exists($path)) {
            abort(404, 'فایل پیدا نشد.');
        }

        return Storage::disk('public')->download($path);
    }

    public function show($id)
    {
        $manual = Manual::with('motormodel.classe.brand')->findOrFail($id);
        $role = Auth::user()->role;

        return view('dashboard/manual', compact('manual', 'role'));
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        try {
            $manual = Manual::findOrFail($id);

            $fileFields = [
                'fileCoc',
                'userGuideFa',
                'userGuideEn',
                'repairGuideFa',
                'repairGuideEn',
                'partsGuide',
                'pdi',
                'periodicService',
                'Bulletin1',
                'Bulletin2',
                'Bulletin3',
                'Bulletins',
            ];

            foreach ($fileFields as $field) {
                if (!empty($manual->$field) && Storage::disk('public')->exists($manual->$field)) {
                    Storage::disk('public')->delete($manual->$field);
                }
            }

            $manual->delete();

            return redirect()->route('manuals.index')->with('success', 'رکورد و فایل‌های مربوطه با موفقیت حذف شدند.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'مشکلی در حذف اطلاعات پیش آمد.');
        }
    }
}
