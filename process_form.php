<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Assurez-vous d'avoir installé PHPMailer via Composer

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Envoyer un e-mail avec PHPMailer
    $mail = new PHPMailer(true);

    try {
        $mail->setFrom($email, $nom);
        $mail->addAddress("kewanaitahmed3@gmail.com");
        $mail->Subject = "Nouveau message du formulaire de contact";
        $mail->Body = "Nom: $nom\nE-mail: $email\nMessage:\n$message";

        $mail->send();

        // Rediriger vers une page de confirmation
        header("Location: confirmation.html");
        exit();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Assurez-vous d'avoir installé PHPMailer via Composer

// ... (le reste de votre script)
