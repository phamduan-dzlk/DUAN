<div class="container">
<a href="<?=BASE_URL_ADMIN?> "class="btn btn-secondary mb-3">← Trở lại</a>
<form action="<?=BASE_URL.'?mode=admin&action=update'?>" method="post" enctype="multipart/form-data">
    <p>
        <label for="">name</label>
        <input type="text" name="name" id="" value="<?=$data['name']?>" class="form-control">
    </p>
    <p>
        <label for="">instructor_id</label>
        <select name="instructor_id" id="">
            <?php foreach($data_in as $v){?>
                <option value="<?= $v['id']?>" <?=$v['id'] == $data['instructor_id'] ?'selected' :''?>><?= $v['name']?></option>
            <?php }?>
        </select>
    </p>
    <p>
        <label for="">description</label>
        <input type="text" name="description" id="" value="<?=$data['description']?>"class="form-control">
    </p>
    <p>
        <label for="">price</label>
        <input type="number" name="price" id="" value="<?=$data['price']?>"class="form-control">
    </p>
    <p>
    <label for="">lộ trình</label>
        <select name="category_id" id="">
            <?php foreach($data_cate as $v){?>
                <option value="<?= $v['id']?>" <?=$v['id'] == $data['category_id'] ?'selected' :''?>><?= $v['name']?></option>
            <?php }?>
        </select>
    </p>
    <p>
        <label for="">duration</label>
        <input type="number" name="duration" id="" value="<?=$data['duration']?>"class="form-control">
    </p>
    <input type="hidden" name="id" id="" value="<?=$data['id']?>">
    <p>
        <label for="">thumbnail</label>
        <input type="file" name="thumbnail" id=""class="form-control">
    </p>
    <button type="submit" class="btn btn-secondary">Sửa khóa học</button>
</form>
</div>