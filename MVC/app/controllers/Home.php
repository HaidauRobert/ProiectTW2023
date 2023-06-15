<?php
class Home extends Controller {
    public function index() {
        echo "This is the controller of the Home page.";
        $model = new Model();
        
        if(check_login($model->connection)) {
            $this->view('home');
        }
    }
}