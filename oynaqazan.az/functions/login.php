<?php
	session_start();
	if(isset($_POST['login']) && isset($_POST['login_sifre']) && isset($_POST['fingerprint'])){

		$users_browser_fingerprint = $_POST['fingerprint'];
		$login = trim($_POST['login']);
		$login = strtolower($login);
		$login_sifre = trim($_POST['login_sifre']);
		$login_sifre = strtolower($login_sifre);
		$login = ereg_replace("[^A-Za-z0-9]", "", $login);
		$login_sifre = ereg_replace("[^A-Za-z0-9]", "", $login_sifre);

		include "../db/db.php";
		if($conn){

			$select = "SELECT istifadeci_adi FROM istifadeciler WHERE istifadeci_adi = '$login'";
			$netice = mysqli_query($conn,$select);
			while($row = mysqli_fetch_assoc($netice)){
				$istifadeci_adi = $row['istifadeci_adi'];
			}
			if(!isset($istifadeci_adi)){
				echo "istifadeci_adi_yoxdur";
				die();
			}else{
				$select = "SELECT sifre,id,ban_status,last_online_time,last_online_browser_fingerprint FROM istifadeciler WHERE istifadeci_adi = '$login'";
				$netice = mysqli_query($conn,$select);
				while($row = mysqli_fetch_assoc($netice)){
					$sifre_db = $row['sifre'];
					$user_id = $row['id'];
					$ban_status = $row['ban_status'];
					$last_online_time = $row['last_online_time'];
					$last_online_browser_fingerprint = $row['last_online_browser_fingerprint'];
				}
			}

			date_default_timezone_set("Asia/Baku");
			$now = strtotime("-5 minutes");

			if($users_browser_fingerprint == $last_online_browser_fingerprint || $now > strtotime($last_online_time)){
				if($ban_status == 1){
					echo "banned_user";
				}else if($login == $istifadeci_adi && $login_sifre == $sifre_db){
					$now = strtotime("-5 minutes");
	                date_default_timezone_set("Asia/Baku");
	                $date = new \DateTime();
	                $last_online_time = date_format($date, 'y/m/d H:i');

					$update_finderprint_and_last_login_time = "UPDATE istifadeciler SET last_online_time = '$last_online_time',last_online_browser_fingerprint = '$users_browser_fingerprint' WHERE id = '$user_id'";

                    $netice = mysqli_query($conn,$update_finderprint_and_last_login_time);

					echo "ok";
					$_SESSION['user_idsdf5b156dsf1b64b5dfs1b56dsf'] = $user_id;
					$_SESSION['fingerprint_vd6fv25d6f1v5dfvfd51vb6df'] = $users_browser_fingerprint;
				}else{
					echo "sifre_yalnisdir";
				}
			}else{
				echo "diffrent_login_detected";
			}
			mysqli_close($conn);
		}
	}else{
		echo "Məlumatlar düzgün deyil !";
	}
?>