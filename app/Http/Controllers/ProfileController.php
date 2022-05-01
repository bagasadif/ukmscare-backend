<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    function read()
    {
        $profile = Profile::all();
        return response()->success($profile);
    }

    function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['sometimes', 'nullable', 'string', 'max:255'],
            'npm' => ['sometimes', 'nullable', 'integer', 'max:12'],
            'avatar' => ['sometimes', 'nullable', 'image', 'file', 'max:2048'],
            'year' => ['sometimes', 'nullable', 'integer', 'max:4'],
            'faculty' => ['sometimes', 'nullable', 'string', 'max:50'],
            'phone_number' => ['sometimes', 'nullable', 'integer', 'max:13'],
        ]);

        if ($validator->fails()) {
            $fieldsWithErrorMessagesArray = $validator->messages()->get('*');
            return response()->failed($fieldsWithErrorMessagesArray, 400);
        }

        $profile = Profile::find($id);

        $profile->name = $request->name ? $request->name : $profile->name;
        $profile->npm = $request->npm ? $request->npm : $profile->npm;
        $profile->desc = $request->desc ? $request->desc : $profile->desc;
        $profile->category = $request->category ? $request->category : $profile->category;
        $profile->year = $request->year ? $request->year : $profile->year;
        $profile->faculty = $request->faculty ? $request->faculty : $profile->faculty;
        $profile->phone_number = $request->phone_number ? $request->phone_number : $profile->phone_number;

        if ($request->hasFile('avatar')) {
            $filenameWithExt = $request->file('avatar')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('avatar')->getClientOriginalExtension();
            $filenameSimpan = $filename . '_' . time() . '.' . $extension;

            if ($profile->avatar != null) {
                File::delete(public_path("$profile->avatar"));
            }

            $profile->avatar = 'assets/profile/' . $filenameSimpan;
            $request->file('avatar')->move(public_path('assets/profile'), $filenameSimpan);
        }

        $profile->save();

        return response()->success($profile);
    }
}
