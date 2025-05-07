<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\YammtCategory;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $result = $request->all();
        if (isset($result['search'])&&!empty($result['search'])) {
            $model = YammtCategory::where('name', 'ilike', '%'.$result['search'].'%')->select('id','name')->get();
        }else {
            $model = YammtCategory::select('id','name')->get();
        }
        return response()->json(['message' => 'ok', 'data' => $model]);
    }

    public function store(Request $request)
    {
        $result = Validator::make($request->all(),[
           'name' => 'required|string',
        ]);

        if ($result->fails()) {
            $responseArr = [];
            $responseArr['message'] = $result->errors();
            return response()->json($responseArr, Response::HTTP_BAD_REQUEST);
        }
        $data =  $request->all();
        $model = YammtCategory::create([
           'name' => $data['name'],
        ]);
        return \response()->json(['success' => true, 'data' => $model,'message' => 'Successfully create data!!!']);
    }

    public function show(string $id)
    {
        $model = YammtCategory::where('id', $id)->first();
        return \response()->json(['success'=>true, 'data' => $model, 'message' => 'ok']);
    }

    public function update(Request $request,string $id)
    {
        $validation = Validator::make($request->all(), [
           'name' => 'required',
        ]);
        if ($validation->fails()) {
            $responseArr = [];
            $responseArr['message'] = $validation->errors();
            return \response()->json($responseArr, Response::HTTP_BAD_REQUEST);
        }
        $model = YammtCategory::where('id', $id)->first();
        $data = $request->all();
        $model->update([
           'name' =>  $data['name']
        ]);
        return \response()->json(['success'=> true, 'data' => $model, 'message' => 'ok']);
    }

    public function destroy(string $id)
    {
        $params = YammtCategory::where('id', $id)->first();
        if ($params->delete()) {
            return \response()->json(['success' => true, 'data' => '', 'message' => 'ok']);
        }
        return \response()->json(['success' => false, 'data' => '', 'message' => 'Id do not delete!!!']);
    }
}
