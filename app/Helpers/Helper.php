<?php 
    /**
     * Global function untuk semua controller
     *
     */
    namespace App\Helpers;

    class Helper
    {
        public static function arr($data)
        {	
			echo "<pre>";
			print_r($data);
			echo "</pre>";            
        }
    }
?>