<?php

class Deployment
{
    private PDO $db;

    public function __construct()
    {
        $this->db = (new Database())->pdo();
    }

    public function all(): array
    {
        $sql = "
        SELECT d.*,
               c.company_name,
               r.manpower_type
        FROM deployments d
        LEFT JOIN clients c ON c.id=d.client_id
        LEFT JOIN requirements r ON r.id=d.requirement_id
        ORDER BY d.id DESC
        ";

        return $this->db->query($sql)->fetchAll();
    }

    public function find(int $id): ?array
    {
        $s = $this->db->prepare("
            SELECT *
            FROM deployments
            WHERE id=?
        ");

        $s->execute([$id]);

        return $s->fetch() ?: null;
    }

  public function create(array $d): bool
{
    $sql = "INSERT INTO deployments
    (
        requirement_id,
        client_id,
        source_type,
        candidate_id,
        supplier_id,
        joining_date,
        shift,
        location,
        supervisor_name,
        salary,
        remarks,
        status
    )
    VALUES
    (
        ?,?,?,?,?,?,?,?,?,?,?,?
    )";

    $stmt = $this->db->prepare($sql);

    return $stmt->execute([
        $d['requirement_id'],
        $d['client_id'],
        $d['source_type'],
        !empty($d['candidate_id']) ? $d['candidate_id'] : null,
        !empty($d['supplier_id']) ? $d['supplier_id'] : null,
        $d['joining_date'],
        $d['shift'],
        $d['location'],
        $d['supervisor_name'],
        $d['salary'],
        $d['remarks'],
        'Pending'
    ]);
}
    public function update(int $id,array $d): bool
    {
        $sql = "
        UPDATE deployments
        SET
            client_id=?,
            requirement_id=?,
            source_type=?,
            candidate_id=?,
            supplier_id=?,
            joining_date=?,
            status=?
        WHERE id=?
        ";

        $s = $this->db->prepare($sql);

        return $s->execute([
            $d['client_id'],
            $d['requirement_id'],
            $d['source_type'],
            $d['candidate_id'] ?: null,
            $d['supplier_id'] ?: null,
            $d['joining_date'],
            $d['status'],
            $id
        ]);
    }

    public function delete(int $id): bool
    {
        $s = $this->db->prepare("DELETE FROM deployments WHERE id=?");

        return $s->execute([$id]);
    }
}