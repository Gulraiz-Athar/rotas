<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Dashboard')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <style>
        .fc-event,
        .fc-event:not([href]) {
            border: none;
        }

    </style>
    <div class="dash-container">
        <div class="dash-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center mobile-screen justify-content-between">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                            <div class="page-header-title">
                                <h4 class="m-b-10"><?php echo e(__('Dashboard')); ?></h4>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo e(url('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
                                <li class="breadcrumb-item"><?php echo e(__('Dashboard')); ?></li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6 d-flex align-items-center  justify-content-end">
                            <?php if(Auth::user()->type != 'employee'): ?>
                                <div class="btn card-option w-10">
                                    <button type="button" class="btn btn-sm btn-primary btn-icon m-1"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ti ti-filter" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="<?php echo e(__('Filter Role')); ?>"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" style="">
                                        <?php if(!empty($roles)): ?>
                                            <a class="dropdown-item" data-roll="no_role" onclick="filter_role('no_role')">
                                                <i class="ti ti-circle" style="color: #8492a6;"></i>
                                                <?php echo e(__('Without Role')); ?>

                                            </a>
                                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <a class="dropdown-item" data-roll="<?php echo e($role['id']); ?>"
                                                    onclick="filter_role(<?php echo e($role['id']); ?>)">
                                                    <?php echo $role['name']; ?>

                                                </a>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="btn card-option w-10">
                                    <button type="button" class="btn btn-sm btn-primary btn-icon m-1"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ti ti-flag" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="<?php echo e(__('Filter Role')); ?>"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end calender_locatin_list">
                                        <a class="dropdown-item calender_location_active" data-location='0'
                                            onclick="filter_location(0)"><?php echo e(__('Select All')); ?></a>
                                        <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <a class="dropdown-item" data-location='<?php echo e($location['id']); ?>'
                                                onclick="filter_location(<?php echo e($location['id']); ?>)"><?php echo e($location['name']); ?></a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="btn card-option">
                                <button type="button" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="ti ti-dots-vertical" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="<?php echo e(__('View')); ?>"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="<?php echo e(url('year')); ?>"
                                        class="dropdown-item <?php echo e(Request::segment(1) == 'year' ? 'calender_active' : ''); ?>"
                                        onclick="window.location.href=this;"><?php echo e(__('Yearly View')); ?></a>
                                    <a href="<?php echo e(url('dashboard')); ?>"
                                        class="dropdown-item <?php echo e(Request::segment(1) == 'dashboard' ? 'calender_active' : ''); ?>"
                                        onclick="window.location.href=this;"><?php echo e(__('Monthly View')); ?></a>
                                    <a href="<?php echo e(url('day')); ?>"
                                        class="dropdown-item <?php echo e(Request::segment(1) == 'day' ? 'calender_active' : ''); ?>"
                                        onclick="window.location.href=this;"><?php echo e(__('Daily View')); ?></a>
                                    <a href="<?php echo e(url('user-view')); ?>"
                                        class="dropdown-item <?php echo e(Request::segment(1) == 'user' ? 'calender_active' : ''); ?>"
                                        onclick="window.location.href=this;"><?php echo e(__('User View')); ?></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h5><?php echo e(__('Calendar')); ?></h5>
                        </div>
                        <div class="card-body callne">
                            <div id='calendar' class='calendar' data-toggle="calendar"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h5><?php echo e(__('Current Month events')); ?></h5>
                        </div>
                        <div class="card-body table-scroll" style="height: 837px; overflow:auto;">
                            <ul class="event-cards list-group list-group-flush w-100">
                                <?php $__empty_1 = true; $__currentLoopData = $current_month_rotas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                
                                <li class="list-group-item card mb-3" data_role_id="<?php echo e(!empty($item->role_id) ? $item->role_id : 'no_role'); ?>">
                                    <div class="row align-items-center justify-content-between">
                                        <div class="col-auto mb-3 mb-sm-0">
                                            <div class="d-flex align-items-center">
                                                <div class="theme-avtar bg-warning" style="background-color: <?php echo e((!empty($item->getrotarole->color)) ? $item->getrotarole->color : '#8492a6'); ?> !important">
                                                    <i class="ti ti-building-bank"></i>
                                                </div>
                                                <div class="ms-3">
                                                    <h6 class="m-0">
                                                        
                                                        <?php echo e($item->getrotauser->first_name); ?>

                                                        <small class="text-muted text-xs">
                                                            <?php echo e($item->getrotalocation->name); ?>

                                                        </small>
                                                    </h6>
                                                    <small class="text-muted">
                                                        <?php echo e(date("Y M d", strtotime($item->rotas_date))); ?>

                                                        <?php echo e(date("h:i A", strtotime($item->start_time))); ?>                                                        
                                                         <?php echo e(__('To')); ?> 
                                                        <?php echo e(date("h:i A", strtotime($item->end_time))); ?>

                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>                                    
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <li class="list-group-item card mb-3">
                                    <div class="row align-items-center justify-content-between">
                                        <div class="col-auto mb-3 mb-sm-0">
                                            <div class="d-flex align-items-center">
                                                <?php echo e(__('No Rotas Found.')); ?>

                                            </div>
                                        </div>
                                    </div>
                                </li>      
                                <?php endif; ?>
                            </ul>
                    </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('pagescript'); ?>
    <script src="<?php echo e(asset('assets\js\plugins\main.min.js')); ?>"></script>
    <script>

        var feed_calender = <?php echo $feed_calender; ?>;

        function filter_role(role_id = 0) {

            $('#calendar').find('.badge1').show();
            if (role_id != 0) {
                $('#calendar').find('.badge1').hide();
                $('#calendar').find('.badge1[data_role_id="' + role_id + '"]').show();
                $('.next-event').find('.list-group-item').hide();
                $('.next-event').find('.list-group-item[data_role_id="' + role_id + '"]').show();
            }
            $('.calender_role_list a').removeClass('calender_role_active');
            $('.calender_role_list a[data-roll="' + role_id + '"]').addClass('calender_role_active');
        }

        function filter_location(location_id = 0) {
            var data = {
                location_id: location_id,
            }

            $.ajax({
                url: '<?php echo e(route('dashboard.location_filter')); ?>',
                method: 'post',
                data: data,
                success: function(data) {
                    var feed_calender = data;


                    $('.calender_locatin_list a').removeClass('calender_location_active');
                    $('.calender_locatin_list a[data-location="' + location_id + '"]').addClass(
                        'calender_location_active');

                    $('#calendar').remove();
                    $('.callne').html("<div id='calendar' class='calendar' data-toggle='calendar'></div>");

                    calenderrr(feed_calender);
                }
            });
        }

        $(document).ready(function() {
            $(this).find('.fc-daygrid-block-event').removeClass("fc-daygrid-event");
            calenderrr(feed_calender)

            // $(this).find('.fc-daygrid-block-event').removeClass("fc-daygrid-event");
        });

        function calenderrr(feed_calender) {
            var etitle;
            var etype;
            var etypeclass;

            var calendar = new FullCalendar.Calendar(document.getElementById('calendar'), {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                buttonText: {
                    timeGridDay: "<?php echo e(__('Day')); ?>",
                    timeGridWeek: "<?php echo e(__('Week')); ?>",
                    dayGridMonth: "<?php echo e(__('Month')); ?>"
                },
                themeSystem: 'bootstrap',
                slotDuration: '00:10:00',

                navLinks: false,
                droppable: false,
                selectable: false,
                selectMirror: true,
                editable: false,
                dayMaxEvents: true,
                handleWindowResize: true,
                disableDragging: true,
                eventStartEditable: false,
                events: feed_calender,
                eventContent: function(event, element, view) {
                    var customHtml = event.event._def.extendedProps.html;
                    return {
                        html: customHtml
                    }
                }


            });
            calendar.render();
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sandbox\resources\views/home.blade.php ENDPATH**/ ?>