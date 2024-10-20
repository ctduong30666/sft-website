<?php
// Đặt đường dẫn đến file Python
$pythonScriptPath = './chat_generating_system/app.py'; // Thay thế bằng đường dẫn thực tế đến app.py

// Lấy tham số từ query string
$ref = isset($_GET['ref']) ? escapeshellarg($_GET['ref']) : '';

// Tạo lệnh để chạy script Python với tham số
$command = "python $pythonScriptPath $ref";

// Thời gian chờ (60 giây)
$timeout = 60;

// Tạo lệnh để thực thi
$descriptorspec = [
    0 => ["pipe", "r"],  // stdin
    1 => ["pipe", "w"],  // stdout
    2 => ["pipe", "w"]   // stderr
];

$process = proc_open($command, $descriptorspec, $pipes);

if (is_resource($process)) {
    $start_time = time();

    // Đọc stdout và stderr
    $stdout = "";
    $stderr = "";

    while (!feof($pipes[1]) || !feof($pipes[2])) {
        // Kiểm tra thời gian chờ
        if (time() - $start_time > $timeout) {
            proc_terminate($process);
            $stderr = "Process timed out.";
            break;
        }

        $stdout .= fgets($pipes[1]);
        $stderr .= fgets($pipes[2]);
    }

    fclose($pipes[1]);
    fclose($pipes[2]);

    $return_var = proc_close($process);

    // Xử lý kết quả
    $result = [
        'success' => $return_var === 0,
        'output' => trim($stdout),
        'error' => trim($stderr)
    ];

    // Gửi kết quả dưới dạng JSON
    header('Content-Type: application/json');
    echo json_encode($result);
} else {
    $result = [
        'success' => false,
        'error' => 'Failed to start process'
    ];
    header('Content-Type: application/json');
    echo json_encode($result);
}
?>
