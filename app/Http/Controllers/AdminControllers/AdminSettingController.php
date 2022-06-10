<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Setting;

class AdminSettingController extends Controller
{
    public function edit()
    {
        return view('admin_dashboard.about.edit', [
            'setting' => Setting::find(1)
        ]);
    }

    public function update()
    {
        $validated = request()->validate([
            'about_first_text' => 'required|min:50,max:500',
            'about_second_text' => 'required|min:50,max:500',
            'about_our_vision' => 'required',
            'about_our_mission' => 'required',
            'about_services' => 'required',
            'about_first_image' => 'nullable|image',
            'about_second_image' => 'nullable|image', 
            'about_third_image' => 'nullable|image', 
            'banner_image_1' => 'nullable|image', 
            'banner_image_2' => 'nullable|image', 
            'banner_image_3' => 'nullable|image', 
            'banner_image_4' => 'nullable|image', 
            'sub_banner1' => 'nullable|image', 
            'sub_banner2' => 'nullable|image', 
        ]);

        if(request()->has('about_first_image'))
        {
            $about_first_image = request()->file('about_first_image');
            $path = $about_first_image->store('setting', 'public');
            $validated['about_first_image'] = $path;
        }

        if(request()->has('about_second_image'))
        {
            $about_second_image = request()->file('about_second_image');
            $path = $about_second_image->store('setting', 'public');
            $validated['about_second_image'] = $path;
        }

        if(request()->has('about_third_image'))
        {
            $about_third_image = request()->file('about_third_image');
            $path = $about_third_image->store('setting', 'public');
            $validated['about_third_image'] = $path;
        }

        if(request()->has('banner_image_1'))
        {
            $banner_image_1 = request()->file('banner_image_1');
            $path = $banner_image_1->store('setting', 'public');
            $validated['banner_image_1'] = $path;
        }

        if(request()->has('banner_image_2'))
        {
            $banner_image_2 = request()->file('banner_image_2');
            $path = $banner_image_2->store('setting', 'public');
            $validated['banner_image_2'] = $path;
        }

        if(request()->has('banner_image_3'))
        {
            $banner_image_3 = request()->file('banner_image_3');
            $path = $banner_image_3->store('setting', 'public');
            $validated['banner_image_3'] = $path;
        }

        if(request()->has('banner_image_4'))
        {
            $banner_image_4 = request()->file('banner_image_4');
            $path = $banner_image_4->store('setting', 'public');
            $validated['banner_image_4'] = $path;
        }

        if(request()->has('sub_banner1'))
        {
            $sub_banner1 = request()->file('sub_banner1');
            $path = $sub_banner1->store('setting', 'public');
            $validated['sub_banner1'] = $path;
        }

        if(request()->has('sub_banner2'))
        {
            $sub_banner2 = request()->file('sub_banner2');
            $path = $sub_banner2->store('setting', 'public');
            $validated['sub_banner2'] = $path;
        }

        Setting::find(1)->update($validated);
        return redirect()->route('admin.setting.edit')->with('success', 'Setting has been Updated.');
    }
}
