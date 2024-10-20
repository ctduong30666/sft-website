<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang đăng nhập</title>
    <link rel="icon" type="image/x-icon" href="./sources/images/icon/1favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/0.168.0/three.module.js"
        integrity="sha512-cV5o5uoKbUWe+4GaJ4Eu/oaZ4IJKh2OhShH7Gwub0OQ6oPgxQxXL++Ih6AJJk70O/JCBhf9nxAm+Hhsx1ddk1g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- main css start -->
    <link rel="stylesheet" href="./app/sub-sources/css/header.css">
    <link rel="stylesheet" href="./app/sub-sources/css/device.css">
    <link rel="stylesheet" href="./app/sub-sources/css/health.css">
    <link rel="stylesheet" href="./app/sub-sources/css/toggle.css">
    <link rel="stylesheet" href="./app/sub-sources/css/form.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./sources/css/index.css">
    <!-- main css end -->
    <script src="https://cdn.jsdelivr.net/npm/@simondmc/popup-js@1.4.3/popup.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<?php 
    require_once "./app/session.php"; // Thêm dòng này để bắt đầu phiên
    if (isset( $_SESSION["user"])) {
        header("Location: ./home.php");
    }

?>

<body>
    <div id="main_content">
        <div id="main_box" class="main_box">
            <header>
                <?php
                include("./app/header.php")
                ?>
            </header>
            <div class="content"
                style="display:flex;flex-direction:column; align-items:center;">
                <section
                    style="display:flex; flex-wrap: wrap; gap: 0.5rem;justify-content: center;align-items: center; margin-top: -30px">
                    <div style="width: 700px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    gap: 0.5rem;
    align-items: center;">
                        <div class="login">
                            <?php
                            include("./app/login-form.php")
                            ?>
                        </div>
                </section>

            </div>
            <footer><span>2024@wearegearbot</span></footer>
        </div>


    </div>
    <div id="loading-overlay">
        <div id="loading-icon">
            <div class="loader"></div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@latest/dist/tf.min.js"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/@teachablemachine/image@latest/dist/teachablemachine-image.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        function showLoading() {
            $('#loading-overlay').show();
        }

        // Ẩn lớp phủ khi yêu cầu AJAX hoàn tất
        function hideLoading() {
            $('#loading-overlay').hide();
        }
        const URL = "https://teachablemachine.withgoogle.com/models/6GwP8p8rR/";

        let model, labelContainer, maxPredictions;

        async function init() {
            const modelURL = URL + "model.json";
            const metadataURL = URL + "metadata.json";
            model = await tmImage.load(modelURL, metadataURL);
            maxPredictions = model.getTotalClasses();
        }

        async function fetchImages(imagePath) {

            const imgElement = document.createElement('img');
            imgElement.src = 'uploads/' + imagePath;
            imgElement.onload = function() {
                predictImage(imgElement);
            };
        }

        async function predictImage(image) {
            const prediction = await model.predict(image, false);
            for (let i = 0; i < maxPredictions; i++) {
                const classPrediction =
                    prediction[i].className + ": " + prediction[i].probability.toFixed(2);
            }
            const formattedString = prediction.map(item => `${item.className} : ${item.probability * 100} %`).join('\n');
            console.log(formattedString);
            try {
                showLoading(); // Hiển thị lớp phủ trước khi gửi yêu cầu

                const response = await $.ajax({
                    url: '/sft-website/generate_chat.php', // Đặt đường dẫn chính xác đến run.php
                    type: 'GET',
                    data: {
                        ref: formattedString
                    }, // Gửi tham số 'ref'
                });

                if (response.success) {
                    hideLoading();
                    const {
                        value: text
                    } = await Swal.fire({
                        input: "textarea",
                        inputLabel: "Message",
                        inputPlaceholder: "Lời khuyên giành cho bạn",
                        inputValue: response.output,
                        inputAttributes: {
                            "aria-label": "Type your message here"
                        },
                        width: "1000px",
                        height: "700px",
                        showCancelButton: true
                    });

                    if (text) {
                        Swal.fire(text);
                    }
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Có lỗi xảy ra!',
                    });
                }
            } catch (error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Có lỗi xảy ra!',
                });
            } finally {
                hideLoading();
                connectSocket();
            }
        }

        init();
    </script>

    <script>
        function connectSocket() {
            var ws = new WebSocket('ws://localhost:8081');


            ws.onmessage = function(event) {
                fetchImages(event.data);
            };
        }

        connectSocket();
    </script>

    <script>
        // IP ADDRESS CAM WEB
        let ip = 'http://192.168.131.45';
        $(".btn-cam").on('click', function() {
            let buttonValue = $(this).val();
            if (buttonValue) {
                $.ajax({
                    url: ip + buttonValue,
                    method: 'get',
                    success: function(res) {
                        $("#btn-on").toggleClass('d-none');
                        $("#btn-off").toggleClass('d-none');
                    },
                    error: function(er) {
                        console.log(er);
                    }
                });
            } else {
                console.log("Button value is undefined or empty");
            }
        });
    </script>

    <script src="./app/sub-sources/js/togglemode.js"></script>
</body>

</html>