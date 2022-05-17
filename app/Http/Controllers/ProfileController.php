<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    function read($id)
    {
        $user = user::find($id);
        if (!$user) throw new NotFoundHttpException;
        return response()->success($user);
    }

    function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['sometimes', 'nullable', 'string', 'max:255'],
            'npm' => ['sometimes', 'nullable', 'integer'],
            'avatar' => ['sometimes', 'nullable', 'image', 'file', 'max:2048'],
            'year' => ['sometimes', 'nullable', 'integer'],
            'faculty' => ['sometimes', 'nullable', 'string', 'max:50'],
            'phone_number' => ['sometimes', 'nullable', 'string', 'max:13'],
            'email' => ['sometimes', 'string', 'email', 'unique:users'],
            'password' => ['sometimes', 'string', 'min:8'],
        ]);

        if ($validator->fails()) {
            $fieldsWithErrorMessagesArray = $validator->messages()->get('*');
            return response()->failed($fieldsWithErrorMessagesArray, 400);
        }

        $user = user::find($id);

        $user->name = $request->name ? $request->name : $user->name;
        $user->npm = $request->npm ? $request->npm : $user->npm;
        $user->year = $request->year ? $request->year : $user->year;
        $user->faculty = $request->faculty ? $request->faculty : $user->faculty;
        $user->phone_number = $request->phone_number ? $request->phone_number : $user->phone_number;
        $user->email = $request->email ? $request->email : $user->email;
        if($request->password != NULL)
        {
            $user->password = bcrypt($request->password);
        }
        $user->password = ($user->password);
        
        if ($request->hasFile('avatar')) {
            $filenameWithExt = $request->file('avatar')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('avatar')->getClientOriginalExtension();
            $filenameSimpan = $filename . '_' . time() . '.' . $extension;

            if ($user->avatar != null) {
                File::delete(public_path("$user->avatar"));
            }

            $user->avatar = 'assets/profile/' . $filenameSimpan;
            $request->file('avatar')->move(public_path('assets/profile'), $filenameSimpan);
        }

        $user->save();

        return response()->success($user);
    }
}
