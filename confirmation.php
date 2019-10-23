<?php

// Report all errors
//    error_reporting(E_ALL);
//    var_dump($_POST);
//    var_dump($GLOBALS);

    $first = $_POST['firstName'];
    $last = $_POST['lastName'];
    $address = $_POST['address'];
    $method = $_POST['method'];
    $size = $_POST['size'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Poppa's Pizza</title>
</head>
<body>
    <h1>Thank you for your order!</h1>
    <h2>Order Summary:</h2>
    <p>Name:
        <?php echo "$first $last"; ?>
    </p>
    <p>Address:
        <?php echo "$address"; ?>
    </p>
    <p>Method:
        <?php echo "$method"; ?>
    </p>
    <p>Size:
        <?php echo "$size"; ?>
    </p>

    <?php
      //Send order by email
      //Note: this will probably go to your spam folder
      $email = "pgarton@mail.greenriver.edu";
      $email_body = "Pizza Order Summary --\r\n";
      $email_body .= "Name:  $first $last\r\n";
      $email_subject = "New Order Placed";
      $to = $email;
      $headers = "From: $email\r\n";
      $headers .= "Reply-To: $email \r\n";
      $success = mail($to, $email_subject, $email_body, $headers);

      //Print final confirmation
      $msg = $success ? "Your order was successfully placed."
                : "We're sorry. There was a problem with your order. Please call (333)222-1111.";
      echo "<p>$msg</p>";
    ?>

</body>
</html>
