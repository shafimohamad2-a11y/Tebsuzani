<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // مشخصات ربات خود را اینجا وارد کنید
    $token = "YOUR_BOT_TOKEN_HERE"; 
    $chat_id = "YOUR_CHAT_ID_HERE";

    $message = "🔔 فرم جدید هومیوپاتی دریافت شد:\n\n";
    
    foreach ($_POST as $key => $value) {
        if (!empty($value)) {
            $message .= "🔹 " . $key . ": " . $value . "\n";
        }
    }

    $url = "https://api.eitaa.com/bot" . $token . "/sendMessage?chat_id=" . $chat_id . "&text=" . urlencode($message);
    
    // ارسال به ایتا
    $response = file_get_contents($url);

    if ($response) {
        echo "فرم با موفقیت ارسال شد. با تشکر.";
    } else {
        echo "خطایی در ارسال رخ داد.";
    }
}
?>
