<?
class User
{
    public $id;
    public $username;
    public $password;

    public static function authenticate($conn, $username, $password)
    {
        $sql = "select * from users where username=:username";
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
    public static function findByUsernameAndPassword($conn, $username, $password)
    {
        $sql = "select * from user where username=:username and password=:password";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->bindValue(':password', $password, PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $stmt->execute();
        $user = $stmt->fetch();

        return $user;
    }
}
