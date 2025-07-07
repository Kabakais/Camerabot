
<?php
$botToken = "7701585433:AAFKP5UDdVsxRL2zrbmlaIK2jzd30rPW-F0";
$chatId = "8141222239";

if (isset($_FILES['video'])) {
    $filePath = $_FILES['video']['tmp_name'];
    $url = "https://api.telegram.org/bot$botToken/sendVideo";

    $postFields = [
        'chat_id' => $chatId,
        'video' => new CURLFile(realpath($filePath))
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type:multipart/form-data"]);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
    $output = curl_exec($ch);
    curl_close($ch);

    echo "تم الإرسال";
} else {
    echo "لا يوجد فيديو";
}
?>
