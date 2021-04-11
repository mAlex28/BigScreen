<?php
    require_once('config.php');
?>
<?php
    if (isset($_POST)) {
        $email = $_POST['email'];
        $password = sha1($_POST['password']);

        // check if the user is valid
        $stmt_check = $db->prepare("SELECT * FROM User WHERE email=:email");
        $stmt_check->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt_check->execute();
        $count = $stmt_check->fetchColumn();

        if($count <= 0){
            echo 'User does not exist';      
        } else {
            $stmt = $db->prepare("UPDATE User SET password = ? WHERE email = ?");
            $result = $stmt->execute([$password, $email]);
            if ($result) {
                echo  'Password reset successfull. Please re-login';
            } else {
                echo 'An error occurred';
            }
        }      

    } else {
        echo 'No data processed';
    }
?>