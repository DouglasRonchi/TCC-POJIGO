<?php
require_once 'src/classes/Autoload.class.php';
session_start();

if ($_SESSION['previlegio'] == '1') {
    header('Location: src/pages/paginagestor/dashboard.php');
} else if ($_SESSION['previlegio'] == '2') {
    header('Location: src/pages/paginagestor/dashboard.php');
} else if ($_SESSION['previlegio'] == '3') {
    header('Location: src/pages/paginamotorista/login.php');
} else {
    header('Location: login.php');
}