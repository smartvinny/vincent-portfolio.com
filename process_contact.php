<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["text"];

    // Validate the email address
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit();
    }

    // Your domain name
    $email_from ="https://smartvinny.github.io/vincent-portfolio.com/#contact";

    // Email subject
    $email_subject = "New Contact Form Submission: $subject";

    // Email message
    $email_message = "Name: $name\n";
    $email_message .= "Email: $email\n";
    $email_message .= "Subject: $subject\n\n";
    $email_message .= "Message:\n$message";

    $to = "nyasimiv310@gmail.com";

    // Additional headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send the email
    if (mail($to, $email_subject, $email_message, $headers)) {
        echo "Email sent successfully!";
    } else {
        echo "Error sending email. Please try again later.";
    }
}

?>
