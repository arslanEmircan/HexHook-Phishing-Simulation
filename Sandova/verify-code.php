<?php
session_start();

if (isset($_POST['kod']) && isset($_SESSION['discount_code'])) {
    if ($_POST['kod'] == $_SESSION['discount_code']) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
} else {
    echo json_encode(['success' => false]);
}
?>
