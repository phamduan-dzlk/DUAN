<form action="<?=BASE_URL_ADMIN.'&action=update_user'?>" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">username</label>
        <input type="text" class="form-control" id="exampleInputEmail1"  name="username" value="<?=$data['username']?>">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Email</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="email" aria-describedby="emailHelp" value="<?=$data['email']?>">
    </div>
    <div class="mb-3 form-check">
        <label class="form-check-label" for="exampleCheck1">image</label>
        <input type="file" name="avatar_url" >
    </div>
        <input type="hidden" name="id"  value="<?=$data['id']?>">
    <button type="submit" class="btn btn-primary">Submit</button>
</form>