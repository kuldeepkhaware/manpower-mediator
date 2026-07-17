<?php
class ClientController extends Controller {
    public function index(){ Auth::requireRole('admin'); $this->view('clients/index',['clients'=>$this->model('Client')->all()]); }
    public function create(){ Auth::requireRole('admin'); $this->view('clients/create'); }
    public function store(){
        Auth::requireRole('admin');
        $this->model('Client')->create([
            'company_name'=>trim($_POST['company_name']??''),'contact_person'=>trim($_POST['contact_person']??''),
            'mobile'=>trim($_POST['mobile']??''),'address'=>trim($_POST['address']??'')
        ]);
        $_SESSION['success']='Client added successfully'; $this->redirect('/clients');
    }
}
