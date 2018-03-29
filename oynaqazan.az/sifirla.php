<?php
	include "db/db.php";
	if($conn){
		$select = "SELECT id FROM istifadeciler WHERE ban_status=0 AND xal > 0 ORDER BY xal DESC,toplam_xal DESC LIMIT 10";
		$netice = mysqli_query($conn,$select);

		$qizil_xal = 10;
		while($row = mysqli_fetch_assoc($netice)){
			$id = $row['id'];
			$update = "UPDATE istifadeciler SET qizil_xal = qizil_xal+'$qizil_xal' WHERE id = '$id'";
			mysqli_query($conn,$update);
			$qizil_xal--;
		}
		$butun_oyuncularin_xallarini_sifirla = "UPDATE istifadeciler SET xal = 0";
		$netice_b = mysqli_query($conn,$butun_oyuncularin_xallarini_sifirla);
		if($netice_b){
			echo "<script>window.location.href='../oynaqazan.az'</script>";
		}
	}
?>