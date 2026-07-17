<?php
class Candidate{
 private PDO $db;
 function __construct(){$this->db=(new Database())->pdo();}
 function all(){return $this->db->query("SELECT * FROM candidates ORDER BY id DESC")->fetchAll();}
 function find($id){$q=$this->db->prepare("SELECT * FROM candidates WHERE id=?");$q->execute([$id]);return $q->fetch();}
 function create($d,$resume=null){$q=$this->db->prepare("INSERT INTO candidates(name,mobile,email,address,job_type,skills,experience,expected_salary,preferred_location,availability,resume,status) VALUES(?,?,?,?,?,?,?,?,?,?,?,'new')");return $q->execute([$d['name'],$d['mobile'],$d['email']??'',$d['address']??'',$d['job_type'],$d['skills'],$d['experience']??'',$d['expected_salary']?:null,$d['preferred_location']??'',$d['availability']??'Immediate',$resume]);}
 function status($id,$st){$ok=['new','under_review','verified','shortlisted','sent','selected','deployed','rejected'];if(in_array($st,$ok)){$q=$this->db->prepare("UPDATE candidates SET status=? WHERE id=?");$q->execute([$st,$id]);}}
 function verified(){return $this->db->query("SELECT * FROM candidates WHERE status IN ('verified','shortlisted','sent') ORDER BY id DESC")->fetchAll();}
}