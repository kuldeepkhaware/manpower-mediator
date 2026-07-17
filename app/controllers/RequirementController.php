<?php
class RequirementController extends Controller {
    public function index(){ Auth::requireRole('admin'); $this->view('requirements/index',['requirements'=>$this->model('Requirement')->all()]); }
    public function create(){ Auth::requireRole('admin'); $this->view('requirements/form',['clients'=>$this->model('Client')->all(),'requirement'=>null]); }
    public function store(){
        Auth::requireRole('admin'); $this->model('Requirement')->create($_POST);
        $_SESSION['success']='Requirement created successfully'; $this->redirect('/requirements');
    }
    public function edit(){
        Auth::requireRole('admin'); $id=(int)($_GET['id']??0);
        $this->view('requirements/form',['clients'=>$this->model('Client')->all(),'requirement'=>$this->model('Requirement')->find($id)]);
    }
    public function update(){
        Auth::requireRole('admin'); $this->model('Requirement')->update((int)$_POST['id'],$_POST);
        $_SESSION['success']='Requirement updated successfully'; $this->redirect('/requirements');
    }
    public function delete(){
        Auth::requireRole('admin'); $this->model('Requirement')->delete((int)($_GET['id']??0));
        $_SESSION['success']='Requirement deleted'; $this->redirect('/requirements');
    }
}
