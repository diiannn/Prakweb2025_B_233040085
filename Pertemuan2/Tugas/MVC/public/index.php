<?php
// Load semua file yang diperlukan
if (!session_id()) {
    session_start();
}
require_once '../app/init.php';
// require_once __DIR__ . '/../app/config/Database.php';
// require_once __DIR__ . '/../app/models/User.php';
// require_once __DIR__ . '/../app/controllers/UserController.php';

$app = new App;
// // Buat koneksi database
// $database = new Database();
// $pdo = $database->connect();

// // Jalankan controller
// $controller = new UserController($pdo);
// $controller->index();
