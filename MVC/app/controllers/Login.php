<?php

class Login extends Controller {
    public function index() {
        echo "This is the controller of the Login page.";

        $this->view('login');
    }
}