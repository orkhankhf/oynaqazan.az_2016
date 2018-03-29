<?php
    if( isset($_POST['fdb651dfb56f1dsb651dfs56b1df56sb165dsfb156df1b56ds1b56df1sbsdf651b65er41b8156dfs1b56dsf15b6dsf']) && 
        isset($_POST['jk5f1v56549fbd5bdf56v1s56b84b9srb4165sfdb14sdf98b4rshs65bfdsb489s4ht65rs1b89fg4b8gh56s1bf894h']) && 
        isset($_POST['sdjklns564s65d1sd864sd894sd65s1d65sd4s98d4sd651sd56sd1489sd41561sd']) && 
        isset($_POST['fingerprint']) && 
        is_numeric($_POST['sdjklns564s65d1sd864sd894sd65s1d65sd4s98d4sd651sd56sd1489sd41561sd']) && 
        is_numeric($_POST['fdb651dfb56f1dsb651dfs56b1df56sb165dsfb156df1b56ds1b56df1sbsdf651b65er41b8156dfs1b56dsf15b6dsf']) && 
        is_numeric($_POST['jk5f1v56549fbd5bdf56v1s56b84b9srb4165sfdb14sdf98b4rshs65bfdsb489s4ht65rs1b89fg4b8gh56s1bf894h']) && 
        is_numeric($_POST['fingerprint'])){


        $id = $_POST['jk5f1v56549fbd5bdf56v1s56b84b9srb4165sfdb14sdf98b4rshs65bfdsb489s4ht65rs1b89fg4b8gh56s1bf894h'];
        $xal = $_POST['fdb651dfb56f1dsb651dfs56b1df56sb165dsfb156df1b56ds1b56df1sbsdf651b65er41b8156dfs1b56dsf15b6dsf'];
        //nece dene sekil acib/click edibse onu alir
        $click = $_POST['sdjklns564s65d1sd864sd894sd65s1d65sd4s98d4sd651sd56sd1489sd41561sd'];

        $fingerprint = $_POST['fingerprint'];

        $id = ereg_replace("[^0-9]", "", $id);
        $id = substr($id, 100,-100);

        $xal = ereg_replace("[^0-9]", "", $xal);
        $xal = substr($xal, 100,-100);

        $click = ereg_replace("[^0-9]", "", $click);

        $fingerprint = ereg_replace("[^0-9]", "", $fingerprint);

        //150den xali cixir eger click sayina beraber deyilse demeli hiyle isledilib
        $test_click = 150-$xal;

        if($test_click == $click && $id > 0 && $xal <= 140){
            include "../db/db.php";

            if($conn){
                $select = "SELECT last_online_time,last_online_browser_fingerprint FROM istifadeciler WHERE id = '$id'";
                $netice = mysqli_query($conn,$select);
                while($row = mysqli_fetch_assoc($netice)){
                    $last_online_time = $row['last_online_time'];
                    $last_online_browser_fingerprint = $row['last_online_browser_fingerprint'];
                }
                date_default_timezone_set("Asia/Baku");
                $now = strtotime("-5 minutes");
                $date = new \DateTime();

                if($fingerprint == $last_online_browser_fingerprint || $now > strtotime($last_online_time)){
                    $update_last_online_time = date_format($date, 'y/m/d H:i');
                    $update_xal = "UPDATE istifadeciler SET xal = xal+'$xal', toplam_xal = toplam_xal+'$xal', last_online_time = '$update_last_online_time',last_online_browser_fingerprint = '$fingerprint' WHERE id = '$id'";
                    $netice = mysqli_query($conn,$update_xal);
                    if($netice){
                        echo "ok";
                    }
                    mysqli_close($conn);
                }else{
                    echo "diffrent_login_detected";
                }
            }
        }else{
            include "../db/db.php";

            if($conn){
                $update_xal = "UPDATE istifadeciler SET ban_status = 1 WHERE id = '$id'";
                $netice = mysqli_query($conn,$update_xal);
                mysqli_close($conn);
                if($netice){
                    echo "ban1";
                }
            }
        }
    }else{
        $id = $_POST['jk5f1v56549fbd5bdf56v1s56b84b9srb4165sfdb14sdf98b4rshs65bfdsb489s4ht65rs1b89fg4b8gh56s1bf894h'];
        include "../db/db.php";

        if($conn){
            $delete = "UPDATE istifadeciler SET ban_status = 1 WHERE id = '$id'";
            $netice = mysqli_query($conn,$delete);
            mysqli_close($conn);
        }
    }
?>