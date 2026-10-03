<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['channel_url'])) {
    $api_url = 'https://EXAMPLE-SMM-PROVIDER.COM/api/v2'; // رابط الـ API الخاص بالسيرفر
    $api_key = 'YOUR_API_KEY_HERE'; // مفتاح الـ API الخاص بك

    $data = array(
        'key' => $api_key,
        'action' => 'add',
        'service' => 101, // رقم خدمة أعضاء تليجرام في السيرفر
        'link' => $_POST['channel_url'],
        'quantity' => 100 // العدد المطلوب
    );

    $ch = curl_init($api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    $response = curl_exec($ch);
    curl_close($ch);

    echo "<p style='color:green;'>تم إرسال الطلب! استجابة السيرفر: " . htmlspecialchars($response) . "</p>";
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تجربة رشق قناة تليجرام</title>
</head>
<body style="font-family: sans-serif; text-align: center; padding-top: 50px;">
    <h2>تجربة رشق أعضاء قناة تليجرام</h2>
    <form method="POST">
        <input type="text" name="channel_url" placeholder="أدخل رابط القناة هنا (https://t.me/...)" required style="width: 300px; padding: 8px;">
        <button type="submit" style="padding: 8px 15px;">إرسال الأعضاء</button>
    </form>
</body>
</html>
