<?php

namespace App\Http\Controllers\Api;

use App\Template;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TemplateController extends Controller
{
            public function store(Request $request){
                $template= new Template;
                $template->message = $request->message;
                $template->name = $request->name;
                $template->user_id = Auth::user()->id;
                $template->save();
                return $template;
            }

            public function index(){
              
                $templates = Template::where('user_id',Auth::user()->id)->get();
                return response()->json($templates);
            }
            public function template($id){ 
                $templates = Template::find($id);
                return response()->json($templates);
            }
}
