<?php

function showErrors($errors, $campo) {
    $alert = '';
    if(isset($errors[$campo]) && !empty($campo)) {
        $alert = "<div class='alert error-alert'>" . $errors[$campo] . "</div>";
    }
    return $alert;
}

function deleteErros() {
    $_SESSION['errros'] = null;
    unset($_SESSION['errors']);
}