<?php
require_once "./app/session.php";
require_once "./sources/php/config.php";

?>

<div class="form-box login-form">
    <h2 class="header">Thông tin</h2>
    <?php
    
if (isset($_POST['submit'])) {
    $currentEmail = $_POST['current_email'];
    $newEmail = $_POST['new_email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Kiểm tra username và password
    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("s", $username); // Chỉ kiểm tra username
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Kiểm tra mật khẩu
        if (password_verify($password, $user['password'])) { // Sử dụng password_verify để kiểm tra mật khẩu
            // Cập nhật email mới
            $updateQuery = "UPDATE users SET email = ? WHERE username = ?";
            $updateStmt = $con->prepare($updateQuery);
            $updateStmt->bind_param("ss", $newEmail, $username);
            
            if ($updateStmt->execute()) {
                // Cập nhật email mới
                $_SESSION['email'] = $newEmail; // Cập nhật $_SESSION['email'] để hiển thị trên trang home-content.php
                $_SESSION['login_message'] = "Mời bạn đăng nhập lại"; // Lưu thông báo vào session
                echo "<div class='alert alert-success'>Cập nhật email thành công!</div>";
                session_destroy(); // Lưu ý: Điều này sẽ xóa tất cả session, bao gồm cả login_message
                echo "<script>
                        setTimeout(function() {
                            window.location.href = './login.php';
                        }, 1000);
                    </script>";
            } else {
                echo "<div class = 'alert alert-danger'>Lỗi cập nhật email!</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Tên đăng nhập hoặc mật khẩu không chính xác!</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Tên đăng nhập hoặc mật khẩu không chính xác!</div>";
    }
}

    ?>
    <form action="" method="post">
        <div class="form-field">
            <label for="current-email">Email hiện tại</label>
            <input type="email" name="current_email" id="current-email" value="<?php echo $_SESSION['email']; ?>" readonly>
        </div>
        <div class="form-field">
            <label for="new-email">Email mới</label>
            <input type="email" name="new_email" id="new-email" required>
        </div>
        <div class="form-field">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required>
        </div>
        <div class="form-field">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div class="form-field">
            <input class="form-btn" type="submit" name="submit" id="submit" value="Cập nhật">
        </div>
    </form>
    <div style="margin-top: 10px" class="back">
        <a class="back-btn" href="./home.php">Back</a>
    </div>
</div>
