<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Anhskohbo\NoCaptcha\Facades\NoCaptcha;



class AppServiceProvider extends ServiceProvider
{

public function boot()
{
    Validator::extend('captcha', function ($attribute, $value, $parameters, $validator) {
        return NoCaptcha::verifyResponse($value);
    });
}



}
