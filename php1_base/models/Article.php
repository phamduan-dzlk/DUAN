<?php
class Article extends BaseModel{
    function allArticle()
    {
        $sql = "SELECT * FROM article";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $articles = $stmt->fetchAll();
        return $articles;
    }
    function getArticle($id)
    {
        $sql = "SELECT * FROM article
                WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $articles = $stmt->fetch();
        return $articles;
    }
    function getArticle_by_user($id_user)
    {
        $sql = "SELECT * FROM article
                WHERE id_user=:id_user";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id_user' => $id_user]);
        $articles = $stmt->fetchAll();
        return $articles;
    }
    function delete($id)
    {
        $sql = "DELETE FROM article
                WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->rowCount();
    }
    function insert($data)
    {
        $sql = "INSERT INTO article (`id_user`, `title`, `content`, `create_at`, `images`)
                VALUES (:title, :content, :user_id)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
    }
    function update($data)
    {
        $sql = "UPDATE article SET title=:title, content=:content, user_id=:user_id
                WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return $stmt->rowCount();
    }

    //hôm nay kết nối và đổ dữ liệu ra trang chi tiết
}
?>