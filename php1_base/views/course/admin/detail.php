
<?php 
$comment_type = $_GET['mode'] ??'user';
if(isset($_GET['id'])){
    $course_id = $_GET['id'];    
}

?>
<div class="container">
<a href="<?=BASE_URL_ADMIN?>"class="btn btn-secondary mb-3">← Trở lại</a>    
    <table class="table">
        <tr>
            <th>định danh</th>
            <th>tên khóa học</th>
            <th>hình ảnh</th>
            <th>tên giảng viên</th>
            <th>thông tin</th>
            <th>giá</th>
            <th>Thuộc lộ trình</th>
            <th>thời hạn/tháng</th>
            <th>hành động</th>
        </tr>
            <tr>
                <td><?=$data['id']?></td>
                <td><?=$data['name']?></td>
                <td><img src="<?=BASE_ASSETS_UPLOADS.$data['thumbnail']?>" alt="" width="100"></td>
                <td><?=$data['instructorName']?></td>
                <td><?=$data['description']?></td>
                <td><?=$data['price']?></td>
                <td><?=$data['categoryName']?></td>
                <td><?=$data['duration']?></td>
                <td>
                    <a href="<?=BASE_URL.'?mode=admin&action=edit&id='.$data['id']?>"><button class="btn btn-warning">Sửa </button></a>
                    <a href="<?=BASE_URL.'?mode=admin&action=delete&id='.$data['id']?>"><button class="btn btn-danger" onclick=" return(confirm('bạn có muốn xóa không?'))">xóa </button></a>
                </td>
            </tr>
    </table>

    <div class="mt-5 p-2" style="background-color: #d5d5d5;">
        <h5 class="mb-3">Bình luận</h5>
            <?php foreach($data_comment as $v){  ?>
                <?php if($v['isMine']){ ?>
                    <div class="d-flex justify-content-end mb-2">
                        <div class="d-flex flex-row-reverse align-items-start border rounded p-2 bg-light" style="max-width: 75%; background-color: #a9a9f5 !important;">
                            <img src="<?= BASE_ASSETS_UPLOADS . $v['avatar_url'] ?>" alt="avatar" class="rounded-circle ms-3" width="50" height="50">
                            <div>
                                <div class="<?= $v['commenter_type'] == 'user' ? 'text-muted fst-italic' : 'fw-bold fst-italic text-primary' ?>">
                                    <?= $v['username'] . ':' ?>
                                </div>
                                <div ><?= $v['content'] ?></div>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="d-flex justify-content-start mb-2">
                        <div class="d-flex align-items-start border rounded p-2 bg-light" style="max-width: 75%;">
                            <img src="<?= BASE_ASSETS_UPLOADS . $v['avatar_url'] ?>" alt="avatar" class="rounded-circle me-3" width="50" height="50">
                            <div>
                                <div class="<?= $v['commenter_type'] == 'user' ? 'text-muted fst-italic' : 'fw-bold fst-italic text-primary' ?>">
                                    <?= $v['username'] . ':' ?>
                                </div>
                                <span><?= $v['content'] ?></span>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            <?php }?>
            <!-- them comment -->
        <form action="<?= BASE_URL.'?mode=admin&action=comment'?>" method="post" class="mt-4">
            <div class="mb-3">
                <label for="binhluan" class="form-label">Nhập cảm xúc của bạn:</label>
                <!-- gui di nôi dung muốn chia sẻ và làm sao để biết mình là ai thì lấy từ nội dung gửi đi -->
                <input type="hidden" name="commenter_type" value="<?=$comment_type?>" >
                <input type="hidden" name="course_id" value="<?=$course_id?>" >
                <textarea name="content" id="binhluan" class="form-control" rows="4" placeholder="Xin mời nhập cảm xúc của bạn" required ></textarea>
            </div>
            <button type="submit" class="btn btn-success">Gửi</button>
            <!-- neu khoong dang nhap thi khong duowng binh binh luan -->
        </form>
    </div>
</div>