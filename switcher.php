<?php
function filter_css($file) {

	$file = explode('.', $file);
	$extension = $file[count($file) - 1];

	if($extension == "css") {
		return TRUE;
	}
	else {
		return FALSE;
	}

}

function default_css() {

	if(file_exists('style.css')) {
		$default = 'style.css';
	}
	elseif(file_exists('default.css')) {
		$default = 'default.css';
	}
	else {

		$files = scandir(".");
		$file = array_filter($files, 'filter_css');
		$file = explode('-', implode('-', $file));

		$default = $file[0];
	}
	return $default;

}




# Check for a cookie and set a cookie

            if(isset($_COOKIE['css_stylesheet']) && !isset($_GET['style'])) {

		            $include = (file_exists($_COOKIE['css_stylesheet'])) ? $_COOKIE['css_stylesheet'] : default_css();

	       
             }
             
            else {
		            # First of all, we check if there is any data passed, and if there isn't, we use the else statement:
		            if(isset($_GET)) {

				            if(!file_exists($_GET['style'])) {
					            $include = default_css();
				            }
				            else {
					            $include = $_GET['style'];
				            }
		            }

	                        # If any data isn't passed with the $_GET variable, we set a default style
	                        else {
		                        $include = default_css();

	                        }
	                        setcookie('css_stylesheet', $include);

	                       

                    }   

	            # Secure the include and Include it!
		                 $file = explode('.', $include);
	                     $extension = $file[count($file) - 1];
                # Include, if the coast is clear
                header("Content-type: text/css");
                if(isset($_GET['style']))
                (isset($_SERVER['HTTP_REFERER'])) ?	header("Location:".$_SERVER['HTTP_REFERER']) : header("Location:http://".$_SERVER['SERVER_NAME']);
                ($extension == "css") ? include $include : die("Please insert a .css file");
                

?>