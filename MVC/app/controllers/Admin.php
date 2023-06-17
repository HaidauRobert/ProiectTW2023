<?php
require_once __DIR__ . '/../models/AdminModel.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);
class Admin extends Controller {
    public function index() {
        $m = new Model;
        check_login($m->connection);
        $adminModel = new AdminModel();
        $data = array();
        $data['tables'] = $adminModel->getTables(); 
        $userId = $_SESSION['userid'];
        if (!$m->isAdmin($userId)) {
            header("Location: home");
            exit();
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['addTag'])) {
                $tagName = $_POST['tagName'];
                $result = $adminModel->addTag($tagName);
                if ($result === 'success') {
                    $data['addTagMessage'] = 'Successfully added.';
                } elseif ($result === 'exists') {
                    $data['addTagMessage'] = 'Tag already exists in the database.';
                } else {
                    $data['addTagMessage'] = 'Failed to add tag.';
                }
            } elseif (isset($_POST['removeTag'])) {
                $tagName = $_POST['tagName'];
                $result = $adminModel->removeTag($tagName);
                if ($result === 'success') {
                    $data['removeTagMessage'] = 'Successfully removed.';
                } elseif ($result === 'not_found') {
                    $data['removeTagMessage'] = 'Tag does not exist in the database.';
                } else {
                    $data['removeTagMessage'] = 'Failed to remove tag.';
                }
            } elseif (isset($_POST['databaseSelect'], $_POST['formatSelect'])) {
                $database = $_POST['databaseSelect'];
                $format = $_POST['formatSelect'];
            
                if ($format === 'csv') {
                    $tableName = $_POST['databaseSelect']; 
                    $adminModel->exportTableAsCSV($tableName);
                    $data['csvDone'] = __DIR__ . '/../../public/csv/' . $tableName. '.csv';
                } else {
                    $tableName = $_POST['databaseSelect'];
                    $adminModel->exportTableAsJSON($tableName);
                    $data['jsonDone'] = __DIR__ . '/../../public/json/' . $tableName. '.json';
                } 
            }
            
        }
        $data['tags'] = $adminModel->getTags();
        $this->view('admin', $data);
    }
}
