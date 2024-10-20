<<<<<<< Updated upstream
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./app/sub-sources/css/health.css">
    
</head>
<body>
    <!-- <div id="health-box" class="health-box">
        <div class="health-box-header">
            <h1>QUẢN LÝ SỨC KHOẺ</h1>
            <p>Quan sát các thông số thống kê về sức khoẻ người dùng,<br> quản lý các chỉ số sức khoẻ và nhận lời khuyên.</p>
        </div>
        <div class="health-box-line"></div>
        <div class="health-box-progress" style="margin-bottom: 40px;">
            <h2>Thông số sức khoẻ</h2>
            <div class="health-box-progress-circle">
                <div class="outer">
                    <div class="inner">
                        <div id="progress-number"></div>
                        <div id="progress-text" class="bad">GOOD</div>
                    </div>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="200px" height="200px">
                    <circle cx="100" cy="100" r="85" stroke-linecap="round"/>
                </svg>
            </div>
        </div>
        <div class="advice">
            <h2>Lời khuyên sức khoẻ</h2>
            <p>Lời khuyên sức khoẻ đến từ trí tuệ nhân tạo - mang tính chất tham khảo</p>
            <div class="ai-advice">
                <textarea class="advice-input" name="" id="" cols="50" rows="5" placeholder="Trí tuệ nhân tạo sẽ đưa ra lời khuyên cho bạn ở đây..."></textarea>
            </div>
            <p>Bạn hãy cung cấp cho chúng tôi phương thức để liên lạc bạn nhé, <br>chúng tôi sẽ cung cấp cho bạn những lời khuyên, đánh giá và phân tích <br> sức khoẻ của bạn một cách chi tiết hơn!</p>
            <form class="send-form"action="">
                <input class="advice-input" type="email" placeholder="Nhập email của bạn">
                <i class="icon fa-solid fa-inbox"></i>
                <div class="advice-btn">
                    <button class="send-btn">Gửi</button>
                </div>
            </form>
        </div>
    </div> -->
    
    <?php
        $toggle_btn = false;
        if ($toggle_btn == false) {
            echo '<div id="health-box" class="health-box" style="display: flex; justify-content: center; align-items: center; flex-direction: column; gap: 20px; height: 752px;"> 
=======
<link rel="stylesheet" href="./app/sub-sources/css/alert.css">
<?php
$toggle_btn = false;
if ($toggle_btn == false) {
    echo '<div id="health-box" class="health-box" style="display: flex; justify-content: center; align-items: center; flex-direction: column; gap: 20px; height: 610px; position: relative; margin-top:100px"> 
>>>>>>> Stashed changes
                    <h2 style="font-size: 18px">Bạn có muốn bật tính năng phân tích sức khoẻ không?</h2>
                    <form method="post">
                        <button onclick = "alert("Bật tính năng phân tích sức khoẻ thành công!")" type="submit" name="toggle_btn" class="btn-toggle" style="width: 100px; height: 30px; border: none; border-radius: 5px; background-color: #59b65a; color: white; font-size: 16px; cursor: pointer;">Bật</button>
                    </form>
                </div>';
<<<<<<< Updated upstream
        } 
        
        if(isset($_POST['toggle_btn'])) {
            $toggle_btn = true;
            $data = @file_get_contents("https://my-json-server.typicode.com/ctduong30666/apiSFT/db");
            if ($data === false) {
                $toggle_btn = false;
                echo '<script>alert("Mời bạn thử lại!");</script>';
                return;
            }
            if ($data !== false) {
                sleep(1);
                $json_data = json_decode($data, true);
                if (isset($json_data['type'][0]['status-health'])) {
                    $value = $json_data['type'][0]['status-health'];
                    $progress = $value;
                    echo '<div id="health-box-new" class="health-box">
=======
}

if (isset($_POST['toggle_btn'])) {
    $toggle_btn = true;
    $data = @file_get_contents("https://my-json-server.typicode.com/ctduong30666/apiSFT/db");
    if ($data === false) {
        $toggle_btn = false;
        echo '<script>alert("Mời bạn thử lại!");</script>';
        return;
    }
    if ($data !== false) {
        sleep(1);
        $json_data = json_decode($data, true);
        if (isset($json_data['type'][0]['status-health'])) {
            $value = $json_data['type'][0]['status-health'];
            $progress = $value;
            echo '<div id="health-box-new" class="health-box" style="position: absolute">
>>>>>>> Stashed changes
                        <div class="health-box-header">
                            <h1>QUẢN LÝ SỨC KHOẺ</h1>
                            <p>Quan sát các thông số thống kê về sức khoẻ người dùng,<br> quản lý các chỉ số sức khoẻ và nhận lời khuyên.</p>
                        </div>
                        <div class="health-box-line"></div>
                        <div class="health-box-progress" style="margin-bottom: 40px;">
                            <h2>Thông số sức khoẻ</h2>
                            <div class="health-box-progress-circle">
                                <div class="outer">
                                    <div class="inner">
                                        <div id="progress-number"></div>
                                        <div id="progress-text" class="bad">GOOD</div>
                                    </div>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="150px" height="150px">
                                    <circle cx="73" cy="73" r="58" stroke-linecap="round"/>
                                </svg>
                            </div>
                            <div class = "save-progress">
                                <button class="save-btn">Lưu kết quả</button>
                                <button class="save-history">Xem lịch sử</button>
                            </div>
                        </div>
                        <h2 style="font-size: 18px;">Lời khuyên sức khoẻ</h2>
                        <div class="advice">
                            <div class="advice-left"  >
                                <p>Lời khuyên sức khoẻ đến từ trí tuệ nhân tạo</p>
                                <div class="ai-advice">
                                    <textarea class="advice-input" name="" id="" cols="60" rows="5" placeholder="Trí tuệ nhân tạo sẽ đưa ra lời khuyên cho bạn ở đây..."></textarea>
                                </div>
                            </div>
                            <div class="advice-right">
                                <p>Bạn hãy cung cấp cho chúng tôi phương thức để liên lạc bạn nhé, chúng tôi sẽ cung cấp cho bạn những lời khuyên, đánh giá và phân tích sức khoẻ của bạn một cách chi tiết hơn!</p>
                                <form class="send-form" action="" method="post">
                                    <input class="advice-input" name="sendEmail" type="email" placeholder="Nhập email của bạn" value="'
                                     . (isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : '') . '"
                                     ' . (isset($_SESSION['email']) ? 'readonly style="background-color: #f0f0f0;"' : '') . ' required>
                                    <i class="icon fa-solid fa-inbox"></i>
                                    <div class="advice-btn">
                                        <button class="send-btn" type="submit" name="submit-sendEmail">Gửi</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>';
                } else {
                    $toggle_btn = false;
                    echo '<script>alert("Mời bạn thử lại!");</script>';
                }
            }
        } 
            
    ?>
    <style>
        @keyframes anim {
            100% {
                stroke-dashoffset: <?php echo 550 - 550 * $progress / 100; ?>;
            }
        }
<<<<<<< Updated upstream
        .good {
            color: #59b65a;
=======
    }
}

?>
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require './vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
if(isset($_POST['submit-sendEmail'])) {
        
    // Lấy email từ input
    $sendMail = isset($_POST['sendEmail']) ? $_POST['sendEmail'] : (isset($_SESSION['email']) ? $_SESSION['email'] : '');

    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'hieultfct30659@gmail.com';                     //SMTP username
        $mail->Password   = 'apkf uamn inyd aiig';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('result@greeneration.com', 'Greeneration');
        $mail->addAddress($sendMail, 'User\'s Greeneration');     //Add a recipient
        $mail->addReplyTo('result@greeneration.com', 'Greeneration');

        // //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Here is the subject';
        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo '<div class="alert-sub alert-success">Kết quả đã được gửi đến bạn, hãy kiểm tra thư của bạn.</div>';
    } catch (Exception $e) {
        echo '<div class="alert-sub alert-danger">Việc gửi kết quả đến bạn đã xảy ra lỗi hãy thử lại!'.$mail->ErrorInfo.'</div>';
    }
}
?>

<style>
    #health-box-new {
        position:absolute;
        margin-top: -610px;
        height:610px;
    }

    @keyframes anim {
        100% {
            stroke-dashoffset:
                <?php echo 550 - 360 * $progress / 100; ?>;
>>>>>>> Stashed changes
        }
        .normal {
            color: #ffa500;
        }
        .bad {
            color: #ff4747;
        }
        #progress-circle {
            transition: stroke 0.5s ease;
        }
    </style>
