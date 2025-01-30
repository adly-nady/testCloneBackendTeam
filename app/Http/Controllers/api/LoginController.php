<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\department;
use App\Models\Status;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\JWT;

class LoginController extends Controller
{
    // public function __construct()
	// {
	// 	auth()->setDefaultDriver("api");
	// }
    public function MakeLogin(Request $R)
    {
        $valid = Validator::make($R->all(),['email'=>'required|email','password'=>'required']);
        if($valid->fails())
        {
            return response()->json(['errors'=>$valid->errors(),'mes'=>'incorrect'],200);
        }
        if($token = JWTAuth::attempt(['email' => $R->email, 'password' => $R->password]))
        {
            return response()->json(['token'=>$token,'AuthId'=>(string)(Auth::user()->id),'mes'=>'Done'],200);
        }else{
            return response()->json(['errors'=>['Auth'=>['error of auth']],'mes'=>'incorrect'],200);
        }
    }

    public function MakeRegister(Request $R)
    {
        $valid = Validator::make($R->all(),[
            'username'=>'required',
            'email'=>'required',
            'password'=>'required']);

        if($valid->fails())
        {
            return response()->json(['errors'=>$valid->errors(),'mes'=>'incorrect'],200);
        }

        User::create([
            'name'=>$R->username,
            'email'=>$R->email,
            'email_verified_at'=>date('Y-m-d H:i:s'),
            'phone'=>"1234567897",
            'password'=>Hash::make($R->password),
        ]);

        return response()->json(['errors'=>null,'mes'=>'Done'],200);

    }

    public function GetData(Request $R)
    {
        try {
            $data = Task::get();
            foreach ($data as $key => $value) {
                $data[$key]['assign_from']=(string)($value->assign_from);
                $data[$key]['assign_user']=(string)($value->assign_user);//User::find($value->assign_user)->name;
                $data[$key]['assign_status']=(string)($value->assign_status);//Status::find($value->assign_status)->name;
                $data[$key]['assign_department']="".$data[$key]['assign_department']."";

                $data[$key]['assign_from_name']=User::find($value->assign_from)->name;
                $data[$key]['assign_user_name']=User::find($value->assign_user)->name;
                $data[$key]['assign_status_name']=Status::find($value->assign_status)->name;
                $data[$key]['assign_department_name']=department::find($data[$key]['assign_department'])->name;

                $result2 = 0;
                $date1 = Carbon::parse($value->start_time);
                $date2 = Carbon::parse($value->end_time);
                $diff = $date1->diff($date2);
                
                $data[$key]['assign_from_name'] = User::find($value->assign_from)->name;
                
                $result = " " . $diff->days . " days, " .
                          $diff->h . " hours, " .
                          $diff->i . " minutes, " .
                          $diff->s . " seconds.";
                
                $result2 += $diff->days * 24 * 60; 
                $result2 += $diff->h * 60;        
                $result2 += $diff->i;              
                $result2 += $diff->s / 60;       
                
                $data[$key]['deadline'] = $result;
                $data[$key]['deadline_minutes'] = $result2;

            }
            return $data;
        } catch (\Exception $ex) {
            return response()->json(['errors'=>$ex->getMessage(),'mes'=>'incorrect'],200);
        }
        // return User::get();
    }

    public function AddTask(Request $R)
    {
        $valid = Validator::make($R->all(),[
            'assign_from'=>'required',
            'assign_user'=>'required',
            'title'=>'required',
            'description'=>'required',
            'assign_department'=>'required',
            'attachment'=>'required',
            'start_time'=>'required',
            'end_time'=>'required'
        ]);
        if($valid->fails())
        {
            return response()->json(['errors'=>$valid->errors(),'mes'=>'incorrect'],200);
        }
        try {
            $data = $R->all();
            $data['assign_status']=1;
            Task::create($data);
            return response()->json(['errors'=>null,'mes'=>'Done'],200);
        } catch (\Exception $ex) {
            return response()->json(['errors'=>$ex->getMessage(),'mes'=>'incorrect'],200);
        }

    }
    public function DeleteTask($id)
    {
        try {
            Task::find($id)->delete();
            return response()->json(['errors'=>null,'mes'=>'Done'],200);
        } catch (\Exception $ex) {
            return response()->json(['errors'=>$ex->getMessage(),'mes'=>'incorrect'],200);
        }
    }
    public function EditTask($id)
    {
        try {
            return Task::find($id);
            return response()->json(['data'=>Task::find($id),'errors'=>null,'mes'=>'Done'],200);
        } catch (\Exception $ex) {
            return response()->json(['errors'=>$ex->getMessage(),'mes'=>'incorrect'],200);
        }
    }

    public function UpdateTask(Request $R)
    {
        // return response()->json(['Data'=>$R->all(),'mes'=>'testers'],200);
        $valid = Validator::make($R->all(),[
            'assign_from'=>'required',
            'assign_user'=>'required',
            'title'=>'required',
            'description'=>'required',
            'assign_department'=>'required',
            'attachment'=>'required',
            'start_time'=>'required',
            'end_time'=>'required'
        ]);
        if($valid->fails())
        {
            return response()->json(['errors'=>$valid->errors(),'mes'=>'incorrect'],200);
        }
        try {
            $data = $R->all();
            $data['assign_status']=3;
            Task::find($R->id)->update($data);
            return response()->json(['errors'=>null,'mes'=>'Done'],200);
        } catch (\Exception $ex) {
            return response()->json(['errors'=>$ex->getMessage(),'mes'=>'incorrect'],200);
        }
    }

    public function GetDepartments()
    {

        return response()->json(['data'=>department::get(),'errors'=>null,'mes'=>'Done'],200);

    }

}
