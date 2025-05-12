<?php

namespace App\Http\Controllers;

use App\Models\CallThemes;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class ThemesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $params = $request->all();
        $model = CallThemes::where('yammt_type', $params['yammt_type'])->orderBy('created_at', 'desc')->paginate(20);
        return response()->json(['success' => true, 'data' => $model, 'message' => 'ok']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'yammt_type' => 'required'
        ]);
        if ($validation->fails()) {
            $responseArr = [];
            $responseArr['message'] = $validation->errors();
            return response()->json($responseArr, Response::HTTP_BAD_REQUEST);
        }
        $params = $request->all();
        $modal = CallThemes::create([
           'name' =>  $params['name'],
            'yammt_type' => $params['yammt_type']
        ]);
        return \response()->json(['success' => true, 'data' => $modal, 'message' => 'ok']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $model = CallThemes::where('id', $id)->first();
        return \response()->json(['success' => true, 'data' => $model, 'message' => 'ok']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $model = CallThemes::where('id', $id)->first();
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'yammt_type' => 'required'
        ]);
        if ($validation->fails()) {
            $responseArr = [];
            $responseArr['message'] = $validation->errors();
            return response()->json($responseArr, Response::HTTP_BAD_REQUEST);
        }
        $params = $request->all();
        $data = $model->update([
            'name' =>  $params['name'],
            'yammt_type' => $params['yammt_type']
        ]);
        return \response()->json(['success' => true, 'data' => $data, 'message' => 'ok']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = CallThemes::where('id', $id)->first();
        if ($model->delete()) {
            return \response()->json(['success' => true, 'data' => '', 'message' => 'ok']);
        }
        return \response()->json(['success' => false, 'data' => '', 'message' => 'Id do not delete !!!']);
    }
}
