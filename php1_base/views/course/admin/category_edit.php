<div class="container mt-5">
    <a href="<?=BASE_URL_ADMIN.'&action=show_category'?>" class="btn btn-secondary mb-3">
        <i class="fa-solid fa-arrow-left"></i> Trở lại
    </a>
    <div class="row justify-content-center">
        <h3 class="content_right-title"><?=$title ?? ''?></h3>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-center">Chỉnh Sửa Danh Mục</h3>
                </div>
                <div class="card-body">
                    <form action="<?=BASE_URL_ADMIN.'&action=update_category'?>" method="post">
                        <div class="mb-3">
                            <label for="category-name" class="form-label">Tên Danh Mục</label>
                            <input type="text" class="form-control" id="category-name" name="name" value="<?=$data['name']?>">
                        </div>
                        <input type="hidden" name="id" value="<?=$data['id']?>">
                        
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Cập Nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>