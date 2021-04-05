<?php
    require_once('config.php');
?>
<?php
    if (isset($_POST)) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = sha1($_POST['password']);

        // check if the username exist
        $stmt_check = $db->prepare("SELECT * FROM User WHERE username=:username");
        $stmt_check->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt_check->execute();
        $count = $stmt_check->fetchColumn();

        // check if the email exist
        $stmt_checkemail = $db->prepare("SELECT * FROM User WHERE email=:email");
        $stmt_checkemail->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt_checkemail->execute();
        $countemail = $stmt_checkemail->fetchColumn();

        if($count > 0){
            echo 'User already exist';
            
        } else if ($countemail > 0){
            echo 'Email already exist';
        }
        else{
            $sql = "INSERT INTO User(fname, lname, email, username, password) VALUES (?, ?, ?, ?, ?)";
            $stmtinsert = $db->prepare($sql);
            $result = $stmtinsert->execute([$firstname, $lastname, $email, $username, $password]);
            if ($result) {
                echo 'Successfully registered, login to continue';
                header('Location: login.php');
            } else {
                echo 'An error occurred';
            }
        }
    } else {
        echo 'No data processed';
    }
?>