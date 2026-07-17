<?php
class CandidateMatch{
 private PDO $db;
 function __construct(){$this->db=(new Database())->pdo();}
 function save($rid,$ids){$q=$this->db->prepare("INSERT IGNORE INTO candidate_requirement_matches(requirement_id,candidate_id,status) VALUES(?,?,'shortlisted')");foreach($ids as $id){$q->execute([$rid,$id]);$this->db->prepare("UPDATE candidates SET status='shortlisted' WHERE id=?")->execute([$id]);}}
 function get($rid){$q=$this->db->prepare("SELECT m.*,c.name,c.mobile,c.job_type,c.skills,c.experience,c.preferred_location FROM candidate_requirement_matches m JOIN candidates c ON c.id=m.candidate_id WHERE m.requirement_id=? ORDER BY m.id DESC");$q->execute([$rid]);return $q->fetchAll();}
 function status($mid,$st){$q=$this->db->prepare("UPDATE candidate_requirement_matches SET status=? WHERE id=?");$q->execute([$st,$mid]);$q=$this->db->prepare("SELECT candidate_id FROM candidate_requirement_matches WHERE id=?");$q->execute([$mid]);$cid=$q->fetchColumn();if($cid)$this->db->prepare("UPDATE candidates SET status=? WHERE id=?")->execute([$st,$cid]);}
}