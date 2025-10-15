<div class="container my-4">
    <a href="<?=BASE_URL?>" class="btn btn-secondary mb-3">← Trở lại</a>
    <h3 class="content_right-title">
        <?=$title ?? ''?>
    </h3>
    <form action="<?=BASE_URL.'?action=create_article'?>" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="title" class="form-label">Tiêu đề bài viết</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Nhập tiêu đề bài viết..." required>
        </div>
        <div class="mb-3">
            <label for="thumbnail" class="form-label">Ảnh đại diện</label>
            <input class="form-control" type="file" name="images" id="images">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Nội dung bài viết</label>
            <textarea class="form-control" name="content" id="content" rows="5" placeholder="Nhập nội dung bài viết..." required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Đăng bài</button>
    </form>
    <!-- 
    `id_user`,=>đăng nhập
    `title`, =>bắt buộc
    `content`,=>bắt buộc
    `create_at`, =>tự động điền
    `images`, =>có thể không có
    `comment_article_id`, =>có thể không có
    Một trong những nội dung mà mình rất thích vì nó chứa cả một tuoir thơ ở đấy. Đôi khi thứ làm chúng t rung động nhất không phải là những thứ đẹp nhất, mà là những thứ đã trải qua. những kỉ niệm ấy đã để lại lỗ hổng mà mỗi khi nhớ lại được ướm vào lại cho ta cảm giác thân thuộc đến muốn khóc 
    -->
</div>
