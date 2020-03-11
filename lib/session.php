<?php 

        class session{
            public static function init(){
                session_start();
            }

            public static function set($key, $value){
                $_SESSION[$key] = $value;  
            }

            public static function get($key){
                if ($_SESSION[$key]) {
                   return $_SESSION[$key];

                }else {
                    return false;
                }
            }


            public static function checksession(){
                self:: init();
                if (self::get("login") == false) {
                    self:: destroy();
                    header("location: login.php");
                }
            }

          

            public static function destroy(){
                session_destroy();
                header("location: login.php");
            }
        }
?>


