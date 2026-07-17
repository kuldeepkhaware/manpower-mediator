<?php
class SupplierController extends Controller {
    public function index(){ Auth::requireRole('admin'); $this->view('suppliers/index',['suppliers'=>$this->model('Supplier')->all()]); }
    public function create(){ Auth::requireRole('admin'); $this->view('suppliers/create'); }
    public function store(){
        Auth::requireRole('admin');
        $this->model('Supplier')->create([
            'vendor_name'=>trim($_POST['vendor_name']??''),'contact_person'=>trim($_POST['contact_person']??''),
            'mobile'=>trim($_POST['mobile']??''),'gst_no'=>trim($_POST['gst_no']??''),'services'=>trim($_POST['services']??'')
        ]);
        $_SESSION['success']='Supplier added successfully'; $this->redirect('/suppliers');
    }
}
