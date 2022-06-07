<?php

namespace App\Http\Controllers;

use App\Exports\ExportUkmRegistration;
use Illuminate\Http\Request;
use App\Models\UkmRegistration;
use App\Models\UkmRegistDescription;
use App\Models\Ukm;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Maatwebsite\Excel\Facades\Excel;

class UkmRegistrationController extends Controller
{
    function read()
    {
        $ukmRegistration = UkmRegistration::with('user')->get();
        return response()->success($ukmRegistration);
    }

    function readId($id)
    {
        $ukmRegistration = UkmRegistration::with('user')->find($id);
        if (!$ukmRegistration) throw new NotFoundHttpException;
        return response()->success($ukmRegistration);
    }

    function readUkm($ukm_id)
    {
        $ukmRegistration = UkmRegistration::with('user')->where('ukm_id', $ukm_id)->get();
        if ($ukmRegistration->isEmpty()) throw new NotFoundHttpException;
        return response()->success($ukmRegistration);
    }

    // function search($key)
    // {
    //     $ukmRegistration = ukmRegistration::where('subject', 'LIKE', '%' . $key . '%')->orWhereHas('ukm', function (Builder $query) use ($key) {
    //         $query->where('category', 'LIKE', '%' . $key . '%')->orWhere('name', 'LIKE', '%' . $key . '%')->orWhere('short_name', 'LIKE', '%' . $key . '%');
    //     })->get();
    //     if ($ukmRegistration->isEmpty()) throw new NotFoundHttpException;
    //     return response()->success($ukmRegistration);
    // }

    function checkStatus($ukm_id)
    {
        $ukm = Ukm::find($ukm_id);
        if (!$ukm) throw new NotFoundHttpException;

        $data = $ukm->regist_status ? true : false;

        return response()->success($data);
    }

    function changeStatus($ukm_id)
    {
        $ukm = Ukm::find($ukm_id);
        if (!$ukm) throw new NotFoundHttpException;

        if ($ukm->regist_status == true) {
            $ukm->regist_status = false;
            $ukm->save();
            return response()->success("UKM registration with id=$ukm_id has been closed");
        } else {
            $ukm->regist_status = true;
            $ukm->save();
            return response()->success("UKM registration with id=$ukm_id is now open");
        }
    }

    function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ukm_id' => ['required', 'integer'],
            'user_id' => ['required', 'integer'],
            'field1' => ['string', 'max:255', 'sometimes', 'nullable'],
            'field2' => ['string', 'max:255', 'sometimes', 'nullable'],
            'field3' => ['string', 'max:255', 'sometimes', 'nullable'],
            'field4' => ['string', 'max:255', 'sometimes', 'nullable'],
            'field5' => ['string', 'max:255', 'sometimes', 'nullable'],
            'file1' => ['file', 'image', 'max:2048', 'sometimes', 'nullable'],
            'file2' => ['file', 'image', 'max:2048', 'sometimes', 'nullable'],
            'file3' => ['file', 'image', 'max:2048', 'sometimes', 'nullable'],
            'file4' => ['file', 'image', 'max:2048', 'sometimes', 'nullable'],
        ]);

        if ($validator->fails()) {
            $fieldsWithErrorMessagesArray = $validator->messages()->get('*');
            return response()->failed($fieldsWithErrorMessagesArray, 400);
        }

        $ukmRegistration = new UkmRegistration;

        $ukmRegistration->ukm_id = $request->ukm_id;
        $ukmRegistration->user_id = $request->user_id;
        $ukmRegistration->field1 = $request->field1;
        $ukmRegistration->field2 = $request->field2;
        $ukmRegistration->field3 = $request->field3;
        $ukmRegistration->field4 = $request->field4;
        $ukmRegistration->field5 = $request->field5;

        $ukmRegistration->save();

        // $ukm = Ukm::find($request->ukm_id);

        for ($i = 1; $i < 5; $i++) {
            $fieldname = 'file' . $i;
            if ($request->hasFile($fieldname)) {
                // $extension = $request->file($fieldname)->getClientOriginalExtension();
                // $filenameSimpan = $fieldname . '.' . $extension;

                // $ukmRegistration->$fieldname = "assets/regist/$ukm->short_name/$ukmRegistration->id/" . $filenameSimpan;
                // $request->file($fieldname)->move(public_path("assets/regist/$ukm->short_name/$ukmRegistration->id/"), $filenameSimpan);

                $filenameWithExt = $request->file($fieldname)->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file($fieldname)->getClientOriginalExtension();
                $filenameSimpan = $filename . '-' . time();

                $target_url = 'https://api.imgbb.com/1/upload?key=' . env('IMGBB_KEY');

                $cFile = curl_file_create($request->file($fieldname), $extension, $filenameSimpan);
                $post = array('image' => $cFile); // Parameter to be sent

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $target_url);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                $result = json_decode(curl_exec($ch));
                curl_close($ch);

                $ukmRegistration->$fieldname = $result->data->image->url;
            }
        }

        $ukmRegistration->save();

        return response()->success($ukmRegistration);
    }

    function getRegistDescription($ukm_id)
    {
        $ukmRegistDescription = UkmRegistDescription::where('ukm_id', $ukm_id)->first();
        if (!$ukmRegistDescription) throw new NotFoundHttpException;
        return response()->success($ukmRegistDescription);
    }

    function addColumn(Request $request)
    {
        $ukmRegistDescription = UkmRegistDescription::where('ukm_id', $request->ukm_id)->first();
        if (!$ukmRegistDescription) throw new NotFoundHttpException;

        $validator = Validator::make($request->all(), [
            'ukm_id' => ['required', 'integer'],
            'name' => ['required', 'in:field1,field2,field3,field4,field5,file1,file2,file3,file4'],
            'value' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            $fieldsWithErrorMessagesArray = $validator->messages()->get('*');
            return response()->failed($fieldsWithErrorMessagesArray, 400);
        }

        $name = $request->name;
        $ukmRegistDescription->$name = $request->value;

        $ukmRegistDescription->save();
        return response()->success($ukmRegistDescription);
    }

    function deleteColumn(Request $request)
    {
        $ukmRegistDescription = UkmRegistDescription::where('ukm_id', $request->ukm_id)->first();
        if (!$ukmRegistDescription) throw new NotFoundHttpException;

        $validator = Validator::make($request->all(), [
            'ukm_id' => ['required', 'integer'],
            'name' => ['required', 'in:field1,field2,field3,field4,field5,file1,file2,file3,file4'],
        ]);

        if ($validator->fails()) {
            $fieldsWithErrorMessagesArray = $validator->messages()->get('*');
            return response()->failed($fieldsWithErrorMessagesArray, 400);
        }

        $name = $request->name;
        $ukmRegistDescription->$name = null;

        $ukmRegistDescription->save();
        return response()->success($ukmRegistDescription);
    }

    function export($ukm_id)
    {
        $ukm = Ukm::find($ukm_id);
        if (!$ukm) throw new NotFoundHttpException;

        return (new ExportUkmRegistration($ukm_id))->download($ukm->short_name . '.xlsx');
    }
}
