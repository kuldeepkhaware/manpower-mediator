<?php
class Supplier {
    private PDO $db;
    public function __construct(){ $this->db=(new Database())->pdo(); }
    public function all(): array { return $this->db->query("SELECT * FROM suppliers ORDER BY id DESC")->fetchAll(); }
    public function create(array $d): bool {
        $s=$this->db->prepare("INSERT INTO suppliers(vendor_name,contact_person,mobile,gst_no,services) VALUES(?,?,?,?,?)");
        return $s->execute([$d['vendor_name'],$d['contact_person'],$d['mobile'],$d['gst_no'],$d['services']]);
    }
}
