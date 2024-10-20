<div class="form-box register-form" >
    <?php 
    $username = $email = $password = $passwordRepeat = "";
    $errors = array();

    if (isset($_POST["register"])) {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $passwordRepeat = $_POST["repassword"];

        if(empty($username) OR empty($email) OR empty($password) OR empty($passwordRepeat)) {
            array_push($errors, "Bạn cần điền vào các ô trống");
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL) AND !empty($email)) {
            array_push($errors, "Email không khả dụng");
        }
        if (strlen($password) < 8 AND !empty($password)) {
            array_push($errors, "Độ dài của mật khẩu phải ít nhất 8 kí tự");
        }
        if ($password !== $passwordRepeat) {
            array_push($errors, "Mật khẩu không khớp");
        }     
        // Chỉ tạo hash mật khẩu nếu không có lỗi
        if (count($errors) == 0) {
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            if ($passwordHash === false) {
                array_push($errors, "Có lỗi xảy ra khi mã hóa mật khẩu");
            }
        }
    }
    ?>

    <h2 class="header">Sign up</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <?php 
        require_once "./sources/php/config.php";
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($con, $sql);
        $rowCount = mysqli_num_rows($result);
        if (isset($_POST["register"])) {
            if($rowCount>0 AND !empty($email)) {
                array_push($errors, "Email đã tồn tại!");
            }
        }
        if (count($errors) > 0) {
                foreach ($errors as $error) {
                    echo "<div class='alert alert-danger'>$error</div>";
                }
        } else {
            // Chỉ thực hiện chèn nếu $passwordHash đã được tạo
            if (isset($passwordHash)) {
                $sql = "INSERT INTO users (email, username, password) VALUE ( ?, ?, ? )";
                $stmt = mysqli_stmt_init($con);
                $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
                if ($prepareStmt) {
                    mysqli_stmt_bind_param($stmt, "sss", $email, $username, $passwordHash);
                    mysqli_stmt_execute($stmt);
                    echo "<div class ='alert alert-success'>Đăng ký thành công!</div>";
                    // Thêm chức năng đợi 1 giây và chuyển sang trang đăng nhập
                    echo "<script>
                        setTimeout(function() {
                            window.location.href = './login.php';
                        }, 1000);
                    </script>";
                } else {
                    die("Xảy ra lỗi!");
                }
            } 
        }
        ?>
        <div class="form-field">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?php echo $email; ?>" >
        </div>
        <div class="form-field">
            <label for="username">Tên đăng nhập</label>
            <input type="text" name="username" id="username" value="<?php echo $username; ?>" >
        </div>
        <div class="form-field">
            <label for="password">Mật khẩu</label>
            <input type="password" name="password" id="password" >
        </div>
        <div class="form-field">
            <label for="repassword">Nhập lại mật khẩu</label>
            <input  type="password" name="repassword" id="repassword" >
        </div>
        <div class="form-field">
            <input class="form-btn" type="submit" name="register" id="submit" value="Đăng ký">
        </div>
    </form>
    <div class="links">
        <div class="links-question">Bạn đã có tài khoản?</div>
        <a class="link-btn" href="./login.php">Sign in</a>
    </div>
    <div class="back">
        <a class="back-btn" href="javascript:self.history.back()">Quay lại</a>
    </div>
</div>
