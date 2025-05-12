<?php

namespace App\Http\Controllers;

use App\Models\CallRegistration;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use function Pest\Mutate\create;

class CallRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $params = $request->all();
        $operator = auth()->user()->id;
        $model = CallRegistration::query();
        if (isset($params['date_from']) && isset($params['date_to'])) {
            $model->where('created_at', '>=', $params['date_from'])->where('created_at', '<=', $params['date_to']);
        }
        if (isset($params['phone'])) {
            $model->where('phone', 'ilike','%'.$params['phone'].'%');
        }
        if (isset($params['yammt_type'])) {
            $model->where('yammt_type',$params['yammt_type']);
        }
        $models = $model->with('theme:id,name,yammt_type') // <-- bu joy muhim
            ->where('operator_id', $operator)
            ->select('id','phone','yammt_type','theme_id','operator_id','comment','created_at')
            ->paginate(20);

        return response()->json(['message' => 'ok', 'data' => $models]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'phone' => 'required',
            'comment' => 'required',
            'yammt_type' => 'required'
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
