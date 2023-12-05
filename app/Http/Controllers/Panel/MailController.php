<?php

namespace App\Http\Controllers\Panel;


use App\Email;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
{
    $this->middleware('checkIp', ['only' => ['create']]);
    $this->middleware('status', ['only' => ['create']]);
}
    public function index()
    {
        

        return view('panel.mail.enviados');
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.mail.create');
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
        $mail->save();

        
        return redirect()->route('mail.create')->with('status','Correo enviado exitosamente');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Email $mail)
    {
        
        
        return view('panel.mail.show',['mail'=>$mail]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
