<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClimaController extends Controller
{
    public function index()
    {
        date_default_timezone_set('America/Bogota');
        
        $message ='Your message';
        $lat     = '4.591734';
        $lon     = '-74.075423';
        $ciudad  = 'Bogota';
       // $time    = strtotime("-1 day");
        $time = '1619803852';
        
        $url ='https://api.openweathermap.org/data/2.5/onecall?lat='.$lat.'&lon='.$lon.'&exclude=minutely&exclude=hourly&exclude=alerts&units=metric&appid=45bc4acfc4a8490c1969c5871c5dc930'; //'www.your-domain.com/api.php?to='.$mobile.'&text='.$message;
        
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
        $response = curl_exec ($ch);
        $err = curl_error($ch);  //if you need
        curl_close ($ch);
        

        //dd($response);
        return view('clima')->with('data', json_decode($response,true));
    }
}
