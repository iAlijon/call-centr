<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\Question;
use function Laravel\Prompts\select;

class QuestionController extends Controller
{
    public function index(Request $request)
    {
        $input = $request->all();
        $per_page = $input['per_page'] ?? 20;

        $query = Question::query();

        if (!empty($input['search'])) {
            $query->where(function ($q) use ($input) {
                $q->where('question', 'ilike', '%' . $input['search'] . '%')
                    ->orWhere('answer', 'ilike', '%' . $input['search'] . '%');
            });
        }

        if (!empty($input['yammt_category_id'])) {
            $query->where('yammt_category_id', $input['yammt_category_id']);
        }

        if (!empty($input['yammt_type'])) {
            $query->where('yammt_type', $input['yammt_type']);
        }

        $data = $query
            ->select('id', 'question', 'answer', 'yammt_type', 'yammt_category_id', 'created_at')
            ->orderBy('created_at', 'desc')
            ->paginate($per_page);

        return response()->json([
            'success' => true,
            'data' => $data,
            'message' => 'ok'
        ]);
    }

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
            return response()->json($messageArr, Response::HTTP_BAD_REQUEST);
        }

        $result = $request->all();

        $data = Question::create([
            'question' => $result['question'],
            'answer' => $result['answer'],
            'yammt_type' => $result['yammt_type'],
            'yammt_category_id' => $result['yammt_category_id'],
        ]);
        return \response()->json(['message' => 'ok', 'data' => $data]);
    }
}
