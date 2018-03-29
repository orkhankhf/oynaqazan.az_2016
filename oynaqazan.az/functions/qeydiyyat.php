<?php
	if(isset($_POST['ad']) && isset($_POST['istifadeci_adi']) && isset($_POST['sifre']) && isset($_POST['email']) && isset($_POST['cinsiyyet']) && isset($_POST['nomre'])){

		$ad = trim($_POST['ad']);
		$istifadeci_adi = trim($_POST['istifadeci_adi']);
        $istifadeci_adi = strtolower($istifadeci_adi);
		$sifre = trim($_POST['sifre']);
        $sifre = strtolower($sifre);
		$email = trim($_POST['email']);
		$cinsiyyet = trim($_POST['cinsiyyet']);
		$nomre = trim($_POST['nomre']);
		$ip = $_SERVER['REMOTE_ADDR'];

		$ad = ereg_replace("[^a-zA-ZƏəÖöĞğÇçŞşİIıÜüş]", "", $ad);
		$istifadeci_adi = ereg_replace("[^a-zA-Z0-9]", "", $istifadeci_adi);
		$sifre = ereg_replace("[^a-zA-Z0-9]", "", $sifre);
		$email = ereg_replace("[^a-zA-Z0-9_.+@-]", "", $email);
		$cinsiyyet = ereg_replace("[^0-9]", "", $cinsiyyet);
		$nomre = ereg_replace("[^0-9]", "", $nomre);
		$ip = ereg_replace("[^0-9.]", "", $ip);

		date_default_timezone_set("Asia/Baku");
		$date = new \DateTime();
		$tarix = date_format($date, 'y/m/d');

		$saat = date_format($date, 'H:i');


		include "../db/db.php";
		if($conn){
			$select = "SELECT email FROM istifadeciler WHERE email = '$email'";
			$netice = mysqli_query($conn,$select);
			while(mysqli_fetch_assoc($netice)){
				$email_artiq_var = true;
			}
			$select = "SELECT istifadeci_adi FROM istifadeciler WHERE istifadeci_adi = '$istifadeci_adi'";
			$netice = mysqli_query($conn,$select);
			while(mysqli_fetch_assoc($netice)){
				$istifadeci_adi_artiq_var = true;
			}
			if(isset($istifadeci_adi_artiq_var)){
				echo "istifadeci_adi_artiq_var";
				die();
			}else if(isset($email_artiq_var)){
				echo "email_artiq_var";
				die();
			}else{
                $email_md5 = md5('fgnfgnfgrtjh54151nfg'.md5('fgbnfgdndfgngfn'.md5('jtrnrthdnfg'.$email)));
				$insert = "INSERT INTO istifadeciler (ad,istifadeci_adi,sifre,email,email_md5,cinsiyyet,nomre,tarix,saat,ip) VALUES ('$ad','$istifadeci_adi','$sifre','$email','$email_md5','$cinsiyyet','$nomre','$tarix','$saat','$ip')";
				$netice = mysqli_query($conn,$insert);
				if($netice){
					echo "ok";
				}
			}
			mysqli_close($conn);
		}

	}else{
		echo "Məlumatlar düzgün deyil !";
	}
?>