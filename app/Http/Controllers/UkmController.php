<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ukm;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
// use Illuminate\Support\Facades\File;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class UkmController extends Controller
{
    function read()
    {
        $ukm = Ukm::all();
        return response()->success($ukm);
    }

    function readId($id)
    {
        $ukm = Ukm::find($id);
        if (!$ukm) throw new NotFoundHttpException;
        return response()->success($ukm);
    }

    function readCategory($category)
    {
        $ukm = Ukm::where('category', $category)->get();
        if ($ukm->isEmpty()) throw new NotFoundHttpException;
        return response()->success($ukm);
    }

    function search($key)
    {
        $query = Ukm::query();
        $columns = ['name', 'short_name', 'category'];
        foreach ($columns as $column) {
            $query->orWhere($column, 'LIKE', '%' . $key . '%');
        }
        $ukm = $query->get();
        if ($ukm->isEmpty()) throw new NotFoundHttpException;
        return response()->success($ukm);
    }

    function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['sometimes', 'nullable', 'string', 'max:50'],
            'short_name' => ['sometimes', 'nullable', 'string', 'max:10'],
            'desc' => ['sometimes', 'nullable', 'string'],
            'category' => ['sometimes', 'nullable', 'string', 'max:15'],
            'avatar' => ['sometimes', 'nullable', 'image', 'file', 'max:2048'],
            'date' => ['sometimes', 'nullable', 'string'],
            'member' => ['sometimes', 'nullable', 'string'],
            'location' => ['sometimes', 'nullable', 'string'],
            'contact' => ['sometimes', 'nullable', 'string'],
        ]);

        if ($validator->fails()) {
            $fieldsWithErrorMessagesArray = $validator->messages()->get('*');
            return response()->failed($fieldsWithErrorMessagesArray, 400);
        }

        $ukm = Ukm::find($id);

        $ukm->name = $request->name ? $request->name : $ukm->name;
        $ukm->short_name = $request->short_name ? $request->short_name : $ukm->short_name;
        $ukm->desc = $request->desc ? $request->desc : $ukm->desc;
        $ukm->category = $request->category ? $request->category : $ukm->category;
        $ukm->date = $request->date ? $request->date : $ukm->date;
        $ukm->member = $request->member ? $request->member : $ukm->member;
        $ukm->location = $request->location ? $request->location : $ukm->location;
        $ukm->contact = $request->contact ? $request->contact : $ukm->contact;

        // if ($request->hasFile('avatar')) {
        //     $filenameWithExt = $request->file('avatar')->getClientOriginalName();
        //     $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //     $extension = $request->file('avatar')->getClientOriginalExtension();
        //     $filenameSimpan = $filename . '_' . time() . '.' . $extension;

        //     if ($ukm->avatar != null) {
        //         File::delete(public_path("$ukm->avatar"));
        //     }

        //     $ukm->avatar = 'assets/ukm/logo/' . $filenameSimpan;
        //     $request->file('avatar')->move(public_path('assets/ukm/logo'), $filenameSimpan);
        // }

        if ($request->hasFile('avatar')) {
            $filenameWithExt = $request->file('avatar')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('avatar')->getClientOriginalExtension();
            $filenameSimpan = $filename . '-' . time();

            $target_url = 'https://api.imgbb.com/1/upload?key=' . env('IMGBB_KEY');

            $cFile = curl_file_create($request->file('avatar'), $extension, $filenameSimpan);
            $post = array('image' => $cFile); // Parameter to be sent

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $target_url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $result = json_decode(curl_exec($ch));
            curl_close($ch);
            
            $ukm->avatar = $result->data->image->url;
        }

        $ukm->save();

        return response()->success($ukm);
    }
}
