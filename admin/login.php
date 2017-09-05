<?php include 'layout/includes/header.php'; ?>
<?php session_start(); ?>
<form action='<?php echo htmlentities($_SERVER['PHP_SELF']); ?>' method="post">
    <h1>Admin Login</h1>
    <div>
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" name="login" value="Login">
    </div>
</form>

<?php include 'layout/includes/footer.php'; ?>

<?php

// Back End
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $username = filter_var($username, FILTER_SANITIZE_STRING);
    
    $password = $_POST['password'];
    $password = filter_var($password, FILTER_SANITIZE_STRING);
    $password = md5($password);
    
    include 'src/database/connect.php';

    $sth = $db->prepare("SELECT * FROM admins WHERE `username` = :username AND `password` = :password;");

    $sth->execute(array(
        ":username" => $username,
        ":password" => $password
    ));

    $results = $sth->fetchAll();
    if(count($results) > 0){
        foreach($results as $result){
            @$_SESSION['name'] = $result['name'];
            @$_SESSION['username'] = $result['username'];
            @$_SESSION['email'] = $result['email'];
            @$_SESSION['id'] = $result['id'];
        }
        header('Location: index.php');
    }
}
?>