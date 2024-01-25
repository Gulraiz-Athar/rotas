<!doctype html>
<?php
$logo = asset(Storage::url('uploads/logo/logo-dark.png'));
$company_favicon = Utility::getValByName('company_favicon');
$SITE_RTL = env('SITE_RTL');

$logo = asset(Storage::url('uploads/logo/logo-dark.png'));
$company_favicon = Utility::getValByName('company_favicon');


$setting = App\Models\Utility::colorset();
$color = 'theme-3';
if (!empty($setting['color'])) {
$color = $setting['color'];
}
$darklayout = Utility::getValByName('cust_darklayout');
?>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" dir="<?php echo e($SITE_RTL == 'on' ? 'rtl' : ''); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>
        <?php echo e(Utility::getValByName('title_text')? Utility::getValByName('title_text'): config('app.name', 'RotaGo SaaS')); ?>

        - <?php echo $__env->yieldContent('page-title'); ?>
    </title>
    <link rel="icon"
        href="<?php echo e($logo . '/' . (isset($company_favicon) && !empty($company_favicon) ? $company_favicon : 'favicon.png')); ?>"
        type="image" sizes="16x16">
    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>" id="main-style-link">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/customizer.css')); ?>">

    <?php if($SITE_RTL == 'on'): ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style-rtl.css')); ?>">
    <?php endif; ?>

    <?php if($darklayout == 'on'): ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style-dark.css')); ?>">
    <?php else: ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
    <?php endif; ?>

    <style>
    [dir="rtl"] .dash-sidebar {
        left: auto !important;

    }

    [dir="rtl"] .dash-header {
        left: 0;
        right: 280px;

    }

    [dir="rtl"] .dash-header:not(.transprent-bg) .header-wrapper {
        padding: 0 0 0 30px;

    }

    [dir="rtl"] .dash-header:not(.transprent-bg):not(.dash-mob-header)~.dash-container {
        margin-left: 0px;

    }

    [dir="rtl"] .me-auto.dash-mob-drp {
        margin-right: 10px !important;

    }

    [dir="rtl"] .me-auto {
        margin-left: 10px !important;

    }

    .new_one{
        background: transparent !important;
        box-shadow: none !important;
        b
    }
    

.auth-wrapper .auth-content {
    width: 400px !important;
}


@media only screen and (max-width: 600px)  {
    body.theme-2{
        padding-top: 100px;
    }
}





.collapse:not(.show) {
    display: flex !important;
}

.auth-wrapper .auth-content{
    min-height: auto;
}

.auth-wrapper
{
   min-height: auto;
    
}

.auth-wrapper .auth-content{
    padding: 0px !important;
}

    </style>

</head>

<body class="<?php echo e($color); ?>">
    <!-- [ auth-signup ] start -->
    <div class="auth-wrapper auth-v3">

        <!-- <div class="bg-auth-side bg-primary "></div> -->
        <div class="auth-content">
            <nav class="navbar navbar-expand-md new_one">
                

                        <div class="collapse navbar-collapse justify-content-center " id="navbarTogglerDemo01">
                            <ul class="navbar-nav align-items-center  mb-4 ">
                            	<!-- DIT to hide the Language selection menu
                                <li class="nav-item">
                                    <?php echo $__env->yieldContent('lang-selectbox'); ?>
                                </li>
                                -->
                            </ul>
                        
                
            </nav>
            <?php echo $__env->yieldContent('content'); ?>
           
        </div>
    </div>
     <div class="auth-footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="text-center"><?php echo e(__('Copyright')); ?> <?php echo e((App\Models\Utility::getValByName('footer_text')) ? App\Models\Utility::getValByName('footer_text') :config('app.name', 'WorkGo')); ?> <?php echo e(date('Y')); ?> </p>
                        </div>
                    </div>
                </div>
            </div>
    <!-- [ auth-signup ] end -->

    <!-- Scripts -->
    <script src="<?php echo e(asset('assets/js/vendor-all.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/bootstrap.min.js')); ?>"></script>
     <script src="<?php echo e(asset('assets/js/plugins/feather.min.js')); ?>"></script>
    
    <script>
    feather.replace();
    </script>


    <?php echo $__env->yieldPushContent('custom-scripts'); ?>

    <?php echo $__env->yieldPushContent('pagescript'); ?>

    <?php if(\Session::has('success')): ?>
    <script>
    show_toastr('<?php echo e(__('
        Success ')); ?>', '<?php echo session('
        success '); ?>', 'success');
    </script>
    <?php echo e(Session::forget('success')); ?>

    <?php endif; ?>

    <?php if(Session::has('error')): ?>
    <script>
    show_toastr('<?php echo e(__('
        Error ')); ?>', '<?php echo session('
        error '); ?>', 'error');
    </script>
    <?php echo e(Session::forget('error')); ?>

    <?php endif; ?>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\sandbox\resources\views/layouts/auths1.blade.php ENDPATH**/ ?>