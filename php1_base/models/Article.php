<?php
class Article extends BaseModel
{
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
}
?>