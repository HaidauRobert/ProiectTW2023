<?php

class AdminModel extends Model {
    public function addTag($tagName) {
        $query = "SELECT COUNT(*) FROM classes WHERE class_name = ?";
        $statement = $this->connection->prepare($query);
        $statement->bind_param("s", $tagName);
        $statement->execute();
        $result = $statement->get_result();
        $count = $result->fetch_row()[0];
        
        if ($count > 0) {
            return 'exists';
        }

        $insertQuery = "INSERT INTO classes (class_name, is_aproved) VALUES (?, true)";
        $insertStatement = $this->connection->prepare($insertQuery);
        $insertStatement->bind_param("s", $tagName);
        if ($insertStatement->execute()) {
            if ($insertStatement->affected_rows > 0) {
                return 'success';
            }
        }

        return 'error';
    }

    public function removeTag($tagName) {
        $query = "DELETE FROM classes WHERE class_name = ?";
        $statement = $this->connection->prepare($query);
        $statement->bind_param("s", $tagName);
        if ($statement->execute()) {
            if ($statement->affected_rows > 0) {
                return 'success';
            } else {
                return 'not_found';
            }
        } else {
            return 'error';
        }
    }

    public function exportTableAsCSV($tableName) {
        $filename = $tableName . '.csv';
        $filePath = __DIR__ . '/../../public/csv/' . $filename;
    
        $query = "SELECT * FROM " . $tableName;
        $result = $this->connection->query($query);
    
        if ($result && $result->num_rows > 0) {
            $file = fopen($filePath, 'w'); 
    
            $columnHeaders = array_keys($result->fetch_assoc());
            fputcsv($file, $columnHeaders);
    
            while ($row = $result->fetch_assoc()) {
                fputcsv($file, $row);
            }
    
            fclose($file); 
    
            return $filePath;
        } else {
            return null; 
        }
    }
    public function exportTableAsJSON($tableName) {
        $filename = $tableName . '.json';
        $filePath = __DIR__ . '/../../public/json/' . $filename;
    
        $query = "SELECT * FROM " . $tableName;
        $result = $this->connection->query($query);
    
        if ($result && $result->num_rows > 0) {
            $data = array();
    
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
    
            $jsonData = json_encode($data);
    
            file_put_contents($filePath, $jsonData);
    
            return $filePath;
        } else {
            return null;
        }
    }
    
    
    
    public function getTables() {
        $query = "SHOW TABLES";
        $result = $this->connection->query($query);

        $tables = array();
        if ($result) {
            while ($row = $result->fetch_row()) {
                $tables[] = $row[0];
            }
        }

        return $tables;
    }
}
