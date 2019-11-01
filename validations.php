<?php
function has_presence($value){
    return isset($value) && $value!=""; 
    }

    function error_report($erors=array()){
    $output="";
    if(!empty($erors)){
    	$output.= "Please fix the errors";
    	$output.= "<ul>";
        foreach ($erors as $key => $error) {
        	# code...
            $output.= "<li>";
            $output.= $error;
        }
        $output.= "</ul>";
    }
    	return $output;
    }
?>