
<?php
include "db_conn.php";

if(isset($_POST['loginBtn']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $usertype = "normal_user";
    $password = sha1($password);

    

    echo $username;
    echo $password;
    

    $sql = "SELECT username, userpassword FROM users WHERE usernames='$username' AND userpassword='$password'";

    $stmt=$conn->prepare($sql);
    $stmt->bind_param("ss", $username,$password);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    session_regenerate_id();
    $_SESSION['username'] = $row['usernames'];
    $_SESSION['role'] = $usertype;
    session_write_close();

    if($result->num_rows ==1 && $_SESSION['role']=="normal_user")
    {
        header("location:dashboard.html");
    }
/*
    elseif($result->num_rows ==1 && $_SESSION['role']=="admin")
    {
        header("location:admin.php");
    }
    */
    else
        $msg = "Username or Password is incorrect !";
}
?>