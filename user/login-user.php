 <?php
    session_start();
    error_reporting(0);
    try {
        include('../include/dbconn.php');
        if (isset($_POST["login"])) {
            $query = "SELECT * FROM users WHERE username = :username AND password = :password";
            $statement = $conn->prepare($query);
            $statement->execute(
                array(
                    'username'     =>     $_POST["username"],
                    'password'     =>     md5($_POST["password"])
                )
            );
            $count = $statement->rowCount();
            if ($count != 0) {
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                $verified = $row['verified'];
                echo $verified;
                if ($verified == 1) {
                    $_SESSION["username"] = $_POST["username"];
                    header("location:login_success.php");
                } else {
                    echo "<script>alert('Account not verified!Verify Account through email!');document.location='../login.php'</script>";
                }
            } else {
                echo "<script type='text/javascript'>alert('Invalid Login Details!');document.location='../login.php'</script>";
            }
        }
    } catch (PDOException $error) {
        echo $error->getMessage();
    }
    ?> 