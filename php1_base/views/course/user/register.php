<?php if (isset($message)) echo $message; ?>
  <a href="<?=BASE_URL?>" class="btn btn-secondary mb-3">← Trở lại</a>
    <h3 class="content_right-title"><?=$title ?? ''?></h3>
<form action="<?=BASE_URL.'?action=add'?>" method="post" onsubmit="return kiemloiform(event)">
  <div class="mb-3">
    <label for="" class="form-label">Username</label>
    <input type="text" class="form-control" id="username" name="username">
            <p id="check_username" style="color: red;"></p>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
            <p id="check_password" style="color: red;"></p>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
 <script>
    function kiemloiform(){
        var resuilt = true;
        var username = document.getElementById('username').value;
        var check_username = document.getElementById('check_username');
        var check_password = document.getElementById('check_password');
        var password = document.getElementById('password').value;
        if(username == ''){
            check_username.innerHTML = "username không được để chống";
            resuilt = false;
        }else if(username.length< 3){
            check_username.innerHTML = "Username có độ dài trong khoảng 3-30 ký tự ";
            resuilt = false;
        }else if( username.length>30){
            check_username.innerHTML = "Username có độ dài trong khoảng 3-30 ký tự ";
            resuilt = false;
        }else{
            check_username.innerHTML = "";
        }

        if(password == ''){
            check_password.innerHTML = "password không được để chống";
            resuilt = false;
        }else if(password.length< 6 ){
            check_password.innerHTML = "Password Có độ dài trong khoảng 6-10 ký tự";
            resuilt = false;
        }else if(password.length >10){
            check_password.innerHTML = "Password Có độ dài trong khoảng 6-10 ký tự";
            resuilt = false;
            
        }else{
            check_password.innerHTML = "";
        }
        return resuilt;
    }
 </script>