<?php
class Controller {
    protected function model(string $name) {
        require_once APP_ROOT.'/app/models/'.$name.'.php';
        return new $name();
    }
    protected function view(string $view,array $data=[]): void {
        extract($data);
        require APP_ROOT.'/app/views/'.$view.'.php';
    }
    protected function redirect(string $path): never {
        header('Location: '.BASE_URL.$path); exit;
    }
}
