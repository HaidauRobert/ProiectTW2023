<?php

class Signup extends Controller {
    public function index() {
        echo "This is the controller of the Signup page.";

        $this->view('signup');
    }
}