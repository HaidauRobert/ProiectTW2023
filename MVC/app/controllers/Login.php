<?php

require_once __DIR__ . '/../models/LoginModel.php';

class Login extends Controller {
    public function index() {
        echo "This is the controller of the Login page.";
        $loginModel = new LoginModel();
        $data = array();
                if ($_SERVER['REQUEST_METHOD']=="POST")
                {
                    //ceva a fost pus
                    $username = $_POST['nume1'];
                    $password = $_POST['parola1'];
                    if (!empty($username)&&!empty($password))
                    {
                        $user_data = $loginModel->authenticateUser($username, $password);

                        if ($user_data !== null) {
                            $_SESSION['userid'] = $user_data['userid'];
                            $_SESSION['name'] = $user_data['name'];
                            header("Location: http://localhost/ProiectTW2023/MVC/public/home");
                            exit();
                        } else {
                            $data['message'] = "Numele de utilizator sau parola introdusă nu se potrivesc!";
                        }
                    }
                }
        


        $this->view('login',$data);
    }
}