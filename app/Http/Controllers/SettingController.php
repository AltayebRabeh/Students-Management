<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::orderBy('id', 'asc')->get();
        return view('settings.index', compact('settings'));
    }

    public function store(Request $request)
    {
        $validator = null;
        
        foreach ($request->settings as $setting) 
        {
            $getSetting = Setting::where('key', '=', $setting['key'])->first();
            $value = null;
            
            if($setting['type'] == 'image')
            {
                if(isset($setting['value'])) 
                {
                    $image = $setting['value'];
                    $validator = Validator::make(['image' => $image], 
                        [
                            'image' => 'mimes:jpg,bmp,png,jpeg'
                        ],
                        [
                            'image.mimes' => 'يجب ان تحتوي الصورة على احد الامتدادات png, jpg, jpeg, bmp'
                        ]
                    );

                    if($validator->fails()) {
                        return redirect()->route('settings.index')->withErrors($validator);
                    }

                    Storage::disk('uploads')->delete($getSetting->value);

                    $value = Storage::disk('uploads')->put('settings',$image);
                    
                    $getSetting->update(['value' => $value]);
                }
            } else {
                $getSetting->update(['value' => $setting['value']]);
            }
        }

        Cache::forever('settings', Setting::pluck('value', 'key'));

        toastr()->success('تم حفظ الاعدادات بنجاح');
        return redirect()->route('settings.index');
    }
}
