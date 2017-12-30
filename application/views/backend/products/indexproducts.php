<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/banner/logo.png" type="image/png">
    <title>OUR DAILY SUPPLY - ADMIN DASHBOARD</title>

    <!--CSS-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/9dcbecd42ad/integration/bootstrap/3/dataTables.bootstrap.css">


</head>

<body>

    <div id="wrapper">
        <div class="overlay"></div>

        <!-- Sidebar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">
                <li class="sidebar-brand">
                    <br>
                    <a href="#">
                        <img src="<?php echo base_url();?>assets/images/banner/logo.png" width="140px" alt="">
                    </a>
                    <br>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-home"></i> Home</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-folder"></i> Page one</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-file-o"></i> Second page</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-cog"></i> Third page</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-plus"></i> Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li class="dropdown-header">Dropdown heading</li>
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li><a href="#">Separated link</a></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-bank"></i> Page four</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-dropbox"></i> Page 5</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-twitter"></i> Last page</a>
                </li>
            </ul>
        </nav>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <button type="button" class="hamburger is-closed animated fadeInLeft" data-toggle="offcanvas">
                <span class="hamb-top"></span>
                <span class="hamb-middle"></span>
                <span class="hamb-bottom"></span>
            </button>
            <div class="container">
                <div class="row">
                    <h1>Our Daily Supply | All Products</h1>

                    <br>
                    <?= anchor('admin/productscontroller/create','<i class="fa fa-plus" aria-hidden="true"></i> Add New Product', ['class' => 'btn btn-primary btn-lg']) ?>
                    <br><br>

                    <table class="table table-hover table-bordered" id="myTable">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center">#</th>
                            <th scope="col" class="text-center">Product Name</th>
                            <th scope="col" class="text-center">Product Image</th>
                            <th scope="col" class="text-center">Price</th>
                            <th scope="col" class="text-center">Stock</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach ($products as $product) : ?>
                            <tr>
                                <th class="text-center"><?= $product->product_id ?></th>
                                <td class="text-center"><?= $product->product_name ?></td>
                                <td class="text-center"><?php
                                                            $product_image = [ 'src' => 'assets/images/upload/products/'. $product->image,
                                                                                'width' => '30%'];
                                                            echo img($product_image);
                                                        ?>
                                </td>
                                <td class="text-center"><?= $product->price ?></td>
                                <td class="text-center"><?= $product->stock ?></td>
                                <td class="text-center">
                                    <?= anchor('admin/productscontroller/update/'. $product->product_id ,'<i class="fa fa-pencil" aria-hidden="true"></i> Edit', ['class' => 'btn btn-info btn-sm']) ?>
                                    <?= anchor('admin/productscontroller/delete/'. $product->product_id ,
                                                                                   '<i class="fa fa-trash-o" aria-hidden="true"></i> Delete',
                                                                                    ['class' => 'btn btn-danger btn-sm',
                                                                                    'onclick' => 'return confirm(\' Are You Sure Want Delete This Data ? \')']) ?>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!--Javascript-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap/bootstrap.js"></script>
    <script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="//cdn.datatables.net/plug-ins/9dcbecd42ad/integration/bootstrap/3/dataTables.bootstrap.js"></script>

    <script>
        $(document).ready(function () {
            var trigger = $('.hamburger'),
                overlay = $('.overlay'),
                isClosed = false;

            trigger.click(function () {
                hamburger_cross();
            });

            function hamburger_cross() {

                if (isClosed == true) {
                    overlay.hide();
                    trigger.removeClass('is-open');
                    trigger.addClass('is-closed');
                    isClosed = false;
                } else {
                    overlay.show();
                    trigger.removeClass('is-closed');
                    trigger.addClass('is-open');
                    isClosed = true;
                }
            }

            $('[data-toggle="offcanvas"]').click(function () {
                $('#wrapper').toggleClass('toggled');
            });
        });
    </script>

    <script type="text/javascript" charset="utf-8">
        $(document).ready(function(){
            $('#myTable').DataTable();
        });
    </script>


</body>

</html>