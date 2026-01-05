<?php
// resources/views/login_register.php

// Dit is de 'View' voor de inlog- en registratiepagina.
// Het bevat alleen de HTML en een klein beetje PHP om foutmeldingen te tonen.
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Registratie - YShelf</title>
    <!-- We linken naar het centrale CSS-bestand -->
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>

<div class="container">

    <?php
    // --- FOUT- EN SUCCESMELDINGEN ---
    // Controleer of er een ?error=... of ?success=... in de URL staat en toon een melding.
    if (isset($_GET['error'])) {
        echo '<div class="error-message">';
        switch ($_GET['error']) {
            case 'login_failed':
                echo 'Inloggen mislukt. Controleer je e-mail en wachtwoord.';
                break;
            case 'empty_fields':
                echo 'Registratie mislukt. Vul alsjeblieft alle velden in.';
                break;
            case 'invalid_email':
                echo 'Registratie mislukt. Voer een geldig e-mailadres in.';
                break;
            case 'email_exists':
                echo 'Registratie mislukt. Dit e-mailadres is al in gebruik.';
                break;
            case 'register_failed':
                echo 'Er is een onbekende fout opgetreden. Probeer het opnieuw.';
                break;
        }
        echo '</div>';
    }

    if (isset($_GET['success']) && $_GET['success'] === 'register_ok') {
        echo '<div class="success-message">Registratie gelukt! Je kunt nu inloggen.</div>';
    }
    ?>

    <!-- Inlogformulier -->
    <div class="form-container">
        <h2>Inloggen</h2>
        <form action="/login-action" method="POST">
            <div class="form-group">
                <label for="login-email">Email</label>
                <input type="email" id="login-email" name="email" required>
            </div>
            <div class="form-group">
                <label for="login-password">Wachtwoord</label>
                <input type="password" id="login-password" name="password" required>
            </div>
            <button type="submit">Inloggen</button>
        </form>
    </div>

    <!-- Registratieformulier -->
    <div class="form-container">
        <h2>Registreren</h2>
        <form action="/register-action" method="POST">
            <div class="form-group">
                <label for="register-username">Gebruikersnaam</label>
                <input type="text" id="register-username" name="username" required>
            </div>
            <div class="form-group">
                <label for="register-email">Email</label>
                <input type="email" id="register-email" name="email" required>
            </div>
            <div class="form-group">
                <label for="register-password">Wachtwoord</label>
                <input type="password" id="register-password" name="password" required>
            </div>
            <button type="submit">Registreren</button>
        </form>
    </div>

</div>

</body>
</html>
