<?php

function default_css(){
	$default = check_file_exists(array('light.css'));
	if(empty($default)){
		$default = array_values(array_filter(scandir('.'), 'filter_css'));
		return array($default[0]);
	}
	return $default;
}

function filter_css($file){
	$file = explode('.', $file);
	return $file[count($file) - 1] == 'css';
}

function check_file_exists($file){
	foreach($file as $key => $value)
		if(!file_exists($value))
			unset($file[$key]);
	return array_unique($file);
}

function get_css($entry){
	$include = check_file_exists(explode('+', $entry));
	return (!empty($include)) ? $include : default_css();
}

if(isset($_COOKIE['css_stylesheet']) && !isset($_GET['style'])){
		$include = get_css($_COOKIE['css_stylesheet']);
} else {
		$include = (isset($_GET['style'])) ? get_css($_GET['style']) : default_css();
}
setcookie('css_stylesheet', implode('+', $include));

header('Content-type: text/css');
if(isset($_GET['style']))
	(isset($_SERVER['HTTP_REFERER'])) ?	header("Location:".$_SERVER['HTTP_REFERER']) : header("Location:http://".$_SERVER['SERVER_NAME']);
if(!empty($include)) { foreach($include as $value) include $value; } else { die(".css NOT FOUND"); }
