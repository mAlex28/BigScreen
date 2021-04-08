<?php
    require_once('config.php');
?>
<?php
    if (isset($_POST)) {
        $email = $_POST['email'];

        // check if the user is valid
        $stmt = $db->prepare("SELECT * FROM User WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $result = is_array($user)
                ? "" 
                :$email . " is not registered." ;

        // check the preveious request - prevent spam
        if ($result == "") {
            $stmt = $db->prepare("SELECT * FROM `password_reset` WHERE `user_id`=?");
            $stmt->execute([$user['id']]);
            $request = $stmt->fetch(PDO::FETCH_ASSOC);
            $now = strtotime("now");
            if (is_array($request)) {
                $expire = strtotime($request['reset_time']) + $prvalid;
                if ($now < $expire) { $result = "Please try again later"; }
            }
        }

        // create new reset request
        if ($result == "") {
            // RANDOM HASH
            $hash = md5($user['email'] . $now);
        
            // DATABASE ENTRY
            $stmt = $db->prepare("REPLACE INTO `password_reset` VALUES (?,?,?)");
            $stmt->execute([$user['id'], $hash, date("Y-m-d H:i:s")]);
        
            // SEND EMAIL
            $from = "alexthegeek2001@gmail.com";
            $subject = "Password reset";
            $header = implode("\r\n", [
            "From: $from",
            "MIME-Version: 1.0",
            "Content-type: text/html; charset=utf-8"
            ]);
            $link = "http://localhost/reset_confirm.php?i=".$user['id']."&h=".$hash;
            $message = "<a href='$link'>Click here to reset password</a>";
            if (!@mail($user['email'], $subject, $message, $header)) {
                $result = "Failed to send email!";
            }
        }

        if ($result=="") { $result = "Email has been sent - Please click on the link in the email to confirm."; }
        echo "$result";

    } else {
        echo 'No data processed';
    }
?>