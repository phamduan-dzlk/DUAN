
<?php if (isset($message)) echo $message; ?>
<a href="<?=BASE_URL?>" class="btn btn-secondary mb-3">← Trở lại</a>

<form action="<?=BASE_URL.'?action=check'?>" method="post">
    <p>
        <label for="">username</label>
        <input type="text" name="username" id="">
    </p>
    <p>
        <label for="">password</label>
        <input type="password" name="password" id="">
    </p>
    <button type="submit">đăng nhập</button>
</form>