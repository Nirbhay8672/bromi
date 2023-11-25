<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Form;
use App\Models\FormFields;
use App\Models\FormType;
use Illuminate\Support\Facades\Hash;
// use Auth;
// use Validator;
use App\Models\User;
// use App\Rules\ruleIdExist;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FormsController extends Controller
{
    public function addForm(Request $request)
    {
        try {
            $user=auth()->user()->id;
            $data=Form::create([
                'user_id'=>$user,
                'form_name' =>$request->form_name
            ]);
            return response()->json(["status"=> 200,
                        "message"=>"Form Is Add Successfully ",
                        "data"=> $data]);

        } catch (\exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred',
                'data' => $e,
            ], 500);
            //throw $th;
        }
        

        
    }
    public function editForm(Request $request)
    {
        try {
           
           $exist=Form::find($request->id);
           if($exist != null){
            $user=auth()->user()->id;
            $exist->user_id=$user;
            $exist->form_name =$request->form_name;
            $exist->update();

            return response()->json(["status"=> 200,
                        "message"=>"Form Is updated Successfully ",
                        "data"=> $exist]);
           }else{
            return response()->json([
                'status' => 'error',
                'message' => "provided Id is not valied",
                'data' => [],
            ], 401);
           }
           

        } catch (\exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred',
                'data' => $e,
            ], 500);
            //throw $th;
        }
        

        
    }
    public function addFormType(Request $request)
    {
        try {
            $user=auth()->user()->id;
            $data=new FormType();
            $data->field_type   =$request->field_type;
            $data->option_type  =$request->option_type;
            $data->field_name   =$request->filed_name;
            $storeForm=$data->save();
           
            return response()->json(["status"=> 200,
                        "message"=>"Form type Is Add Successfully ",
                        "data"=> $data]);

        } catch (\exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred',
                'data' => $e,
            ], 500);
            //throw $th;
        }
        

        
    }
    public function editFormType(Request $request)
    {
        try {
            $user=auth()->user()->id;
            $data=FormType::find($request->id);
            if(!empty($data)){
                $data->field_type   =$request->field_type;
                $data->option_type  =$request->option_type;
                $data->field_name   =$request->filed_name;
                $storeForm=$data->update();
               
                return response()->json(["status"=> 200,
                            "message"=>"Form Type Is Updated Successfully ",
                            "data"=> $data]);
            }else{
                return response()->json([
                    'status' => 'error',
                    'message' => "provided Id is not valied",
                    'data' => [],
                ], 401);
            }
           

        } catch (\exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred',
                'data' => $e,
            ], 500);
            //throw $th;
        }
    }
    public function addFormFiled(Request $request)
    {
        try {

            $data=FormFields::create([
                'form_id'=>$request->form_id,
                'field_type_id' =>$request->field_type_id
            ]);

            return response()->json(["status"=> 200,
                        "message"=>"Form Filed Is Add Successfully ",
                        "data"=> $data]);
        } catch (\exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred',
                'data' => $e,
            ], 500);
            //throw $th;
        }
        

        
    }
     public function editFormFiled(Request $request)
    {
        try {
            $data=FormFields::find($request->id);
            $data->form_id=$request->form_id;
            $data->field_type_id=$request->field_type_id;
            return response()->json(["status"=> 200,
                        "message"=>"Form Filed Is Updated Successfully ",
                        "data"=> $data]);
        } catch (\exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred',
                'data' => $e,
            ], 500);
            //throw $th;
        }
        

        
    }
   
    
}
