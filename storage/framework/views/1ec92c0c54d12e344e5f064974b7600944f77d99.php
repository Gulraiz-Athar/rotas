<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Leave')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="dash-container">
    <div class="dash-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="page-header-title">
                            <h4 class="m-b-10"><?php echo e(__('Leave')); ?></h4>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
                            <li class="breadcrumb-item"><?php echo e(__('Leave')); ?></li>
                        </ul>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end text-right"></div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->        
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header card-body">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-md-8">
                                <div class="d-inline-block text-white">
                                    <i class="fa fa-caret-left weak-prev-left weak-prev1 weak_go1 bg-primary"></i>
                                    <span class="weak_go_html1 text-primary mx-3"><?php echo e($week_date[0].' - '.$week_date[6]); ?></span>
                                    <i class="fa fa-caret-right weak-prev-left weak-left1 weak_go1 bg-primary"></i>
                                    <input type="hidden" data-start="<?php echo e($week_date['week_start']); ?>" data-end="<?php echo e($week_date['week_end']); ?>"  class="week_last_daye1">
                                    <input type="hidden" value="<?php echo e($temp_week); ?>" data-created-by="<?php echo e($created_by); ?>" class="week_add_sub1">
                                </div>
                            </div>                            
                            <div class="col-md-4 d-flex align-items-center justify-content-between justify-content-md-end">
                                <div class="rotas_filter_main_div">                                    
                                  
                                    <?php if(Auth::user()->acount_type == 1 || $showLeavesStatus == 1): ?>
                                    <?php if($leave_status_requests > 0): ?>
                                        <div class="btn-group card-option">
                                            <button type="button" class="btn btn-sm btn-primary m-1">
                                                <a href="<?php echo e(url('leave-request')); ?>" class="text-white"> <?php echo e($leave_status_requests.' '.__('Leave requests available')); ?> </a>
                                            </button>
                                        </div>                                            
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    
                                    <div class="btn btn-sm btn-primary btn-icon m-1">
                                        <a href="<?php echo e(route('leave.export')); ?>" >
                                            <i class="ti ti-database-export text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Export Leave CSV file')); ?>"  ></i>
                                        </a>
                                    </div>

                                    
                                    <?php if(Auth::user()->acount_type == 1 || Auth::user()->acount_type == 2 || Auth::user()->acount_type == 3): ?> <!-- DIT added employee (acount_type == 3) permision -->
                                    <div class="btn-group card-option">
                                        <button type="button" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ti ti-dots-vertical" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Menu" aria-label="Menu"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" style="">
                                            <a href="<?php echo e(url('holidays')); ?>" onclick="window.location.href=this;" class="dropdown-item" id="view_employee"><?php echo e(__('View All Leave')); ?></a>
                                            <?php if(Auth::user()->acount_type == 1 || $haspermission['embargoes'] == 1): ?>
                                            <a href="<?php echo e(url('embargoes')); ?>" onclick="window.location.href=this;" class="dropdown-item" id="removed_employee"><?php echo e(__('Embargoes')); ?></a>
                                            <?php endif; ?>

                                            <?php if(Auth::user()->acount_type == 1): ?>
                                            <a href="<?php echo e(url('rules')); ?>" onclick="window.location.href=this;" class="dropdown-item d-none" id="edit_group"><?php echo e(__('Request Rules')); ?></a>
                                            <?php endif; ?>

                                            <?php if(Auth::user()->acount_type == 1 || $haspermission['leave_request'] == 1): ?>
                                            <a href="<?php echo e(url('leave-request')); ?>" onclick="window.location.href=this;" class="dropdown-item" id="edit_group"><?php echo e(__('Leave Request')); ?></a>
                                            <?php endif; ?>
                                            <a href="<?php echo e(url('holidays/monthly')); ?>" onclick="window.location.href=this;"
                                                class="dropdown-item " id="edit_group"><?php echo e(__('Monthly Leaves View')); ?></a>
                                            <a href="<?php echo e(url('holidays/yearly')); ?>" onclick="window.location.href=this;"
                                                class="dropdown-item " id="edit_group"><?php echo e(__('Yearly Leaves View')); ?></a>
                                        </div>
                                    </div>
                                    <?php endif; ?>                             
                                    
                                    
                                    <div class="btn btn-sm btn-primary btn-icon m-1">
                                        <a href="#" 
                                            data-size="lg" data-ajax-popup="true" data-title="<?php echo e(__('Add Employee Leave')); ?>"
                                            data-url="<?php echo e(route('holidays.create')); ?>">
                                            <i class="ti ti-plus text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Add New Leave')); ?>"  ></i>
                                        </a>
                                    </div>       
                                </div>
                            </div>
                                                            
                        </div>
                    </div>
                </div>
            </div>            
        </div>

        <div class="row mt-4">
            <!-- Listing -->        
            <div class="card">
                <div class="card-wrapper project-timesheet overflow-auto">
                    <table class="table ajax-table">
                        <thead>
                        <tr class="text-center week_go_table1">
                            <th></th>
                            <th><?php echo e(__('Holiday Allowance')); ?></th>
                            <th><?php echo e(__('Holiday Used')); ?></th>
                            <th><?php echo e(__('Holiday Remaining')); ?></th>
                            <th><span>MON</span><br><span><?php echo e($week_date[0]); ?></span></th>
                            <th><span>TUE</span><br><span><?php echo e($week_date[1]); ?></span></th>
                            <th><span>WED</span><br><span><?php echo e($week_date[2]); ?></span></th>
                            <th><span>THU</span><br><span><?php echo e($week_date[3]); ?></span></th>
                            <th><span>FRI</span><br><span><?php echo e($week_date[4]); ?></span></th>
                            <th><span>SAT</span><br><span><?php echo e($week_date[5]); ?></span></th>
                            <th><span>SUN</span><br><span><?php echo e($week_date[6]); ?></span></th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($employees)  && count($employees) > 0): ?>
                                <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="text-center" data-id="<?php echo e($employee->id); ?>">
                                        <td><?php echo e($employee->first_name); ?> <?php echo e($employee->last_name); ?></td>
                                        <td><span class="create_time_sheet"><?php echo $employee->getAnnualHoliday($employee->id); ?></span></td>
                                        <td><span ><?php echo $employee->getUsedHoliday($employee->id); ?></span></td>
                                        <td><span ><?php echo $employee->getRemaingHoliday($employee->id); ?></span></td>
                                        <?php echo $employee->getHasLeave($employee->id,$temp_week); ?>

                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?> 
                            <tr>
                                <td colspan="11">
                                    <div class="text-center">
                                        <i class="fas fa-user-slash text-primary fs-40"></i>
                                        <h2><?php echo e(__('Opps...')); ?></h2>
                                        <h6> <?php echo __('No loaction found...!'); ?> </h6>
                                    </div>
                                </td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>        
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('pagescript'); ?>
<script>
    $(document).on('click','.edit_leavex', function () {
        // alert('dsad');
        $('#commonModal').modal('toggle');
        setTimeout(() => {
            $('.edit_leavex_popup').click();            
        }, 100);
    });

    $(document).ready(function() {
        $(document).on('click','.weak_go1', function () {
            ajaxLeaveTimesheetTableView();
        });

        $('body').on('click','.delete_leave_ppp', function () {            
            //$( ".delete_leave_form" ).submit();
            loadConfirm();            
        });

    });

    function ajaxLeaveTimesheetTableView() {
        var start_date = $('.week_last_daye1').attr('data-start');
        var end_date = $('.week_last_daye1').attr('data-end');
        var week = $('.week_add_sub1').val();
        var created_by = $('.week_add_sub1').attr('data-created-by');
        var data = {
            start_date: start_date,
            end_date: end_date,
            week: week,
            created_by: created_by,
        }

        $.ajax({
            url: '<?php echo e(route('holidays.leave_sheet')); ?>',
            method: 'post',
            data: data,
            success: function (data)
            {
                $('.ajax-table').html(data.table);
                $('.weak_go_html1').html(data.title);
            }
        });
    }
    
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sandbox\resources\views/leave/index.blade.php ENDPATH**/ ?>