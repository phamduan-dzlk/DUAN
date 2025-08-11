<?php
class Courses extends BaseModel{
    function getAll(){
        $sql="SELECT courses.*, instructor.name as instructorName, category.name as categoryName
        FROM courses
        LEFT JOIN instructor
        ON courses.instructor_id = instructor.id
        LEFT JOIN category
        ON courses.category_id = category.id
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $courses= $stmt->fetchAll();
        return $courses;
    }
    function get($id){
        $sql="SELECT courses.*, instructor.name as instructorName, category.name as categoryName
        FROM courses
        LEFT JOIN instructor
        ON courses.instructor_id = instructor.id
        LEFT JOIN category
        ON courses.category_id = category.id
        WHERE courses.id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id'=>$id]);
        $courses= $stmt->fetch();
        return $courses;
    }
    function delete($id){
        $sql="DELETE FROM `courses`
        WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id'=>$id]);
        return $stmt->rowCount();
    }
    function add($data){
        $sql="INSERT INTO `courses`( `name`, `thumbnail`, `instructor_id`, `description`, `price`, `category_id`, `duration`) VALUES (:name, :thumbnail, :instructor_id, :description, :price, :category_id, :duration)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
    }
    function update($data){
        $sql="UPDATE `courses` SET `name`=:name,`thumbnail`=:thumbnail ,`instructor_id`=:instructor_id ,`description`=:description,`price`=:price, `category_id` = :category_id, `duration` = :duration
        WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return $stmt->rowCount();
    }
    function search($keyword){
        $key="%$keyword%";
        $sql="SELECT courses.*, instructor.name as instructorName, category.name as categoryName 
        FROM courses
        LEFT JOIN instructor
        ON courses.instructor_id = instructor.id
        LEFT JOIN category
        ON courses.category_id = category.id
        WHERE courses.name LIKE :keyword OR CAST(courses.price AS char) LIKE :keyword OR category.name LIKE :keyword ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':keyword'=>$key]);
        $courses= $stmt->fetchAll();
        return $courses;
    }
    public function getAll_category()
    {
        
        $sql="SELECT DISTINCT  category.name as categoryName, category.id as category_id
        FROM courses
        JOIN category
        ON courses.category_id = category.id";
        $stmt=$this->pdo->prepare($sql);
        $stmt->execute();
        $category=$stmt->fetchAll();
        return $category;
    }
    function category($keyword){
        $key="%$keyword%";
        $sql="SELECT courses.*, instructor.name as instructorName, category.name as categoryName 
        FROM courses
        LEFT JOIN instructor
        ON courses.instructor_id = instructor.id
        LEFT JOIN category
        ON courses.category_id = category.id
        WHERE courses.category_id LIKE :keyword ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':keyword'=>$key]);
        $courses= $stmt->fetchAll();
        return $courses;
    }
}
?>