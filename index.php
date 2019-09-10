<?php
require_once 'src/classes/Autoload.class.php';

if (!$_SESSION) {
    header('Location: src/pages/institucional/institucional.php');
} else {
    header('Location: redirect.php');
}

