<?php
    session_start();
    require_once('config.php');
?>
<?php
    if (isset($_POST)) {
        $username = $_POST['username'];
        $password = sha1($_POST['password']);

        $sql = "SELECT * FROM User WHERE username = ? AND password = ?";
        $stmtselect = $db->prepare($sql);
        $result = $stmtselect->execute([$username, $password]);
        if ($result) {
            $user = $stmtselect->fetch(PDO::FETCH_ASSOC);
            if($stmtselect->rowCount() > 0) {
                $_SESSION['userlogin'] = $user;
                echo 'You will be redirected';

            } else {
                echo 'Invalid username or password';
            }
        }

    } else {
        echo 'No data processed';
    }
?>