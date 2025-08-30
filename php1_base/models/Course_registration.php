<?php
class Course_registration extends BaseModel{
    function getAll($id){
        //mấy dòng dài dài này chỉ đơn giản là hiện tất cả thông tin của bảng khóa học
        $sql="SELECT course_registration.*, courses.id AS coursesId, courses.name AS coursesName, courses.thumbnail AS coursesImg, courses.instructor_id AS coursesIn, courses.description AS coursesDes, courses.price, courses.duration as coursesDura,
        instructor.name AS instructorName,
        category.name AS courses_categoryName
        FROM course_registration
        LEFT JOIN courses
        ON course_registration.course_id = courses.id
        LEFT JOIN instructor
        ON courses.instructor_id = instructor.id
        LEFT JOIN category
        ON courses.category_id = category.id
        WHERE course_registration.user_id=:id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id'=>$id]);
        $instructor= $stmt->fetchAll();
        return $instructor;
    }
    function delete($course_id){
        $sql="DELETE FROM `course_registration`  WHERE`course_id`=:course_id ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':course_id'=>$course_id,
        ]);
    }    
    function add($user_id, $course_id){
        $sqlCheck = "SELECT * FROM course_registration WHERE user_id = :user_id AND course_id = :course_id";
        $stmtCheck = $this->pdo->prepare($sqlCheck);
        $stmtCheck->execute([
            ':user_id' => $user_id,
            ':course_id' => $course_id
        ]);
        //nếu đăng ký rồi thì không cần thêm nữa
        if ($stmtCheck->rowCount() == 0) {
            $sql = "INSERT INTO course_registration (user_id, course_id) VALUES (:user_id, :course_id)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':user_id' => $user_id,
                ':course_id' => $course_id
            ]);
            return $stmt->rowCount();
        }
    }   
    function update($user_id,$course_id){
        $sql="UPDATE `course_registration` SET `course_id`=:course_id WHERE `user_id`=:user_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':course_id'=>$course_id,
            ':user_id'=>$user_id
        ]);
    }    

}
?>