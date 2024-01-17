<?
    class Auth{
        public static function isLoggedIn(){
            return isset($_SESSION['logged_in']) && $_SESSION['logged_in'];
        }

        public static function requireLogin(){
            if(!static::isLoggedIn()){
                die('Please login to continue !');
            }
        }

        public static function login(){
            session_regenerate_id(true);
            $_SESSION['logged_in'] = true;
        }

        public static function logout(){
            if(ini_get("session.use_cookies")){
                $params = session_get_cookie_params();
                setcookie(session_name(),
                '',
                time() - 42000,
                $params['path'],
                $params['domain'],
                $params['secure'],
                $params['httponly']);
            }
            session_destroy();
        }

    }
?>