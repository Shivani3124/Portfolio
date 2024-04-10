
<?php

$user=filter_input(INPUT_POST,"username");
$email=filter_input(INPUT_POST,"email");
$contact=filter_input(INPUT_POST,"telephone");
$feedback=filter_input(INPUT_POST,"feedback");


if(!empty($user)){
    if(!empty($email)){
      $host="localhost";
      $username="root";
      $dbpassword="";
      $db_name="mca1";

        $conn= new mysqli($host,$username,$dbpassword,$db_name);

        if(mysqli_connect_error()){
            echo "connection error";
        }
        else {

            $sql= "INSERT INTO feedback(username,email,contact,feedback)
                  VALUES ('$user','$email','$contact','$feedback')";

                  if($conn->query($sql)){
                    header("location:success.php");
        }
        $conn->close();
    }
}
    else{
        echo "<script> alert('email must be required.'); </script>";
    }

}
else{
    echo "<script> alert('username must be required.'); </script>";
}

?>