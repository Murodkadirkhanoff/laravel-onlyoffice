<?php

$log_file = dirname(__FILE__) . '/error_log.txt';

// Получение тела запроса
$body_stream = file_get_contents("php://input");
if ($body_stream === FALSE){
    error_log("Bad Request", 3, $log_file);
    echo "Bad Request";
    exit;
}

// Декодирование JSON данных
$data = json_decode($body_stream, TRUE);
if (json_last_error() !== JSON_ERROR_NONE) {
    error_log("JSON decode error: " . json_last_error_msg(), 3, $log_file);
    echo "Bad JSON";
    exit;
}

error_log("Received data: " . print_r($data, true), 3, $log_file);

if (isset($data["status"]) && $data["status"] == 2){
    if (!isset($data["url"])) {
        error_log("URL is missing in the request data", 3, $log_file);
        echo "Bad Request";
        exit;
    }
    
    $downloadUri = $data["url"];
    error_log("Download URL: " . $downloadUri, 3, $log_file);

    // Скачивание данных по URL
    $new_data = file_get_contents($downloadUri);
    if ($new_data === FALSE){
        error_log("Bad Response", 3, $log_file);
        echo "Bad Response";
        exit;
    } else {
        // Проверка, удалось ли открыть файл для записи
        $file_path = dirname(__FILE__) . 'test.docx';
        $file_result = file_put_contents($file_path, $new_data, LOCK_EX);
        if ($file_result === FALSE) {
            error_log("Failed to write to file: " . $file_path, 3, $log_file);
            echo "File Write Error";
            exit;
        }
        error_log("File downloaded and saved as test.docx", 3, $log_file);
    }
}
echo "{\"error\":0}";
?>
