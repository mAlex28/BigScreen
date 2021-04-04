<?php
    require_once('config.php');
?>
<?php
    if (isset($_POST['username_check'])) {
        $username = $_POST['username'];
        $sql = "SELECT * FROM User WHERE username='$username'";
        $results = mysqli_query($db, $sql);
        if (mysqli_num_rows($results) > 0) {
        echo "username taken";	
        }else{
        echo 'not_taken';
        }
        exit();
    }

    if (isset($_POST['email_check'])) {
        $email = $_POST['email'];
        $sql = "SELECT * FROM users WHERE email='$email'";
        $results = mysqli_query($db, $sql);
        if (mysqli_num_rows($results) > 0) {
          echo "email taken";	
        }else{
          echo 'not_taken';
        }
        exit();
    }

    if (isset($_POST)) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = sha1($_POST['password']);

        $sql = "INSERT INTO User(fname, lname, email, username, password) VALUES (?, ?, ?, ?, ?)";
        $stmtinsert = $db->prepare($sql);
        $result = $stmtinsert->execute([$firstname, $lastname, $email, $username, $password]);
        if ($result) {
            echo 'successfully registered';
        } else {
            echo 'an error occurred';
        }
    } else {
        echo 'No data processed';
    }