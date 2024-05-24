<?php 
    session_start();
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Trang tổng quan</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <?php 
        require 'connect.php';
        // Tổng tiền nhập
        $sql = "SELECT SUM(tongtien) AS TongTienThangNay FROM donnhap WHERE MONTH(ngaynhap) = MONTH(CURRENT_DATE()) AND YEAR(ngaynhap) = YEAR(CURRENT_DATE());";
        $result = mysqli_query($connect,$sql);
        $row = mysqli_fetch_assoc($result);
        $tongtiennhap = $row['TongTienThangNay'];

        // Tổng tiền bán
        $sql = "SELECT SUM(tongtien) AS TongTienThangNay FROM donxuat WHERE MONTH(ngayxuat) = MONTH(CURRENT_DATE()) AND YEAR(ngayxuat) = YEAR(CURRENT_DATE());";
        $result = mysqli_query($connect,$sql);
        $row = mysqli_fetch_assoc($result);
        $tongtienxuat = $row['TongTienThangNay'];

        // Số đơn nhập
        $sql = "SELECT COUNT(*) AS SoDonNhapThangNay FROM donnhap WHERE MONTH(ngaynhap) = MONTH(CURRENT_DATE())
            AND YEAR(ngaynhap) = YEAR(CURRENT_DATE());";
        $result = mysqli_query($connect,$sql);
        $row = mysqli_fetch_assoc($result);
        $sodonnhap = $row['SoDonNhapThangNay'];

        // Số đơn bán
        $sql = "SELECT COUNT(*) AS SoDonBanThangNay FROM donxuat WHERE MONTH(ngayxuat) = MONTH(CURRENT_DATE())
            AND YEAR(ngayxuat) = YEAR(CURRENT_DATE());";
        $result = mysqli_query($connect,$sql);
        $row = mysqli_fetch_assoc($result);
        $sodonban = $row['SoDonBanThangNay'];

        // Doanh thu các sản phẩm của mỗi loại sản phẩm
        $sql = "SELECT 
                sp.ten AS TenSanPham,
                COALESCE(SUM(dxc.soluongxuat * sp.giaban), 0) AS DoanhThu
                FROM sanpham sp
                LEFT JOIN donxuatchitiet dxc ON sp.id = dxc.id_sanpham
                JOIN donxuat dx ON dx.id = dxc.id_donxuat
                JOIN loaisanpham lsp ON sp.id_loaisanpham = lsp.id
                WHERE lsp.ten = 'Gạo' AND MONTH(dx.ngayxuat) = MONTH(CURRENT_DATE())
                AND YEAR(dx.ngayxuat) = YEAR(CURRENT_DATE())
                GROUP BY sp.id, sp.ten
                ORDER BY DoanhThu DESC;";
        $doanhthutheosp = mysqli_query($connect,$sql);

        // Select tất cả loại sản phẩm
        $sql = "SELECT * from loaisanpham";
        $loaisanpham = mysqli_query($connect,$sql);

        // Tim 5 san pham ban chay nhat ve so luong
        $sql = "SELECT 
                    sp.ten AS TenSanPham,
                    SUM(dxc.soluongxuat) AS SoLuong
                FROM sanpham sp
                JOIN donxuatchitiet dxc ON sp.id = dxc.id_sanpham
                JOIN donxuat dx ON dx.id = dxc.id_donxuat
                WHERE MONTH(dx.ngayxuat) = MONTH(CURRENT_DATE())
                AND YEAR(dx.ngayxuat) = YEAR(CURRENT_DATE())
                GROUP BY sp.id, sp.ten
                ORDER BY SoLuong DESC
                LIMIT 5;";
        $top5sanpham = mysqli_query($connect,$sql);
     ?>
    <div id="wrapper">
        <!-- Sidebar -->
        <?php include "sidebar.php" ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include "header.php" ?>
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Trang tổng quan</h1>
                    </div>
                    <div class="row">
                        <!-- Tiền nhập hàng -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Tiền nhập hàng (Tháng này)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_format($tongtiennhap, 0, '.', ','); ?> đ</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tiền bán hàng -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Tiền bán hàng (Tháng này)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_format($tongtienxuat, 0, '.', ','); ?> đ</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Số đơn nhập -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-infor text-uppercase mb-1">
                                                Số đơn nhập</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $sodonnhap ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Số đơn bán -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Số đơn bán</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $sodonban ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Thống kê doanh thu các sản phẩm theo từng loại sản phẩm theo tháng -->
                    <h3 class="mt-5 mb-3" style="font-weight: 700;color: #D2649A; ">Thống kê doanh thu các sản phẩm theo từng loại sản phẩm theo tháng</h3>
                    <form class="d-flex align-items-center mb-3" method="GET">
                        <select style="width: 50%;" name="loaisanpham" class="input-group form-control form-select form-select-lg mr-3">
                        <?php foreach ($loaisanpham as $each):?>
                                    <option value="<?php echo htmlspecialchars($each['ten']); ?>"
                                    <?php 
                                    if (isset($_GET['loaisanpham']) && $_GET['loaisanpham'] === $each['ten']) {
                                        echo 'selected';
                                    }
                                    ?>>
                                    <?php echo htmlspecialchars($each['ten']); ?>
                                    </option>
                        <?php endforeach ?>
                        </select>
                    <button type="submit" class="btn btn-primary">Xem Doanh Thu</button>
                    </form>

                    <?php 
                        if (isset($_GET['loaisanpham'])) {
                        $loaiSanPham = $_GET['loaisanpham'];
                        // Câu truy vấn SQL, sử dụng biến $loaiSanPham trong điều kiện WHERE
                        $sql = "SELECT 
                                    sp.ten AS TenSanPham,
                                    COALESCE(SUM(dxc.soluongxuat * sp.giaban), 0) AS DoanhThu
                                FROM sanpham sp
                                LEFT JOIN donxuatchitiet dxc ON sp.id = dxc.id_sanpham
                                JOIN donxuat dx ON dx.id = dxc.id_donxuat
                                JOIN loaisanpham lsp ON sp.id_loaisanpham = lsp.id
                                WHERE lsp.ten = ? AND MONTH(dx.ngayxuat) = MONTH(CURRENT_DATE())
                                AND YEAR(dx.ngayxuat) = YEAR(CURRENT_DATE())
                                GROUP BY sp.id, sp.ten
                                ORDER BY DoanhThu DESC;";
                        // Chuẩn bị và thực thi truy vấn
                        $stmt = mysqli_prepare($connect, $sql);
                        mysqli_stmt_bind_param($stmt, "s", $loaiSanPham);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        $doanhthutheosp = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        }
                     ?>
                    <table class="table table-bordered table-info" id="dataTable" width="80%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Doanh thu bán ra</th>
                                        </tr>
                                    </thead>
                                    <?php $stt = 1;
                                    foreach ($doanhthutheosp as $each):?>
                                            <tr>
                                                <th><?php echo $stt ?></th>
                                                <th><?php echo $each['TenSanPham'] ?></th>
                                                <th><?php echo number_format($each['DoanhThu'], 0, '.', ',')  ?> đ</th>
                                            </tr>
                                        <?php $stt++; endforeach ?>
                                    </tbody>
                                </table>
                    <!-- Top 5 sản phẩm bán chạy nhất -->
                    <h3 class="mt-5 mb-3" style="font-weight: 700;color: #41B06E; ">Top 5 sản phẩm bán chạy nhất tháng theo số lượng</h3>
                    <table class="table table-bordered table-warning" id="dataTable" width="80%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Số lượng bán ra</th>
                                        </tr>
                                    </thead>
                                    <?php $stt = 1;
                                    foreach ($top5sanpham as $each):?>
                                            <tr>
                                                <th><?php echo $stt ?></th>
                                                <th><?php echo $each['TenSanPham'] ?></th>
                                                <th><?php echo number_format($each['SoLuong'], 0, '.', ',')  ?></th>
                                            </tr>
                                        <?php $stt++; endforeach ?>
                                    </tbody>
                                </table>

                </div>
            </div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2024</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <?php include "script.php" ?>

</body>

</html>