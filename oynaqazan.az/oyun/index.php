<?php
    session_start();
    if(!isset($_SESSION['user_idsdf5b156dsf1b64b5dfs1b56dsf']) && !isset($_SESSION['fingerprint_vd6fv25d6f1v5dfvfd51vb6df'])){
        echo "<script type='text/javascript'>window.location.href='../';</script>";
    }else{
        $id = $_SESSION['user_idsdf5b156dsf1b64b5dfs1b56dsf'];
        $fingerprint = $_SESSION['fingerprint_vd6fv25d6f1v5dfvfd51vb6df'];
        include "../db/db.php";

    }
?>
<!DOCTYPE html>
<html>
<head>
        <link rel="alternate" hreflang="az" href="http://oynaqazan.az/oyun" />
        <meta http-equiv="content-language" content="az" />
        <meta name="keywords" content="oyun, oynaqazan, oyna qazan, oyunlar, komputer oyunlari, pul qazanmaq, uduslu oyunlar, pul qazanmagin yollari, online pul qazanmaq, internetden pul qazanmaq, pul qazanmaq " />
        <meta name="description" content="Çox asanlıqla 100 MANAT əldə edin! Sadəcə oynayın, birinci olun!" />
        <link rel="author" href="https://plus.google.com/108728687434805525511/posts"/>
        <meta name="abstract" content="Oyna, qalib ol və 100 MANAT qazan !" />
        <meta name="copyright" content="Bakuweb Dizayn Studiyası" />
        <meta name="robots" content="index, follow" />
        <meta property="og:url" content="http://oynaqazan.az/oyun" />
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
    <title>OynaQazan</title>
</head>
<body class="oyun_body">
<?php
    $ajax_id = rand(1111111111,9999999999).rand(1111111111,9999999999).rand(1111111111,9999999999).rand(1111111111,9999999999).rand(1111111111,9999999999).rand(1111111111,9999999999).rand(1111111111,9999999999).rand(1111111111,9999999999).rand(1111111111,9999999999).rand(1111111111,9999999999).$id.rand(1111111111,9999999999).rand(1111111111,9999999999).rand(1111111111,9999999999).rand(1111111111,9999999999).rand(1111111111,9999999999).rand(1111111111,9999999999).rand(1111111111,9999999999).rand(1111111111,9999999999).rand(1111111111,9999999999).rand(1111111111,9999999999);
