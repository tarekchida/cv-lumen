<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        //
    }

    public function fr() {
        return view('fr/home');
    }

    public function en() {
        return view('en/home');
    }

    public function contact(Request $request) {

        if (!empty($request->input('email'))) {

            $to = 'tarek.chida@gmail.com';
            $subject = 'contact from CV';
            $message = 'From : ' . $request->input('name') . "\r\n";
            $message.= 'Mail : ' . $request->input('email') . "\r\n";
            $message.= $request->input('message');
            $headers = 'From: contact@tchida.net' . "\r\n" .
                    'Reply-To: contact@tchida.net' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();

            if (mail($to, $subject, $message, $headers)) {
                Log::info("Mail sent from : " . $request->input('email'));
                return array("status" => TRUE);
            }
        }
        return array("status" => FALSE);
    }

}
