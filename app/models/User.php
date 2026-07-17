<?php
class User {
    private PDO $db;
    public function __construct(){ $this->db=(new Database())->pdo(); }
    public function findByEmail(string $email): ?array {
        $s=$this->db->prepare("SELECT u.*,r.name role FROM users u JOIN roles r ON r.id=u.role_id WHERE u.email=? AND u.status=1 LIMIT 1");
        $s->execute([$email]); return $s->fetch() ?: null;
    }
}
