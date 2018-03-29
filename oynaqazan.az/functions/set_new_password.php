<?php
    if(isset($_POST['a']) && isset($_POST['b']) && isset($_POST['c'])){
        include "../db/db.php";
        if($conn){
            $yeni_sifre = $_POST['a'];
            $yeni_sifre = ereg_replace("[^a-zA-Z0-9]", "", $yeni_sifre);
            $user_id = $_POST['b'];
            $user_id = ereg_replace("[^0-9]", "", $user_id);
            $email_md5 = $_POST['c'];
            $email_md5 = ereg_replace("[^a-zA-Z0-9]", "", $email_md5);

            $update_sifre = "UPDATE istifadeciler SET sifre = '$yeni_sifre' WHERE id = '$user_id' AND email_md5 = '$email_md5'";
            $netice = mysqli_query($conn,$update_sifre);
            if($netice){
                echo "ok";
            }
            mysqli_close($conn);
        }
    }
?>