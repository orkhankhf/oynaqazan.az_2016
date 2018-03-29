<?php
    if(isset($_POST['email'])){
        $email = trim($_POST['email']);
        $email = ereg_replace("[^a-zA-Z0-9_.+@-]", "", $email);
        
        include "../db/db.php";
        if($conn){
            $select = "SELECT email,id FROM istifadeciler WHERE email = '$email'";
            $netice = mysqli_query($conn,$select);
            while($row = mysqli_fetch_assoc($netice)){
                $email_var = true;
                $sifrelenmis_email = rand(111111,999999).md5('fgnfgnfgrtjh54151nfg'.md5('fgbnfgdndfgngfn'.md5('jtrnrthdnfg'.$email))).rand(111111,999999);
                $id = $row['id'];
                $sifrelenmis_id = rand("111111111111111","999999999999999").$id;
            }
            if(isset($email_var)){
                $basliq = "OYNAQAZAN.AZ Şifrə Bərpa Etmə Linki";
                $mesaj = "
<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'/>
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
   	<meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>
    <table style='width:100%;'>
        <tr>
            <td align='center' style='background-color: #eeeeee;' bgcolor='#eeeeee'>
                <table align='center' border='0' cellpadding='0' cellspacing='0'>
                    <tr>
                        <td align='center' valign='top' style='font-size:0; padding: 35px;' bgcolor='#006080'>
                            <table align='center' border='0' cellpadding='0' cellspacing='0'>
                                <tr>
                                    <td align='left' valign='top' style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 36px; font-weight: 800; line-height: 48px;' style='text-align: center !important;'>
                                        <h1 style='font-size: 36px; font-weight: 800; margin: 0; color: #ffffff;'>O Y N A Q A Z A N . A Z</h1>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    <tr>
                        <td align='center' style='padding: 35px; background-color: #ffffff;' bgcolor='#ffffff'>
                            <table align='center' border='0' cellpadding='0' cellspacing='0' width='100%'>
                                <tr>
                                    <td align='left' style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-bottom: 15px; border-bottom: 3px solid #eeeeee;'>
                                        <p style='font-size: 16px; font-weight: 800; line-height: 24px; color: #333333;'>
                                            Salam,
                                        </p>
                                        <p style='font-size: 14px; font-weight: 400; line-height: 24px; color: #777777; text-align: justify;'>
                                            Bu E-mail hesabınızın şifrəsini dəyişdirməyiniz üçün göndərilmişdir.
                                            </p>
    										
    										<p style='font-size: 14px; font-weight: 400; line-height: 24px; color: #777777;'>Şifrənizi dəyişdikdən sonra, hesabınıza daxil olub oyununuza davam edə bilərsiniz.
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                   <td align='center' style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;'>  
                                    <p style='font-size: 16px; font-weight: 400; line-height: 24px; color: #777777;'>
                                        Hesabınızın şifrəsini dəyişmək üçün aşağıdakı <br>“Şifrəni dəyiş” düyməsinə klikləyin və açılan səhifədə yeni şifrənizi daxil edin.
                                    </p>
                                   </td>
                                </tr>
                                <tr>
                                    <td align='center' style='padding: 10px 0 25px 0;'>
                                        <table border='0' cellspacing='0' cellpadding='0'>
                                            <tr>
                                                <td align='center' style='border-radius: 5px;' bgcolor='#ed8e20'>
                                                  <a href='http://www.oynaqazan.az/yeni_sifre/?bg5b2fe6d9gv=".$sifrelenmis_id."&hj5dc2w654d=".$sifrelenmis_email."' target='_blank' style='font-size: 18px; font-family: Open Sans, Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; background-color: #0099ff; padding: 15px 30px; border: 1px solid #007399; display: block;'>Şifrəni dəyiş</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align='center' style='padding: 35px; background-color: #ffffff;' bgcolor='#ffffff'>
                            <table align='center' border='0' cellpadding='0' cellspacing='0' width='100%'>
                                <tr>
                                    <td align='left' style='font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 24px;'>
                                        <p style='font-size: 14px; font-weight: 400; line-height: 20px; color: #777777;text-align: center;'>
                                            Bu e-mail avtomatik olaraq göndərilmişdir. Əgər siz şifrənizi bərpa etmək tələbini etməmisinizsə, başqa bir şəxs sizin hesabınızı ələ keçirmək üçün bunu etmiş ola bilər.
                                            Sual və təkliflərinizi support@oynaqazan.az ünvanına göndərə bilərsiniz.
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
";
                $headers = "From: OYNAQAZAN.AZ@oynaqazan.az\r\n";
                $headers .= "Reply-To: support@oynaqazan.az\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

                //emaili gonderir
                $gonderildi = mail($email, $basliq, $mesaj, $headers);

                if($gonderildi){
                    //email gonderildise
                    echo "email_gonderildi";
                }else{
                    //email gonderilmedise
                    echo "email_gonderilmedi";
                }
            }else{
                echo "email_yoxdur";
            }
            
            mysqli_close($conn);
        }else{
            echo "Server məşğuldur. Daha sonra təkrar yoxlayın və ya support@oynaqazan.az adresinə müraciətinizi göndərin.";
        }

    }else{
        echo "E-mail adresi düzgün deyil !";
    }
?>