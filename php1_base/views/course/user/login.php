
<?php if (isset($message)) echo $message; ?>
<a href="<?=BASE_URL?>" class="btn btn-secondary mb-3">← Trở lại</a>

<form action="<?=BASE_URL.'?action=check'?>" method="post" onsubmit="return kiemloiform(event)">
    <p class="mb-3">
        <label for="">username</label>
        <input type="text" name="username" id="username" class="form-control">
        <p id="check_username"></p>
    </p>
    <p>
        <label for="">password</label>
        <input type="password" name="password" id="password" class="form-control">
        <p id="check_password"></p>
    </p>
    <button type="submit" class=" btn btn-primary">đăng nhập</button>
</form>

<!-- check chống và lỗi -->
