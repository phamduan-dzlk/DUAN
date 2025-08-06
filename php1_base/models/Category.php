<?php
    class Category extends BaseModel{
        public function getAll(){
            $sql = "SELECT * FROM category";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $category = $stmt->fetchAll();
            return $category;
        }
    }
?>