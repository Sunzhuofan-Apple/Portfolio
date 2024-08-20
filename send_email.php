<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['number']) || empty($_POST['message'])) {
        echo '所有字段都是必填项。';
        exit();
    }
    // 收集表单数据
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $message = $_POST['message'];

    // 准备电子邮件
    $to = 'receiver@example.com'; // 替换为您的接收邮箱
    $subject = '新的联系表单提交';
    $body = "姓名: $name\n邮箱: $email\n电话号码: $number\n消息: $message";
    $headers = 'From: webmaster@example.com' . "\r\n" . // 这里可以更换为您的发送邮箱
               'Reply-To: ' . $email;

    // 发送电子邮件
    if (mail($to, $subject, $body, $headers)) {
        echo '消息已发送！';
    } else {
        echo '消息发送失败，请稍后再试。';
    }
} else {
    echo '请通过表单提交数据。';
}
?>

