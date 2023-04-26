<html>
<head>
    <meta charset="utf-8">
   
    <meta name="description" content="Solutec" />

    <title>Solutec</title>
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('images/logo1.png'); ?>">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
   
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/app.css'); ?>">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/node_modules/sweetalert2/dist/sweetalert2.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/node_modules/bootstrap-select/bootstrap-select.min.css'); ?>">
   
        <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.min.css'); ?>">

    <?= $this->renderSection('css') ?>
      
</head>
<body class="skin-default fixed-layout">
    <div id="app">
        <div class="preloader">
            <div class="loader">
                <div class="loader__figure"></div>
                <p class="loader__label">Test Consulting </p>
            </div>
        </div>

        <div id="main-wrapper">
            <?= $this->include('partials/topbar') ?>
            <?= $this->include('partials/sidebar') ?>
        
            <div class="page-wrapper">
                <div class="container-fluid">
                    <?= $this->renderSection('content') ?>
                </div>
            </div>
            
        </div>
    </div>

    <script type="text/javascript" src="<?php echo base_url('js/app.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('js/jquery.validate.js'); ?>"></script>

    <script type="text/javascript" src="<?php echo base_url('dist/js/perfect-scrollbar.jquery.min.js'); ?>"></script>

    <script type="text/javascript" src="<?php echo base_url('dist/js/waves.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('dist/js/sidebarmenu.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('dist/js/custom.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/node_modules/sweetalert2/dist/sweetalert2.all.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('js/sweet-alert.init.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/node_modules/bootstrap-select/bootstrap-select.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/inputmask/dist/inputmask/inputmask.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/inputmask/dist/inputmask/jquery.inputmask.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/inputmask/dist/inputmask/inputmask.date.extensions.js'); ?>"></script>
    <?= $this->renderSection('javascript') ?>

</body>
</html>