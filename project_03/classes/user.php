<?
    class User {
        public $id;
        public $username;
        public $password;
        
        public function __construct($username, $password){
            $this->username = $username;
            $this->password = $password;
        }
        protected function validate(){
            return !empty($this->username) && !empty($this->password);
        }
        public static function authenticate($conn, $username, $password) {
            $sql = "select * from user where username=:username";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':username', $username, PDO::PARAM_STR);
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $stmt->execute();
            $user = $stmt->fetch();
            if($user) {
                $hash = $user->password;
                return password_verify($password, $hash);
            }
        }

        public function addUser($conn){
            if($this->validate()){
                $sql = "insert into user(username, password) values(:username, :password)";
                $stmt = $conn -> prepare($sql);
                $stmt -> bindValue(':username', $this->username, PDO::PARAM_STR);
                $hash = password_hash($this->password, PASSWORD_DEFAULT);
                $stmt -> bindValue(':password', $hash, PDO::PARAM_STR);
                return $stmt->execute();
            }
            return false;
        }
    }
?>