?>
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
    var click = 0;
    var BoxOpened = "";
    var ImgOpened = "";
    var Counter = 150;
    var ImgFound = 0;

    var Source = "#boxcard";

    var ImgSource = ["../img/a.png","../img/b.png","../img/c.png","../img/d.png","../img/e.png","../img/f.png","../img/g.png","../img/h.png","../img/i.png","../img/j.png"];

    function RandomFunction(MaxValue, MinValue) {
        return Math.round(Math.random() * (MaxValue - MinValue) + MinValue);
    }

    function ShuffleImages() {
        var ImgAll = $(Source).children();
        var ImgThis = $(Source + " div:first-child");
        var ImgArr = new Array();

        for (var i = 0; i < ImgAll.length; i++) {
            ImgArr[i] = $("#" + ImgThis.attr("id") + " img").attr("src");
            ImgThis = ImgThis.next();
        }

        ImgThis = $(Source + " div:first-child");

        for (var z = 0; z < ImgAll.length; z++) {
            var RandomNumber = RandomFunction(0, ImgArr.length - 1);

            $("#" + ImgThis.attr("id") + " img").attr("src", ImgArr[RandomNumber]);
            ImgArr.splice(RandomNumber, 1);
            ImgThis = ImgThis.next();
        }
    }

    //oyunu sifirla - oyunu sifirla
    function ResetGame() {
        $(".sifirla").text("Oyuna Yenidən Başla");
        $(".black_background_alert").hide(500);
        $(".xal_qazandiniz_notification").hide(800);
        $(".more_click_than_150_alert_main").hide(500);
        ShuffleImages();
        $(Source + " div img").hide();
        $(Source + " div").css("visibility", "visible");
        Counter = 150;
        $("#counter").html("" + Counter);
        BoxOpened = "";
        ImgOpened = "";
        ImgFound = 0;
        click = 0;
    }
    //her hansi bir kart acilanda - her hansi bir kart acilanda
    function OpenCard(){
        var id = $(this).attr("id");

        if ($("#" + id + " img").is(":hidden")) {
            $(Source + " div").unbind("click", OpenCard);

            $("#" + id + " img").slideDown('fast');

            if (ImgOpened == "") {
                BoxOpened = id;
                ImgOpened = $("#" + id + " img").attr("src");
                setTimeout(function() {
                    $(Source + " div").bind("click", OpenCard);
                }, 300);
            } else {
                CurrentOpened = $("#" + id + " img").attr("src");
                if (ImgOpened != CurrentOpened) {
                    setTimeout(function() {
                        $("#" + id + " img").slideUp('fast');
                        $("#" + BoxOpened + " img").slideUp('fast');
                        BoxOpened = "";
                        ImgOpened = "";
                    }, 400);
                } else {
                    $("#" + id + " img").parent().css("visibility", "hidden");
                    $("#" + BoxOpened + " img").parent().css("visibility", "hidden");
                    ImgFound++;
                    BoxOpened = "";
                    ImgOpened = "";
                }
                setTimeout(function() {
                    $(Source + " div").bind("click", OpenCard);
                }, 400);
            }
            Counter--;
            click++;
            $("#counter").html("" + Counter);

            if (ImgFound == ImgSource.length) {
                $(".sifirla").text("Təkrar Oyna");

                    $.ajax({
                        url:"../functions/add_count.php",
                        method:"POST",
                        data:{jk5f1v56549fbd5bdf56v1s56b84b9srb4165sfdb14sdf98b4rshs65bfdsb489s4ht65rs1b89fg4b8gh56s1bf894h:"<?php echo $ajax_id ; ?>",
                            fdb651dfb56f1dsb651dfs56b1df56sb165dsfb156df1b56ds1b56df1sbsdf651b65er41b8156dfs1b56dsf15b6dsf:"<?php echo rand(1111111111,9999999999).rand(1111111111,9999999999).rand(1111111111,9999999999).rand(1111111111,9999999999).rand(1111111111,9999999999).rand(1111111111,9999999999).rand(1111111111,9999999999).rand(1111111111,9999999999).rand(1111111111,9999999999).rand(1111111111,9999999999); ?>" + Counter + "<?php echo rand(1111111111,9999999999).rand(1111111111,9999999999).rand(1111111111,9999999999).rand(1111111111,9999999999).rand(1111111111,9999999999).rand(1111111111,9999999999).rand(1111111111,9999999999).rand(1111111111,9999999999).rand(1111111111,9999999999).rand(1111111111,9999999999); ?>",
                            sdjklns564s65d1sd864sd894sd65s1d65sd4s98d4sd651sd56sd1489sd41561sd:click,fingerprint:<?php echo $fingerprint; ?>},
                        success:function(gelen){
                            if(gelen == "ok"){
                                $(".xal_qazandiniz_notification span").text(" Siz "+Counter+" xal qazandınız.");
                                $(".xal_qazandiniz_notification").show(800);
                                $(".gunluk_xal").text(parseInt($(".gunluk_xal").text()) + Counter);
                                $(".toplam_xal").text(parseInt($(".toplam_xal").text()) + Counter);
                                setTimeout(function(){
                                    $(".xal_qazandiniz_notification").hide(800);
                                },6000);
                                setTimeout(function(){
                                    $(".xaliniz_var .badge").css("background","cadetblue");
                                },3500);
                            }else if(gelen == "ban1"){
                                alert("Sizin hesabınız BAN olundu!\nBunun səhvən olduğunu düşünürsünüzsə, bizə bildirməyiniz xahiş olunur.");
                                window.location.href = "../";
                            }else if(gelen == "diffrent_login_detected"){
                                alert("Bir hesaba eyni anda yalnız bir cihazdan daxil olmaq olar!\n.");
                                window.location.href = "../";
                            }else{
                                alert("Xəta baş verdi! Xahiş edirik bunu bizə bildirin.")
                            }
                        },
                        error:function(err){
                            alert("Xəta baş verdi! Səhifəni yeniləyib təkrar yoxlayın.");
                        }
                    });
            }
            //oyun bitende oyun - bitende oyun bitende
            if(Counter == 0){
                $(".black_background_alert").show(1000);
                $(".more_click_than_150_alert_main").show(1000);
            }
        }
    }

    $(function(){
        for (var y = 1; y < 3 ; y++) {
            $.each(ImgSource, function(i, val) {
                $(Source).append("<div id=card" + y + i + "><img src=" + val + " />");
            });
        }
        $(Source + " div").click(OpenCard);
        ShuffleImages();
    });
    function exit() {
        window.location.href="../";
    }
    $(document).ready(function () {
        $("#boxcard").fadeTo("slow",1);
        setTimeout(function(){
            $(".qadin_geyimleri_fb,.mmsd_fb").slideDown(1500);
        },2500);
    });
    </script>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/az_AZ/sdk.js#xfbml=1&version=v2.8&appId=570724243127152";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <div class="black_background_alert"></div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <nav class="navbar navbar-inverse">
                    <div class="container-fluid">
                        <div class="navbar-header">

                        </div>
                        <ul class="nav navbar-nav top_10">
                            <li><a href="../users"><img src="../img/top_100_glases_wp.png" width="20"> TOP 100 Oyunçular</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <?php
                                if($conn){
                                    $select = "SELECT xal,toplam_xal,qizil_xal FROM istifadeciler WHERE id = '$id'";
                                    $netice = mysqli_query($conn,$select);
                                    while($row = mysqli_fetch_assoc($netice)){
                                        echo "<li>
                                                <span class='xaliniz_var'>
                                                    <span class='badge'>
                                                        <span>Bu Gün Topladığınız Xal: 
                                                            <span class='gunluk_xal'>".$row['xal']." </span>
                                                        </span>
                                                    </span>
                                                </span>
                                              </li>
                                              <li>
                                                <span class='xaliniz_var'>
                                                    <span class='badge'>
                                                        <span class='cemi_toplanan_xal'>Cəmi Xal: 
                                                            <span class='toplam_xal'>".$row['toplam_xal']."</span>
                                                        </span>
                                                    </span>
                                                </span>
                                              </li>
                                              <li>
                                                <span class='qizil_xal'>
                                                    <span class='badge'>
                                                        <span>QIZIL XAL:
                                                            <span>".$row['qizil_xal']."</span>
                                                        </span>
                                                    </span>
                                                </span>
                                              </li>";
                                    }
                                    mysqli_close($conn);
                                }
                            ?>
                            <li><a href="../"><span class="glyphicon glyphicon-log-in"></span>  Çıxış</a></li>
                        </ul>
                    </div>
                </nav>
                <div class="fb_oynaqazan_center">
                    <div class="fb-page" data-href="https://www.facebook.com/oynaqazan.az" data-width="250" data-height="70" data-small-header="true" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/oynaqazan.az" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/oynaqazan.az">OynaQazan.az</a></blockquote></div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-10 col-sm-push-1 col-md-8 col-md-push-2 col-lg-6 col-lg-push-3">
              <div id="boxbuttons">
                  <h4>Xal: <span id="counter" class="badge">150</span></h4>
                  <button onclick="ResetGame();" class="btn btn-success sifirla">Oyuna Yenidən Başla</button>
              </div>
              <div class="sekil_divleri_main">
                  <div class="alert alert-success xal_qazandiniz_notification">
                      <strong>Təbriklər!</strong> <span></span>
                  </div>
                  <div id="boxcard"></div>
              </div>
              <div class="qadin_geyimleri_fb">
                        <p>BAŞ SPONSOR</p>
                        <div id="fb-root"></div>
                        <script>
                            (function(d, s, id) {
                              var js, fjs = d.getElementsByTagName(s)[0];
                              if (d.getElementById(id)) return;
                              js = d.createElement(s); js.id = id;
                              js.src = "//connect.facebook.net/az_AZ/sdk.js#xfbml=1&version=v2.6&appId=1877721152446116";
                              fjs.parentNode.insertBefore(js, fjs);
                            }(document, 'script', 'facebook-jssdk'));
                        </script>
                        <div class="fb-page" data-href="https://www.facebook.com/qadingeyimleri.az/" data-width="245" data-height="220" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/qadingeyimleri.az/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/qadingeyimleri.az/">Qadingeyimleri.az</a></blockquote></div>
                        <div>
                            <a href="https://www.facebook.com/qadingeyimleri.az/" target="_blank" ><img src="../img/qadingeyimleri.gif" width="245px"></a>
                        </div>
              </div>
              <div class="mmsd_fb">
                        <p>İNFORMASİYA DƏSTƏYİ</p>
                        <div id="fb-root"></div>
                        <script>
                          (function(d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (d.getElementById(id)) return;
                            js = d.createElement(s); js.id = id;
                            js.src = "//connect.facebook.net/az_AZ/sdk.js#xfbml=1&version=v2.8&appId=1877721152446116";
                            fjs.parentNode.insertBefore(js, fjs);
                          }(document, 'script', 'facebook-jssdk'));
                        </script>
                        <div class="fb-page" data-href="https://www.facebook.com/mmsd.az/" data-width="245" data-height="220" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/mmsd.az/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/qadingeyimleri.az/">MMSD.AZ</a></blockquote></div>
              </div>
            </div>
            <div class="more_click_than_150_alert_main col-xs-10 col-xs-push-1 col-sm-6 col-sm-push-3 col-md-6 col-md-push-3">
                <div class="alert alert-warning">
                    <strong>Uduzdunuz :(</strong>
                    <hr class="message-inner-separator">
                    <p>Siz artıq 150 dəfə klik etdiniz.</p>
                    <p>Təkrar oynayın!</p>
                    <button onclick="ResetGame();" class="btn btn-success sifirla_popup">Başla</button>
                    <button onclick="exit();" class="btn btn-success sifirla_popup">Çıxış</button>
                </div>
            </div>
        </div>
    </div>
    <br/>
    <br/>
    <footer>
        <p>Bizimlə Əlaqə</p>
        <p>055 581 08 72</p>
        <p>(012) 539 77 16 (10:00 - 22:00)</p>
        <p>E-mail: support@oynaqazan.az</p>
        <p>v1.2</p>
        <br/>
        <a href="http://www.bakuweb.az/" target="_blank">by Bakuweb.az</a>
    </footer>
</body>
</html>