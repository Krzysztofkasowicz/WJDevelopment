<?php


class User
{
    private $login;
    private $password;
    /**
     * @var PDO
     */
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }
    public function getLogin(){
        return $this->login;
    }
    public function setLogin($login){
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return PDO
     */
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * @param PDO $connection
     */
    public function setConnection($connection)
    {
        $this->connection = $connection;
    }
    public function loginUser($login, $password)
    {
        $query = $this->connection->prepare("SELECT * FROM users WHERE login=:login");
        $query->bindParam(":login", $login);
        $query->execute();
        if ($query->rowCount() == 1) {
            if ($row = $query->fetch()) {
                $hashedPassword = $row["password"];
                if (password_verify($password, $hashedPassword)) {
                    session_start();
                    $_SESSION["username"] = $login;
                    header("Location: panel/main.php");
                } else {
                    echo "Niepoprawny login lub hasło";
                    return false;
                }
            }
        } else {
            echo "Niepoprawny email lub hasło";
            return false;
        }
    }
}