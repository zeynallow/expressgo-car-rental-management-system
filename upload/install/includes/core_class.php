<?php

class Core {

	function validate_post($data){

		return !empty($data['hostname']) && !empty($data['username']) && !empty($data['database']);
	}

	function show_message($type,$message) {
		return '<div class="alert alert-'.$type.'">
		'.$message.'
		</div>';
	}

	function write_config($data) {

		$template_path 	= 'config/database.php';
		$output_path 	= '../application/config/database.php';

		$database_file = file_get_contents($template_path);

		$new  = str_replace("%HOSTNAME%",$data['hostname'],$database_file);
		$new  = str_replace("%USERNAME%",$data['username'],$new);
		$new  = str_replace("%PASSWORD%",$data['password'],$new);
		$new  = str_replace("%DATABASE%",$data['database'],$new);

		$handle = fopen($output_path,'w+');

		@chmod($output_path,0777);

		if(is_writable($output_path)) {

			if(fwrite($handle,$new)) {
				return true;
			} else {
				return false;
			}

		} else {
			return false;
		}
	}

		 function deleteDir($dirPath) {
    if (! is_dir($dirPath)) {
        throw new InvalidArgumentException("$dirPath must be a directory");
    }
    if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
        $dirPath .= '/';
    }
    $files = glob($dirPath . '*', GLOB_MARK);
    foreach ($files as $file) {
        if (is_dir($file)) {
            self::deleteDir($file);
        } else {
            unlink($file);
        }
    }
    rmdir($dirPath);
}


}