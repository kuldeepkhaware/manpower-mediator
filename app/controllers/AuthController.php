<?php
class AuthController extends Controller {
    public function login(){ if(Auth::check())$this->redirect('/dashboard'); $this->view('auth/login'); }
    public function authenticate(){
        if(!hash_equals($_SESSION['csrf']??'',$_POST['csrf']??'')) exit('Invalid CSRF token');
        $email=trim($_POST['email']??''); $password=$_POST['password']??'';
        $user=$this->model('User')->findByEmail($email);
        if($user && password_verify($password,$user['password'])){
            unset($user['password']); $_SESSION['user']=$user; $this->redirect('/dashboard');
        }
        $_SESSION['error']='Invalid email or password'; $this->redirect('/login');
    }
    public function logout(){ session_destroy(); $this->redirect('/login'); }
}
