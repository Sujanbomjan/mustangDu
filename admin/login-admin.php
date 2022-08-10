 <?php
    session_start();
    error_reporting(0);
    try {
        include('../include/dbconn.php');
        if (isset($_POST["login"])) {
            $query = "SELECT * FROM admin WHERE username = :username AND password = :password";
            $statement = $conn->prepare($query);
            $statement->execute(
                array(
                    'username'     =>     $_POST["username"],
                    'password'     =>     $_POST["password"]
                )
            );
            $count = $statement->rowCount();
            if ($count > 0) {
                $_SESSION["adminname"] = $_POST["username"];
                header("location:login_success.php");
            } else {
                echo "<script type='text/javascript'>alert('Invalid Login Details!');document.location='admin-login.php'</script>";
            }
        }
    } catch (PDOException $error) {
        echo $error->getMessage();
    }
    ?> 