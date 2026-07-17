<?php
class Client {
    private PDO $db;
    public function __construct(){ $this->db=(new Database())->pdo(); }
    public function all(): array { return $this->db->query("SELECT * FROM clients ORDER BY id DESC")->fetchAll(); }
    public function create(array $d): bool {
        $s=$this->db->prepare("INSERT INTO clients(company_name,contact_person,mobile,address) VALUES(?,?,?,?)");
        return $s->execute([$d['company_name'],$d['contact_person'],$d['mobile'],$d['address']]);
    }
}
