<?php

namespace App\Http\Controllers;

use App\Models\Name;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function MakeLogin(Request  $r)
    {
        return $r->all();

    }
    public function GetName(Request  $r)
    {
        $valid = Validator::make($r->all(),[
            'first_name'=>"required",
            'last_name'=>"required"
        ],[
            "first_name.required"=>"enter your first name.💥",
            "last_name.required"=>"enter your last name.💥"
        ]);
        if($valid->fails())
        {
            return redirect()->back()->withErrors($valid->errors());
        }
        $data = $r->except('_token');
        try {
            Name::create($data);
            return "done";
        } catch (\Exception $th) {
            return $th->getMessage();
        }
    }
}
