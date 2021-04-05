<?php
    require_once('config.php');
?>
<?php
    if (isset($_POST)) {
        $username = $_POST['username'];
        $password = sha1($_POST['password']);

        $sql = "SELECT * FROM User WHERE email = ? AND password =? LIMIT 1";
        $stmtselect = $db->prepare($sql);
        $result = $stmtselect->execute([$username, $password]);
        if ($result) {
            $user = $stmtselect->fetch(PDO::FETCH_ASSOC);
            if($stmtselect->rowCount() > 0) {
                echo 'You will be redirected';
            } else {
                echo 'No user exist';
            }
        }

    } else {
        echo 'No data processed';
    }
?>