<?php 
class Comment extends BaseModel{
    function get_comment($id){
        $sql=" SELECT * FROM `comment`
        Where course_id=:id";
        $stmt= $this->pdo->prepare($sql);
        $stmt->execute([':id'=>$id]);
        $comments=$stmt->fetchAll();
        return $comments;
    }
    function add($data){
        $sql="INSERT INTO `comment`(`course_id`, `content`, `commenter_type`, `commenter_id`) VALUES (:course_id, :content, :commenter_type, :commenter_id)";
        $stmt= $this->pdo->prepare($sql);
        $stmt->execute($data);
    }
}
?>