</body>
<script>
    let number = document.getElementById('progress-number');
    let progressText = document.getElementById('progress-text');
    let progressCircle = document.querySelector('circle');
    let counter = 0;
    var progress = <?php echo $progress; ?>; 
    
    function updateProgressUI() {
        if (progress >= 70) {
            progressText.innerText = 'GOOD';
            progressText.className = 'good';
            progressCircle.style.stroke = '#59b65a';
        } else if (progress >= 40) {
            progressText.innerText = 'NORMAL';
            progressText.className = 'normal';
            progressCircle.style.stroke = '#ffa500';
        } else {
            progressText.innerText = 'BAD';
            progressText.className = 'bad';
            progressCircle.style.stroke = '#ff4747';
        }
    }
    
    function updateProgress(newProgress) {
        fetch('update_progress.php', {
<<<<<<< Updated upstream
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'progress=' + newProgress
        })
        .then(response => response.text())
        .then(data => {
            console.log(data);
            location.reload();
        });
=======
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'progress=' + newProgress
            })
            .then(response => response.text())
            .then(data => {
                console.log(data);
                location.reload();
            });
>>>>>>> Stashed changes
    }
    
    const totalDuration = 2000; // Tổng thời gian animation (1 giây)
    const delay = Math.max(5, Math.floor(totalDuration / progress));
    
    updateProgressUI(); // Cập nhật UI ngay lập tức
    
    const intervalId = setInterval(() => {
        if (counter == progress) {
            clearInterval(intervalId);
        } else {
            counter += 1;
            number.innerText = `${counter}%`;
        }
    }, delay);
</script>
</html>