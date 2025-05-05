<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\YammtCategory;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $model = YammtCategory::select('id','name','category_type')->get();
        return response()->json(['message' => 'ok', 'data' => $model]);
    }

    public function create(Request $request)
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
           'category_type' => null
        ]);
        return \response()->json(['message' => 'Successfully create data!!!', 'data' => $model], 200);
    }
}
