<?php
class HomeController {
    public function index() {
        require_once '../src/Views/partials/header.php';
        require_once '../src/Views/pages/about.php';
        require_once '../src/Views/pages/projects.php';
        require_once '../src/Views/partials/footer.php';
        require_once '../src/Views/pages/radio.php';
    }
}
