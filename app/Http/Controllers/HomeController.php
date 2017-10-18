<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use Illuminate\Support\Facades\Mail;

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

        if (!empty($_POST['email'])) {

            $to = 'tarek.chida@gmail.com';
            $subject = 'contact from CV';
            $message = 'From : ' . $_POST['name'] . "\r\n";
            $message.= 'Mail : ' . $_POST['email'] . "\r\n";
            $message.= $_POST['message'];
            $headers = 'From: contact@tchida.net' . "\r\n" .
                    'Reply-To: contact@tchida.net' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();
            if (mail($to, $subject, $message, $headers)) {
                Log::info("Mail sent from : " . $_POST['email'] . "  IP : " . $_SERVER['REMOTE_ADDR']);
                return array("status" => TRUE);
            }
        }
        Log::info("Mail sent error : " . $_POST['email'] . "  IP : " . $_SERVER['REMOTE_ADDR']);
        return array("status" => FALSE);
    }

    public function reCaptcha(Request $request) {
        $params = array();
        $params['secret'] = '6LfS4zQUAAAAAPURpbhyw0Iv6SyQ1z9rCnpVEM_g';
        if (!empty($request->input('response'))) {
            $params['response'] = urlencode($request->input('response'));
        }
        $params['remoteip'] = $_SERVER['REMOTE_ADDR'];

        $params_string = http_build_query($params);
        $requestURL = 'https://www.google.com/recaptcha/api/siteverify?' . $params_string;

        // Get cURL resource
        $curl = curl_init();

        // Set some options
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $requestURL,
        ));

        // Send the request
        $response = curl_exec($curl);
        // Close request to clear up some resources
        curl_close($curl);

        $response = @json_decode($response, true);
        return $response;
    }

}
