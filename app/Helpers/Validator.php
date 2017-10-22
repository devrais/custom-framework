<?php

namespace App\Helpers;

use App\Controllers\FailController;

class Validator
{

    protected function getErrorHandler()
    {
        return new FailController();
    }

    public function processUrl($url)
    {

        if (count($url) > 3) {
            $this->getErrorHandler()->wrongUrl();
            return false;
        }

        return true;
    }

    public function validateController($url)
    {
        $file = 'App\Controllers\\'.ucfirst($url).'Controller';
        if (class_exists($file)) {
            return new $file();
        } else {
            $this->getErrorHandler()->absentController($url);
            return false;
        }
    }

    public function validateMethod($controller, $method, $parameter)
    {
        // Check if method is set
        if (!empty($method)) {
            //Check if method exists in this controller
            if (method_exists($controller, $method)) {

               // Count the number of parameters needed for method
                //Can be zero
                if((new \ReflectionMethod($controller,$method))->getNumberOfParameters() > 0 && $parameter == ""){
                    $this->getErrorHandler()->unsetParameter();
                    return false;
                }
                
                if($parameter == '0'){
                    $this->getErrorHandler()->zeroParameter();
                    return false;
                }
                return true;
            }
            $this->getErrorHandler()->absentMethod($method);
            return false;
        }

        $this->getErrorHandler()->unsetMethod();
        return false;
    }
}