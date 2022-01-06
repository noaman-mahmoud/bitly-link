<?php

if ( !function_exists('getToken')){

    function getToken (){

        return config('Bitly.token');
    }
}