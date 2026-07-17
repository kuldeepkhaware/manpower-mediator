<?php
class DashboardController extends Controller {
    public function index(){
        Auth::requireLogin();
        $req=$this->model('Requirement');
        $this->view('dashboard/index',['count'=>$req->countAll(),'latest'=>$req->latest()]);
    }
}
