  <style>
    body {
      background-color: #f8f9fa;
    }
    li{
      cursor: pointer;
    }
    .course-container {
      margin-top: 30px;
    }

    .video-wrapper video {
      width: 100%;
      border-radius: 10px;
      box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
    }

    .lesson-list {
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
      padding: 15px;
      height: 100%;
    }

    .lesson-item {
      padding: 10px;
      border-bottom: 1px solid #eee;
      cursor: pointer;
      transition: background-color 0.2s;
    }

    .lesson-item:hover {
      background-color: #f1f1f1;
    }

    li.lesson-item.active {
      background-color: orange;
      color: #fff;
      border-radius: 5px;
    }

    .lesson-title {
      font-weight: 500;
    }
    .list-group-item.active{
      background-color: #212529;
      color: orange;
      border: 2px solid orange;

    }      
    .list-group-item:hover{
      background-color: #fff;
      color:orange;
      border: 2px solid orange;
    }
    .fake_book{
      width:100%;
      min-height:20px;
      border: 1px double black;
      box-shadow: 0 0 2 3 rgba(0, 0, 0,0.3)   
    }
    .content_learn{
      background-color: #eae7e7;
      border-radius: 10px;
      padding: 10px;
      margin: 5px 0;
      box-shadow: 0 0 20px 1px rgb(122, 122, 122);
    }
    .fake_book{
      padding: 5px;
      line-height: 16px;
    }
    .btn-dark{
      color:orange;
      background-color: #212529;
    }
    .list{
      padding: 10px;
      border-radius: 5px;
      background-color: #ffffff;
    }
    .list-group{
      background-color: #f5f5f5;
      padding: 10px;
      border:1px solid rgb(207, 207, 207);
    }
    .list-group:hover{
      color:orange;
      box-shadow: 0 0 20px 2px rgba(0, 0, 0, 0.2);
      transform: translateY(-2px);
      transition: transform ease-in-out 0.2s;
    }
    .folder{
      display: none;
    }
    .folder.show{
      display: block;
      padding: 10px 3px 3px;
    }
  </style>
</head>

<body>
  <div class="container course-container">
    <div class="row">
      <!-- Khu vực video -->
      <div class="col-md-8 mb-4">
        <div class="content_learn">
          <div class="video-wrapper">
            <video id="lessonMain" controls>
              <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
              Trình duyệt của bạn không hỗ trợ video.
            </video>
          </div>
          <h4 class="mt-3" id="lessonTitle">Bài giảng: Giới thiệu khóa học</h4>
          <p>Trong bài học này, bạn sẽ được làm quen với nội dung tổng quan của khóa học và cách học hiệu quả nhất.</p>
        </div>
        <div class="content_learn">
          <div class="note">
            <h3>Ghi chú để dễ nhớ khi xem lại bài nhé</h3>
            <textarea name="" id="" class="form-control"></textarea>
            <a href="#" class="btn btn-dark m-2 " >tạm lưu</a>
            <div class="fake_book">
              <p contenteditable="true" id="book">
                hihihihi
              </p>
              
            </div>
            <a href="" class="btn btn-dark m-2">lưu</a>
          </div>
        </div>
      </div>

      <!-- Danh sách bài học -->
      <div class="col-md-4">
        <div class="lesson-list">
          <h5 class="mb-3">Danh sách bài giảng</h5>
          <ul class="list">

            <li class="list-group">
              <i class="fa-solid fa-plus"></i>Mở đầu và cài đặt môi trường
              <ul class="folder">
                <li class=" list-group-item" onclick="changeLesson('Giới thiệu khóa học', 'https://www.w3schools.com/html/mov_bbb.mp4', this)">Bài 1: Giới thiệu khóa học</li>
                <li class=" list-group-item" onclick="changeLesson('Cài đặt môi trường', 'https://www.w3schools.com/html/movie.mp4', this)">Bài 2: Cài đặt môi trường</li>                
              </ul>
            </li>

            <li class="list-group" ><i class="fa-solid fa-plus"></i>
              Cấu trúc hướng đối tượng MVC
              <ul class="folder ">
                <li class="list-group-item list-group-item" onclick="changeLesson('Cấu trúc dự án MVC', 'https://www.w3schools.com/html/mov_bbb.mp4', this)">
                  Bài 3: Cấu trúc dự án MVC
                </li>
                <li class="list-group-item list-group-item" onclick="changeLesson('Kết nối cơ sở dữ liệu', 'https://www.w3schools.com/html/movie.mp4', this)">
                  Bài 4: Kết nối cơ sở dữ liệu
                </li>     
                <li class="list-group-item" onclick="changeLesson('Xây dựng trang sản phẩm', 'https://www.w3schools.com/html/mov_bbb.mp4', this)">
                  Bài 5: Xây dựng trang sản phẩm
                </li>                                 
              </ul>
            </li>
            <li class="list-group" ><i class="fa-solid fa-plus"></i>
              Thi hết môn
              <ul class="folder">
                <li class="list-group-item" onclick="changeLesson('Xây dựng trang sản phẩm', 'https://www.w3schools.com/html/mov_bbb.mp4', this)">
                  kiểm tra bảo vệ cuối môn
                </li>                
              </ul>
            </li>
            <li class="list-group" ><i class="fa-solid fa-plus"></i>
              Kết Thúc môn
              <ul class="folder">
                <li class="list-group-item" onclick="changeLesson('Đi xả hơi', 'https://www.w3schools.com/html/mov_bbb.mp4', this)">
                  Ứng dựng của Ngôn ngữ trong một sản phẩm quan trọng
                </li>                
              </ul>
            </li>



          </ul>
        </div>
      </div>
    </div>
  </div>

  <!-- Script -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function changeLesson(title, videoUrl, element) {
      const video = document.getElementById('lessonMain');
      video.src = videoUrl;
      video.play();

      document.getElementById('lessonTitle').textContent = 'Bài giảng: ' + title;

      const items = document.querySelectorAll('.list-group-item');
      items.forEach(item => item.classList.remove('active'));
      element.classList.add('active');
    }

    var listGroups = document.querySelectorAll('.list-group'); 
    document.querySelectorAll('.folder').forEach(f => f.classList.remove('show'));
    
    listGroups.forEach(group => {
    group.addEventListener('click', function (e) {
      // Ngăn chặn sự kiện lan sang item con
      if (e.target.closest('.list-group-item')) return;

      const folder = this.querySelector('.folder');
      // Đóng tất cả folder khác
      folder.classList.toggle('show');
    });
  })
    
  </script>
</body>