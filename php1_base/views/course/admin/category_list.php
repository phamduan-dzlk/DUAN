<div class="container mt-5">
    <h1 class="mb-4 text-center">Quản Lý Danh Mục</h1>

    <?php
    if(isset($_SESSION["msg"])){
        $alertClass = $_SESSION["status"] ? "alert-success" : "alert-danger";
        echo "<div class='alert {$alertClass} alert-dismissible fade show' role='alert'>
                {$_SESSION['msg']}
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";
        unset($_SESSION["msg"]);
        unset($_SESSION["status"]);
    }
    ?>
    <a href="<?=BASE_URL_ADMIN?>" class="btn btn-secondary mb-3">← Trở lại</a><br><br>
    <h3 class="content_right-title"><?=$title ?? ''?></h3>
    <a href="<?=BASE_URL_ADMIN.'&action=create_category'?>" class="btn btn-primary mb-3">
        <i class="bi bi-plus-circle"></i> Thêm danh mục
    </a>

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover"> 
            <thead class="table-dark">
                <tr>
                    <th scope="col">Tên Danh Mục</th>
                <th scope="col" class="text-center">Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $v){?>
                    <tr>
                        <td><?=htmlspecialchars($v['name'])?></td>
                        <td class="text-center">
                            <a href="<?= BASE_URL_ADMIN.'&action=edit_category&id='.$v['id']?>" class="btn btn-sm btn-warning me-2">Sửa</a>
                            <a href="<?= BASE_URL_ADMIN.'&action=delete_category&id='.$v['id']?>" onclick="return(confirm('Bạn có chắc chắn muốn xóa danh mục này không?'))" class="btn btn-sm btn-danger">Xóa</a>
                        </td>
                    </tr>      
                <?php }?>
            </tbody>
        </table>
    </div>

</div>