<div class="container">
    <a href="<?=BASE_URL_ADMIN?>"class="btn btn-secondary mb-3">← Trở lại</a><div class="content_header">
    <?php if (isset($message)) echo $message; ?>
    </div><hr>
    <form action="" class="d-flex my-3" method="get" >
        <input type="hidden" name="mode" value="admin" id="">
        <input type="hidden"  name="action" value="search_user" id="">
        <input type="text" class="form-control me-2" name="search" id="" placeholder="nhập để tìm kiếm...">
        <button type="submit" class="btn btn-outline-primary">tìm kiếm</button>
    </form>
    <table class="table">
        <tr>
            <th>định danh</th>
            <th>tên học sinh</th>
            <th>Emails</th>
            <th>hành động</th>
        </tr>
        <?php foreach($data as $v){?>
            <tr>
                <td><?=$v['id']?></td>
                <td><?=$v['username']?></td>
                <td><?=$v['email']?></td>
                <td>
                    <a href="<?=BASE_URL.'?mode=admin&name=user&action=detail&id='.$v['id']?>"><i class="fa-solid fa-info"></i></a>
                    <a href="<?=BASE_URL.'?mode=admin&name=user&action=edit&id='.$v['id']?>"><i class="fa-solid fa-file-pen"></i></a>
                    <a href="<?=BASE_URL.'?mode=admin&name=user&action=delete&id='.$v['id']?>" onclick=" return(confirm('bạn có muốn xóa không?'))"><i class="fa-solid fa-trash"></i></a>
                </td>
            </tr>
        <?php }?>
    </table>
</div>