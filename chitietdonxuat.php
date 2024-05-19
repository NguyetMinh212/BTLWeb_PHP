<?php 
    session_start();
    if(!isset($_SESSION['user_id']))
    {
        header('location:login.php');
    }
 ?>
 <!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Chi tiết đơn bán</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <?php 
        if(empty($_GET['id']))
        {
            header('location:danhsachdonhangxuat.php');
        }
        $id = $_GET['id'];
        require 'connect.php';

        $sql = "select * from nhanvien";
        $nhanvien = mysqli_query($connect,$sql);

        $sql = "select * from sanpham";
        $sanpham = mysqli_query($connect,$sql);

        $sql = "select * from donxuat where id = '$id'";
        $donxuat= mysqli_query($connect,$sql);
        $row = mysqli_fetch_array($donxuat);
        $sql = "select * from donxuatchitiet where id_donxuat = '$id'";
        $danhsach = mysqli_query($connect,$sql);

     ?>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include "sidebar.php" ?>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include "header.php" ?>

                </nav>
                <!-- End of Topbar -->

                <!-- Content chính -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Chi tiết đơn hàng bán</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        </div>
                        <?php 
                        if(isset($_GET['themthanhcong'])){?>
                            <span class = "mt-3 ml-5" style="color:green"><?php echo $_GET['themthanhcong'] ?></span>
                        <?php } ?>
                        <?php 
                        if(isset($_GET['suathanhcong'])){?>
                            <span class = "mt-3 ml-5" style="color:green"><?php echo $_GET['suathanhcong'] ?></span>
                        <?php } ?>
                        <?php 
                        if(isset($_GET['xoathanhcong'])){?>
                            <span class = "mt-3 ml-5" style="color:green"><?php echo $_GET['xoathanhcong'] ?></span>
                        <?php } ?>
                        <div class="card-body">
                            <div class="table-responsive">
                                <button style="background-color: #AD88C6; border: none;" type="button" class="btn btn-success mb-3">
                                    <a class = "text-white text-decoration-none" href="danhsachdonhangxuat.php">Danh sách đơn hàng bán</a>
                                </button>
                                <div class="d-flex align-items-center">
                                    <h3 style="width: 30%; margin-right: 100px; font-size: 16px;"  > 
                                        <b style="display: block; margin-bottom: 5px;">Nhân viên bán:</b> 
                                    <input class="form-control" disabled type="text" name="" value="<?php foreach ($nhanvien as $nv): ?>
<?php if ($nv['id'] == $row['id_nhanvien']): ?><?php echo $nv['ten']; break; ?><?php endif; ?><?php endforeach; ?>">   
                                    </h3>
                                
                                    <h3 style="width: 30%; font-size: 16px; margin-right: 100px;"> <b style="display: block; margin-bottom: 5px;">Ngày nhập:</b> 
                                    <input class="form-control" disabled type="date" name="" value="<?php echo $row['ngayxuat']; ?>">        
                                    </h3>
                                    <h3  style="width: 30%; font-size: 16px;"> <b style="display: block; margin-bottom: 5px;">Trạng thái:</b> 
                                    <input disabled class="form-control" type="text" name="" value="<?php echo $row['trangthai']; ?>">
                                </h3>
                                </div>
                                
                                <h3  style="color: #D20062; font-size: 20px;" class="mt-3 mb-3"> <b>Tổng tiền:</b> 
                                    <?php echo number_format(ceil($row['tongtien']), 0, '.', ',') . ' đ'; ?>
                                </h3>
                                                <th>
                                <table class="table table-bordered table-success" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID sản phẩm</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Giá bán</th>
                                            <th>Số lượng</th>
                                            <th>Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($danhsach as $each):?>
                                            <tr>
                                                <th><?php echo $each['id_sanpham'] ?></th>
                                                <th>
                                                    <?php foreach ($sanpham as $sp): ?>
                                                        <?php if ($sp['id'] == $each['id_sanpham']): ?>
                                                            <?php echo $sp['ten']; break; ?>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </th>
                                                <th>
                                                    <?php foreach ($sanpham as $sp): ?>
                                                        <?php if ($sp['id'] == $each['id_sanpham']): ?>
                                                            <?php echo number_format(ceil($sp['giaban']), 0, '.', ',') . ' đ'; ?>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </th>
                                                <th><?php echo $each['soluongxuat'] ?></th>
                                                <th>
                                                    <?php foreach ($sanpham as $sp): ?>
                                                        <?php if ($sp['id'] == $each['id_sanpham']): ?>
                                                            <?php echo number_format(ceil($sp['giaban']*$each['soluongxuat']), 0, '.', ',') . ' đ'; ?>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </th>
                                                
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include "footer.php" ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="xoadonhangnhap-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Xóa sản phẩm</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Bạn có muốn xóa sản phẩm này không?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                    <button id="confirm-xoa-sanpham" class="btn btn-primary">Xóa</button>
                </div>
            </div>
        </div>
    </div>

    <?php include "script.php" ?>
    <script src="js/jsquery.js"></script>

</body>

</html>