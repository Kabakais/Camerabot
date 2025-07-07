<?php
$botToken = "7701585433:AAFKP5UDdVsxRL2zrbmlaIK2jzd30rPW-F0";
$chatId = "8141222239";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['video'])) {
    $videoPath = $_FILES['video']['tmp_name'];
    $videoName = $_FILES['video']['name'];

    // Debug file output
    file_put_contents("debug.txt", print_r($_FILES, true));

    $url = "https://api.telegram.org/bot$botToken/sendVideo";

    $post_fields = [
        'chat_id' => $chatId,
        'video' => new CURLFile(realpath($videoPath), 'video/webm', $videoName)
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type:multipart/form-data"]);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
    $result = curl_exec($ch);
    $error = curl_error($ch);
    curl_close($ch);

    if ($result) {
        echo "✅ تم الإرسال";
    } else {
        echo "❌ فشل الإرسال: $error";
    }
} else {
    echo "❌ لم يتم استقبال الفيديو";
}
?>