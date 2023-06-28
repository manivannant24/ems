<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use App\Models\lta;
use Illuminate\Support\Facades\input;




class LogSuccessfulLogin
{
    /**
     * Create the event listener.
     *
     * @param  Request  $request
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $request)
    {
        
         $user = new lta;
        //  $user->email='sudalai@gmail.com';
        $user->email=$this->request->input('email');
        // dd($user->email);
          $user->logindate = date('Y-m-d H:i:s');
        //  $user->logindate="2023-03-03";
         $user->save();
    }
}
