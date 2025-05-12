<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class AdminAddOperatorController extends Controller
{
    public function index()
    {
       $users = User::where('role_id', 2)->select('id','name','password')->paginate(20);
       return \response()->json(['success' => true,'data' => $users, 'message' => 'ok']);
    }

    public function store(Request $request)
    {
        $role_name = auth()->user()->role->name;
        $validation = Validator::make($request->all(), [
           'name' => 'required|string',
           'password' => 'required'
        ]);
        if ($validation->fails()) {
            $responseArr = [];
            $responseArr['message'] = $validation->errors();
            return response()->json($responseArr, Response::HTTP_BAD_REQUEST);
        }

        $data = $request->all();
        if ($role_name == 'admin') {
            $user = User::create([
                'name' => $data['name'],
                'password' => $data['password'],
                'role_id' => 2
            ]);
            return \response()->json(['success' => true, 'data' => $user, 'message' => 'ok']);
        }else {
            return \response()->json(['success' => false, 'data' => '', 'message' => 'This user is not an Admin.']);
        }

    }

    public function show($id)
    {
        $user = User::where('id', $id)->first();
        return \response()->json(['success' => true, 'data' => $user, 'message' => 'ok']);
    }

    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required|string',
            'password' => 'required'
        ]);
        if ($validation->fails()) {
            $responseArr = [];
            $responseArr['message'] = $validation->errors();
            return response()->json($responseArr, Response::HTTP_BAD_REQUEST);
        }
        $params = $request->all();
        $user = User::where('id', $id)->first();
        $model = $user->update([
            'name' => $params['name'],
            'password' => bcrypt($params['password']),
            'role_id' => 2
        ]);
        return \response()->json(['success' => true, 'data' => $model, 'message' => 'ok']);
    }
}
