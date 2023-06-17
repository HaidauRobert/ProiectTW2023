<?php
require_once __DIR__ . '/../models/ChangePasswordModel.php';
class Changepassword extends Controller {
    public function index() {        
        $model = new Model();
        check_login($model->connection); 
        $changePasswordModel = new ChangePasswordModel();
        $data = array();
        $userId = $_SESSION['userid'];
        if ($model->isAdmin($userId))
            $data['admin'] = true;
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $parolaveche = $_POST['parolaveche'];
            $parolanoua = $_POST['parolanoua'];
            $confirmareparola = $_POST['confirmaparola'];
            $id = $_SESSION['userid'];
            $user_data = $changePasswordModel->getUserData($id); 
            if (!password_verify($parolaveche, $user_data['password'])) {
                $data['message'] = "Parola veche introdusa nu se potriveste cu parola contului";
                $this->view('changepassword', $data);
                die;
            } elseif ($parolanoua !== $confirmareparola) { 
                $data['message'] = "Parola noua si parola noua confirmata nu sunt aceleasi";
                $this->view('changepassword', $data);
                die;
            } else {
                // All validations passed, update the password
                $changePasswordModel->updatePassword($id, $parolanoua);
                header("Location: Login");
            }
        }

        $this->view('changepassword', $data);
        
    }
}