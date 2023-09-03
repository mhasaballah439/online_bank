<?php

use Illuminate\Support\Facades\Config;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;


function get_default_languages()
{
    return Config::get('app.locale');
}

function admin(){
    return auth()->guard('admin')->user();
}

function user(){
    return auth()->guard('web')->user();
}
