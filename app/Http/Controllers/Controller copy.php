<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


//GMT+1
date_default_timezone_set("Africa/Casablanca"); 

class Controller extends BaseController
   

    
{
    
    
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    
   

}
