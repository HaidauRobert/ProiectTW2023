<?php

class Admin extends Controller {
    public function index() {
        echo "This is the controller of the admin page.";

        session_start();

        $con = get_connection();
        if(check_login($con) == 'Failed') {
            $this->view('login');
        }
        else {
            $this->view('admin');
        }
    }
}