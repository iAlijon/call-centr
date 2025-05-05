<?php

namespace App\Http\Controllers;

use App\Models\CallRegistration;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class CallRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $model = CallRegistration::select('id','phone','theme_id','operator_id','comment','created_at','updated_at')->paginate(20);
        return response()->json(['message' => 'ok', 'data'=>$model]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'phone' => 'required',
            'comment' => 'required'
        ]);
        if ($validation->fails()) {
            $responseArr = [];
            $responseArr['message'] = $validation->errors();
            return response()->json($responseArr, Response::HTTP_BAD_REQUEST);
        }
        $result = $request->all();
        $operator = auth()->user()->id;
        $data = CallRegistration::create([
           'phone' => $result['phone'],
           'theme_id' => $result['theme_id'],
           'comment' => $result['comment'],
           'yammt_type' => $result['yammt_type'],
           'operator_id' => $operator
        ]);
        return \response()->json(['message' => 'ok','data' => $data]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
