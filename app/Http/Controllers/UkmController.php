<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ukm;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\File;

class UkmController extends Controller
{
    function read()
    {
        $ukm = Ukm::all();
        return response()->success($ukm);
    }

    function read_id($id)
    {
        $ukm = Ukm::find($id);
        if (!$ukm) throw new NotFoundHttpException;
        return response()->success($ukm);
    }

    function read_category($category)
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
            $query->orWhere($column, 'LIKE', '%'.$key.'%');
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

        if ($request->hasFile('avatar')) {
            $filenameWithExt = $request->file('avatar')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('avatar')->getClientOriginalExtension();
            $filenameSimpan = $filename . '_' . time() . '.' . $extension;

            if ($ukm->avatar != null) {
                File::delete(public_path("$ukm->avatar"));
            }

            $ukm->avatar = 'assets/ukm/logo/' . $filenameSimpan;
            $request->file('avatar')->move(public_path('assets/ukm/logo'), $filenameSimpan);
        }

        $ukm->save();

        return response()->success($ukm);
    }
}
