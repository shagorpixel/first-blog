<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function edit(Setting $setting)
    {
        return view('admin.setting.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setting $setting)
    {
        $this->validate($request, [
            'name' => 'required',
            'copywright' => 'required'
        ]);
        $oldimage = 'setting/image/'.$setting->logo;
        if ($image = $request->file('image')) {
            $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move('setting/image', $imageName);

            if (file_exists($oldimage)) {
                if ($setting->logo != Null) {
                    unlink($oldimage);
                }
            }
        } else{
            $imageName = $setting->logo;
        }

        $data = [
            'name' => $request->name,
            'logo' => $imageName,
            'description' => $request->description,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'reddit' => $request->reddit,
            'phone' => $request->phone,
            'location' => $request->location,
            'email' => $request->email,
            'copywright' => $request->copywright,
        ];
        $setting->update($data);
        $request->session()->flash('status', 'Setting Updated Successfully');
        return redirect()->back();
    }
}
