<div class="container">
    <a href="<?=BASE_URL_ADMIN?>"class="btn btn-secondary mb-3">← Trở lại</a>
    <form action="<?=BASE_URL.'?mode=admin&action=add'?>" method="post" enctype="multipart/form-data">
        <p>
            <label for="">name</label>
            <input type="text" name="name" id=""class="form-control">
        </p>
        <p>
            <label for="">instructor</label>
            <select name="instructor_id" id="">
                <?php foreach($data as $v){?>
                    <option value="<?= $v['id']?>"><?= $v['name']?></option>
                <?php }?>
            </select>
        </p>
        <p>
            <label for="">description</label>
            <input type="text" name="description" id=""class="form-control">
        </p>
        <p>
            <label for="">price</label>
            <input type="number" name="price" id=""class="form-control">
        </p>
        <p>
            <label for="">lộ trình</label>
            <select name="category_id" id="">
                <?php foreach($data_cate as $v){?>
                    <option value="<?= $v['id']?>"><?= $v['name']?></option>
                <?php }?>
            </select>
        </p>
        <p>
            <label for="">duration</label>
            <input type="number" name="duration" id=""class="form-control">
        </p>
        <p>
            <label for="">thumbnail</label>
            <input type="file" name="thumbnail" id=""class="form-control">
        </p>
        <button type="submit" class="btn btn-secondary" >thêm khóa học</button>
    </form>
</div>
