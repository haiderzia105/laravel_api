<?php

namespace App\Http\Controllers\Api;

use App\Models\Information;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class InformationController extends Controller
{
    public function index(){
        $informations = Information::all();
        if($informations->count() > 0){
            return response()->json([
                "status" => 200,
                "messages" => $informations
            ],200);
        }else{
            return response()->json([
                "status" => 404,
                "messages" => "No Data Found"
            ],404);
        }
        
    }
    
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            "name" => "required|string|max:100",
            "course" => "required|string|max:100",
            "email" => "required|email|max:50",
            "phone" => "required|digits:11",
        ]);
        if($validator->fails()){
            return response()->json([
                "status" => 422,
                "error" => $request->messages()
            ],422);
        }
        else{
            $informations = Information::create([
                "name" => $request->name,
                "course" => $request->course,
                "email" => $request->email,
                "phone" => $request->phone,
            ]);

            if($informations){
                return response()->json([
                    "status" => 200,
                    "message" => "Data stored successfully"
                ],200);
            }else{
                return response()->json([
                    "status" => 500,
                    "error" => "Error"
                ],500);
            }
        }
    }
    public function show($id){
        $informations = Information::find($id);
        if($informations){
            return response()->json([
                "status" => 200,
                "messages" => $informations
            ],200);
        }else{
            return response()->json([
                "status" => 404,
                "messages" => "No Data Found"
            ],404);
        }
        
    }

    public function edit($id){
        $informations = Information::find($id);
        if($informations){
            return response()->json([
                "status" => 200,
                "messages" => $informations
            ],200);
        }else{
            return response()->json([
                "status" => 404,
                "messages" => "No Data Found"
            ],404);
        }
        
    }

    public function update(Request $request , int $id){
        $validator = Validator::make($request->all(),[
            "name" => "required|string|max:100",
            "course" => "required|string|max:100",
            "email" => "required|email|max:50",
            "phone" => "required|digits:11",
        ]);
        if($validator->fails()){
            return response()->json([
                "status" => 422,
                "error" => $request->messages()
            ],422);
        }
        else{
            $informations = Information::find($id);
            if($informations){
                $informations->update([
                "name" => $request->name,
                "course" => $request->course,
                "email" =>  $request->email,
                "phone" =>  $request->phone,
            ]);

                return response()->json([
                    "status" => 200,
                    "message" => "Data updated successfully"
                ],200);
            }else{
                return response()->json([
                    "status" => 404,
                    "error" => "No such data found"
                ],404);
            }
        }
    }
    public function delete($id){
        $informations = Information::find($id);
        if($informations){
            $informations->delete();
            return response()->json([
                "status" => 200,
                "messages" => "Student Deleted Successfully"
            ],200);
        }else{
            return response()->json([
                "status" => 404,
                "messages" => "No Data Found"
            ],404);
        }
        
    }
}
