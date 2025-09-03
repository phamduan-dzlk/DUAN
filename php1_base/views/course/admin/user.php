<div class="container">
    <a href="<?=BASE_URL_ADMIN?>" class="btn btn-secondary mb-3">
        ← Trở lại
    </a>
    <div class="content_header text-center fw-bold fs-4 text-primary">
        <?php if (isset($message)) echo $message; ?>
    </div>
    <hr>

    <form action="" class="d-flex my-3" method="get">
        <input type="hidden" name="mode" value="admin">
        <input type="hidden" name="action" value="search_user">
        <input type="text" class="form-control me-2 shadow-sm border-primary" name="search" placeholder=" Nhập để tìm kiếm...">
        <button type="submit" class="btn btn-primary btn-glow">🔍</button>
    </form>
    <h3 class="content_right-title"><?=$title ?? ''?></h3>
    <table class="table table-hover align-middle shadow-sm rounded">
        <thead class="table-primary">
            <tr>
                <th>Định danh</th>
                <th>Tên học sinh</th>
                <th>Emails</th>
                <th>Ảnh đại diện</th>
                <th>Ngày tạo tài khoản</th>
                <th>Hành động(xem chi tiết, sửa, chặn)</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($data as $v){?>
            <tr class="table-row-hover">
                <td><?=$v['id']?></td>
                <td class="fw-semibold"><?=$v['username']?></td>
                <td><?=$v['email']?></td>
                <td>
                    <img src="<?=BASE_ASSETS_UPLOADS.$v['avatar_url']?>" alt="" class="rounded-circle shadow" width="50" height="50">
                </td>
                <td><?=$v['date']?></td>
                <td>
                    <a href="<?=BASE_URL.'?mode=admin&action=detail_user&id='.$v['id']?>" class="text-info fs-5 me-2"><i class="fa-solid fa-info-circle"></i></a>
                    <a href="<?=BASE_URL.'?action=edit_user&id='.$v['id']?>" class="text-warning fs-5 me-2"><i class="fa-solid fa-pen"></i></a>
                    <a href="<?=BASE_URL.'?mode=admin&action=delete_user&id='.$v['id']?>" class="text-danger fs-5" onclick="return confirm('Bạn có muốn chặn không?')"><i class="fa-solid fa-ban"></i></a>
                </td>
            </tr>
        <?php }?>
        </tbody>
    </table>
</div>
