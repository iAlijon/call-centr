<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\Question;

class QuestionController extends Controller
{
    public function store(Request $request)
    {
        $params = Validator::make($request->all(), [
            'question' => 'required',
            'answer' => 'required',
            'yammt_type' => 'required',
            'yammt_category_id' => 'required'
        ]);

        if ($params->fails()) {
            $messageArr = [];
            $messageArr['message'] = $params->errors();
            return response()->json($params, Response::HTTP_BAD_REQUEST);
        }

        $result = $request->all();
        $data = Question::create([
            'question' => $result['question'],
            'answer' => $result['answer'],
            'yammt_type' => $result['yammt_type'],
            'yammt_category_id' => $result['yammt_category_id']
        ]);
        return \response()->json(['message' => 'ok', 'data' => $data]);
    }
}
