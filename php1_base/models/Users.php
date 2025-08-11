<?php
class Users extends BaseModel{
    function getAll(){
        $sql="SELECT * FROM users";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $users=$stmt->fetchAll();
        return $users;
    }
    function add($data){
        $sql="SELECT count(*) FROM `users` WHERE username = :username and password =:password";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        $count=$stmt->fetchColumn();
        if($count == 0){
            $sql="INSERT INTO `users`(`username`, `password`) VALUES (:username, :password)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($data);
            return $this->pdo->lastInsertId();
        }
        return 0;
    }
    function update($data){
        $sql="UPDATE `users` SET `username`=:username,`email`=:email,`avatar_url`=:avatar_url WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return $stmt->rowCount();
    }
    //
    function update_course($id,$coursesId){
        $sql="UPDATE `users` SET `course_registration`=:coursesId,`instructor_name`=:coursesId WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':id'=>$id,
            ':coursesId'=>$coursesId,]);
        
    }
    function get($id){
        $sql="SELECT * FROM users
        WHERE users.id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id'=>$id]);
        $courses= $stmt->fetch();
        return $courses;
    }
    function delete($id){
        $sql="DELETE FROM users WHERE id=:id";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id'=>$id]);
        return $stmt->rowcount();
    }
    //kiem tra
    function check($username,$password){
        $sql=" SELECT * from users where username = :username AND password = :password";
        //truy vấn thống tin vầ lưu thông tin vào một mảng
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':username'=>$username,
            ':password'=>$password
        ]);
        //chỉ in một cái giống nhất
        $users = $stmt->fetch();
        return $users;
    }
        function search($keyword){
        $key="%$keyword%";
        //cái này để đánh dấy vậy thôi
        //nếu không có cũng được
        $sql="SELECT * FROM users
        WHERE username LIKE :keyword ";
        //truy vấn đối tượng
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':keyword'=>$key]);
        $courses= $stmt->fetchAll();
        return $courses;
    }
}
?>