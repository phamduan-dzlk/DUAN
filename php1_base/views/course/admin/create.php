<div class="container shadow p-3 mb-5 bg-white rounded">
    <a href="<?=BASE_URL_ADMIN?>" class="btn btn-secondary mb-3">
        <i class="fa-solid fa-arrow-left"></i> Trở lại
    </a>
    <h2 class="mb-4 text-center">Thêm Khóa Học Mới</h2>
    <h3 class="content_right-title"><?=$title ?? ''?></h3>
    <form action="<?=BASE_URL.'?mode=admin&action=add'?>" method="post" enctype="multipart/form-data">

        <div class="mb-3">
            <label for="course-name" class="form-label">Tên khóa học</label>
            <input type="text" name="name" id="course-name" class="form-control" placeholder="Nhập tên khóa học">
        </div>

        <div class="mb-3">
            <label for="instructor-select" class="form-label">Giảng viên</label>
            <select name="instructor_id" id="instructor-select" class="form-select">
                <?php foreach($data as $v){?>
                    <option value="<?= $v['id']?>"><?= $v['name']?></option>
                <?php }?>
            </select>
        </div>

        <div class="mb-3">
            <label for="course-description" class="form-label">Mô tả</label>
            <textarea name="description" id="course-description" class="form-control" rows="3" placeholder="Nhập mô tả khóa học"></textarea>
        </div>

        <div class="mb-3">
            <label for="course-price" class="form-label">Giá</label>
            <input type="number" name="price" id="course-price" class="form-control" placeholder="Nhập giá khóa học">
        </div>

        <div class="mb-3">
            <label for="category-select" class="form-label">Lộ trình</label>
            <select name="category_id" id="category-select" class="form-select">
                <?php foreach($data_cate as $v){?>
                    <option value="<?= $v['id']?>"><?= $v['name']?></option>
                <?php }?>
            </select>
        </div>

        <div class="mb-3">
            <label for="course-duration" class="form-label">Thời lượng (tháng)</label>
            <input type="number" name="duration" id="course-duration" class="form-control" placeholder="Nhập thời lượng khóa học">
        </div>

        <div class="mb-3">
            <label for="course-thumbnail" class="form-label">Ảnh đại diện</label>
            <input type="file" name="thumbnail" id="course-thumbnail" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Thêm khóa học</button>
    </form>
</div>