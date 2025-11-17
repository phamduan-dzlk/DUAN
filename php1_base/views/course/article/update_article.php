<div class="container my-4">
    <a href="<?=BASE_URL.'?action=show_article_list'?>" class="btn btn-secondary mb-3">← Trở lại</a>
    <h3 class="content_right-title">
        <?=$title ?? ''?>
    </h3>
    <form action="<?=BASE_URL.'?action=update_article'?>" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="title" class="form-label">Tiêu đề bài viết</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Nhập tiêu đề bài viết..." value="<?=$data['title']?>">
        </div>
        <div class="mb-3">
            <label for="thumbnail" class="form-label">Ảnh minh họa</label>
            <img src="<?=BASE_ASSETS_UPLOADS . $data['images']?>" alt="">
            <input class="form-control" type="file" name="images" id="images">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Nội dung bài viết</label>
            <textarea class="form-control" name="content" id="content" rows="5" placeholder="Nhập nội dung bài viết..." ><?=$data['content']?></textarea>
        </div>
        <input type="hidden" name="id" id="" value="<?=$data['id']?>">
        <button type="submit" class="btn btn-primary">Sửa bài</button>
    </form>
</div>
