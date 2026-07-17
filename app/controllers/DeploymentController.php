<?php

class DeploymentController extends Controller
{
    public function index()
    {
        Auth::requireRole('admin');

        $this->view('deployments/index', [
            'deployments' => $this->model('Deployment')->all()
        ]);
    }

    public function create()
    {
        Auth::requireRole('admin');

        $this->view('deployments/create', [
            'clients'      => $this->model('Client')->all(),
            'requirements' => $this->model('Requirement')->all(),
            'candidates'   => $this->model('Candidate')->all(),
            'suppliers'    => $this->model('Supplier')->all()
        ]);
    }

    public function store()
    {
        Auth::requireRole('admin');

        $this->model('Deployment')->create($_POST);

        $_SESSION['success'] = "Deployment created successfully.";

        $this->redirect('/deployments');
    }

    public function edit()
    {
        Auth::requireRole('admin');

        $id = (int)($_GET['id'] ?? 0);

        $this->view('deployments/create', [
            'deployment'   => $this->model('Deployment')->find($id),
            'clients'      => $this->model('Client')->all(),
            'requirements' => $this->model('Requirement')->all(),
            'candidates'   => $this->model('Candidate')->all(),
            'suppliers'    => $this->model('Supplier')->all()
        ]);
    }

    public function update()
    {
        Auth::requireRole('admin');

        $this->model('Deployment')->update(
            (int)$_POST['id'],
            $_POST
        );

        $_SESSION['success'] = "Deployment updated successfully.";

        $this->redirect('/deployments');
    }

    public function delete()
    {
        Auth::requireRole('admin');

        $this->model('Deployment')->delete(
            (int)($_GET['id'] ?? 0)
        );

        $_SESSION['success'] = "Deployment deleted.";

        $this->redirect('/deployments');
    }
}