
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Rotas')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="dash-container">
        <div class="dash-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <input type="hidden" name="loc_change" id="loc_change" value="0">
                        <div class="col-md-6">
                            <div class="page-header-title">
                                <h4 class="m-b-10"><?php echo e(__('Rotas')); ?></h4>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo e(url('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
                                <li class="breadcrumb-item"><?php echo e(__('Rotas')); ?></li>
                            </ul>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end text-right">

                        </div>
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
                                    <div class="row">
                                        <?php if(!empty($location_option)): ?>
                                            <div class="col-sm-6 col-md-4 mb-1 js-single-select-custom">
                                                <?php echo e(Form::select('loaction_id', $location_option, $first_location, ['class' => 'form-control multi-select rotas_location_change', 'id'=>'choices-multiple'])); ?>

                                                
                                            </div>
                                        <?php else: ?>
                                            <input type="hidden" name="rotas_location_change" value="0">
                                        <?php endif; ?>

                                        <?php if(!empty($role_option) && Auth::user()->type == 'company'): ?>
                                            <div class="col-sm-6 col-md-3 mb-1 js-single-select-custom">
                                                <?php echo e(Form::select('role_id', $role_option, null, ['class' => 'form-control multi-select rotas_role_change', 'id'=>'choices-multiple2'])); ?>

                                                
                                            </div>
                                        <?php else: ?>
                                            <input type="hidden" class="rotas_role_change" value="0">
                                        <?php endif; ?>
                                        <div class="col-sm-12 col-md-auto my-auto">
                                            <div class="d-inline-block text-white">
                                                <i class="fa fa-caret-left weak-prev-left weak-prev weak_go bg-primary"></i>
                                                &nbsp;<span class="weak_go_html weak_go_html text-primary"><b><?php echo e($week_date[0] . ' - ' . $week_date[20]); ?></b></span>&nbsp;
                                                <i class="fa fa-caret-right weak-prev-left weak-left weak_go bg-primary"></i>
                                                <input type="hidden" data-start="<?php echo e($week_date['week_start']); ?>"
                                                    data-end="<?php echo e($week_date['week_end']); ?>" class="week_last_daye">
                                                <input type="hidden" value="<?php echo e($temp_week); ?>"
                                                    data-created-by="<?php echo e($created_by); ?>" class="week_add_sub">
                                                <input type="hidden" value="<?php echo e(Auth::user()->mode); ?>"
                                                    class="mode">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    $manager_add_edit_delete_rotas = '';
                                    if(!is_null(Auth::user()->manager_permission)){
                                    $permission = Auth::user()->manager_permission;
                                    $per = json_decode($permission, true);
                                    $manager_add_edit_delete_rotas = $per['manager_add_edit_delete_rotas'];
                                    }
                                ?>
                                
                                <?php if(Auth::user()->type == 'company' || Auth::user()->acount_type == 1): ?>
                                    <div
                                        class="col-md-4 d-flex align-items-center justify-content-between justify-content-md-end">
                                        <div class="rotas_filter_main_div">
                                            <div class="btn-group card-option">
                                                <button type="button" class="dropdown-toggle btn btn-sm btn-primary btn-icon m-1 publish_shifs"
                                                      data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                                    <i class="feather icon-check" 
                                                        data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Publish Rotas')); ?>"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end" style="">
                                                    <a href="#" class="dropdown-item" id="publish_week" onclick='publish_week()'>
                                                        <span><?php echo e(__(' Publish Week ')); ?></span>
                                                    </a>
                                                    <a href="#" class="dropdown-item hide_rss" id="un_publish_week" onclick="un_publish_week()">
                                                        <span><?php echo e(__(' Un-publish Week ')); ?></span>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="btn-group card-option">
                                                <button type="button" class="dropdown-toggle btn btn-sm btn-primary btn-icon m-1 publish_shifs" 
                                                        onclick="alert('<?php echo e(__('Drag and drop shift to other location')); ?>')">
                                                    <i class="feather icon-copy" 
                                                        data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__(' Copy Shift ')); ?>"></i>
                                                </button>
                                            </div>

                                            <div class="btn-group card-option">
                                                <button type="button" class="btn btn-sm btn-primary btn-icon m-1 Copy_Week_Shift">
                                                    <i class="feather icon-move" 
                                                        data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__(' Copy rotas next week ')); ?>"></i>
                                                </button>
                                            </div>

                                            <div class="d-inline-block d-none">
                                                <button type="button" class="add_remove_employee p-0 border-0 d-none"
                                                    data-size="lg" data-ajax-popup="true"
                                                    data-title="<?php echo e(__('Add/Remove Employee')); ?>"
                                                    data-url="<?php echo e(route('rotas.add_remove_employee_popup', ['loaction' => $first_location, 'create_by' => $created_by])); ?>"><span
                                                        class="btn-inner--icon"><i class="fas fa-plus"></i></span>
                                                </button>
                                            </div>

                                            <div class="btn-group card-option rotas_filter">
                                                <button type="button" class="dropdown-toggle btn btn-sm btn-primary btn-icon m-1"
                                                      data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                                    <i class="feather icon-filter" 
                                                        data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Additional Settings')); ?>"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end" style="">
                                                    <a href="#"
                                                            class="dropdown-item <?php echo e($day_off == 'hide' ? 'hide_rss' : ''); ?>"
                                                            id="hidedayoff">
                                                            <span class="span_hide"
                                                                style="<?php echo e($day_off == 'show' ? 'display: none;' : ''); ?>"><?php echo e(__('Show')); ?></span>
                                                            <span class="span_show"
                                                                style="<?php echo e($day_off == 'hide' ? 'display: none;' : ''); ?>"><?php echo e(__('Hide')); ?></span>
                                                            <?php echo e(__(' Day Off')); ?>

                                                        </a>
                                                        <a href="#"
                                                            class="dropdown-item <?php echo e($leave_display == 'hide' ? 'hide_rss' : ''); ?>"
                                                            id="hideleave">
                                                            <span class="span_hide"
                                                                style="<?php echo e($leave_display == 'show' ? 'display: none;' : ''); ?>"><?php echo e(__('Show')); ?></span>
                                                            <span class="span_show"
                                                                style="<?php echo e($leave_display == 'hide' ? 'display: none;' : ''); ?>"><?php echo e(__('Hide')); ?></span>
                                                            <?php echo e(__(' Leave')); ?>

                                                        </a>
                                                        <a href="#"
                                                            class="dropdown-item <?php echo e($availability_display == 'hide' ? 'hide_rss' : ''); ?>"
                                                            id="hideavailability">
                                                            <span class="span_hide"
                                                                style="<?php echo e($availability_display == 'show' ? 'display: none;' : ''); ?>"><?php echo e(__('Show')); ?></span>
                                                            <span class="span_show"
                                                                style="<?php echo e($availability_display == 'hide' ? 'display: none;' : ''); ?>"><?php echo e(__('Hide')); ?></span>
                                                            <?php echo e(__(' Availability')); ?>

                                                        </a>
                                                        <a href="#" class="dropdown-item" id="clear_week">
                                                            <?php echo e(__('Clear Week')); ?> </a>
                                                        <a href="#" class="dropdown-item hide_rss"
                                                            id="add_remove_dayeoff">
                                                            <?php echo e(__(' Add / Remove Day Off')); ?>

                                                        </a>

                                                        <a href="#" class="dropdown-item hide_rss"
                                                            id="add_remove_amoff">
                                                            <?php echo e(__(' Add / Remove AM Off')); ?>

                                                        </a>

                                                        <a href="#" class="dropdown-item hide_rss"
                                                            id="add_remove_pmoff">
                                                            <?php echo e(__(' Add / Remove PM Off')); ?>

                                                        </a>

                                                        <a href="#" class="dropdown-item hide_rss"
                                                            id="add_remove_employee">
                                                            <?php echo e(__(' Add / Remove Employee')); ?>

                                                        </a>
                                                </div>
                                            </div>
                                            
                                            <div class="btn-group card-option">
                                                <button type="button" class="btn btn-sm btn-primary btn-icon m-1" id='send_email_rotas'>
                                                    <i class="feather icon-mail" 
                                                        data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Send rotas via email')); ?>"></i>
                                                </button>
                                            </div>
                                            
                                            <div class="btn-group card-option">
                                                <button type="button" class="print_rotas_cls d-none"
                                                    data-size="lg" data-ajax-popup="true"
                                                    data-title="<?php echo e(__('Print rotas')); ?>"
                                                    data-url="<?php echo e(route('rotas.print_rotas_popup', ['loaction' => $first_location, 'create_by' => $created_by])); ?>">                                                    
                                                </button>

                                                <button type="button" class="btn btn-sm btn-primary btn-icon m-1" id="print_rotas"
                                                    data-urls="<?php echo e(route('rotas.print_rotas_popup')); ?>">
                                                    <i class="feather icon-printer"  data-urls="<?php echo e(route('rotas.print_rotas_popup')); ?>"
                                                        data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Print rotas')); ?>"></i>
                                                </button>
                                            </div>

                                            <div class="btn-group card-option">
                                                <button type="button" data-url2="<?php echo e(route('rotas.share_popup')); ?>" class="btn btn-sm btn-primary btn-icon m-1 share_rotas_cls"
                                                        data-size="md" data-ajax-popup="false" data-title="<?php echo e(__('Share rotas')); ?>">
                                                    <i class="feather icon-share-2"  
                                                        data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Share rotas')); ?>"></i>
                                                </button>
                                            </div>
                                        </div>
                                        
                                        <div class="rotas_filter_main_div_responce">
                                            <div class="add_remove_dayeoff" style="display: none;">
                                                <span><?php echo e(__('Click a day to set employees day off')); ?></span> &nbsp;
                                                <button type="button"
                                                    class="dropdown-toggle btn btn-sm btn-primary btn-icon m-1 dayoff_close"
                                                    data-toggel="tooltip"
                                                    title="<?php echo e(__('Back to Rota Builder')); ?>"><span
                                                        class="btn-inner--icon"><i
                                                            class="fas fa-times"></i></span></button>
                                            </div>
                                        </div>

                                        <div class="rotas_filter_main_div_responce">
                                            <div class="add_remove_amoff" style="display: none;">
                                                <span><?php echo e(__('Click a day to set employees AM off')); ?></span> &nbsp;
                                                <button type="button"
                                                    class="dropdown-toggle btn btn-sm btn-primary btn-icon m-1 dayoff_close"
                                                    data-toggel="tooltip"
                                                    title="<?php echo e(__('Back to Rota Builder')); ?>"><span
                                                        class="btn-inner--icon"><i
                                                            class="fas fa-times"></i></span></button>
                                            </div>
                                        </div>

                                        <div class="rotas_filter_main_div_responce">
                                            <div class="add_remove_pmoff" style="display: none;">
                                                <span><?php echo e(__('Click a day to set employees PM off')); ?></span> &nbsp;
                                                <button type="button"
                                                    class="dropdown-toggle btn btn-sm btn-primary btn-icon m-1 dayoff_close"
                                                    data-toggel="tooltip"
                                                    title="<?php echo e(__('Back to Rota Builder')); ?>"><span
                                                        class="btn-inner--icon"><i
                                                            class="fas fa-times"></i></span></button>
                                            </div>
                                        </div>
                                    </div>
                                <?php elseif(Auth::user()->acount_type == 2 && !is_null(Auth::user()->manager_permission) && $manager_add_edit_delete_rotas == 1): ?>
                                    <div
                                        class="col-md-4 d-flex align-items-center justify-content-between justify-content-md-end">
                                        <div class="rotas_filter_main_div">
                                            <div class="btn-group card-option">
                                                <button type="button" class="dropdown-toggle btn btn-sm btn-primary btn-icon m-1 publish_shifs"
                                                      data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                                    <i class="feather icon-check"
                                                        data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Publish Rotas')); ?>"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end" style="">
                                                    <a href="#" class="dropdown-item" id="publish_week" onclick='publish_week()'>
                                                        <span><?php echo e(__(' Publish Week ')); ?></span>
                                                    </a>
                                                    <a href="#" class="dropdown-item hide_rss" id="un_publish_week" onclick="un_publish_week()">
                                                        <span><?php echo e(__(' Un-publish Week ')); ?></span>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="btn-group card-option">
                                                <button type="button" class="dropdown-toggle btn btn-sm btn-primary btn-icon m-1 publish_shifs"
                                                        onclick="alert('<?php echo e(__('Drag and drop shift to other location')); ?>')">
                                                    <i class="feather icon-copy"
                                                        data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__(' Copy Shift ')); ?>"></i>
                                                </button>
                                            </div>

                                            <div class="btn-group card-option">
                                                <button type="button" class="btn btn-sm btn-primary btn-icon m-1 Copy_Week_Shift">
                                                    <i class="feather icon-move"
                                                        data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__(' Copy rotas next week ')); ?>"></i>
                                                </button>
                                            </div>

                                            <div class="d-inline-block d-none">
                                                <button type="button" class="add_remove_employee p-0 border-0 d-none"
                                                    data-size="lg" data-ajax-popup="true"
                                                    data-title="<?php echo e(__('Add/Remove Employee')); ?>"
                                                    data-url="<?php echo e(route('rotas.add_remove_employee_popup', ['loaction' => $first_location, 'create_by' => $created_by])); ?>"><span
                                                        class="btn-inner--icon"><i class="fas fa-plus"></i></span>
                                                </button>
                                            </div>

                                            <div class="btn-group card-option rotas_filter">
                                                <button type="button" class="dropdown-toggle btn btn-sm btn-primary btn-icon m-1"
                                                      data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                                    <i class="feather icon-filter"
                                                        data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Additional Settings')); ?>"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end" style="">
                                                    <a href="#"
                                                            class="dropdown-item <?php echo e($day_off == 'hide' ? 'hide_rss' : ''); ?>"
                                                            id="hidedayoff">
                                                            <span class="span_hide"
                                                                style="<?php echo e($day_off == 'show' ? 'display: none;' : ''); ?>"><?php echo e(__('Show')); ?></span>
                                                            <span class="span_show"
                                                                style="<?php echo e($day_off == 'hide' ? 'display: none;' : ''); ?>"><?php echo e(__('Hide')); ?></span>
                                                            <?php echo e(__(' Day Off')); ?>

                                                        </a>
                                                        <a href="#"
                                                            class="dropdown-item <?php echo e($leave_display == 'hide' ? 'hide_rss' : ''); ?>"
                                                            id="hideleave">
                                                            <span class="span_hide"
                                                                style="<?php echo e($leave_display == 'show' ? 'display: none;' : ''); ?>"><?php echo e(__('Show')); ?></span>
                                                            <span class="span_show"
                                                                style="<?php echo e($leave_display == 'hide' ? 'display: none;' : ''); ?>"><?php echo e(__('Hide')); ?></span>
                                                            <?php echo e(__(' Leave')); ?>

                                                        </a>
                                                        <a href="#"
                                                            class="dropdown-item <?php echo e($availability_display == 'hide' ? 'hide_rss' : ''); ?>"
                                                            id="hideavailability">
                                                            <span class="span_hide"
                                                                style="<?php echo e($availability_display == 'show' ? 'display: none;' : ''); ?>"><?php echo e(__('Show')); ?></span>
                                                            <span class="span_show"
                                                                style="<?php echo e($availability_display == 'hide' ? 'display: none;' : ''); ?>"><?php echo e(__('Hide')); ?></span>
                                                            <?php echo e(__(' Availability')); ?>

                                                        </a>
                                                        <a href="#" class="dropdown-item" id="clear_week">
                                                            <?php echo e(__('Clear Week')); ?> </a>
                                                        <a href="#" class="dropdown-item hide_rss"
                                                            id="add_remove_dayeoff">
                                                            <?php echo e(__(' Add / Remove Day Off')); ?>

                                                        </a>
                                                        <a href="#" class="dropdown-item hide_rss"
                                                            id="add_remove_employee">
                                                            <?php echo e(__(' Add / Remove Employee')); ?>

                                                        </a>
                                                </div>
                                            </div>

                                            <div class="btn-group card-option">
                                                <button type="button" class="btn btn-sm btn-primary btn-icon m-1" id='send_email_rotas'>
                                                    <i class="feather icon-mail"
                                                        data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Send rotas via email')); ?>"></i>
                                                </button>
                                            </div>

                                            <div class="btn-group card-option">
                                                <button type="button" class="print_rotas_cls d-none"
                                                    data-size="lg" data-ajax-popup="true"
                                                    data-title="<?php echo e(__('Print rotas')); ?>"
                                                    data-url="<?php echo e(route('rotas.print_rotas_popup', ['loaction' => $first_location, 'create_by' => $created_by])); ?>">
                                                </button>

                                                <button type="button" class="btn btn-sm btn-primary btn-icon m-1" id="print_rotas"
                                                    data-urls="<?php echo e(route('rotas.print_rotas_popup')); ?>">
                                                    <i class="feather icon-printer"  data-urls="<?php echo e(route('rotas.print_rotas_popup')); ?>"
                                                        data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Print rotas')); ?>"></i>
                                                </button>
                                            </div>

                                            <div class="btn-group card-option">
                                                <button type="button" data-url2="<?php echo e(route('rotas.share_popup')); ?>" class="btn btn-sm btn-primary btn-icon m-1 share_rotas_cls"
                                                        data-size="md" data-ajax-popup="false" data-title="<?php echo e(__('Share rotas')); ?>">
                                                    <i class="feather icon-share-2"
                                                        data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Share rotas')); ?>"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="rotas_filter_main_div_responce">
                                            <div class="add_remove_dayeoff" style="display: none;">
                                                <span><?php echo e(__('Click a day to set employees day off')); ?></span> &nbsp;
                                                <button type="button"
                                                    class="dropdown-toggle btn btn-sm btn-primary btn-icon m-1 dayoff_close"
                                                    data-toggel="tooltip"
                                                    title="<?php echo e(__('Back to Rota Builder')); ?>"><span
                                                        class="btn-inner--icon"><i
                                                            class="fas fa-times"></i></span></button>
                                            </div>
                                        </div>

                                        
                                    </div>
                                <?php else: ?>
                                    <div class="col-md-4 d-flex align-items-center justify-content-between justify-content-md-end">
                                    <div class="btn-group card-option">
                                        <button type="button" class="print_rotas_cls d-none"
                                            data-size="lg" data-ajax-popup="true"
                                            data-title="<?php echo e(__('Print rotas')); ?>"
                                            data-url="<?php echo e(route('rotas.print_rotas_popup', ['loaction' => $first_location, 'create_by' => $created_by])); ?>">
                                        </button>

                                        <button type="button" class="btn btn-sm btn-primary btn-icon m-1" id="print_rotas"
                                              data-urls="<?php echo e(route('rotas.print_rotas_popup')); ?>">
                                                <i class="feather icon-printer"  data-urls="<?php echo e(route('rotas.print_rotas_popup')); ?>"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Print rotas')); ?>"></i>
                                            </button>
                                        </div>
                                    </div>
                                <?php endif; ?>                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12"> 
                    <!-- Listing -->
                    <div class="mt-4">
                        <div class="card">
                            <div class="card-wrapper rotas-timesheet overflow-auto" id="rotas-timesheet">
                                <table class="table work_sheet_table1">
                                    <thead>
                                        <tr class="text-center work_sheet_table">
                                            <th>Week 1</th>
                                            <th><span>MON</span><br><span><?php echo e($week_date[0]); ?></span>
                                            </th>
                                            <th><span>TUE</span><br><span><?php echo e($week_date[1]); ?></span>
                                            </th>
                                            <th><span>WED</span><br><span><?php echo e($week_date[2]); ?></span>
                                            </th>
                                            <th><span>THU</span><br><span><?php echo e($week_date[3]); ?></span>
                                            </th>
                                            <th><span>FRI</span><br><span><?php echo e($week_date[4]); ?></span>
                                            </th>
                                            <th><span>SAT</span><br><span><?php echo e($week_date[5]); ?></span>
                                            </th>
                                            <th><span>SUN</span><br><span><?php echo e($week_date[6]); ?></span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(!empty($location_option)): ?>
                                            <?php if(!empty($employees)): ?>
                                                <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php echo $employee->getthirdWorkSchedulethird($employee['id'], $temp_week, $first_location); ?>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                                <tr>
                                                    <td colspan="8">
                                                        <div class="text-center">
                                                            <i class="fas fa-map-marker-alt text-primary fs-40"></i>
                                                            <h2><?php echo e(__('Opps...')); ?></h2>
                                                            <h6> <?php echo __('Please assign user in this location.'); ?> </h6>
                                                        </div>
                                                    </td>
                                                </tr>

                                            <?php endif; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="8">
                                                    <div class="text-center">
                                                        <i class="fas fa-map-marker-alt text-primary fs-40"></i>
                                                        <h2><?php echo e(__('Opps...')); ?></h2>
                                                        <h6> <?php echo __('You must add a location to your account and assign user <br> before you can start building rotas.'); ?> </h6>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>

                                    <?php if(Auth::user()->acount_type == 1 || Auth::user()->acount_type == 2 && !empty($location_option) && !empty($employee)): ?>
                                        <tfoot class="bt2">
                                            <?php echo $employee->getCompanyWeeklyUserSalarythree(0, $created_by, $first_location, 0); ?>

                                        </tfoot>
                                    <?php endif; ?>
                                </table>
                            </div>
                        </div>
                    </div>                        
                </div>

                <div class="col-xl-12"> 
                    <!-- Listing -->
                    <div class="mt-4">
                        <div class="card">
                            <div class="card-wrapper rotas-timesheet overflow-auto" id="rotas-timesheet">
                                <table class="table work_sheet_table2">
                                    <thead>
                                        <tr class="text-center work_sheet_table">
                                            <th>Week 2</th>
                                            <th><span>MON</span><br><span><?php echo e($week_date[7]); ?></span>
                                            </th>
                                            <th><span>TUE</span><br><span><?php echo e($week_date[8]); ?></span>
                                            </th>
                                            <th><span>WED</span><br><span><?php echo e($week_date[9]); ?></span>
                                            </th>
                                            <th><span>THU</span><br><span><?php echo e($week_date[10]); ?></span>
                                            </th>
                                            <th><span>FRI</span><br><span><?php echo e($week_date[11]); ?></span>
                                            </th>
                                            <th><span>SAT</span><br><span><?php echo e($week_date[12]); ?></span>
                                            </th>
                                            <th><span>SUN</span><br><span><?php echo e($week_date[13]); ?></span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(!empty($location_option)): ?>
                                            <?php if(!empty($employees)): ?>
                                                <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php echo $employee->getthirdWorkScheduleduo($employee['id'], $temp_week, $first_location); ?>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                                <tr>
                                                    <td colspan="8">
                                                        <div class="text-center">
                                                            <i class="fas fa-map-marker-alt text-primary fs-40"></i>
                                                            <h2><?php echo e(__('Opps...')); ?></h2>
                                                            <h6> <?php echo __('Please assign user in this location.'); ?> </h6>
                                                        </div>
                                                    </td>
                                                </tr>

                                            <?php endif; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="8">
                                                    <div class="text-center">
                                                        <i class="fas fa-map-marker-alt text-primary fs-40"></i>
                                                        <h2><?php echo e(__('Opps...')); ?></h2>
                                                        <h6> <?php echo __('You must add a location to your account and assign user <br> before you can start building rotas.'); ?> </h6>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>

                                    <?php if(Auth::user()->acount_type == 1 || Auth::user()->acount_type == 2 && !empty($location_option) && !empty($employee)): ?>
                                        <tfoot class="bt2">
                                            <?php echo $employee->getCompanyWeeklyUserSalarythreeduo(0, $created_by, $first_location, 0); ?>

                                        </tfoot>
                                    <?php endif; ?>
                                </table>
                            </div>
                        </div>
                    </div>                        
                </div>

                <div class="col-xl-12"> 
                    <!-- Listing -->
                    <div class="mt-4">
                        <div class="card">
                            <div class="card-wrapper rotas-timesheet overflow-auto" id="rotas-timesheet">
                                <table class="table work_sheet_table3">
                                    <thead>
                                        <tr class="text-center work_sheet_table">
                                            <th>Week 3</th>
                                            <th><span>MON</span><br><span><?php echo e($week_date[14]); ?></span>
                                            </th>
                                            <th><span>TUE</span><br><span><?php echo e($week_date[15]); ?></span>
                                            </th>
                                            <th><span>WED</span><br><span><?php echo e($week_date[16]); ?></span>
                                            </th>
                                            <th><span>THU</span><br><span><?php echo e($week_date[17]); ?></span>
                                            </th>
                                            <th><span>FRI</span><br><span><?php echo e($week_date[18]); ?></span>
                                            </th>
                                            <th><span>SAT</span><br><span><?php echo e($week_date[19]); ?></span>
                                            </th>
                                            <th><span>SUN</span><br><span><?php echo e($week_date[20]); ?></span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(!empty($location_option)): ?>
                                            <?php if(!empty($employees)): ?>
                                                <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php echo $employee->getthirdWorkScheduletrio($employee['id'], $temp_week, $first_location); ?>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                                <tr>
                                                    <td colspan="8">
                                                        <div class="text-center">
                                                            <i class="fas fa-map-marker-alt text-primary fs-40"></i>
                                                            <h2><?php echo e(__('Opps...')); ?></h2>
                                                            <h6> <?php echo __('Please assign user in this location.'); ?> </h6>
                                                        </div>
                                                    </td>
                                                </tr>

                                            <?php endif; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="8">
                                                    <div class="text-center">
                                                        <i class="fas fa-map-marker-alt text-primary fs-40"></i>
                                                        <h2><?php echo e(__('Opps...')); ?></h2>
                                                        <h6> <?php echo __('You must add a location to your account and assign user <br> before you can start building rotas.'); ?> </h6>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>

                                    <?php if(Auth::user()->acount_type == 1 || Auth::user()->acount_type == 2 && !empty($location_option) && !empty($employee)): ?>
                                        <tfoot class="bt2">
                                            <?php echo $employee->getCompanyWeeklyUserSalarythreetrio(0, $created_by, $first_location, 0); ?>

                                        </tfoot>
                                    <?php endif; ?>
                                </table>
                            </div>
                        </div>
                    </div>                        
                </div>
            </div>
        </div>
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('availabilityscriptlink'); ?>
  
        <script type="text/javascript" src="<?php echo e(asset('custom/js/html2pdf.bundle.min.js')); ?>"></script>

        <script>
            $(document).ready(function() {
                dragdrop();
                leave_show();
                seturl();

                $(document).on('click', '.share_rotas_cls', function() {
                    var user_array = [];
                    $(".work_sheet_table1 tbody tr").each(function(propName, index) {
                        var user_id = $(this).attr('data-user-id');
                        user_array[propName] = user_id;
                    });

                    if ($(".work_sheet_table1 tbody tr").attr('data-user-id') == undefined) {
                        show_toastr('Error', '<?php echo e(__('Employee not found.')); ?>', 'error');
                        return;
                    }
                });

                $(document).on('click', '#share_rotas', function() {
                    var week = $('.week_add_sub').val();
                    var location_id = $('.rotas_location_change').val();
                    var role_id = $('.rotas_role_change').val();
                    var created_by = $('.week_add_sub').attr('data-created-by');
                    var user_array = [];

                    $(".work_sheet_table1 tbody tr").each(function(propName, index) {
                        var user_id = $(this).attr('data-user-id');
                        user_array[propName] = user_id;
                    });

                    if ($(".work_sheet_table1 tbody tr").attr('data-user-id') == undefined) {
                        show_toastr('Error', '<?php echo e(__('User not found.')); ?>', 'error');
                        return;
                    }

                    var url = $(this).attr('data-urls');
                    $(this).parent().find('.share_rotas_cls').attr('data-url', url + '?loaction=' +
                        location_id + '&create_by=' + created_by + '&role_id=' + role_id + '&week=' + week +
                        '&user=' + user_array);
                    $('.share_rotas_cls').trigger('click');
                });

                $(document).on('click', '#click_to_copy', function() {
                    /* Get the text field */
                    var copyText = document.getElementById("click_link");

                    $('#click_link').addClass('clickanimation');

                    setTimeout(function() {
                        $('#click_link').removeClass('clickanimation');
                    }, 1000);

                    /* Select the text field */
                    copyText.select();
                    copyText.setSelectionRange(0, 99999); /* For mobile devices */

                    /* Copy the text inside the text field */
                    document.execCommand("copy");

                    // clickanimation
                    var msg = '<?php echo e(__('Link copied successfully.')); ?>';
                    var msg123 = '<?php echo e(__('Copied the text: ')); ?>' + copyText.value;

                    /* Alert the copied text */
                    show_toastr('Success', msg, 'success');
                });

                $(document).on('click', '.create_link', function() {
                    var location = $('input[name="loaction_id"]').val();
                    var role_id = $('input[name="role_id"]').val();
                    var create_by = $('input[name="create_by"]').val();
                    var week = $('input[name="week"]').val();
                    var user_array = $('input[name="user_array"]').val();
                    var share_password = $('input[name="share_password"]').val();
                    var expiry_date = $('input[name="expiry_date"]').val();

                    var data = {
                        location: location,
                        week: week,
                        role_id: role_id,
                        create_by: create_by,
                        share_password: share_password,
                        expiry_date: expiry_date,
                        user_array: user_array,
                    }

                    $.ajax({
                        url: '<?php echo e(route('rotas.share_rotas_link')); ?>',
                        method: 'post',
                        data: data,
                        success: function(data) {
                            if (data.status == 'success') {
                                $("#click_link").attr('value', data.message);
                                show_toastr('Success', "<?php echo e(__('Link created successfully.')); ?>",
                                    'success');
                            } else {
                                show_toastr('Error', '<?php echo e(__('Something went wrong.')); ?>',
                                    'error');
                            }

                            $('#copy_box').show();
                        }
                    });

                });

                $(document).on('click', '.weak_go', function() {
                    var start_date = $('.week_last_daye').attr('data-start');
                    var end_date = $('.week_last_daye').attr('data-end');
                    var week = $('.week_add_sub').val();
                    var location_id = $('.rotas_location_change').val();
                    var role_id = $('.rotas_role_change').val();
                    var created_by = $('.week_add_sub').attr('data-created-by');
                    if(location_id == null) {
                        var location_id = 0;
                    }
                    if(role_id == null) {
                        var role_id = 0; 
                    }
                    var data = {
                        start_date: start_date,
                        end_date: end_date,
                        week: week,
                        location_id: location_id,
                        role_id: role_id,
                        created_by: created_by
                    }

                    $.ajax({
                        url: '<?php echo e(route('rotas.week_sheet_third')); ?>',
                        method: 'post',
                        data: data,
                        success: function(data) {
                            // console.log(data);
                            $('.work_sheet_table1').html(data.table);
                            $('.work_sheet_table1 tfoot').html(data.week_exp);

                            // work_sheet_table1
                            $('.weak_go_html').html(data.title);
                            $('.work_sheet_table_last2 thead tr').html(data.thead);
                            $('.work_sheet_table_last2 tbody').html(data.week_exp);
                            $('[data-toggle="tooltip"]').tooltip();
                            loadConfirm();
                            dragdrop();
                            leave_show();
                            seturl();
                        }
                    });
                });

                $(document).on('click', '.weak_go', function() {
                    var start_date = $('.week_last_daye').attr('data-start');
                    var end_date = $('.week_last_daye').attr('data-end');
                    var week = $('.week_add_sub').val();
                    var location_id = $('.rotas_location_change').val();
                    var role_id = $('.rotas_role_change').val();
                    var created_by = $('.week_add_sub').attr('data-created-by');
                    if(location_id == null) {
                        var location_id = 0;
                    }
                    if(role_id == null) {
                        var role_id = 0; 
                    }
                    var data = {
                        start_date: start_date,
                        end_date: end_date,
                        week: week,
                        location_id: location_id,
                        role_id: role_id,
                        created_by: created_by
                    }

                    $.ajax({
                        url: '<?php echo e(route('rotas.week_sheet_third_two')); ?>',
                        method: 'post',
                        data: data,
                        success: function(data) {
                            // console.log(data);

                            $('.work_sheet_table2').html(data.table);
                            $('.work_sheet_table2 tfoot').html(data.week_exp);

                            // // work_sheet_table1
                            // $('.weak_go_html').html(data.title);
                            // $('.work_sheet_table_last2 thead tr').html(data.thead);
                            // $('.work_sheet_table_last2 tbody').html(data.week_exp);
                            $('[data-toggle="tooltip"]').tooltip();
                            loadConfirm();
                            dragdrop();
                            leave_show();
                            seturl();
                        }
                    });
                });

                $(document).on('click', '.weak_go', function() {
                    var start_date = $('.week_last_daye').attr('data-start');
                    var end_date = $('.week_last_daye').attr('data-end');
                    var week = $('.week_add_sub').val();
                    var location_id = $('.rotas_location_change').val();
                    var role_id = $('.rotas_role_change').val();
                    var created_by = $('.week_add_sub').attr('data-created-by');
                    if(location_id == null) {
                        var location_id = 0;
                    }
                    if(role_id == null) {
                        var role_id = 0; 
                    }
                    var data = {
                        start_date: start_date,
                        end_date: end_date,
                        week: week,
                        location_id: location_id,
                        role_id: role_id,
                        created_by: created_by
                    }

                    $.ajax({
                        url: '<?php echo e(route('rotas.week_sheet_third_three')); ?>',
                        method: 'post',
                        data: data,
                        success: function(data) {
                            // console.log(data);

                            $('.work_sheet_table3').html(data.table);
                            $('.work_sheet_table3 tfoot').html(data.week_exp);

                            // // work_sheet_table1
                            // $('.weak_go_html').html(data.title);
                            // $('.work_sheet_table_last2 thead tr').html(data.thead);
                            // $('.work_sheet_table_last2 tbody').html(data.week_exp);
                            $('[data-toggle="tooltip"]').tooltip();
                            loadConfirm();
                            dragdrop();
                            leave_show();
                            seturl();
                        }
                    });
                });

                $(document).on('click', '#print_rotas', function() {
                    var week = $('.week_add_sub').val();
                    var location_id = $('.rotas_location_change').val();
                    var role_id = $('.rotas_role_change').val();
                    var created_by = $('.week_add_sub').attr('data-created-by');
                    var user_array = [];
                    $(".work_sheet_table1 tbody tr").each(function(propName, index) {
                        var user_id = $(this).attr('data-user-id');
                        user_array[propName] = user_id;
                    });

                    if ($(".work_sheet_table1 tbody tr").attr('data-user-id') == undefined) {
                        show_toastr('Error', '<?php echo e(__('User not found.')); ?>', 'error');
                        return;
                    }

                    var url = $(this).attr('data-urls');
                    $(this).parent().find('.print_rotas_cls').attr('data-url', url + '?loaction=' +
                        location_id + '&create_by=' + created_by + '&role_id=' + role_id + '&week=' + week +
                        '')
                    $('.print_rotas_cls').trigger('click');
                });

                $(document).on('change', '.rotas_location_change', function() {
                    var start_date = $('.week_last_daye').attr('data-start');
                    var end_date = $('.week_last_daye').attr('data-end');
                    var week = $('.week_add_sub').val();
                    var location_id = $(this).val();
                    var role_id = $('.rotas_role_change').val();
                    var created_by = $('.week_add_sub').attr('data-created-by');
                    if(location_id == null) {
                        var location_id = 0;
                    }
                    if(role_id == null) {
                        var role_id = 0; 
                    }
                    var data = {
                        start_date: start_date,
                        end_date: end_date,
                        week: week,
                        created_by: created_by,
                        location_id: location_id,
                        role_id: role_id
                    }

                    var loc_change = $("#loc_change").val();

                    if(loc_change == "0"){
                        $.ajax({
                            url: '<?php echo e(route('rotas.week_sheet_third')); ?>',
                            method: 'post',
                            data: data,
                            success: function(data) {

                                $('.work_sheet_table1').html(data.table);
                                $('.work_sheet_table1 tfoot').html(data.week_exp);
                                $('.weak_go_html').html(data.title);
                                $('.work_sheet_table_last thead tr').html(data.thead);
                                $('.work_sheet_table_last tbody').html(data.week_exp);
                                loadConfirm();
                                dragdrop();
                                seturl();
                            }
                        });

                        $.ajax({
                            url: '<?php echo e(route('rotas.week_sheet_third_two')); ?>',
                            method: 'post',
                            data: data,
                            success: function(data) {
                                // console.log(data);

                                $('.work_sheet_table2').html(data.table);
                                $('.work_sheet_table2 tfoot').html(data.week_exp);

                                // // work_sheet_table1
                                // $('.weak_go_html').html(data.title);
                                // $('.work_sheet_table_last2 thead tr').html(data.thead);
                                // $('.work_sheet_table_last2 tbody').html(data.week_exp);
                                $('[data-toggle="tooltip"]').tooltip();
                                loadConfirm();
                                dragdrop();
                                leave_show();
                                seturl();
                            }
                        });

                        $.ajax({
                            url: '<?php echo e(route('rotas.week_sheet_third_three')); ?>',
                            method: 'post',
                            data: data,
                            success: function(data) {
                                // console.log(data);

                                $('.work_sheet_table3').html(data.table);
                                $('.work_sheet_table3 tfoot').html(data.week_exp);

                                // // work_sheet_table1
                                // $('.weak_go_html').html(data.title);
                                // $('.work_sheet_table_last2 thead tr').html(data.thead);
                                // $('.work_sheet_table_last2 tbody').html(data.week_exp);
                                $('[data-toggle="tooltip"]').tooltip();
                                loadConfirm();
                                dragdrop();
                                leave_show();
                                seturl();
                            }
                        });
                    }else if(loc_change == "1"){
                        $.ajax({
                            url: '<?php echo e(route('rotas.week_sheet_third_two')); ?>',
                            method: 'post',
                            data: data,
                            success: function(data) {
                                // console.log(data);

                                $('.work_sheet_table2').html(data.table);
                                $('.work_sheet_table2 tfoot').html(data.week_exp);

                                // // work_sheet_table1
                                // $('.weak_go_html').html(data.title);
                                // $('.work_sheet_table_last2 thead tr').html(data.thead);
                                // $('.work_sheet_table_last2 tbody').html(data.week_exp);
                                $('[data-toggle="tooltip"]').tooltip();
                                loadConfirm();
                                dragdrop();
                                leave_show();
                                seturl();
                            }
                        });
                    }else{
                        $.ajax({
                            url: '<?php echo e(route('rotas.week_sheet_third_three')); ?>',
                            method: 'post',
                            data: data,
                            success: function(data) {
                                // console.log(data);

                                $('.work_sheet_table3').html(data.table);
                                $('.work_sheet_table3 tfoot').html(data.week_exp);

                                // // work_sheet_table1
                                // $('.weak_go_html').html(data.title);
                                // $('.work_sheet_table_last2 thead tr').html(data.thead);
                                // $('.work_sheet_table_last2 tbody').html(data.week_exp);
                                $('[data-toggle="tooltip"]').tooltip();
                                loadConfirm();
                                dragdrop();
                                leave_show();
                                seturl();
                            }
                        });
                        
                    }
                    

                    // $.ajax({
                    //     url: '<?php echo e(route('rotas.week_sheet')); ?>',
                    //     method: 'post',
                    //     data: data,
                    //     success: function(data) {

                    //         $('.work_sheet_table1').html(data.table);
                    //         $('.work_sheet_table1 tfoot').html(data.week_exp);
                    //         $('.weak_go_html').html(data.title);
                    //         $('.work_sheet_table_last thead tr').html(data.thead);
                    //         $('.work_sheet_table_last tbody').html(data.week_exp);
                    //         loadConfirm();
                    //         dragdrop();
                    //         seturl();
                    //     }
                    // });
                });

                $(document).on('change', '.rotas_role_change', function() {
                    var start_date = $('.week_last_daye').attr('data-start');
                    var end_date = $('.week_last_daye').attr('data-end');
                    var week = $('.week_add_sub').val();
                    var role_id = $(this).val();
                    var created_by = $('.week_add_sub').attr('data-created-by');
                    var location_id = $('.rotas_location_change').val();
                    if(location_id == null) {
                        var location_id = 0;
                    }
                    if(role_id == null) {
                        var role_id = 0; 
                    }

                    var data = {
                        start_date: start_date,
                        end_date: end_date,
                        week: week,
                        created_by: created_by,
                        location_id: location_id,
                        role_id: role_id
                    }

                    $.ajax({
                            url: '<?php echo e(route('rotas.week_sheet_third')); ?>',
                            method: 'post',
                            data: data,
                            success: function(data) {

                                $('.work_sheet_table1').html(data.table);
                                $('.work_sheet_table1 tfoot').html(data.week_exp);
                                $('.weak_go_html').html(data.title);
                                $('.work_sheet_table_last thead tr').html(data.thead);
                                $('.work_sheet_table_last tbody').html(data.week_exp);
                                loadConfirm();
                                dragdrop();
                                seturl();
                            }
                        });

                        $.ajax({
                            url: '<?php echo e(route('rotas.week_sheet_third_two')); ?>',
                            method: 'post',
                            data: data,
                            success: function(data) {
                                // console.log(data);

                                $('.work_sheet_table2').html(data.table);
                                $('.work_sheet_table2 tfoot').html(data.week_exp);

                                // // work_sheet_table1
                                // $('.weak_go_html').html(data.title);
                                // $('.work_sheet_table_last2 thead tr').html(data.thead);
                                // $('.work_sheet_table_last2 tbody').html(data.week_exp);
                                $('[data-toggle="tooltip"]').tooltip();
                                loadConfirm();
                                dragdrop();
                                leave_show();
                                seturl();
                            }
                        });

                        $.ajax({
                            url: '<?php echo e(route('rotas.week_sheet_third_three')); ?>',
                            method: 'post',
                            data: data,
                            success: function(data) {
                                // console.log(data);

                                $('.work_sheet_table3').html(data.table);
                                $('.work_sheet_table3 tfoot').html(data.week_exp);

                                // // work_sheet_table1
                                // $('.weak_go_html').html(data.title);
                                // $('.work_sheet_table_last2 thead tr').html(data.thead);
                                // $('.work_sheet_table_last2 tbody').html(data.week_exp);
                                $('[data-toggle="tooltip"]').tooltip();
                                loadConfirm();
                                dragdrop();
                                leave_show();
                                seturl();
                            }
                        });
                });

                $(document).on('change', '.rotas_time', function() {
                    var start_time = $('.start_time').val();
                    var end_time = $('.end_time').val();
                    if (start_time != '' && end_time == '') {
                        $('.end_time').attr('value', start_time);
                    }
                    if (end_time != '' && start_time == '') {
                        $('.start_time').attr('value', end_time);
                    }
                    return;
                });

                $('.rotas_filter_main_div_responce').on('click', '.rotas_raeponce_btn_filter', function(e) {
                    $('.add_remove_dayeoff').toggle();
                    $('.rotas_filter_main_div').toggle();
                });

                $('.rotas_filter_main_div_responce').on('click', '.rotas_raeponce_btn_filter', function(e) {
                    $('.add_remove_amoff').toggle();
                    $('.rotas_filter_main_div').toggle();
                });

                $('.rotas_filter_main_div_responce').on('click', '.rotas_raeponce_btn_filter', function(e) {
                    $('.add_remove_pmoff').toggle();
                    $('.rotas_filter_main_div').toggle();
                });

                $('.rotas_filter').on('click', '.dropdown-item', function(e) {
                    var val = $(this).attr('id');
                    var start_date = $('.week_last_daye').attr('data-start');
                    var end_date = $('.week_last_daye').attr('data-end');
                    var week = $('.week_add_sub').val();
                    var created_by = $('.week_add_sub').attr('data-created-by');
                    var location_id = $('.rotas_location_change').val();

                    var data = {
                        start_date: start_date,
                        end_date: end_date,
                        week: week,
                        created_by: created_by,
                        location_id: location_id
                    }
                    $(this).find('.span_hide').toggle();
                    $(this).find('.span_show').toggle();

                    if (val == 'hideavailability') {
                        $('.availability_table_box').toggle();
                        $('#hideavailability').toggleClass('hide_rss');

                        var availability_display = 'show';
                        if ($('#hideavailability').hasClass('hide_rss')) {
                            var availability_display = 'hide';
                        }
                        var data = {
                            availability_display: availability_display,
                        }

                        $.ajax({
                            url: '<?php echo e(route('hideavailability')); ?>',
                            method: 'POST',
                            data: data,
                            success: function(data) {

                            }
                        });
                    }
                    if (val == 'hidedayoff') {
                        $('.ws_day_off_leave').toggle();
                        $('.cus_day_off_leave').toggle();
                        $('.day_off_leave123').toggleClass('badge-secondary');
                        $('#hidedayoff').toggleClass('hide_rss');

                        var hide_day_off = 'show';
                        if ($('#hidedayoff').hasClass('hide_rss')) {
                            var hide_day_off = 'hide';
                        }
                        var data = {
                            hide_day_off: hide_day_off,
                        }

                        $.ajax({
                            url: '<?php echo e(route('hidedayoff')); ?>',
                            method: 'POST',
                            data: data,
                            success: function(data) {

                            }
                        });

                    }
                    if (val == 'hideleave') {
                        $('#hideleave').toggleClass('hide_rss');
                        $('.other_leave123').toggleClass('badge-soft-success');
                        $('.holiday_leave123').toggleClass('badge-soft-info');

                        var leave_display = 'show';
                        if ($('#hideleave').hasClass('hide_rss')) {
                            var leave_display = 'hide';
                        }
                        var data = {
                            leave_display: leave_display,
                        }

                        $.ajax({
                            url: '<?php echo e(route('hideleave')); ?>',
                            method: 'POST',
                            data: data,
                            success: function(data) {

                            }
                        });
                    }
                    if (val == 'clear_week') {
                        
                        $.ajax({
                            url: '<?php echo e(route('rotas.clear_weekthirdsolo')); ?>',
                            method: 'POST',
                            data: data,
                            success: function(data) {

                                if (data["status"] == "success") {
                                    show_toastr('Success', data["msg"], 'success');
                                } else {
                                    show_toastr('Error', data["msg"], 'error');
                                }

                                if (data['status'] != 'error') {
                                    $('.rotas_time1').remove();
                                }
                                loadConfirm();
                            }
                        });

                        $.ajax({
                            url: '<?php echo e(route('rotas.clear_weekthirdduo')); ?>',
                            method: 'POST',
                            data: data,
                            success: function(data) {

                                // if (data["status"] == "success") {
                                //     show_toastr('Success', data["msg"], 'success');
                                // } else {
                                //     show_toastr('Error', data["msg"], 'error');
                                // }

                                if (data['status'] != 'error') {
                                    $('.rotas_time1').remove();
                                }
                                loadConfirm();
                            }
                        });

                        $.ajax({
                            url: '<?php echo e(route('rotas.clear_weekthirdtrio')); ?>',
                            method: 'POST',
                            data: data,
                            success: function(data) {

                                // if (data["status"] == "success") {
                                //     show_toastr('Success', data["msg"], 'success');
                                // } else {
                                //     show_toastr('Error', data["msg"], 'error');
                                // }

                                if (data['status'] != 'error') {
                                    $('.rotas_time1').remove();
                                }
                                loadConfirm();
                            }
                        });
                    }
                    if (val == 'add_remove_dayeoff') {
                        $('.rotas_filter_main_div').toggle();
                        $('.add_remove_dayeoff').toggle();
                    }

                    if (val == 'add_remove_amoff') {
                        $('.rotas_filter_main_div').toggle();
                        $('.add_remove_amoff').toggle();
                    }

                    if (val == 'add_remove_pmoff') {
                        $('.rotas_filter_main_div').toggle();
                        $('.add_remove_pmoff').toggle();
                    }
                    if (val == 'add_remove_employee') {
                        $('.add_remove_employee').trigger('click');
                    }
                    leave_show();
                });

                $('.rotas_filter_main_div_responce').on('click', '.add_remove_dayeoff .dayoff_close', function() {
                    $(this).parent().hide();
                    $('.rotas_filter_main_div').show();
                    // location.reload();
                });

                $('.rotas_filter_main_div_responce').on('click', '.add_remove_amoff .dayoff_close', function() {
                    $(this).parent().hide();
                    $('.rotas_filter_main_div').show();
                    // location.reload();
                });

                $('.rotas_filter_main_div_responce').on('click', '.add_remove_pmoff .dayoff_close', function() {
                    $(this).parent().hide();
                    $('.rotas_filter_main_div').show();
                    // location.reload();
                });

                $(document).on('click', '.work_sheet_table1>tbody>tr>td.droppable-class', function() {
                    var date = $(this).attr('data-date');
                    var user_id = $(this).attr('data-id');
                    var data = {
                        date: date,
                        user_id: user_id,
                    }
                    var has_dayoff = $(this).find('.ws_day_off_leave').hasClass('day_off_leave');
                    var has_dayoff_hide = $("#hidedayoff").hasClass('hide_rss');

                    if ($('.add_remove_dayeoff').css('display') != 'none' && $('.add_remove_dayeoff').length >
                        0) {
                        if (has_dayoff != true) {
                            $.ajax({
                                url: '<?php echo e(route('rotas.add_dayoff')); ?>',
                                method: 'POST',
                                data: data,
                                context: this,
                                success: function(data) {
                                    if (data.status == 'success') {
                                        if (data.date_status != '') {
                                            $(this).prepend(data.date_status);
                                        } else {
                                            $('.work_sheet_table1 tbody td.droppable-class')
                                                .children('.cus_day_off_leave').remove();
                                        }

                                        if (has_dayoff_hide) {
                                            $('.work_sheet_table1 tbody td.droppable-class')
                                                .children('.day_off_leave').hide();
                                        } else {
                                            $('.work_sheet_table1 tbody td.droppable-class')
                                                .children('.day_off_leave').show();
                                        }
                                        $('.rotas_location_change').trigger('change');
                                        show_toastr('Success', data["msg"], 'success');
                                    } else {
                                        show_toastr('Error', data["msg"], 'error');
                                    }

                                    loadConfirm();
                                }
                            });

                        } else {
                            show_toastr('<?php echo e(__('This day already day off')); ?>', '<?php echo session('error'); ?>',
                                'error');
                        }
                    }

                    if ($('.add_remove_amoff').css('display') != 'none' && $('.add_remove_amoff').length >
                        0) {
                        if (has_dayoff != true) {
                            $.ajax({
                                url: '<?php echo e(route('rotas.add_amoff')); ?>',
                                method: 'POST',
                                data: data,
                                context: this,
                                success: function(data) {
                                    console.log(data);
                                    if (data.status == 'success') {
                                        if (data.date_status != '') {
                                            $(this).prepend(data.date_status);
                                        } else {
                                            $('.work_sheet_table1 tbody td.droppable-class')
                                                .children('.cus_day_off_leave').remove();
                                        }

                                        if (has_dayoff_hide) {
                                            $('.work_sheet_table1 tbody td.droppable-class')
                                                .children('.day_off_leave').hide();
                                        } else {
                                            $('.work_sheet_table1 tbody td.droppable-class')
                                                .children('.day_off_leave').show();
                                        }
                                        $('.rotas_location_change').trigger('change');
                                        show_toastr('Success', data["msg"], 'success');
                                    } else {
                                        show_toastr('Error', data["msg"], 'error');
                                    }

                                    loadConfirm();
                                }
                            });

                        } else {
                            show_toastr('<?php echo e(__('This day already day off')); ?>', '<?php echo session('error'); ?>',
                                'error');
                        }
                    }

                    if ($('.add_remove_pmoff').css('display') != 'none' && $('.add_remove_pmoff').length >
                        0) {
                        if (has_dayoff != true) {
                            $.ajax({
                                url: '<?php echo e(route('rotas.add_pmoff')); ?>',
                                method: 'POST',
                                data: data,
                                context: this,
                                success: function(data) {
                                    if (data.status == 'success') {
                                        if (data.date_status != '') {
                                            $(this).prepend(data.date_status);
                                        } else {
                                            $('.work_sheet_table1 tbody td.droppable-class')
                                                .children('.cus_day_off_leave').remove();
                                        }

                                        if (has_dayoff_hide) {
                                            $('.work_sheet_table1 tbody td.droppable-class')
                                                .children('.day_off_leave').hide();
                                        } else {
                                            $('.work_sheet_table1 tbody td.droppable-class')
                                                .children('.day_off_leave').show();
                                        }
                                        $('.rotas_location_change').trigger('change');
                                        show_toastr('Success', data["msg"], 'success');
                                    } else {
                                        show_toastr('Error', data["msg"], 'error');
                                    }

                                    loadConfirm();
                                }
                            });

                        } else {
                            show_toastr('<?php echo e(__('This day already day off')); ?>', '<?php echo session('error'); ?>',
                                'error');
                        }
                    }

                });

                $(document).on('click', '.work_sheet_table2>tbody>tr>td.droppable-class', function() {
                    var date = $(this).attr('data-date');
                    var user_id = $(this).attr('data-id');
                    var data = {
                        date: date,
                        user_id: user_id,
                    }
                    var has_dayoff = $(this).find('.ws_day_off_leave').hasClass('day_off_leave');
                    var has_dayoff_hide = $("#hidedayoff").hasClass('hide_rss');
                    $("#loc_change").val('1');
                    if ($('.add_remove_dayeoff').css('display') != 'none' && $('.add_remove_dayeoff').length >
                        0) {
                        if (has_dayoff != true) {
                            $.ajax({
                                url: '<?php echo e(route('rotas.add_dayoff')); ?>',
                                method: 'POST',
                                data: data,
                                context: this,
                                success: function(data) {
                                    if (data.status == 'success') {
                                        if (data.date_status != '') {
                                            $(this).prepend(data.date_status);
                                        } else {
                                            $('.work_sheet_table2 tbody td.droppable-class')
                                                .children('.cus_day_off_leave').remove();
                                        }

                                        if (has_dayoff_hide) {
                                            $('.work_sheet_table2 tbody td.droppable-class')
                                                .children('.day_off_leave').hide();
                                        } else {
                                            $('.work_sheet_table2 tbody td.droppable-class')
                                                .children('.day_off_leave').show();
                                        }
                                        $('.rotas_location_change').trigger('change');
                                        show_toastr('Success', data["msg"], 'success');
                                    } else {
                                        show_toastr('Error', data["msg"], 'error');
                                    }

                                    loadConfirm();
                                }
                            });

                        } else {
                            show_toastr('<?php echo e(__('This day already day off')); ?>', '<?php echo session('error'); ?>',
                                'error');
                        }
                    }

                    if ($('.add_remove_amoff').css('display') != 'none' && $('.add_remove_amoff').length >
                        0) {
                        if (has_dayoff != true) {
                            $.ajax({
                                url: '<?php echo e(route('rotas.add_amoff')); ?>',
                                method: 'POST',
                                data: data,
                                context: this,
                                success: function(data) {
                                    console.log(data.date_status);
                                    if (data.status == 'success') {
                                        if (data.date_status != '') {
                                            $(this).prepend(data.date_status);
                                        } else {
                                            $('.work_sheet_table2 tbody td.droppable-class')
                                                .children('.cus_day_off_leave').remove();
                                        }

                                        if (has_dayoff_hide) {
                                            $('.work_sheet_table2 tbody td.droppable-class')
                                                .children('.day_off_leave').hide();
                                        } else {
                                            $('.work_sheet_table2 tbody td.droppable-class')
                                                .children('.day_off_leave').show();
                                        }
                                        // $("#custom_dayoff").val('am');
                                        //gul
                                        $('.rotas_location_change').trigger('change');
                                        show_toastr('Success', data["msg"], 'success');
                                    } else {
                                        show_toastr('Error', data["msg"], 'error');
                                    }

                                    loadConfirm();
                                }
                            });

                        } else {
                            show_toastr('<?php echo e(__('This day already AM off')); ?>', '<?php echo session('error'); ?>',
                                'error');
                        }
                    }

                    if ($('.add_remove_pmoff').css('display') != 'none' && $('.add_remove_pmoff').length >
                        0) {
                        if (has_dayoff != true) {
                            $.ajax({
                                url: '<?php echo e(route('rotas.add_pmoff')); ?>',
                                method: 'POST',
                                data: data,
                                context: this,
                                success: function(data) {
                                    console.log(data.date_status);
                                    if (data.status == 'success') {
                                        if (data.date_status != '') {
                                            $(this).prepend(data.date_status);
                                        } else {
                                            $('.work_sheet_table2 tbody td.droppable-class')
                                                .children('.cus_day_off_leave').remove();
                                        }

                                        if (has_dayoff_hide) {
                                            $('.work_sheet_table2 tbody td.droppable-class')
                                                .children('.day_off_leave').hide();
                                        } else {
                                            $('.work_sheet_table2 tbody td.droppable-class')
                                                .children('.day_off_leave').show();
                                        }
                                        $("#custom_dayoff").val('pm');
                                        $('.rotas_location_change').trigger('change');
                                        show_toastr('Success', data["msg"], 'success');
                                    } else {
                                        show_toastr('Error', data["msg"], 'error');
                                    }

                                    loadConfirm();
                                }
                            });

                        } else {
                            show_toastr('<?php echo e(__('This day already AM off')); ?>', '<?php echo session('error'); ?>',
                                'error');
                        }
                    }
                });

                $(document).on('click', '.work_sheet_table3>tbody>tr>td.droppable-class', function() {
                    var date = $(this).attr('data-date');
                    var user_id = $(this).attr('data-id');
                    var data = {
                        date: date,
                        user_id: user_id,
                    }
                    var has_dayoff = $(this).find('.ws_day_off_leave').hasClass('day_off_leave');
                    var has_dayoff_hide = $("#hidedayoff").hasClass('hide_rss');
                    $("#loc_change").val('2');
                    if ($('.add_remove_dayeoff').css('display') != 'none' && $('.add_remove_dayeoff').length >
                        0) {
                        if (has_dayoff != true) {
                            $.ajax({
                                url: '<?php echo e(route('rotas.add_dayoff')); ?>',
                                method: 'POST',
                                data: data,
                                context: this,
                                success: function(data) {
                                    if (data.status == 'success') {
                                        if (data.date_status != '') {
                                            $(this).prepend(data.date_status);
                                        } else {
                                            $('.work_sheet_table3 tbody td.droppable-class')
                                                .children('.cus_day_off_leave').remove();
                                        }

                                        if (has_dayoff_hide) {
                                            $('.work_sheet_table3 tbody td.droppable-class')
                                                .children('.day_off_leave').hide();
                                        } else {
                                            $('.work_sheet_table3 tbody td.droppable-class')
                                                .children('.day_off_leave').show();
                                        }
                                        $('.rotas_location_change').trigger('change');
                                        show_toastr('Success', data["msg"], 'success');
                                    } else {
                                        show_toastr('Error', data["msg"], 'error');
                                    }

                                    loadConfirm();
                                }
                            });

                        } else {
                            show_toastr('<?php echo e(__('This day already day off')); ?>', '<?php echo session('error'); ?>',
                                'error');
                        }
                    }

                    if ($('.add_remove_amoff').css('display') != 'none' && $('.add_remove_amoff').length >
                        0) {
                        if (has_dayoff != true) {
                            $.ajax({
                                url: '<?php echo e(route('rotas.add_amoff')); ?>',
                                method: 'POST',
                                data: data,
                                context: this,
                                success: function(data) {
                                    console.log(data.date_status);
                                    if (data.status == 'success') {
                                        if (data.date_status != '') {
                                            $(this).prepend(data.date_status);
                                        } else {
                                            $('.work_sheet_table3 tbody td.droppable-class')
                                                .children('.cus_day_off_leave').remove();
                                        }

                                        if (has_dayoff_hide) {
                                            $('.work_sheet_table3 tbody td.droppable-class')
                                                .children('.day_off_leave').hide();
                                        } else {
                                            $('.work_sheet_table3 tbody td.droppable-class')
                                                .children('.day_off_leave').show();
                                        }
                                        // $("#custom_dayoff").val('am');
                                        //gul
                                        $('.rotas_location_change').trigger('change');
                                        show_toastr('Success', data["msg"], 'success');
                                    } else {
                                        show_toastr('Error', data["msg"], 'error');
                                    }

                                    loadConfirm();
                                }
                            });

                        } else {
                            show_toastr('<?php echo e(__('This day already AM off')); ?>', '<?php echo session('error'); ?>',
                                'error');
                        }
                    }

                    if ($('.add_remove_pmoff').css('display') != 'none' && $('.add_remove_pmoff').length >
                        0) {
                        if (has_dayoff != true) {
                            $.ajax({
                                url: '<?php echo e(route('rotas.add_pmoff')); ?>',
                                method: 'POST',
                                data: data,
                                context: this,
                                success: function(data) {
                                    console.log(data.date_status);
                                    if (data.status == 'success') {
                                        if (data.date_status != '') {
                                            $(this).prepend(data.date_status);
                                        } else {
                                            $('.work_sheet_table3 tbody td.droppable-class')
                                                .children('.cus_day_off_leave').remove();
                                        }

                                        if (has_dayoff_hide) {
                                            $('.work_sheet_table3 tbody td.droppable-class')
                                                .children('.day_off_leave').hide();
                                        } else {
                                            $('.work_sheet_table3 tbody td.droppable-class')
                                                .children('.day_off_leave').show();
                                        }
                                        $("#custom_dayoff").val('pm');
                                        $('.rotas_location_change').trigger('change');
                                        show_toastr('Success', data["msg"], 'success');
                                    } else {
                                        show_toastr('Error', data["msg"], 'error');
                                    }

                                    loadConfirm();
                                }
                            });

                        } else {
                            show_toastr('<?php echo e(__('This day already AM off')); ?>', '<?php echo session('error'); ?>',
                                'error');
                        }
                    }
                });

                $(document).on('click', '#send_email_rotas', function() {
                    var week = $('.week_add_sub').val();
                    var location_id = $('.rotas_location_change').val();

                    var data = {
                        week: week,
                        location_id: location_id
                    }

                    if(location_id == undefined) {
                        show_toastr('Error', '<?php echo e(__('Location not found.')); ?>', 'error');
                        return;
                    }

                    $.ajax({
                        url: '<?php echo e(route('rotas.send_email_rotas')); ?>',
                        method: 'POST',
                        data: data,
                        success: function(data) {
                            if (data.status == 'success') {
                                show_toastr('Success', data.message, 'success');
                            } else {
                                show_toastr('Error', data.message, 'error');
                            }

                            // show_toastr(data.status, data.message, data.status);
                        },
                        error: function(data) {
                            data = data.responseJSON;
                            show_toastr('Error', data.message, 'error');
                        },
                    });
                });

                $(document).on('click', '.rotas_cteate', function() {
                   
                    var form = $(this).parents('.rotas_cteate_frm');
                    var user_id = form.find('input[name="user_id"]').val();
                    var rotas_date = form.find('input[name="rotas_date"]').val();
                    var location_id = form.find('input[name="location_id"]').val();
                    var start_time = form.find('input[name="start_time"]').val();
                    var end_time = form.find('input[name="end_time"]').val();
                    var break_time = form.find('input[name="break_time"]').val();
                    var role_id = form.find('select[name="role_id"]').val();
                    var note = form.find('textarea[name="note"]').val();
                    var token = $('meta[name="csrf-token"]').attr('content');

                    var data = {
                        "_token": token,
                        "user_id": user_id,
                        "rotas_date": rotas_date,
                        "location_id": location_id,
                        "start_time": start_time,
                        "end_time": end_time,
                        "break_time": break_time,
                        "role_id": role_id,
                        "note": note,
                    }

                    $.ajax({
                        url: '<?php echo e(route('rotas.store')); ?>',
                        method: 'POST',
                        data: data,
                        success: function(data) {
                            if (data["status"] == 'success') {
                                show_toastr('Success', data["msg"], 'success');
                            } else {
                                show_toastr('Error', data["msg"], 'error');
                            }
                            $("#loc_change").val("0");
                            $('.rotas_location_change').trigger('change');
                        }
                    });
                    $('#commonModal').modal('toggle');
                    return;
                });

                $(document).on('click', '.rotas_cteatetwo', function() {
                   
                   var form = $(this).parents('.rotas_cteate_frm');
                   var user_id = form.find('input[name="user_id"]').val();
                   var rotas_date = form.find('input[name="rotas_date"]').val();
                   var location_id = form.find('input[name="location_id"]').val();
                   var start_time = form.find('input[name="start_time"]').val();
                   var end_time = form.find('input[name="end_time"]').val();
                   var break_time = form.find('input[name="break_time"]').val();
                   var role_id = form.find('select[name="role_id"]').val();
                   var note = form.find('textarea[name="note"]').val();
                   var token = $('meta[name="csrf-token"]').attr('content');

                   var data = {
                       "_token": token,
                       "user_id": user_id,
                       "rotas_date": rotas_date,
                       "location_id": location_id,
                       "start_time": start_time,
                       "end_time": end_time,
                       "break_time": break_time,
                       "role_id": role_id,
                       "note": note,
                   }

                   $.ajax({
                       url: '<?php echo e(route('rotas.store')); ?>',
                       method: 'POST',
                       data: data,
                       success: function(data) {
                           console.log(data);
                           if (data["status"] == 'success') {
                               show_toastr('Success', data["msg"], 'success');
                           } else {
                               show_toastr('Error', data["msg"], 'error');
                           }

                           $("#loc_change").val("1");
                           $('.rotas_location_change').trigger('change');
                       }
                   });
                   $('#commonModal').modal('toggle');
                   return;
                });

                $(document).on('click', '.rotas_cteatethree', function() {
                   
                   var form = $(this).parents('.rotas_cteate_frm');
                   var user_id = form.find('input[name="user_id"]').val();
                   var rotas_date = form.find('input[name="rotas_date"]').val();
                   var location_id = form.find('input[name="location_id"]').val();
                   var start_time = form.find('input[name="start_time"]').val();
                   var end_time = form.find('input[name="end_time"]').val();
                   var break_time = form.find('input[name="break_time"]').val();
                   var role_id = form.find('select[name="role_id"]').val();
                   var note = form.find('textarea[name="note"]').val();
                   var token = $('meta[name="csrf-token"]').attr('content');

                   var data = {
                       "_token": token,
                       "user_id": user_id,
                       "rotas_date": rotas_date,
                       "location_id": location_id,
                       "start_time": start_time,
                       "end_time": end_time,
                       "break_time": break_time,
                       "role_id": role_id,
                       "note": note,
                   }

                   $.ajax({
                       url: '<?php echo e(route('rotas.store')); ?>',
                       method: 'POST',
                       data: data,
                       success: function(data) {
                           console.log(data);
                           if (data["status"] == 'success') {
                               show_toastr('Success', data["msg"], 'success');
                           } else {
                               show_toastr('Error', data["msg"], 'error');
                           }

                           $("#loc_change").val("2");
                           $('.rotas_location_change').trigger('change');
                       }
                   });
                   $('#commonModal').modal('toggle');
                   return;
                });

                $(document).on('click', '.rotas_edit_btn', function() {
                    var form = $(this).parents('.rotas_edit_frm');
                    var user_id = form.find('input[name="user_id"]').val();
                    var rotas_date = form.find('input[name="rotas_date"]').val();
                    var location_id = form.find('input[name="location_id"]').val();
                    var start_time = form.find('input[name="start_time"]').val();
                    var end_time = form.find('input[name="end_time"]').val();
                    var break_time = form.find('input[name="break_time"]').val();
                    var role_id = form.find('select[name="role_id"]').val();
                    var note = form.find('textarea[name="note"]').val();
                    var rotas_id = form.find('input[name="rotas_id"]').val();
                    var u_url = form.find('input[name="u_url"]').val();
                    var token = $('input[name="_token"]').val();

                    var data = {
                        "_token": token,
                        "rotas_id": rotas_id,
                        "user_id": user_id,
                        "rotas_date": rotas_date,
                        "location_id": location_id,
                        "start_time": start_time,
                        "end_time": end_time,
                        "break_time": break_time,
                        "role_id": role_id,
                        "note": note,
                    }

                    $.ajax({
                        url: u_url,
                        method: 'PUT',
                        data: data,
                        success: function(data) {
                            if (data["status"] == 'success') {
                                show_toastr('Success', data["msg"], 'success');
                            } else {
                                show_toastr('Error', data["msg"], 'error');
                            }
                            $('#commonModal').modal('toggle');
                            $('.rotas_location_change').trigger('change');
                        }
                    });
                    return;
                });

                $(document).on('click', '.delete_rotas_action', function() {
                    var id = $(this).attr('data-id');
                    var token = $('meta[name="csrf-token"]').attr('content');
                    var url = $(this).attr('action_url');
                    var data = {
                        "id": id,
                        "token": token,
                    }

                    $.ajax({
                        url: url,
                        method: 'DELETE',
                        data: data,
                        success: function(data) {
                            if (data["status"] == 'success') {
                                show_toastr('Success', data["msg"], 'success');
                            } else {
                                show_toastr('Error', data["msg"], 'error');
                            }
                            $("#loc_change").val('0');
                            $('.rotas_location_change').trigger('change');
                        }
                    });
                    return;
                });

                $(document).on('click', '.delete_rotas_action2', function() {
                    var id = $(this).attr('data-id');
                    var token = $('meta[name="csrf-token"]').attr('content');
                    var url = $(this).attr('action_url');
                    var data = {
                        "id": id,
                        "token": token,
                    }

                    $.ajax({
                        url: url,
                        method: 'DELETE',
                        data: data,
                        success: function(data) {
                            if (data["status"] == 'success') {
                                show_toastr('Success', data["msg"], 'success');
                            } else {
                                show_toastr('Error', data["msg"], 'error');
                            }
                            $("#loc_change").val('1');
                            $('.rotas_location_change').trigger('change');
                        }
                    });
                    return;
                });

                $(document).on('click', '.delete_rotas_action3', function() {
                    var id = $(this).attr('data-id');
                    var token = $('meta[name="csrf-token"]').attr('content');
                    var url = $(this).attr('action_url');
                    var data = {
                        "id": id,
                        "token": token,
                    }

                    $.ajax({
                        url: url,
                        method: 'DELETE',
                        data: data,
                        success: function(data) {
                            if (data["status"] == 'success') {
                                show_toastr('Success', data["msg"], 'success');
                            } else {
                                show_toastr('Error', data["msg"], 'error');
                            }
                            $("#loc_change").val('2');
                            $('.rotas_location_change').trigger('change');
                        }
                    });
                    return;
                });

            });

            $(document).on('click', '.Copy_Week_Shift', function() {
                var rotas_id_array = [];
                var rotas_id_array2 = [];
                var rotas_id_array3 = [];

                $(".work_sheet_table1 tbody .rotas_time").each(function(propName, index) {
                    var rotas_id = $(this).attr('data-rotas-id');
                    rotas_id_array[propName] = rotas_id;
                });

                var data = {
                    rotas_id_array: rotas_id_array
                }


                $.ajax({
                    url: '<?php echo e(route('copy_week_sheet3solo')); ?>',
                    method: 'POST',
                    data: data,
                    context: this,
                    success: function(data) {
                        if (data.status == 'success') {                            
                            show_toastr('Success', data["msg"], 'success');
                        } else {
                            show_toastr('Error', data["msg"], 'error');
                        }
                    }
                });

                $(".work_sheet_table2 tbody .rotas_time").each(function(propName, index) {
                    var rotas_id2 = $(this).attr('data-rotas-id');
                    rotas_id_array[propName] = rotas_id2;
                });

                var data2 = {
                    rotas_id_array: rotas_id_array
                }

                
                $.ajax({
                    url: '<?php echo e(route('copy_week_sheet3solo')); ?>',
                    method: 'POST',
                    data: data2,
                    context: this,
                    success: function(data) {
                        // if (data.status == 'success') {                            
                        //     show_toastr('Success', data["msg"], 'success');
                        // } else {
                        //     show_toastr('Error', data["msg"], 'error');
                        // }
                    }
                });


                $(".work_sheet_table3 tbody .rotas_time").each(function(propName, index) {
                    var rotas_id3 = $(this).attr('data-rotas-id');
                    rotas_id_array[propName] = rotas_id3;
                });

                var data3 = {
                    rotas_id_array: rotas_id_array
                }


                $.ajax({
                    url: '<?php echo e(route('copy_week_sheet3solo')); ?>',
                    method: 'POST',
                    data: data3,
                    context: this,
                    success: function(data) {
                        // if (data.status == 'success') {                            
                        //     show_toastr('Success', data["msg"], 'success');
                        // } else {
                        //     show_toastr('Error', data["msg"], 'error');
                        // }
                    }
                });
                
                
            });

            function publish_week() {
                var week = $('.week_add_sub').val();
                var created_by = $('.week_add_sub').attr('data-created-by');
                var location_id = $('.rotas_location_change').val();
                var data = {
                    week: week,
                    created_by: created_by,
                    location_id: location_id
                }

                $.ajax({
                    url: '<?php echo e(route('rotas.publish_weekthreesolo')); ?>',
                    method: 'POST',
                    data: data,
                    success: function(data) {
                        if (data["status"] == 'success') {
                            show_toastr('Success', data["msg"], 'success');
                        } else {
                            show_toastr('Error', data["msg"], 'error');
                        }
                        $('.work_sheet_table1 tbody .rotas_time1').removeClass('opacity-50');
                        $('[data-toggle="tooltip"]').tooltip();
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    }
                });  
                
                $.ajax({
                    url: '<?php echo e(route('rotas.publish_weekthreeduo')); ?>',
                    method: 'POST',
                    data: data,
                    success: function(data) {
                        // if (data["status"] == 'success') {
                        //     show_toastr('Success', data["msg"], 'success');
                        // } else {
                        //     show_toastr('Error', data["msg"], 'error');
                        // }
                        $('.work_sheet_table3 tbody .rotas_time1').removeClass('opacity-50');
                        $('[data-toggle="tooltip"]').tooltip();
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    }
                }); 

                $.ajax({
                    url: '<?php echo e(route('rotas.publish_weekthreetrio')); ?>',
                    method: 'POST',
                    data: data,
                    success: function(data) {
                        // if (data["status"] == 'success') {
                        //     show_toastr('Success', data["msg"], 'success');
                        // } else {
                        //     show_toastr('Error', data["msg"], 'error');
                        // }
                        $('.work_sheet_table3 tbody .rotas_time1').removeClass('opacity-50');
                        $('[data-toggle="tooltip"]').tooltip();
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    }
                }); 
            }

            function un_publish_week() {                
                    // $('.publish_shifs').on('click', '#un_publish_week', function() {
                        var week = $('.week_add_sub').val();
                        var created_by = $('.week_add_sub').attr('data-created-by');
                        var location_id = $('.rotas_location_change').val();
                        var data = {
                            week: week,
                            created_by: created_by,
                            location_id: location_id
                        }

                        $.ajax({
                            url: '<?php echo e(route('rotas.un_publish_weekthreesolo')); ?>',
                            method: 'POST',
                            data: data,
                            success: function(data) {
                                if (data["status"] == 'success') {
                                    show_toastr('Success', data["msg"], 'success');
                                } else {
                                    show_toastr('Error', data["msg"], 'error');
                                }
                                $('.work_sheet_table1 tbody .rotas_time1').addClass('opacity-50');
                                $('[data-toggle="tooltip"]').tooltip();
                                setTimeout(function() {
                                    location.reload();
                                }, 1000);
                            }
                        });

                        $.ajax({
                            url: '<?php echo e(route('rotas.un_publish_weekthreeduo')); ?>',
                            method: 'POST',
                            data: data,
                            success: function(data) {
                                if (data["status"] == 'success') {
                                    show_toastr('Success', data["msg"], 'success');
                                } else {
                                    show_toastr('Error', data["msg"], 'error');
                                }
                                $('.work_sheet_table2 tbody .rotas_time1').addClass('opacity-50');
                                $('[data-toggle="tooltip"]').tooltip();
                                setTimeout(function() {
                                    location.reload();
                                }, 1000);
                            }
                        });

                        $.ajax({
                            url: '<?php echo e(route('rotas.un_publish_weekthreetrio')); ?>',
                            method: 'POST',
                            data: data,
                            success: function(data) {
                                if (data["status"] == 'success') {
                                    show_toastr('Success', data["msg"], 'success');
                                } else {
                                    show_toastr('Error', data["msg"], 'error');
                                }
                                $('.work_sheet_table3 tbody .rotas_time1').addClass('opacity-50');
                                $('[data-toggle="tooltip"]').tooltip();
                                setTimeout(function() {
                                    location.reload();
                                }, 1000);
                            }
                        });
                    // });
            }
            
            function dragdrop() {
                $(".droppable-class").sortable({
                    revert: true
                });

                $(".draggable-class").draggable({
                    tolerance: "pointer",
                    connectToSortable: ".droppable-class",
                    helper: "clone",
                    start: function(event, ui) {
                        $('.work_sheet_table1 tbody tr td.droppable-class').addClass('tr-drop-zone');
                        $('.work_sheet_table1 tbody tr td .draggable-class').addClass('tr-drag-item-zindex');
                    },
                    drag: function(event, ui) {},
                    stop: function(event, ui) {
                        $('.work_sheet_table1 tbody tr td.droppable-class').removeClass('tr-drop-zone');
                        $('.work_sheet_table1 tbody tr td .draggable-class').removeClass('tr-drag-item-zindex');

                        var location_id = $('.rotas_location_change').val();
                        var created_by = $('.week_add_sub').attr('data-created-by');
                        var rotas_id = $(this).attr('data-rotas-id');

                        setTimeout(function() {
                            var drop_user_id = ui.helper.parents('.droppable-class').attr('data-id');
                            var drop_date = ui.helper.parents('.droppable-class').attr('data-date');
                            var data = {
                                drop_date: drop_date,
                                drop_user_id: drop_user_id,
                                rotas_id: rotas_id,
                                location_id: location_id,
                                created_by: created_by
                            }

                            if (drop_date != undefined) {
                                $.ajax({
                                    url: '<?php echo e(route('rotas.shift_copy')); ?>',
                                    method: 'post',
                                    data: data,
                                    success: function(data) {
                                        if (data['status'] == 'success') {
                                            ui.helper.html(data['shift']);
                                            ui.helper.attr('data-rotas-id', data['insert_id']);
                                            show_toastr('Success', data['msg'], 'success');
                                        } else {
                                            ui.helper.remove();
                                            show_toastr('Error', data['msg'], 'error');
                                        }
                                        $('[data-toggle="tooltip"]').tooltip();
                                        loadConfirm();
                                        $('.rotas_location_change').trigger('change');

                                        $('[data-toggle="tooltip"]').tooltip();

                                        if ($('.add_remove_dayeoff').css('display') != 'none') {
                                            $('.day_off_leave').show();
                                        } else {
                                            $('.day_off_leave').hide();
                                        }
                                    }
                                });
                            }
                        }, 1000);
                    }
                });
            }

            function seturl() {
                var week = $('.week_add_sub').val();
                var location_id = $('.rotas_location_change').val();
                var role_id = $('.rotas_role_change').val();
                var created_by = $('.week_add_sub').attr('data-created-by');

                var user_array = [];
                $(".work_sheet_table1 tbody tr").each(function(propName, index) {
                    var user_id = $(this).attr('data-user-id');
                    user_array[propName] = user_id;
                });

                var url = $('.share_rotas_cls').attr('data-url2');
                var new_url = url + '?loaction=' + location_id + '&create_by=' + created_by + '&role_id=' + role_id + '&week=' +
                    week + '&user=' + user_array;
                $('.share_rotas_cls').attr('data-url', new_url);
                $('.share_rotas_cls').attr('data-ajax-popup', true);

                if ($(".work_sheet_table1 tbody tr").attr('data-user-id') == undefined) {
                    $('.share_rotas_cls').attr('data-ajax-popup', false);
                }
            }

            function leave_show() {
                $('.day_off_leave').hide();
                if (!$("#hidedayoff").hasClass('hide_rss')) {
                    $('.day_off_leave').show();
                }


                $('.other_leave').hide();
                $('.holiday_leave').hide();
                if (!$("#hideleave").hasClass('hide_rss')) {
                    $('.other_leave').show();
                    $('.holiday_leave').show();
                }
                $('[data-toggle="tooltip"]').tooltip();
            }
        </script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sandbox\resources\views/rotas/three_weeks.blade.php ENDPATH**/ ?>