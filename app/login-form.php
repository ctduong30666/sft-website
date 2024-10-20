<div class="form-box login-form">
    <?php 
    require_once "./sources/php/config.php";

    // Kiểm tra và hiển thị thông báo nếu có
    if (isset($_SESSION['login_message'])) {
        echo "<div class='alert alert-info'>" . $_SESSION['login_message'] . "</div>";
        unset($_SESSION['login_message']); // Xóa thông báo sau khi hiển thị
    }

    if (isset($_POST["login"])) {
        $username = isset($_POST["username"]) ? trim($_POST["username"]) : "";
        $password = isset($_POST["password"]) ? $_POST["password"] : "";
        $remember = isset($_POST["remember"]) ? $_POST["remember"] : "";

        if (empty($username) || empty($password)) {
            echo "<div class='alert alert-danger'>Vui lòng điền đầy đủ thông tin đăng nhập.</div>";
        } else {
            $sql = "SELECT * FROM users WHERE username = ? OR email = ?";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("ss", $username, $username);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows === 1) {
                $user = $result->fetch_assoc();
                if (password_verify($password, $user["password"])) {
                    $_SESSION["user_id"] = $user["id"];
                    $_SESSION["username"] = $user["username"];
                    $_SESSION["user"] = true;
                    $_SESSION["email"] = $user["email"]; // Thêm email vào session

                    if ($remember == "on") {
                        setcookie("user_login", $user["id"], time() + (30 * 24 * 60 * 60), "/");
                    }

                    echo "<div class='alert alert-success'>Đăng nhập thành công!</div>";
                    echo "<script>
                        setTimeout(function() {
                            window.location.href = './home.php';
                        }, 1500);
                    </script>";
                    exit();
                } else {
                    echo "<div class='alert alert-danger'>Mật khẩu không đúng.</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Tài khoản không tồn tại.</div>";
            }
            $stmt->close();
        }
    }
    ?>

    <h2 class="header">Đăng nhập</h2>
    <form action="" method="post">
        <div class="form-field">
            <label for="username">Tên đăng nhập hoặc Email</label>
            <input type="text" name="username" id="username" required>
        </div>
        <div class="form-field">
            <label for="password">Mật khẩu</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div class="field-checkbox">
            <input type="checkbox" name="remember" id="remember">
            <label for="remember">Ghi nhớ đăng nhập</label>
        </div>
        <div class="form-field">
            <input class="form-btn" type="submit" name="login" id="submit" value="Đăng nhập">
        </div>
    </form>
    <div class="links">
        <div class="links-question">Chưa có tài khoản?</div>
        <a class="link-btn" href="./register.php">Tạo tài khoản mới</a>
    </div>
    <div class="back">
        <a class="back-btn" href="./index.php">Quay lại</a>
    </div>
</div>
