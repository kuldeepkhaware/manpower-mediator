<?php

class Requirement
{
    private PDO $db;

    public function __construct()
    {
        $this->db = (new Database())->pdo();
    }

    public function countAll(): int
    {
        return (int)$this->db->query("SELECT COUNT(*) FROM requirements")->fetchColumn();
    }

    public function latest(): array
    {
        return $this->db->query("
            SELECT r.*, c.company_name
            FROM requirements r
            LEFT JOIN clients c ON c.id = r.client_id
            ORDER BY r.id DESC
            LIMIT 5
        ")->fetchAll();
    }

    public function all(): array
    {
        return $this->db->query("
            SELECT r.*, c.company_name
            FROM requirements r
            LEFT JOIN clients c ON c.id = r.client_id
            ORDER BY r.id DESC
        ")->fetchAll();
    }

    public function find(int $id): ?array
    {
        $s = $this->db->prepare("SELECT * FROM requirements WHERE id=?");
        $s->execute([$id]);
        return $s->fetch() ?: null;
    }

    public function create(array $d): bool
    {
        $s = $this->db->prepare("
            INSERT INTO requirements
            (
                client_id,
                manpower_type,
                location,
                number_of_staff,
                shift_timing,
                duration,
                budget,
                status
            )
            VALUES
            (
                ?,?,?,?,?,?,?,?
            )
        ");

        return $s->execute([
            $d['client_id'],
            $d['manpower_type'],
            $d['location'],
            $d['number_of_staff'],
            $d['shift_timing'],
            $d['duration'],
            $d['budget'] ?: null,
            'Open'
        ]);
    }

    public function update(int $id, array $d): bool
    {
        $s = $this->db->prepare("
            UPDATE requirements
            SET
                client_id=?,
                manpower_type=?,
                location=?,
                number_of_staff=?,
                shift_timing=?,
                duration=?,
                budget=?,
                status=?
            WHERE id=?
        ");

        return $s->execute([
            $d['client_id'],
            $d['manpower_type'],
            $d['location'],
            $d['number_of_staff'],
            $d['shift_timing'],
            $d['duration'],
            $d['budget'] ?: null,
            $d['status'] ?? 'Open',
            $id
        ]);
    }

    public function delete(int $id): bool
    {
        $s = $this->db->prepare("DELETE FROM requirements WHERE id=?");
        return $s->execute([$id]);
    }
}