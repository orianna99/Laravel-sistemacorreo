<?php

namespace App\Http\Controllers\Api;

use App\Email;
use App\Mail\NewMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;


class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        //gaurdando datos del email
        $mail=new Email;
        $mail->from = $request->from;
        $mail->to = $request->to;
        $mail->subject = $request->subject;
        $mail->message = $request->message;
        $mail->user_id = Auth::user()->id;
        
        Mail::to($mail->to)->send(new NewMail($mail));
        $mail->save();
        

        
        return $mail;
    }
    public function upload(Request $request)
    {
        // $path = $request->file('image')->store('images');

        $image= $request->file('image');
        $path = Storage::disk('public')->put('images',$image);

        $url= asset($path);
         
        return response()->json(['url'=>$url]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
