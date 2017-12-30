<?php

    $id             = $product->product_id;
    if ($this->input->post('is_submitted'))
    {
        $product_name   = set_value('product_name');
        $description    = set_value('description');
        $price          = set_value('price');
        $stock          = set_value('stock');
    }
    else
    {
        $product_name   = $product->product_name;
        $description    = $product->description;
        $price          = $product->price;
        $stock          = $product->stock;
    }

?>

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
    <style>
        .btn-file {
            position: relative;
            overflow: hidden;
        }
        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            background: white;
            cursor: inherit;
            display: block;
        }

        #img-upload{
            width: 30%;
        }
    </style>

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
            <div class="row col-sm-offset-2">
                <h1>Our Daily Supply | Edit Product</h1>
                <p class="text-danger"><?= validation_errors() ?></p>
                <br>

                <?= form_open_multipart('admin/ProductsController/update/'. $id, ['class' => 'form-horizontal']) ?>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Product Name</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" placeholder="Product Name" name="product_name" value="<?= $product_name ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-4">
                        <textarea type="text" class="form-control" placeholder="Description" name="description" value=""><?= $description ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Price</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" placeholder="Rp." name="price"" value="<?= $price ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Available Stock</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" placeholder="Quantity" name="stock"" value="<?= $stock ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Upload Image</label>
                    <div class="input-group col-sm-6">
                            <span class="input-group-btn">
                                <span class="btn btn-default btn-file">
                                    Browse… <input type="file" name="userfile" id="imgInp">
                                </span>
                            </span>
                        <input type="text" class="form-control" readonly>
                    </div>
                    <div class="col-sm-offset-2">
                        <img id='img-upload'/>
                    </div>
                </div>

                <hr>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>

                <?= form_close() ?>


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

<script>
    // Button For File Browser
    $(document).ready( function() {
        $(document).on('change', '.btn-file :file', function() {
            var input = $(this),
                label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            input.trigger('fileselect', [label]);
        });

        $('.btn-file :file').on('fileselect', function(event, label) {

            var input = $(this).parents('.input-group').find(':text'),
                log = label;

            if( input.length ) {
                input.val(log);
            } else {
                if( log ) alert(log);
            }

        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#img-upload').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function(){
            readURL(this);
        });
    });
</script>


</body>

</html>