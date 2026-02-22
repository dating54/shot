<?php
// সিকিউর হেডার
header("X-Frame-Options: DENY");
header("X-Content-Type-Options: nosniff");
header("Referrer-Policy: no-referrer");

$code = $_GET['code'] ?? '';
if($code) {
    $links = json_decode(file_get_contents('data/links.json'), true);
    foreach($links as $link) {
        if($link['code'] == $code) {
            header("Location: " . $link['original']);
            exit;
        }
    }
}
?>