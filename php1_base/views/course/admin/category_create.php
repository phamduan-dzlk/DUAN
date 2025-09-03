<div class="container mt-5">
    <a href="<?=BASE_URL_ADMIN.'&action=show_category'?>" class="btn btn-secondary mb-3">
        <i class="fa-solid fa-arrow-left"></i> Trở lại
    </a>
    <h3 class="content_right-title"><?=$title ?? ''?></h3>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">

                    <h3 class="card-title text-center">Thêm Danh Mục Mới</h3>
                </div>
                <div class="card-body">
                    <form action="<?=BASE_URL_ADMIN.'&action=add_category'?>" method="post">
                        <div class="mb-3">
                            <label for="category-name" class="form-label">Tên Danh Mục</label>
                            <input type="text" class="form-control" id="category-name" name="name" placeholder="Nhập tên danh mục" required>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Thêm Danh Mục</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
