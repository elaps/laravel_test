<?php

if(!function_exists('isActiveLink')){
    function isActiveLink($link, $class="active"){
        return Route::is($link)?$class:'';
    }
}

?>
