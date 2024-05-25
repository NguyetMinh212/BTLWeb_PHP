<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        /* Google Fonts Import Link */

        ::-webkit-scrollbar-track {
            background-color: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background-color: #d6dee1;
            border-radius: 20px;
            border: 6px solid transparent;
            background-clip: content-box;
        }


        ::-webkit-scrollbar-thumb:hover {
            background-color: #a8bbbf;
        }


        input:-webkit-autofill,
        input:-webkit-autofill:focus {
            transition: background-color 600000s 0s, color 600000s 0s;
        }

        input[data-autocompleted] {
            background-color: transparent !important;
        }

        body {
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Oxygen',
                'Ubuntu', 'Cantarell', 'Fira Sans', 'Droid Sans', 'Helvetica Neue',
                sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;

        }


        /* CSS */
        .main-sidebar {
            margin: 15px;
            /* Light gray */
            padding: 20px;
            z-index: 1000;
            padding-right: 50px !important;
            overflow-y: auto;
            border-radius: 15px;
            /* Rounded corners */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        }

        .main-sidebar h3 {
            color: #343a40;
            /* Dark gray */
            font-weight: 700 !important;
            padding: 0 0 10px 0;
            margin: 0;
            font-size: 24px;
            border-bottom: 1px solid #dee2e6;
            /* Light gray */
            margin-bottom: 10px;
            letter-spacing: 1px;
            border-radius: 5px;
        }

        h5 {
            color: #343a40;
            /* Dark gray */
            font-weight: 1000;
            padding: 10px;
            font-size: 18px;
            border-bottom: 2px solid #dee2e6;
            /* Light gray */
            text-transform: uppercase;
            letter-spacing: 1px;
            border-radius: 15px;
            display: block;

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
            color: #6c757d !important;
            /* Medium gray */
            text-decoration: none !important;
            font-weight: 700 !important;
            font-size: 14px;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            padding: 15px;


        }

        li a:hover {
            color: #343a40 !important;
            /* Dark gray */
            scale: 1.05;

        }

        .title {
            margin-top: 0px !important;
        }

        li a i {
            margin-right: 10px;
            font-size: 20px;
        }
    </style>
    <title>SB Admin 2 - Dashboard</title>
</head>

<body>
    <div class="main-sidebar">
        <h3 style="color: black; font-weight: 700;" class="title mb-5"><a style="color:black; text-decoration: none;"
                href="index.php">Quản lý kho</a></h3>
        <div>
            <h5>Sản phẩm</h5>
            <ul>
                <li>
                    <i class="bi bi-box-seam"></i>
                    <a href="danhsachsanpham.php">Danh sách sản phẩm</a>
                </li>
                <li>
                    <i class="bi bi-plus-circle"></i>
                    <a href="themsanpham.php">Thêm sản phẩm</a>
                </li>
            </ul>
        </div>
        <div>
            <h5>Đơn hàng nhập</h5>
            <ul>
                <li>
                    <i class="bi bi-box-seam"></i>
                    <a href="danhsachdonhangnhap.php">Danh sách đơn hàng nhập</a>
                </li>
                <li>
                    <i class="bi bi-plus-circle"></i>
                    <a href="themdonhangnhap.php">Thêm đơn hàng nhập</a>
                </li>
            </ul>
        </div>
        <div>
            <h5>Đơn hàng xuất</h5>
            <ul>
                <li>
                    <i class="bi bi-box-seam"></i>
                    <a href="danhsachdonhangxuat.php">Danh sách đơn hàng xuất</a>
                </li>
                <li>
                    <i class="bi bi-plus-circle"></i>
                    <a href="themdonhangxuat.php">Thêm đơn hàng xuất</a>
                </li>
            </ul>
        </div>
    </div>
</body>

</html>