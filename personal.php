<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $email = strip_tags(trim($_POST["email"]));
    $message = strip_tags(trim($_POST["message"]));

    //  Validate (basic example)
    if (empty($name) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo "Please complete the form and enter a valid email address.";
        exit;
    }

    $botToken = "7835035280:AAF_u20RovOLKbsykUr0PQp3xa0opHWxtgc";  //  Replace with your bot's API token
    $chatId = "@personalSiteGitbot";     //  Replace with the chat ID where you want messages

    $text = "New Contact Form Submission:\n\nName: $name\nEmail: $email\n\nMessage:\n$message";

    $url = "https://api.telegram.org/bot$botToken/sendMessage?chat_id=$chatId&text=" . urlencode($text);

    $response = file_get_contents($url);  //  Send the request to the Telegram API

    if ($response) {
        http_response_code(200);
        echo "Thank you! Your message has been sent to Telegram.";
    } else {
        http_response_code(500);
        echo "Oops! Something went wrong and we couldn't send the message to Telegram.";
    }
} else {
    http_response_code(403);
    echo "There was a problem with your submission, please try again.";
}
?>
//Explanation:

Replace "YOUR_BOT_TOKEN" and "YOUR_CHAT_ID" with the values you obtained from BotFather and your chat.
$text: Formats the message you want to send to Telegram.
$url: Constructs the URL for the Telegram Bot API's sendMessage method.
urlencode(): Encodes the message text to be URL-safe.
file_get_contents($url): Sends an HTTP request to the Telegram API.
The rest is error handling and output to the user.