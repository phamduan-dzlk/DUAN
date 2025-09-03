<div class="container shadow p-3 mb-5 bg-white rounded">
    <a href="<?=BASE_URL_ADMIN?>" class="btn btn-secondary mb-3">
        <i class="fa-solid fa-arrow-left"></i> Trở lại
    </a>
    <h2 class="mb-4 text-center">Chỉnh Sửa Khóa Học</h2>
    <h3 class="content_right-title"><?=$title ?? ''?></h3>
    <form action="<?=BASE_URL.'?mode=admin&action=update'?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?=$data['id']?>">

        <div class="mb-3">
            <label for="course-name" class="form-label">Tên khóa học</label>
            <input type="text" name="name" id="course-name" class="form-control" value="<?=$data['name']?>">
        </div>

        <div class="mb-3">
            <label for="instructor-select" class="form-label">Giảng viên</label>
            <select name="instructor_id" id="instructor-select" class="form-select">
                <?php foreach($data_in as $v){?>
                    <option value="<?= $v['id']?>" <?=($v['id'] == $data['instructor_id']) ? 'selected' : ''?>><?= $v['name']?></option>
                <?php }?>
            </select>
        </div>

        <div class="mb-3">
            <label for="course-description" class="form-label">Mô tả</label>
            <textarea name="description" id="course-description" class="form-control" rows="3"><?=$data['description']?></textarea>
        </div>

        <div class="mb-3">
            <label for="course-price" class="form-label">Giá</label>
            <input type="number" name="price" id="course-price" class="form-control" value="<?=$data['price']?>">
        </div>

        <div class="mb-3">
            <label for="category-select" class="form-label">Lộ trình</label>
            <select name="category_id" id="category-select" class="form-select">
                <?php foreach($data_cate as $v){?>
                    <option value="<?= $v['id']?>" <?=($v['id'] == $data['category_id']) ? 'selected' : ''?>><?= $v['name']?></option>
                <?php }?>
            </select>
        </div>

        <div class="mb-3">
            <label for="course-duration" class="form-label">Thời lượng (tháng)</label>
            <input type="number" name="duration" id="course-duration" class="form-control" value="<?=$data['duration']?>">
        </div>
        
        <div class="mb-3">
            <label for="course-thumbnail" class="form-label">Ảnh đại diện</label>
            <input type="file" name="thumbnail" id="course-thumbnail" class="form-control">
        </div>
            <img src="<?=BASE_ASSETS_UPLOADS.$data['thumbnail']?>" alt="">
            
            <?php foreach($comment as $v) {
                echo $v['content'];
            }?>
        <button type="submit" class="btn btn-primary">Cập nhật khóa học</button>
    </form>
</div>