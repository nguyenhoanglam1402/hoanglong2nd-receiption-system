<!-- <?php require './server-side/connect.php';?> -->
<html lang="en">
  <head>
    <title>Hoang Long II Kit</title>
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="shortcut icon" href="./images/image_for_page/download.png" type="image/png" sizes="96x96">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css" >

    <!-- Script and CDN -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="navbar-session">
      <!--This is Navbar session-->
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-between shadow-sm mb-3 bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
              <div class="logo-brand">
                <i class="fab fa-uikit linear-colour logo"></i>
                <span class="brand-name">BiO - Hoang Long 2 Kit</span> 
              </div>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="dashboard.html"><i class="far fa-desktop-alt"></i>Quản lý chung</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link" href="create-form.html" aria-current="page">
                    <i class="fas fa-receipt"></i>
                      Tạo biên lai
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="receiption-management.html"><i class="fas fa-box-open"></i>Quản lý biên lai</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="intro.html"><i class="fas fa-info"></i>Giới thiệu</a>
                  </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline my-2 my-sm-0" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </form>
              </div>
        </div>
    </nav>
    </div>
    <main class="page-content">
      <!-- content will be shown here -->
      <div class="intro-page">
        <div class="intro-header">
        </div>
        <div class="container intro-body">
          <p class="body-header">
            Welcome to <span class="high-line-orange">BiO Hoang Long 2nd Kit</span>
          </p>
          <div class="paragraph">
            <p class="heading">
              <i class="fas fa-question-square"></i>
              <span class="high-line-orange">BiO Kit</span> là gì ?
            </p>
            <p class="para-content">
              <span class="high-line-orange">BiO Kit</span> hay còn gọi là (<span class="high-line-orange">Q - BiO Kit</span>) là bộ công cụ quản trị doanh nghiệp vừa và nhỏ. 
              Đây cũng là một trong nhiều dự án con của chuỗi dự án Qiu Qiu Project nhằm
              xây dựng một mạng lưới các giải pháp quản lý, sức khỏe và giải trí <span class="high-line-blue">Qiu Qiu Environment</span> bao gồm cả Web Application và Mobile Application.
              <span class="high-line-orange">BiO Kit</span> được xây dựng nhằm để giải quyết vấn đề nan giải trong việc xử lý đơn hàng vô của những doanh nghiệp vừa và nhỏ. Tùy vào
              nhu cầu và mô hình doanh nghiệp BiO Kit có thể được chỉnh sửa và thiết kế lại cho phù hợp nhất với môi trường doanh nghiệp.
            </p>
          </div>
          <div class="video-container">
            <div class="video-frame-container">
              <video class="video-frame shadow-sm" src="/asset/hoanglong2ndIntro.mp4" controls autoplay></video>
            </div>
          </div>
          <div class="paragraph">
            <p class="heading">
              <i class="fas fa-question-square"></i>
              <span class="high-line-orange">BiO Kit</span> có lợi ích gì ?
            </p>
            <div class="content-art-block">
              <div class="illustration-block">
                <img class="illustration-image" src="/images/asset/QuotesArt/woman_work.png" alt="">
              </div>
              <div class="content-illustration-block">
                <ul class="list-of-things">
                  <li class="para-content list-item"><i class="fas fa-bolt icon-list"></i>Môi trường quản lý đơn hàng và tác vụ nhanh chóng.</li>
                  <li class="para-content list-item"><i class="fas fa-phone-laptop icon-list"></i>Linh hoạt có thể truy cập và quản lý trên tất cả thiết bị.</li>
                  <li class="para-content list-item"><i class="fad fa-chart-pie icon-list"></i>Tính toán và đưa ra bảng hoạch tính doanh thu từng ngày.</li>
                  <li class="para-content list-item"><i class="fas fa-shield-check icon-list"></i>Bảo mật và lưu trữ đơn hàng lên đến 90 ngày kể từ ngày hoàn thành.</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="paragraph">
            <p class="heading">
              <i class="fas fa-question-square"></i>
              Vì sao lại là 
              <span class="high-line-orange">BiO Kit</span> ?
            </p>
            <div class="content-art-block">
              <div class="content-illustration-block">
                <ul class="list-of-things">
                  <li class="para-content list-item "><i class="fas fa-street-view icon-list"></i>Bạn có thể làm việc ở bất kì đâu.</li>
                  <li class="para-content list-item "><i class="far fa-calendar-check icon-list"></i> Lên lịch hẹn cực kì nhanh chóng. Bằng cả máy tính và điện thoại</li>
                  <li class="para-content list-item "><i class="fas fa-link icon-list"></i>Tất cả dịch vụ và hệ thống con đều nằm trong tầm tay của bạn.</li>
                  <li class="para-content list-item "><i class="fas fa-sort-size-up-alt icon-list"></i>Hệ thống ưu tiên tác vụ thông minh</li>
                  <li class="para-content list-item "><i class="fad fa-shredder icon-list"></i>Thay thế hoàn toàn biên lai giấy truyền thống</li>
                </ul>
              </div>
              <div class="illustration-block">
                <img class="illustration-image" src="/images/asset/QuotesArt/woman-work2.png" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </body>
  <script src="js/navigationbar_click.js"></script>
  <footer class="bg-dark-customize text-center text-white">
      <h2>PHẢN HỒI HỆ THỐNG LIÊN HỆ</h2>
      <!-- Grid container -->
      <div class="container p-2 pb-0">
        <!-- Section: Social media -->
        <section class="">
          <!-- Facebook -->
          <a class="btn btn-outline-light btn-floating m-1" href="https://www.facebook.com/lamnh.gcd/about" role="button"
            ><i class="fab fa-facebook-f"></i
          ></a>
          <!-- Linkedin -->
          <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-linkedin-in"></i
          ></a>
          <!-- Github -->
          <a class="btn btn-outline-light btn-floating m-1" href="https://github.com/nguyenhoanglam1402" role="button"
            ><i class="fab fa-github"></i
          ></a>
        </section>
        <!-- Section: Social media -->
      </div>
      <!-- Grid container -->
      <!-- Copyright -->
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2020 Dự án được phát triển và vận hành bởi:
        <a class="text-white" href="https://www.facebook.com/lamnh.gcd/about">Nguyễn Hoàng Lâm</a>
      </div>
      <!-- Copyright -->
</footer>
</html>
