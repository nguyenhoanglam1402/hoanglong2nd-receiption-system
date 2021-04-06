<?php require './server-side/connect.php';?>
<!doctype html>
<html lang="en">
  <head>
    <title>Hoang Long II Kit</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="shortcut icon" href="./images/image_for_page/bootstrap-logo.svg" type="image/svg" sizes="96x96">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" >
  </head>
  <body>
    <div class="navbar-session">
      <!--This is Navbar session-->
      <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between shadow-sm mb-3 bg-white rounded">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="images/image_for_page/bootstrap-logo.svg" alt="" width="50" height="40">
                <span class="brand-name">BiO - Hoang Long 2</span> Kit
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php"><i class="fas fa-tasks"></i>Quản lý chung</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link" href="createForm.html" aria-current="page">
                    <i class="fas fa-receipt"></i>
                      Tạo biên lai
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-box-open"></i>Quản lý biên lai</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-info"></i>Giới thiệu</a>
                  </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline my-2 my-sm-0" type="submit">Search</button>
                </form>
              </div>
        </div>
    </nav>
    </div>
    <div class="container">
      <div class="chart-view-block shadow-sm bg-white">
        <canvas id="chartView">
        </canvas>
      </div>
      <div class="detail-block" id="detail-block">
        <div class="column">
          <div class="recommend-block shadow-sm bg-white">
            <div class="title-bar shadow-sm revenue-bar">
              <h1>
                NHẬN ĐỊNH TỔNG QUAN
              </h1>
            </div>
            <ul>
              <li class="list-detail"><a class="link-detail" id="studio-index" href="#">Lượng khách hình phòng tăng mạnh <b>(10%)</b></a></li>
              <li class="list-detail"><a class="link-detail" id="personal-picture-index" href="#">Lượng khách hình thẻ giảm nhẹ <b>(-5%)</b></a></li>
              <li class="list-detail"><a class="link-detail" id="dress-index" href="#">Lượng khách thuê đồ cưới tăng nhẹ <b>(2%)</b></a></li>
              <li class="list-detail"><a class="link-detail" id="product-index" href="#">Lượng khách mâm quả giảm sâu <b>(-15%)</b></a></li>
            </ul>
          </div>
          <div class="revenue-list shadow-sm bg-white">
            <div class="title-bar shadow-sm revenue-bar">
              <h1>
                TỔNG DOANH THU
              </h1>
            </div>
            <ul class="non-list-type">
              <li class="customer-item">Không có dữ liệu !</li>
            </ul>
          </div>
          <div class="trending-list shadow-sm bg-white">
            <div class="title-bar shadow-sm revenue-bar">
              <h1>
                XU HƯỚNG DỊCH VỤ NỔI BẬC TRONG TUẦN
              </h1>
            </div>
            <ul class="non-list-type">
              <li class = "trending-list-item">Nothing here !</li>
            </ul>
          </div>
        </div>
        <div class="column">
          <div class="customer-list shadow-sm bg-white">
            <div class="title-bar shadow-sm revenue-bar">
              <h1>
                KHÁCH HÀNG ĐANG ĐỢI
              </h1>
            </div>
            <ul class="listCustomer">
	            <li class = "trending-list-item">Đang tải dữ liệu !</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <footer>
      
    </footer>
    <!-- Optional JavaScript -->
    <script src="./js/main_page.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./js/fetchReceiption.js"></script>
    <script src="./js/effect.js"></script>

  </body>
</html>