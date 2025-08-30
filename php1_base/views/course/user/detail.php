<?php if (isset($message)) echo $message; ?>
<?php 
$comment_type = $_GET['mode'] ??'user';
if(isset($_GET['id'])){
    $course_id = $_GET['id'];    
}

?>
<div class="container my-4">
    <a href="<?=BASE_URL?>" class="btn btn-secondary mb-3">← Trở lại</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Định danh</th>
                <th>Tên khóa học</th>
                <th>Hình ảnh</th>
                <th>Tên giảng viên</th>
                <th>Thông tin</th>
                <th>Giá</th>
                <th>Thuộc lộ trình</th>
                <th>thời hạn/tháng</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?=$data['id']?></td>
                <td><?=$data['name']?></td>
                <td><img src="<?=BASE_ASSETS_UPLOADS.$data['thumbnail']?>" alt="" class="img-thumbnail" width="100"></td>
                <td><?=$data['instructorName']?></td>
                <td><?=$data['description']?></td>
                <td><?=number_format($data['price'], 0, ',', '.')?> đ</td>
                <td><?=$data['categoryName']?></td>
                <td><?=$data['duration']?></td>
                <td>
                    <a href="<?=BASE_URL.'?action=takecourse&id='.$data['id']?>" class="btn btn-primary btn-sm">
                        Đăng ký khóa học
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
    <!--  -->
    <div class="card shadow mb-4 w-100">
        <div class="row g-0">
            <div class="col-md-4 text-center">
                <img src="<?= BASE_ASSETS_UPLOADS . $data['thumbnail'] ?>" class="img-fluid rounded-start p-3" alt="thumbnail">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title text-primary"><?= $data['name'] ?></h5>
                    <p class="mb-1"><strong>Định danh:</strong> <?= $data['id'] ?></p>
                    <p class="mb-1"><strong>Giảng viên:</strong> <?=$data['instructorName']?></p>
                    <p class="mb-1"><strong>Giá:</strong> <?= number_format($data['price'], 0, ',', '.') ?> đ</p>
                    <p class="mb-1"><strong>lộ trình</strong> <?= $data['categoryName'] ?></p>
                    <p class="mb-1"><strong>thời hạn/tháng</strong> <?= $data['duration'] ?></p>
                    <p class="mb-2"><strong>Thông tin:</strong> <?= $data['description'] ?></p>
                    <a href="<?= BASE_URL . '?action=takecourse&id=' . $data['id'] ?>" class="btn btn-primary btn-sm">
                        Đăng ký khóa học
                    </a>
                </div>
            </div>
        </div>
    </div>
<!-- binh luan -->
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
        <form action="<?= BASE_URL.'?action=comment'?>" method="post" class="mt-4">
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

<!-- CSS bổ sung -->
<style>
    .my {
        margin-left: auto ;
        
    }
</style>
