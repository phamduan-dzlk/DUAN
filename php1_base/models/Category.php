<?php
    class Category extends BaseModel{
        public function getAll(){
            $sql = "SELECT *
            FROM category";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $category = $stmt->fetchAll();
            return $category;
        }
        function get($id){
            $sql="SELECT * FROM category WHERE id=:id";
            $stmt=$this->pdo->prepare($sql);
            $stmt->execute([':id'=>$id]);
            $category=$stmt->fetch();
            return $category;
        }
        function delete($id){
            $sql="DELETE FROM category WHERE id=:id";
            $stmt=$this->pdo->prepare($sql);
            $stmt->execute([':id'=>$id]);
            return $stmt->rowCount();
        }
        function add($name){
            $sql="INSERT INTO category (name) values(:name)";
            $stmt=$this->pdo->prepare($sql);
            $stmt->execute($name);
            return $stmt->rowCount();
        }
        function update($name){
            $sql="UPDATE category set name=:name WHERE id=:id";
            $stmt=$this->pdo->prepare($sql);
            $stmt->execute($name);
            return $stmt->rowCount();
        }
    }
?>