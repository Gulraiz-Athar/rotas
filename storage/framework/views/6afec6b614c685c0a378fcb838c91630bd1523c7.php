<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Employee')); ?>

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
                                <h4 class="m-b-10"><?php echo e(__('Employee')); ?></h4>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo e(url('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
                                <li class="breadcrumb-item"><?php echo e(__('Company')); ?></li>
                                <li class="breadcrumb-item"><?php echo e(__('Employee')); ?></li>
                            </ul>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end text-right">
                            <div class="btn btn-sm btn-primary btn-icon m-1">
                                <a href="<?php echo e(route('employee.export')); ?>" >
                                    <i class="ti ti-database-export text-white" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="<?php echo e(__('Export Employee CSV file')); ?>"></i>
                                </a>
                            </div>

                            <div class="btn btn-sm btn-primary btn-icon m-1">
                                <a href="#" data-url="<?php echo e(route('employee.file.import')); ?>" data-ajax-popup="true"
                                    data-title="<?php echo e(__('Import Employee CSV file')); ?>">
                                    <i class="ti ti-database-import text-white" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="<?php echo e(__('Import Employee CSV file')); ?>"></i>
                                </a>
                            </div>
                            <div class="btn-group card-option rotas_filter_main_div">
                                <button type="button" class="dropdown-toggle btn btn-sm btn-primary btn-icon m-1"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ti ti-dots-vertical" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Menu"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" style="">
                                    <a href="<?php echo e(url('employees')); ?>" onclick="window.location.href=this;"
                                        class="dropdown-item"><?php echo e(__('View Employees')); ?></a>
                                    <a href="<?php echo e(url('past-employees')); ?>" onclick="window.location.href=this;"
                                        class="dropdown-item"><?php echo e(__('Deleted Employees')); ?></a>
                                </div>
                            </div>

                            <div class="btn btn-sm btn-primary btn-icon m-1">
                                <a href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="<?php echo e(__('Create New Employee')); ?>" data-url="<?php echo e(route('employees.create')); ?>"
                                    data-size="md" data-ajax-popup="true" data-title="<?php echo e(__('Create New Employee')); ?>">
                                    <i class="ti ti-plus text-white"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <div class="row">
            	<!-- DIT commenting Current month Rota, useless reports on employee page
                <div class="col-lg-4 col-md-6">
                    <div class="card emp-card">
                        <div class="card-body">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-auto mb-3 mb-sm-0">
                                    <div class="d-flex align-items-center">
                                        <div class="theme-avtar bg-success">
                                            <i class="ti ti-users"></i>
                                        </div>
                                        <div class="ms-3">
                                            <small class="text-muted"> <?php echo e($box['total_employee']); ?></small>
                                            <h6 class="m-0"><?php echo e(__('Total Employee  ')); ?></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto text-end">
                                    <h4 class="m-0"><?php echo e($box['month_employee']); ?></h4>
                                    <small class="text-muted"><?php echo e(__('Current month new employee')); ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card emp-card">
                        <div class="card-body">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-auto mb-3 mb-sm-0">
                                    <div class="d-flex align-items-center">
                                        <div class="theme-avtar bg-warning">
                                            <i class="ti ti-calendar-time"></i>
                                        </div>
                                        <div class="ms-3">
                                            <small class="text-muted"><?php echo e($box['month_rotas']); ?></small>
                                            <h6 class="m-0"><?php echo e(__('Current Month Rotas')); ?></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto text-end">

                                    <h4 class="m-0"> <?php echo e(\App\Models\User::CompanycurrencySymbol()); ?>

                                        <?php echo e($box['month_rotas_cost']); ?></h4>
                                    <small class="text-muted"><?php echo e(__('Total cost : ')); ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                -->
                <div class="col-lg-4 col-md-12">
                    <div class="card emp-card">
                        <div class="card-body">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-auto mb-3 mb-sm-0">
                                    <div class="d-flex align-items-center">
                                        <div class="theme-avtar bg-danger">
                                            <i class="ti ti-user-off"></i>
                                        </div>
                                        <div class="ms-3">
                                            <small class="text-muted"><?php echo e($box['month_leave']); ?></small>
                                            <h6 class="m-0"><?php echo e(__('Current Month Leave')); ?></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto text-end">
                                    <h4 class="m-0"><?php echo e($box['month_comapany_leave_use']); ?></h4>
                                    <small class="text-muted"><?php echo e(__('Company Leave ')); ?> </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header card-body table-border-style">
                            <h5></h5>
                            <div class="table-responsive">
                                <table class="table mb-0 pc-dt-simple">
                                    <thead>
                                        <tr>
                                            <th scope="sort"><?php echo e(__('Name')); ?></th>
                                            <th scope="sort"><?php echo e(__('Status')); ?></th>
                                            <th scope="sort"><?php echo e(__('Email')); ?></th>
                                            <th scope="sort"><?php echo e(__('Locations')); ?></th>
                                            <th scope="sort"><?php echo e(__('Role')); ?></th>
                                            <th scope="sort"><?php echo e(__('Wage / Salary')); ?></th>
                                            <th scope="sort"><?php echo e(__('Weekly Hours')); ?></th>
                                            <th scope="sort" class="text-end"> <?php echo e(__('Action')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(!empty($employees) && count($employees) > 0): ?>
                                            <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr data-name="<?php echo e($employee->first_name); ?> <?php echo e($employee->last_name); ?>">
                                                    <th>
                                                        <div href="#" class="name h6 mb-0 text-sm"><?php echo e($employee->first_name); ?>

                                                            <?php echo e($employee->last_name); ?></div>
                                                    </th>
                                                    <td>
                                                        <?php if($employee->type == 'company'): ?>
                                                            <span
                                                                class="badge bg-primary p-2 px-3 rounded"><?php echo e(__('Administrator')); ?></span>
                                                        <?php elseif($employee->acount_type == 1): ?>
                                                            <span
                                                                class="badge bg-success p-2 px-3 rounded"><?php echo e(__('Admin')); ?></span>
                                                        <?php elseif($employee->acount_type == 2): ?>
                                                            <span
                                                                class="badge bg-info p-2 px-3 rounded"><?php echo e(__('Manager')); ?></span>
                                                        <?php else: ?>
                                                            <span
                                                                class="badge bg-danger p-2 px-3 rounded"><?php echo e(__('Employee')); ?></span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td> <?php echo e(!empty($employee->email)?$employee->email:''); ?> </td>
                                                    <td> <?php echo e($employee->getLocatopnName($employee->id)); ?> </td>
                                                    <td> <?php echo $employee->getDefaultEmployeeRole($employee->id); ?> </td>
                                                    <td> <?php echo e($employee->getwagesalary($employee->id)); ?> </td>
                                                    <td> <?php echo e($employee->getweeklyhours($employee->id)); ?> </td>
                                                    <td class="Action text-end rtl-actions">
                                                        <span>
                                                            <?php if($employee->type != 'company' && Auth::user()->type == 'company'): ?>
                                                                <?php if($employee->password == '' || $employee->password == null): ?>
                                                                    <div class="action-btn btn-secondary ms-2">
                                                                        <a href="#" class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                                                            onclick="showerrormsg()" >
                                                                            <i class="ti ti-settings text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Manage user type')); ?>" ></i>
                                                                        </a>
                                                                    </div>
                                                                <?php else: ?>
                                                                    <div class="action-btn btn-secondary ms-2 <?php echo e($employee->password == '' ? 'd-none' : ''); ?>">
                                                                        <a href="#" class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                                                            data-ajax-popup="true" data-title="<?php echo e(__('Manage user type')); ?>" data-size="lg"
                                                                            data-url="<?php echo e(route('employee.manage_permission', $employee->id)); ?>" >
                                                                            <i class="ti ti-settings text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Manage user type')); ?>" ></i>
                                                                        </a>
                                                                    </div>
                                                                <?php endif; ?>
                                                            <?php endif; ?>

                                                            <?php if($employee->password == ''): ?>
                                                            <div class="action-btn btn-info ms-2">
                                                                <a href="#" class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                                                    data-ajax-popup="true" data-title="<?php echo e(__('Manage type')); ?>" data-size="md"
                                                                    data-url="<?php echo e(route('employee.set_password', $employee->id)); ?>"
                                                                    >
                                                                    <i class="ti ti-lock text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Set Password')); ?>" ></i>
                                                                </a>
                                                            </div>
                                                            <?php endif; ?>

                                                            <div class="action-btn btn-info ms-2">
                                                                <a href="<?php echo e(url('profile/' . Crypt::encrypt($employee->id) . '')); ?>"
                                                                    class="mx-3 btn btn-sm d-inline-flex align-items-center" >
                                                                    <i class="ti ti-pencil text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Edit')); ?>" ></i>
                                                                </a>
                                                            </div>

                                                            <div class="action-btn btn-warning ms-2">
                                                                <a href="#" class="mx-3 btn btn-sm d-inline-flex align-items-center" data-size="md"
                                                                    data-url="<?php echo e(route('employee.reset', \Crypt::encrypt($employee->id))); ?>"
                                                                    data-ajax-popup="true" data-title="<?php echo e(__('Reset Password')); ?>">
                                                                    <i class="ti ti-shield-lock text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Reset Password')); ?>" ></i>
                                                                </a>
                                                            </div>

                                                            <div class="action-btn btn-danger ms-2"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="<?php echo e(__('Delete')); ?>">
                                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['employees.destroy', $employee->id]]); ?>

                                                                <a href="#!"
                                                                    class="mx-3 btn btn-sm show_confirm">
                                                                    <i class="ti ti-trash text-white"></i>
                                                                </a>
                                                                <?php echo Form::close(); ?>

                                                            </div>
                                                        </span>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="7">
                                                    <div class="text-center">
                                                        <i class="fas fa-users text-primary fs-40"></i>
                                                        <h2><?php echo e(__('Opps...')); ?></h2>
                                                        <h6> <?php echo __('No Employee found...!'); ?> </h6>
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
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('pagescript'); ?>
    <script>
        $(document).ready(function() {
            $(document).on('keyup', '.search-user', function() {
                var value = $(this).val();
                $('.employee_tableese tbody>tr').each(function(index) {
                    var name = $(this).attr('data-name');
                    if (name.includes(value)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        });

        function showerrormsg(event) {
            show_toastr('<?php echo e(__('Error')); ?>', '<?php echo __('You have to set password to manage user type'); ?>', 'error');
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sandbox\resources\views/employee/index.blade.php ENDPATH**/ ?>