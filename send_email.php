<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Set up email parameters
    $to = "rahulvijayc123@gmail.com"; // Change this to your email address
    $headers = "From: " . $email .(email) "\r\n" .
               "Reply-To: " . $email .(email) "\r\n" .
               "X-Mailer: PHP/" . phpversion();
    
    // Send email
    if (mail($to, $subject, $message, $headers)) {
        // Email sent successfully
        http_response_code(200); // Set response code to 200 (OK)
        echo json_encode(array("message" => "Email sent successfully."));
    } else {
        // Error sending email
        http_response_code(500); // Set response code to 500 (Internal Server Error)
        echo json_encode(array("message" => "Failed to send email. Please try again later."));
    }
} else {
    // If the request method is not POST
    http_response_code(405); // Method Not Allowed
    echo json_encode(array("message" => "Method not allowed."));
}
?>
