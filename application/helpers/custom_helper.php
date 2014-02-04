<?php
function css_files(){
    $css_files = array(
        'css/foundationFive/css/normalize'
        ,'css/foundationFive/css/foundation'
        ,'js/jquery-ui/css/overcast/jquery-ui-1.10.3.custom'
        ,'css/geoffs-colors'
    );
    return $css_files;
}

function js_files(){
    $js_files = array(
        'css/foundationFive/js/modernizr'
        ,'js/base64'
        ,'js/html2canvas/build/html2canvas'
        ,'js/canvas2image'
        ,'js/fsapi'
        ,'js/jquery'
        ,'js/jquery-ui/js/jquery-ui-1.10.3.custom'
    );
    return $js_files;
}

function logo($size = 0){
    if($size > 0){
        return "<img style='height:".$size."px' src='".site_url("/assets/imgs/logo.png")."'/>";
    }
    return "<img src='".site_url("/assets/imgs/logo.png")."'/>";
}

function debug_result($datas = array()){
    echo "<pre>";
    die(print_r($datas));
}

function error_message($msg){
    echo "<div style='background:#ff8673;color: #ff0000;font-size:20px;padding: 1%;'>" . $msg . "</div>";
}

function success_message($success_message){
    echo "<div style='background:#a4f43d;color:#569700;font-size:20px;padding: 1%;'>" . $success_message . "</div>";
}

function validate_id($id){
    $pieces = explode("-", $id);
    if(count($pieces) == 2){
        $error  = 0;
        foreach($pieces AS $piece){
            if(!preg_match('/^\d+$/',$piece)){
               $error += 1;
            }
        }
        if($error > 0){
            return false;
        } else {
            return true;
        }
    } else {
        return false;
    }
}