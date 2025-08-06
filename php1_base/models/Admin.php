<?php
class Admin extends BaseModel{
    function check($adminname,$password){
        $sql=" SELECT * from admin where adminname = :adminname AND password = :password";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':adminname'=>$adminname,
            ':password'=>$password
        ]);
        $admin = $stmt->fetch();
        return $admin;
    }
    function get($id){
        $sql="SELECT * FROM admin
        WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id'=>$id]);
        $admin=$stmt->fetch();
        return $admin;
    }
}
?>