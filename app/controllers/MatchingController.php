<?php

class MatchingController extends Controller
{
    public function index()
    {
        Auth::requireRole('admin');

        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

        if ($id <= 0) {
            $_SESSION['error'] = "Please select a requirement first.";
            $this->redirect('/requirements');
            return;
        }

        $requirement = $this->model('Requirement')->find($id);

        if (!$requirement) {
            $_SESSION['error'] = "Requirement not found.";
            $this->redirect('/requirements');
            return;
        }

        $this->view('matching/index', [
            'requirement' => $requirement,
            'candidates'  => $this->model('Candidate')->verified(),
            'matched'     => $this->model('CandidateMatch')->get($id)
        ]);
    }

    public function shortlist()
    {
        Auth::requireRole('admin');

        $id = (int)$_POST['requirement_id'];

        $this->model('CandidateMatch')->save(
            $id,
            $_POST['candidate_ids'] ?? []
        );

        $_SESSION['success'] = "Candidates shortlisted successfully.";

        $this->redirect('/matching?id=' . $id);
    }

    public function status()
    {
        Auth::requireRole('admin');

        $matchId = (int)$_GET['match_id'];
        $status  = $_GET['status'];
        $id      = (int)$_GET['id'];

        $this->model('CandidateMatch')->status($matchId, $status);

        $_SESSION['success'] = "Status updated.";

        $this->redirect('/matching?id=' . $id);
    }
}