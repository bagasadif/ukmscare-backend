<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UkmRegistration;
use App\Models\UkmRegistDescription;
use App\Models\Ukm;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
            'file1' => ['file', 'max:2048', 'sometimes', 'nullable'],
            'file2' => ['file', 'max:2048', 'sometimes', 'nullable'],
            'file3' => ['file', 'max:2048', 'sometimes', 'nullable'],
            'file4' => ['file', 'max:2048', 'sometimes', 'nullable'],
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

        $ukm = Ukm::find($request->ukm_id);

        for ($i = 1; $i < 5; $i++) {
            $fieldname = 'file'.$i;
            if ($request->hasFile($fieldname)) {
                $extension = $request->file('image')->getClientOriginalExtension();
                $filenameSimpan = $fieldname . '.' . $extension;

                $ukmRegistration->$fieldname = "assets/regist/$ukm->short_name/" . $filenameSimpan;
                $request->file('image')->move(public_path('assets/regist/$ukm->short_name/'), $filenameSimpan);
            }
        }

        return response()->success($ukmRegistration);
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
}
