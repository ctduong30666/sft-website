<?php
require 'vendor/autoload.php';

use WebSocket\Client;

function generateGUID() {
    if (function_exists('com_create_guid')) {
        return trim(com_create_guid(), '{}');
    } else {
        // Tạo GUID thủ công
        mt_srand((double) microtime() * 10000);
        $charid = strtolower(md5(uniqid(rand(), true)));
        $uuid = substr($charid, 0, 8) . '-' .
                substr($charid, 8, 4) . '-' .
                substr($charid, 12, 4) . '-' .
                substr($charid, 16, 4) . '-' .
                substr($charid, 20, 12);
        return $uuid;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['imageFile'])) {
        $directory = 'uploads/';
        $errors = [];
        $file_name = $_FILES['imageFile']['name'];
        $file_size = $_FILES['imageFile']['size'];
        $file_tmp = $_FILES['imageFile']['tmp_name'];
        $file_type = $_FILES['imageFile']['type'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        $extensions = ["jpeg", "jpg", "png"];

        if (!in_array($file_ext, $extensions)) {
            $errors[] = "Extension not allowed, please choose a JPEG or PNG file.";
        }

        if ($file_size > 2097152) {
            $errors[] = 'File size must be less than 2 MB';
        }

        if (empty($errors)) {
            // Tạo tên file mới bằng GUID
            $new_file_name = generateGUID() . '.' . $file_ext;
            if (move_uploaded_file($file_tmp, $directory . $new_file_name)) {
                echo "Success";

                try {
                                        
                    $wsUrl = 'ws://localhost:8081';

                    // Tạo kết nối WebSocket
                    $wsClient = new Client($wsUrl);

                    // Gửi tin nhắn "Send image" đến WebSocket server
                    $wsClient->send($new_file_name);
                } catch (Exception $e) {
                    echo "WebSocket error: " . $e->getMessage();
                }
            } else {
                echo "Failed to move uploaded file.";
            }
        } else {
            print_r($errors);
        }
    }
} else {
    echo "Invalid request method.";
}

