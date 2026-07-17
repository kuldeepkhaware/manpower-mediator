<?php
class Router {
    private array $routes=[];
    public function get($path,$action){$this->routes['GET'][$path]=$action;}
    public function post($path,$action){$this->routes['POST'][$path]=$action;}
    public function run(): void {
        $uri=parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
        $base=parse_url(BASE_URL,PHP_URL_PATH);
        $path='/'.trim(substr($uri,strlen($base)),'/');
        if($path==='//')$path='/';
        $method=$_SERVER['REQUEST_METHOD'];
        $action=$this->routes[$method][$path]??null;
        if(!$action){http_response_code(404);echo '404 - Page not found';return;}
        [$controller,$methodName]=explode('@',$action);
        require_once APP_ROOT.'/app/controllers/'.$controller.'.php';
        (new $controller())->$methodName();
    }
}
