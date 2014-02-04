<?php
class Layout {
    public function head($title_page, $css = array(), $js = array(), $drawing_tool = 0){
        $html = null;        
        $html .= "<!DOCTYPE html>\n";
        $html .= "<!--[if IE 9]><html class='lt-ie10' lang='en' > <![endif]-->\n";
        $html .= "<html lang='en' >\n";
        $html .= "<head>\n";
        $html .= "<meta charset='utf-8'>\n";
        $html .= "<meta name='viewport' content='width=device-width, initial-scale=1.0'>\n";
        $html .= "<title>".$title_page."</title>\n";
        
        if(count($css) > 0){
            foreach($css as $csses){
                $html .= "<link rel=\"stylesheet\" href='".site_url("/assets/".$csses.".css")."' type=\"text/css\" />\n";
            }
        }
        
        if(count($js ) > 0){
            foreach($js as $jses){
                $html .= "<script src='".site_url("/assets/".$jses.".js")."'></script>\n";
            }
        }
        
        if(in_array("js/fsapi",$js)){
            $html .= "<script>FireShotAPI.AutoInstall = true;</script>";
        }
        
        if($drawing_tool > 0){
            $html .= "<link rel='stylesheet' href='".site_url("assets/js/wPaint/lib/wColorPicker.min.css")."' type='text/css'/>\n";
            $html .= "<script src='".site_url("assets/js/wPaint/lib/wColorPicker.min.js")."'></script>\n";
            $html .= "<link rel=\"stylesheet\" href='".site_url("assets/js/wPaint/wPaint.min.css")."' type=\"text/css\"/>\n";
            $html .= "<script src='".site_url("assets/js/wPaint/wPaint.min.js")."'></script>\n";

            $wPaintPlugins = array(
                "plugins/main/wPaint.menu.main.min.js",
                "plugins/text/wPaint.menu.text.min.js",
                "plugins/shapes/wPaint.menu.main.shapes.min.js",
                "plugins/file/wPaint.menu.main.file.min.js"
            );
            foreach($wPaintPlugins AS $wPaintPlugin){
                $html .= "<script src='".site_url("assets/js/wPaint/" . $wPaintPlugin)."'></script>";
            }
        }
        
        $html .= "</head><body onLoad='FireShotAPI.checkAvailability()'>";
        
        return $html;
    }
    
    public function footer(){// Geoff Update December 16
        $html = null;
        $html .= "<script src='".site_url("/assets/css/foundationFive/js/foundation/foundation.js")."'></script>";
        $html .= "<script src='".site_url("/assets/css/foundationFive/js/foundation/foundation.orbit.js")."'></script>";
        $html .= "<script src='".site_url("/assets/css/foundationFive/js/foundation/foundation.reveal.js")."'></script>";
        $html .= "<script>$(document).ready(function(){ $(this).foundation(); });</script>";
        $html .= "<footer class='center-txt'>Copyright 2013 All Rights Reserved - Powered by Artisans Handy Gifts Inc.</footer>";
        $html .= "</body></html>";
        return $html;
    }
}