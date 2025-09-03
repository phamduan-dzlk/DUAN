<div class="container">
    <a href="<?=BASE_URL?>" class="btn btn-secondary mb-3">← Trở lại</a>
    <!-- NỘI DUNG LIÊN HỆ -->
<div class="container my-5">
    <h3 class="content_right-title"><?=$title ?? ''?></h3>
    <div class="row g-4">
        <!-- Form liên hệ -->
        <div class="col-lg-6">
            <h2 class="mb-4">Gửi liên hệ cho chúng tôi</h2>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Họ và tên</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Địa chỉ Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="message" class="form-label">Nội dung</label>
                    <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Gửi liên hệ</button>
            </form>
        </div>

        <!-- Thông tin liên hệ -->
        <div class="col-lg-6">
            <h2 class="mb-4">Thông tin liên hệ</h2>
            <ul class="list-unstyled">
                <li><strong>Địa chỉ:</strong> Đường Trịnh Văn Bô, Quận Nam Từ Liêm, TP.Hà Nội</li>
                <li><strong>Điện thoại:</strong> 0388 861 650</li>
                <li><strong>Email:</strong> hotro@khoahoc.edu.com.vn</li>
            </ul>


        </div>
    </div>
</div>
</div>
