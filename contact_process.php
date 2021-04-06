<?php
    require_once('config.php');
?>
<?php
    if (isset($_POST)) {
        $name = $_POST['tbName'];
        $email = $_POST['tbEmail'];
        $subject = $_POST['tbSubject'];
        $message = $_POST['tbMessage'];

        $sql = "INSERT INTO Contact(c_name, c_email, subject, message) VALUES (?, ?, ?, ?)";
        $stmtinsert = $db->prepare($sql);
        $result = $stmtinsert->execute([$name, $email, $subject, $message]);
            if ($result) {
                echo  'You will be contacted by an our agent soon';
            } else {
                echo 'An error occurred! Message not sent';
            }

    } else {
        echo 'No data processed';
    }
?>