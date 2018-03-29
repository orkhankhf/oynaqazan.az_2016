<?php
    $user_id = substr($_GET['bg5b2fe6d9gv'],15);
    $sifrelenmis_email = $_GET['hj5dc2w654d'];
    $sifrelenmis_email = substr($sifrelenmis_email,6);
    $sifrelenmis_email = substr($sifrelenmis_email,0,-6);
    include "../db/db.php";
    if($conn){
        $select = "SELECT id FROM istifadeciler WHERE id = '$user_id' AND email_md5 = '$sifrelenmis_email'";
        $netice = mysqli_query($conn,$select);
        while(mysqli_fetch_assoc($netice)){
            $tehluke_yoxdur = true;
        }
        if(!isset($tehluke_yoxdur)){
            echo "<script>window.location.href='../'</script>";
        }
        mysqli_close($conn);
    }
?>
<html lang="az">
<head>
        <link rel="alternate" hreflang="az" href="http://oynaqazan.az/yeni_sifre" />
        <meta http-equiv="content-language" content="az" />
        <meta name="keywords" content="oyun, oynaqazan, oyna qazan, oyunlar, komputer oyunlari, pul qazanmaq, uduslu oyunlar, pul qazanmagin yollari, online pul qazanmaq, internetden pul qazanmaq, pul qazanmaq " />
        <meta name="description" content="Çox asanlıqla 100 MANAT əldə edin! Sadəcə oynayın, birinci olun!" />
        <link rel="author" href="https://plus.google.com/108728687434805525511/posts"/>
        <meta name="abstract" content="Oyna, qalib ol və 100 MANAT qazan !" />
        <meta name="copyright" content="Bakuweb Dizayn Studiyası" />
        <meta name="robots" content="index, follow" />
        <meta property="og:url" content="http://oynaqazan.az" />
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
    <meta charset="UTF-8">
    <link rel="icon" href="../img/favicon.png" type="image/png" sizes="16x16">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Yeni Şifrə</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap/css/bootstrap.min.css">
    <script src="../js/jquery.min.js"></script>
    <script src="../css/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/my_native.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <button type="button" class="btn btn-info btn-lg sifre_berpa_pop_up_btn" data-toggle="modal" data-target="#sifre_berpa_id"></button>

            <div class="modal fade" id="sifre_berpa_id" role="dialog">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="form-group">
                            <input type="password" class="form-control sifre" placeholder="Şifrə">
                            <div class="alert alert-danger xeta_alt sifre_xeta col-xs-12"></div>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control sifre_tesdiq" placeholder="Şifrə Təsdiq">
                            <div class="alert alert-danger xeta_alt sifre_tesdiq_xeta col-xs-12"></div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-12">
                                    <button id="sifre_berpa_submit" class="form-control">Təsdiqlə</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
    $(".sifre_berpa_pop_up_btn").click();
    $("#sifre_berpa_submit").on("click",function(){
        var yeni_sifre = $(".sifre").val();
        var yeni_sifre_tesdiq = $(".sifre_tesdiq").val();
        if(yeni_sifre.length < 6){
            $(".sifre_xeta").text("Şifrə 6 simvoldan qısa ola bilməz !");
            $(".sifre_xeta").show("slow");
        }else if(yeni_sifre.length > 35){
            $(".sifre_xeta").text("Şifrə 35 simvoldan uzun ola bilməz !");
            $(".sifre_xeta").show("slow");
        }else if(!herf_reqem_yoxla(yeni_sifre)){
            $(".sifre_xeta").text("Şifrə sadəcə hərf və rəqəmlərdən ibarət ola bilər !");
            $(".sifre_xeta").show("slow");
        }else if(yeni_sifre_tesdiq == ""){
            $(".sifre_tesdiq_xeta").text("Şifrənizi təsdiqləyin !");
            $(".sifre_tesdiq_xeta").show("slow");
        }else if(yeni_sifre != yeni_sifre_tesdiq){
            $(".sifre_tesdiq_xeta").text("Şifrələr eyni deyil !");
            $(".sifre_tesdiq_xeta").show("slow");
        }else{
            var user_id = "<?php echo $user_id; ?>";
            var sifrelenmis_email = "<?php echo $sifrelenmis_email; ?>";
            $.ajax({
                url:"../functions/set_new_password.php",
                method:"POST",
                data:{a:yeni_sifre,b:user_id,c:sifrelenmis_email},
                success:function(gelen){
                    if(gelen == "ok"){
                        $("#sifre_berpa_id").fadeOut(600);
                        setTimeout(function(){
                           $(".modal-content").html("<div class='alert alert-success'><strong>Şifrəniz dəyişdirildi !</strong><p>Zəhmət olmasa <a href='../'> Ana Səhifəyə </a> qayıdaraq yeni şifrənizlə hesabınıza daxil olun.</p></div>");
                        },650);
                        setTimeout(function(){
                            $("#sifre_berpa_id").slideDown(600);
                        },1000);
                    }else{
                        alert("Xəta baş verdi!\nYenidən şifrənizi bərpa etmək üçün\nana səhifəyə qayıdın və təkrar yoxlayın.");
                    }
                },
                error:function(err){
                    alert("Xəta baş verdi! Səhifəni yeniləyib təkrar yoxlayın.");
                }
            });
        }
    });
    $("#sifre_berpa_id").keyup(function(event){
        if(event.keyCode == 13){
            $("#sifre_berpa_submit").click();
        }
    });
    function herf_reqem_yoxla(herf_ve_reqem) {
        var pattern = new RegExp(/^[a-zA-Z0-9ƏəÖöĞğÇçŞşİIıÜüş]+$/);
        return pattern.test(herf_ve_reqem);
    };
    $("input").on("focus",function(){
        $(".xeta_alt").hide("slow");
    });
    $('input').keydown(function() {
        $(".xeta_alt").hide("slow");
    });
</script>
</body>
</html>
