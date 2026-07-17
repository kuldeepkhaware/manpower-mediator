<?php
class Auth {
    public static function check(): bool { return isset($_SESSION['user']); }
    public static function user(): ?array { return $_SESSION['user']??null; }
    public static function requireLogin(): void {
        if(!self::check()){header('Location: '.BASE_URL.'/login');exit;}
    }
    public static function requireRole(string $role): void {
        self::requireLogin();
        if(($_SESSION['user']['role']??'')!==$role){http_response_code(403);exit('403 Forbidden');}
    }
}
