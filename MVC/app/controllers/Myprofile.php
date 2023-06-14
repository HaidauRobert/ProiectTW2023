<?php

class Myprofile extends Controller {
    public function index() {
        echo "This is the controller of the My Profile page.";

        $con = get_connection();
        if(check_login($con) == 'Failed') {
            $this->view('login');
        }
        else {
            $this->view('myprofile');
        }
    }
}