<?php
require_once __DIR__ . '/../models/SignupModel.php';
class Signup extends Controller {
    public function index() {
        $signupModel = new SignupModel();
        $data = array();
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $user_name = $_POST['nume1'];
            $email = $_POST['email1'];
            $password = password_hash($_POST['parola1'], PASSWORD_DEFAULT);

            $name_error = $signupModel->validateSignup($user_name, $email);
            $data['message'] = $name_error;
            if ($name_error == "") {
                $signupModel->saveUser($user_name, $password, $email);
                header("Location: http://localhost/ProiectTW2023/MVC/public/home");
                die;
            }
        }

        $this->view('signup', $data);
    }
}
