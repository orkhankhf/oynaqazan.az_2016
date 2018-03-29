<?php
    session_start();
?>
<html>
<head>
        <link rel="alternate" hreflang="az" href="http://oynaqazan.az/users" />
        <meta http-equiv="content-language" content="az" />
        <meta name="keywords" content="oyun, oynaqazan, oyna qazan, oyunlar, komputer oyunlari, pul qazanmaq, uduslu oyunlar, pul qazanmagin yollari, online pul qazanmaq, internetden pul qazanmaq, pul qazanmaq " />
        <meta name="description" content="Çox asanlıqla 100 MANAT əldə edin! Sadəcə oynayın, birinci olun!" />
        <link rel="author" href="https://plus.google.com/108728687434805525511/posts"/>
        <meta name="abstract" content="Oyna, qalib ol və 100 MANAT qazan !" />
        <meta name="copyright" content="Bakuweb Dizayn Studiyası" />
        <meta name="robots" content="index, follow" />
        <meta property="og:url" content="http://oynaqazan.az/users" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="OynaQazan.az - Hər ay qalib 100 AZN mükafat alacaq !" />
        <meta property="og:description" content="1.Yer 100 AZN - 2.Yer 30 AZN - 3.Yer 20 AZN | Oynayın və qazanın !" />
        <meta property="og:image" content="http://oynaqazan.az/img/facebook_post_a.png" />
        <meta property="og:image:type" content="image/png" />
        <meta property="og:image:width" content="400" />
        <meta property="og:image:height" content="300" />
        <meta property="fb:app_id" content="570724243127152" />
        <meta property="fb:admins" content="OrxanDWK" />
        <meta property="og:site_name" content="Oynaqazan.az" />
    <meta charset="utf-8">
    <link rel="icon" href="../img/favicon.png" type="image/png" sizes="16x16">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script src="../css/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/my_native.css">
    <title>Top 100</title>
</head>
<body>
<script data-cfasync="false" src="//d3alijertxiv6b.cloudfront.net/?jilad=640719"></script>
    <script type="text/javascript">
        //eger inspect element aciqdirsa login sehifesine qaytarir
        setInterval(function(){
            var checkStatus;
            var element = new Image();
            element.__defineGetter__('id', function() {
               checkStatus = 'on';
               alert("Elementlərə baxmaq olmaz !");
               window.location.href = "../";
            });
            checkStatus = 'off';
            console.log(element);
            console.clear();
        },500);
        //eger inspect element aciqdirsa login sehifesine qaytarir
    </script>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-center">
                        <thead>
                        <?php
                            if(isset($_SESSION['user_idsdf5b156dsf1b64b5dfs1b56dsf'])){
                                echo "<a href='../oyun' ><button class='btn table_top_btn'>Oyun Səhifəsinə Qayıt</button></a>";
                            }else{
                                echo "<a href='../' ><button class='btn table_top_btn'>Ana Səhifə</button></a>";
                            }
                        ?>
                        <a href='../users' ><button class='btn table_top_btn'>TOP 100'ə Qayıt</button></a>
                        <p class="table_ekran_bildiris_yazisi_p">Bu siyahını tam görmək üçün zəhmət olmasa böyük ekranlı cihazlarla daxil olun.</p>
                            <tr>
                                <th>Yer</th>
                                <th>İstifadəçi Adı</th>
                                <th class="qizil_xal_th">QIZIL XAL</th>
                                <th>Bu Gün Qazanılan Xal</th>
                                <th>Cəmi Xal</th>
                                <th>Cinsiyyət</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            include "../db/db.php";
                            $yer = 1;
                            if($conn){
                                $select = "SELECT istifadeci_adi,xal,toplam_xal,cinsiyyet,qizil_xal FROM istifadeciler WHERE ban_status = 0 AND qizil_xal>0 ORDER BY qizil_xal DESC,toplam_xal DESC,xal DESC LIMIT 100";
                                $netice = mysqli_query($conn,$select);
                                while ($row = mysqli_fetch_assoc($netice)){
                                    if($yer == 1){
                                        $reng = "class='success'";
                                    }else if($yer == 2){
                                        $reng = "class='info'";
                                    }else if($yer == 3){
                                        $reng = "class='warning'";
                                    }else{
                                        $reng = "class='active'";
                                    }
                                    if($row['cinsiyyet'] == 1){
                                        $cins_reng = "kisi_reng";
                                    }else{
                                        $cins_reng = "qadin_reng";
                                    }
                                    echo "<tr ".$reng.">
                                            <td>".$yer."</td>
                                            <td>".substr($row['istifadeci_adi'], 0, -3)."***</td>
                                            <td class='qizil_xal_td'>".$row['qizil_xal']."</td>
                                            <td>".$row['xal']."</td>
                                            <td>".$row['toplam_xal']."</td>
                                            <td><span class='glyphicon glyphicon-user ".$cins_reng."'></span></td>
                                        </tr>";
                                    $yer ++;
                                }
                                mysqli_close($conn);
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>