<?
    class User{
        public $id;
        public $username;
        public $password;

        public static function authenticate($conn, $username, $password)
        {
            $sql = "select * from _user where username=:username";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':username', $username, PDO::PARAM_STR);
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $stmt->execute();
            $user = $stmt->fetch();

            if ($user) {
                $hash = $user->password;
                return password_verify($password, $hash);
            }
        }
        public static function findUserById($conn, $id)
        {
            $sql = "select * from user where id=:id";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_STR);
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $stmt->execute();
            $user = $stmt->fetch();

            return $user;
        }
    }
?>