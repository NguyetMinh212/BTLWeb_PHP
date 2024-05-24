
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">
    <link href="/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    
    <style>
        /* CSS */
            .main-sidebar {
                background-color: #96dbe4;
                padding: 20px;
                z-index: 1000;
                padding-right: 50px !important;
                overflow-y: auto;
            }
            h5 {
                color: black;
                font-weight: 700 !important;
            }
            ul {
                padding-left: 16px;
                margin: 0 !important;
            }
            li {
                list-style-type: none;
                margin: 10px 0;
            }
            li a {
                color: #7469B6 !important;
                text-decoration: none !important;
                font-weight: 700 !important;
                font-size: 18px;
            }
            .title {
                margin-top: 0px !important;
            }
    </style>
    <title>SB Admin 2 - Dashboard</title>
</head>
<body>
    <div class="main-sidebar">
        <h3 style="color: black; font-weight: 700;" class="title mb-5"><a style="color:black; text-decoration: none;" href="index.php">Quản lý kho</a></h3>
        <div>
            <h5>Sản phẩm</h5>
            <ul>
                <li><a href="danhsachsanpham.php">Danh sách sản phẩm</a></li>
                <li><a href="themsanpham.php">Thêm sản phẩm</a></li>
            </ul>
        </div>
        <div>
            <h5>Đơn hàng nhập</h5>
            <ul>
                <li><a href="danhsachdonhangnhap.php">Danh sách đơn hàng nhập</a></li>
                <li><a href="themdonhangnhap.php">Thêm đơn hàng nhập</a></li>
            </ul>
        </div>
        <div>
            <h5>Đơn hàng xuất</h5>
            <ul>
                <li><a href="danhsachdonhangxuat.php">Danh sách đơn hàng xuất</a></li>
                <li><a href="themdonhangxuat.php">Thêm đơn hàng xuất</a></li>
            </ul>
        </div>
    </div>
</body>
</html>