<div class="home-box" id="home-box">
    <div class="header">Chào mừng <b><?php echo $_SESSION['username']; ?></b>!</div>
    <div class="content">
        <p>Địa chỉ email của bạn là <b><?php echo $_SESSION['email']; ?></b></p>
        <p>Kết quả phân tích sẽ được gửi về email này <br> Bạn có thể đổi thông tin trong phần <a href="./setting.php">cài đặt</a></p>
        <a class="logout" href="./logout.php">Đăng xuất</a>
    </div>
</div>
