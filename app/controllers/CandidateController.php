<?php

class CandidateController extends Controller
{
    public function apply()
    {
        $this->view('candidates/apply');
    }

    public function store()
    {
        $resume = null;

        if (
            !empty($_FILES['resume']['name']) &&
            $_FILES['resume']['error'] === 0
        ) {
            $ext = strtolower(
                pathinfo($_FILES['resume']['name'], PATHINFO_EXTENSION)
            );

            if (in_array($ext, ['pdf', 'doc', 'docx'])) {
                $resume = time() . '_' . preg_replace(
                    '/[^a-zA-Z0-9._-]/',
                    '_',
                    $_FILES['resume']['name']
                );

                $dir = APP_ROOT . '/public/uploads/resumes/';

                if (!is_dir($dir)) {
                    mkdir($dir, 0777, true);
                }

                move_uploaded_file(
                    $_FILES['resume']['tmp_name'],
                    $dir . $resume
                );
            }
        }

        $this->model('Candidate')->create($_POST, $resume);

        $_SESSION['apply_success'] =
            'Application submitted successfully. Admin will review your profile.';

        $this->redirect('/candidate/apply');
    }

    public function index()
    {
        Auth::requireRole('admin');

        $this->view('candidates/index', [
            'candidates' => $this->model('Candidate')->all()
        ]);
    }

    public function details()
    {
        Auth::requireRole('admin');

        $this->view('candidates/view', [
            'candidate' => $this->model('Candidate')->find((int) $_GET['id'])
        ]);
    }

    public function updateStatus()
    {
        Auth::requireRole('admin');

        $this->model('Candidate')->status(
            (int) $_POST['id'],
            $_POST['status']
        );

        $_SESSION['success'] = 'Candidate status updated';

        $this->redirect(
            '/candidates/view?id=' . (int) $_POST['id']
        );
    }
}