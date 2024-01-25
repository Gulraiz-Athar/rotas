<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Profile')); ?>

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
                                <h4 class="m-b-10"><?php echo e(__('Account settings')); ?></h4>
                            </div>\
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo e(url('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
                                <li class="breadcrumb-item"><?php echo e(__('Account settings')); ?></li>
                            </ul>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end text-end">
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->

            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-xl-3">
                            <div class="card sticky-top" style="top:30px">
                                <div class="list-group list-group-flush" id="useradd-sidenav">
                                    <a href="#Site_Setting" class="list-group-item list-group-item-action border-0">
                                        <?php echo e(__('Basic')); ?>

                                        <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                                    </a>
                                    <?php if(Auth::user()->type == 'company'): ?>
                                    <a href="#Company_Details" class="list-group-item list-group-item-action border-0">
                                        <?php echo e(__('Company Details')); ?>

                                        <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                                    </a>
                                    <?php endif; ?>
                                    <?php if(!empty($userr->password)): ?>
                                        <a href="#Password" class="list-group-item list-group-item-action border-0">
                                            <?php echo e(__('Password')); ?>

                                            <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                                        </a>
                                    <?php endif; ?>
                                    <?php if(Auth::user()->acount_type == 1 || !empty($manager_option['manager_add_employees_and_manage_basic_information'])): ?>
                                        <a href="#Location" class="list-group-item list-group-item-action border-0">
                                            <?php echo e(__('Location')); ?>

                                            <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                                        </a>
                                        <a href="#Roles" class="list-group-item list-group-item-action border-0">
                                            <?php echo e(__('Roles')); ?>

                                            <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                                        </a>
                                        <a href="#Wage_Salary"
                                            class="list-group-item list-group-item-action border-0 <?php echo e($manager_option['wage_salary_display']); ?>">
                                            <?php echo e(__('Wage & Salary')); ?>

                                            <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                                        </a>
                                        <a href="#Work_Schedule"
                                            class="list-group-item list-group-item-action border-0 <?php echo e($manager_option['wage_salary_display']); ?>">
                                            <?php echo e(__('Work Schedule')); ?>

                                            <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9">
                            <div id="Site_Setting" class="card" style="display: flex;">
                                <div id="useradd-1" class="card bg-primary text-white">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar me-3">
                                                
                                                    <?php
                                                        $profile_pic=\App\Models\Utility::get_file(Auth::user()->getUserInfo->DefaultProfilePic());
                                                    ?>
                                                    <img class="theme-avtar" <?php if(!empty($profile_pic)): ?> src="<?php echo e($profile_pic); ?>" <?php else: ?>  avatar="<?php echo e($name); ?>" <?php endif; ?>>
                                            </div>
                                            <div class="d-block d-sm-flex align-items-center justify-content-between w-100">
                                                <div class="mb-3 mb-sm-0">
                                                    <h4 class="mb-1 text-white">
                                                        <?php echo e($profile->getUserName->first_name); ?>

                                                        <?php echo e($profile->getUserName->last_name); ?>

                                                    </h4>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-header">
                                    <h5><?php echo e(__('Basic')); ?></h5>
                                    <small
                                        class="text-muted"><?php echo e(__('Details about your Employee & Personal information')); ?></small>
                                </div>
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-sm-12 col-md-12 col-xxl-12">
                                            <div class="p-3 card">
                                                <ul class="nav nav-pills nav-fill" id="pills-tab" role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link active" id="pills-user-tab-1"
                                                            data-bs-toggle="pill" data-bs-target="#pills-user-1"
                                                            type="button"><?php echo e(__('Personal Detail')); ?></button>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link" id="pills-user-tab-2" data-bs-toggle="pill"
                                                            data-bs-target="#pills-user-2"
                                                            type="button"><?php echo e(__('Employee Detail')); ?></button>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="">
                                                <div class="card-body">
                                                    <div class="tab-content" id="pills-tabContent">
                                                        <div class="tab-pane fade show active" id="pills-user-1"
                                                            role="tabpanel" aria-labelledby="pills-user-tab-1">
                                                            <?php echo e(Form::model($profile, ['route' => ['profile.update', $profile->id], 'method' => 'PUT', 'class' => 'personal_information', 'enctype' => 'multipart/form-data'])); ?>

                                                            <div class="row">
                                                                <?php echo e(Form::hidden('employee_id', $profile->user_id)); ?>

                                                                <?php echo e(Form::hidden('form_type', 'personal')); ?>

                                                                <div class="col-xs-12 col-sm-12 col-md-4">
                                                                    <div class="form-group">
                                                                        <?php echo e(Form::label('', __('First Name'), ['class' => 'form-label'])); ?>

                                                                        <?php echo e(Form::text('first_name', $profile->getUserName->first_name, ['class' => 'form-control'])); ?>

                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-12 col-sm-12 col-md-4">
                                                                    <div class="form-group">
                                                                        <?php echo e(Form::label('', __('Middle Name'), ['class' => 'form-label'])); ?>

                                                                        <?php echo e(Form::text('middle_name', $profile->getUserName->middle_name, ['class' => 'form-control'])); ?>

                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-12 col-sm-12 col-md-4">
                                                                    <div class="form-group">
                                                                        <?php echo e(Form::label('', __('Last Name'), ['class' => 'form-label'])); ?>

                                                                        <?php echo e(Form::text('last_name', $profile->getUserName->last_name, ['class' => 'form-control'])); ?>

                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-12 col-sm-12 col-md-4">
                                                                    <div class="form-group">
                                                                        <?php echo e(Form::label('', __('Gender'), ['class' => 'form-label'])); ?>

                                                                        <?php echo e(Form::select('gender', ['male' => 'Male', 'female' => 'Female'], $profile->gender, ['class' => 'form-control multi-select', 'id' => 'choices-multiple', 'required' => false])); ?>

                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-12 col-sm-12 col-md-4">
                                                                    <div class="form-group">
                                                                        <?php echo e(Form::label('', __('Date of Birth'), ['class' => 'form-label'])); ?>

                                                                        <?php echo e(Form::date('date_of_birth', $profile->date_of_birth, ['class' => 'form-control'])); ?>

                                                                    </div>
                                                                </div>
                                                                <?php if(Auth::user()->acount_type == 2 || Auth::user()->acount_type == 1): ?>
                                                                <div class="col-xs-12 col-sm-12 col-md-4">
                                                                    <div class="row">
                                                                        <div class="col-xs-12 col-sm-12 col-md-4">
                                                                        <div class="form-group">
                                                                            <?php echo e(Form::label('', __('Profile Image'), ['class' => 'form-label'])); ?>

                                                                            <div>
                                                                                <label for="profile_pic"
                                                                                    class="form-label choose-files bg-primary "><i
                                                                                        class="ti ti-upload px-1"></i><?php echo e(__('Select Image')); ?></label>
                                                                                <input type="file" name="profile_pic"
                                                                                    id="profile_pic"
                                                                                    class="custom-input-file d-none"
                                                                                    onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                                                                <?php if($errors->has('profile_pic')): ?>
                                                                                    <span
                                                                                        class="help-block text-danger fs-12">
                                                                                        <strong><?php echo e($errors->first('profile_pic')); ?></strong>
                                                                                    </span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                        </div>
                                                                        <div class="col-xs-12 col-sm-12 col-md-4">
                                                                            <div class="logo-content mt-4">
                                                                                <img src="<?php echo e(asset(Storage::url($profile->DefaultProfilePic()))); ?>"
                                                                                   style=" height: 70px;"  id="blah"
                                                                                    class="img_setting">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php endif; ?>
                                                                <br>
                                                                <div class="card-header w-100 p-0 mb-3">
                                                                    <h5 class="h6 mb-4"><?php echo e(__('Emergency Contact')); ?>

                                                                    </h5>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                                                        <div class="form-group">
                                                                            <?php echo e(Form::label('', __('Emergency Contact Name'), ['class' => 'form-label'])); ?>

                                                                            <?php echo e(Form::text('emergency_contact_name', $profile->emergency_contact_name, ['class' => 'form-control'])); ?>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                                                        <div class="form-group">
                                                                            <?php echo e(Form::label('', __('Emergency Contact Phone Number'), ['class' => 'form-label'])); ?>

                                                                            <?php echo e(Form::text('emergency_contact_no', $profile->emergency_contact_no, ['class' => 'form-control'])); ?>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                                        <div class="form-group">
                                                                            <?php echo e(Form::label('', __('Relationship to Employee'), ['class' => 'form-label'])); ?>

                                                                            <?php echo e(Form::text('relationship_to_employee', $profile->relationship_to_employee, ['class' => 'form-control'])); ?>

                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <br>
                                                                <div class="card-header w-100 p-0 mb-3">
                                                                    <h5 class="h6 mb-4"><?php echo e(__('Contact Details')); ?>

                                                                    </h5>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                                        <div class="form-group">
                                                                            <?php echo e(Form::label('', __('Address'), ['class' => 'form-label'])); ?>

                                                                            <?php echo e(Form::text('address', $profile->address, ['class' => 'form-control'])); ?>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                                                        <div class="form-group">
                                                                            <?php echo e(Form::label('', __('City'), ['class' => 'form-label'])); ?>

                                                                            <?php echo e(Form::text('city', $profile->city, ['class' => 'form-control'])); ?>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                                                        <div class="form-group">
                                                                            <?php echo e(Form::label('', __('Country'), ['class' => 'form-label'])); ?>

                                                                            <?php echo e(Form::text('county', $profile->city, ['class' => 'form-control'])); ?>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                                                        <div class="form-group">
                                                                            <?php echo e(Form::label('', __('Postcode'), ['class' => 'form-label'])); ?>

                                                                            <?php echo e(Form::text('postcode', $profile->postcode, ['class' => 'form-control'])); ?>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                                                        <div class="form-group">
                                                                            <?php echo e(Form::label('', __('Email Address'), ['class' => 'form-label'])); ?>

                                                                            <?php echo e(Form::text('email', $profile->getUserName->email, ['class' => 'form-control'])); ?>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                                                        <div class="form-group">
                                                                            <?php echo e(Form::label('', __('Phone Number'), ['class' => 'form-label'])); ?>

                                                                            <?php echo e(Form::number('phone', $profile->phone, ['class' => 'form-control'])); ?>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <?php if(Auth::user()->acount_type == 2 || Auth::user()->acount_type == 1): ?>  
                                                                <div class="card-footer text-end py-0 pe-2 border-0">
                                                                    <input name="from" type="hidden"
                                                                        value="password">
                                                                    <button type="submit"
                                                                        class="btn btn-primary"><?php echo e(__('Save Changes')); ?></button>
                                                                </div>
                                                                <?php endif; ?>
                                                                <?php echo e(Form::close()); ?>

                                                            </div>

                                                        </div>
                                                            <div class="tab-pane fade" id="pills-user-2" role="tabpanel"
                                                                aria-labelledby="pills-user-tab-2">
                                                                <?php echo e(Form::model($profile, ['route' => ['profile.update', $profile->id], 'method' => 'PUT', 'class' => 'employee_information'])); ?>

                                                                <?php echo e(Form::hidden('employee_id', $profile->user_id)); ?>

                                                                <?php echo e(Form::hidden('form_type', 'employee')); ?>

                                                                <div class="row">
                                                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                                                        <div class="form-group">
                                                                            <?php echo e(Form::label('', __('Weekly Hours'), ['class' => 'form-label'])); ?>

                                                                            <?php echo e(Form::text('weekly_hour', $profile->weekly_hour, ['class' => 'form-control', 'placeholder' => '0'])); ?>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                                                        <div class="form-group">
                                                                            <?php echo e(Form::label('', __('Annual Holiday Allowance'), ['class' => 'form-label'])); ?>

                                                                            <div class="row">
                                                                                <div class="col-sm-7 ">
                                                                                    <?php echo e(Form::number('annual_holiday[time]', $profile->getAnnualHolidayTime(), ['class' => 'form-control', 'placeholder' => '0'])); ?>

                                                                                </div>
                                                                                <div class="col-sm-5">
                                                                                    <?php echo e(Form::select('annual_holiday[type]', ['day' => 'Days', 'hour' => 'Hours'], $profile->getAnnualHolidayTimeType(), ['class' => 'form-control multi-select', 'id' => 'choices-multiple'])); ?>

                                                                                </div>
                                                                            </div>
                                                                            <span class="clearfix"> </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                                                        <div class="form-group">
                                                                            <?php echo e(Form::label('', __('Start Date'), ['class' => 'form-label'])); ?>

                                                                            <?php echo e(Form::date('start_date', $profile->start_date, ['class' => 'form-control'])); ?>


                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                                                        <div class="form-group">
                                                                            <?php echo e(Form::label('', __('Final Working Date'), ['class' => 'form-label'])); ?>

                                                                            <?php echo e(Form::date('final_working_date', $profile->final_working_date, ['class' => 'form-control'])); ?>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                                                        <div class="form-group">
                                                                            <?php echo e(Form::label('', __('Employment Type'), ['class' => 'form-label'])); ?>

                                                                            <?php echo e(Form::select('employee_type', ['fulltime' => 'Full Time', 'parttime' => 'Part Time', 'fixedterm' => 'Fixed Term', 'casual' => 'Casual', 'apprentice_trainee' => 'Apprentice/Trainee', 'agency' => 'Agency', 'contractor_freelancer' => 'Contractor/Freelancer', 'temporary' => 'Temporary'], $profile->employee_type, ['class' => 'form-control multi-select', 'id' => 'choices-multiple'])); ?>

                                                                        </div>
                                                                    </div>
                                                                    <?php if(Auth::user()->acount_type == 2 || Auth::user()->acount_type == 1): ?>
                                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                                            <div class="form-group">
                                                                                <?php echo e(Form::label('', __('Notes'), ['class' => 'form-label'])); ?>

                                                                                <?php echo e(Form::textarea('note', $profile->note, ['class' => 'form-control autogrow', 'rows' => '3', 'style' => 'resize: none'])); ?>

                                                                            </div>
                                                                        </div>
                                                                    <?php endif; ?>
                                                                </div>
                                                                <hr>
                                                                <?php if(Auth::user()->acount_type == 2 || Auth::user()->acount_type == 1): ?>
                                                                <div class="card-footer text-end py-0 pe-2 border-0">
                                                                    <input name="from" type="hidden"
                                                                        value="password">
                                                                    <button type="submit"
                                                                        class="btn btn-primary"><?php echo e(__('Save Changes')); ?></button>
                                                                </div>
                                                                <?php endif; ?>
                                                                <?php echo e(Form::close()); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php if(Auth::user()->type == 'company'): ?>
                                <div id="Company_Details" class="card">
                                    <div class="card-header">
                                        <h5><?php echo e(__('Company Detail')); ?></h5>
                                        <small
                                            class="text-muted"><?php echo e(__('Details about your Company information')); ?></small>
                                    </div>
                                    <div class="card-body">
                                        <?php echo e(Form::model($profile, ['route' => ['profile.update', $profile->id], 'method' => 'PUT', 'class' => 'company_information'])); ?>

                                        <?php echo e(Form::hidden('employee_id', $profile->user_id)); ?>

                                        <?php echo e(Form::hidden('form_type', 'company_info')); ?>

                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-6">
                                                <div class="form-group">
                                                    <?php echo e(Form::label('', __('Company Name'), ['class' => 'form-label'])); ?>

                                                    <?php echo e(Form::text('company_name', !empty($userr->company_name) ? $userr->company_name : null, ['class' => 'form-control'])); ?>

                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-6">
                                                <div class="form-group">
                                                    <?php echo e(Form::label('', __('Company owner'), ['class' => 'form-label'])); ?>

                                                    <?php echo Form::select('company_owner', ['you' => 'You'], 'you', ['class' => 'form-control']); ?>

                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-6">
                                                <div class="form-group">
                                                    <?php echo e(Form::label('', __('Company Telephone Number'), ['class' => 'form-label'])); ?>

                                                    <?php echo Form::number(
                                                        'company_telephone_number',
                                                        !empty($company_detail['company_telephone_number']) ? $company_detail['company_telephone_number'] : null,
                                                        ['class' => 'form-control'],
                                                    ); ?>

                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-6">
                                                <div class="form-group">
                                                    <?php echo e(Form::label('', __('Postcode'), ['class' => 'form-label'])); ?>

                                                    <?php echo Form::text(
                                                        'company_postcode',
                                                        !empty($company_detail['company_postcode']) ? $company_detail['company_postcode'] : null,
                                                        ['class' => 'form-control'],
                                                    ); ?>

                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <?php echo e(Form::label('', __('Address'), ['class' => 'form-label'])); ?>

                                                    <?php echo Form::text(
                                                        'comapany_address',
                                                        !empty($company_detail['comapany_address']) ? $company_detail['comapany_address'] : null,
                                                        ['class' => 'form-control'],
                                                    ); ?>

                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-6">
                                                <div class="form-group">
                                                    <?php echo e(Form::label('', __('City'), ['class' => 'form-label'])); ?>

                                                    <?php echo Form::text(
                                                        'company_city',
                                                        !empty($company_detail['company_city']) ? $company_detail['company_city'] : null,
                                                        ['class' => 'form-control'],
                                                    ); ?>

                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-6">
                                                <div class="form-group">
                                                    <?php echo e(Form::label('', __('Country'), ['class' => 'form-label'])); ?>

                                                    <?php echo Form::text(
                                                        'comapany_county',
                                                        !empty($company_detail['comapany_county']) ? $company_detail['comapany_county'] : null,
                                                        ['class' => 'form-control'],
                                                    ); ?>

                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="card-footer text-end py-0 pe-2 border-0">
                                            <button type="submit" class="btn btn-primary"><?php echo e(__('Save Changes')); ?></button>
                                        </div>
                                        <?php echo e(Form::close()); ?>

                                    </div>
                                </div>
                                <?php endif; ?>

                                <div id="Password" class="card">
                                    <div class="card-header">
                                        <h5><?php echo e(__('Password')); ?></h5>
                                        <small class="text-muted"><?php echo e(__('Change Password')); ?></small>
                                    </div>
                                    <div class="card-body">
                                        <?php if(session('status')): ?>
                                            <div class="alert alert-success" role="alert">
                                                <?php echo e(session('status')); ?>

                                            </div>
                                        <?php endif; ?>

                                        <form method="POST" action="<?php echo e(route('update.password')); ?>" role="form">
                                            <?php echo csrf_field(); ?>
                                            <input name="form_type" type="hidden" value="set_own_password">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <?php echo e(Form::label('', __('Current Password'), ['class' => 'form-label'])); ?>

                                                        <?php echo e(Form::password('current_password', ['class' => 'form-control', 'placeholder' => 'Enter Current Password', 'id' => 'current_password'])); ?>

                                                    </div>
                                                    <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-current_password" role="alert">
                                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                                        </span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <?php echo e(Form::label('', __('New Password'), ['class' => 'form-label'])); ?>

                                                        <?php echo e(Form::password('new_password', ['class' => 'form-control', 'placeholder' => 'Enter New Password', 'id' => 'new_password'])); ?>

                                                    </div>
                                                    <?php $__errorArgs = ['new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-new_password" role="alert">
                                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                                        </span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <?php echo e(Form::label('', __('Re-type New Password'), ['class' => 'form-label'])); ?>

                                                        <?php echo e(Form::password('confirm_password', ['class' => 'form-control', 'placeholder' => 'Enter Re-type New Password', 'id' => 'confirm_password'])); ?>

                                                    </div>
                                                    <?php $__errorArgs = ['confirm_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-confirm_password" role="alert">
                                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                                        </span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                            <div class="card-footer text-end py-0 pe-2 border-0">
                                                <input class="btn btn-primary " type="submit" value="Save Changes">
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <?php if(Auth::user()->acount_type == 1): ?>
                                <div id="Location" class="card">
                                    <div class="card-header">
                                        <h5><?php echo e(__('Location Setting')); ?></h5>
                                        <small
                                            class="text-muted"><?php echo e(__('Details about your Location information')); ?></small>
                                    </div>
                                    <div class="card-body">
                                        <?php echo e(Form::model($profile, ['route' => ['profile.update', $profile->id], 'method' => 'PUT', 'class' => 'loaction_information'])); ?>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <?php echo e(Form::label('', __('Set Location'), ['class' => 'form-label'])); ?>

                                                    <?php echo Form::select('location_id[]', $all_location_option, $profile->location_id, [
                                                        'required' => false,
                                                        'multiple' => 'multiple',
                                                        'class' => 'form-control multi-select',
                                                        'id' => 'choices-multiple12',
                                                    ]); ?>

                                                    <?php echo e(Form::hidden('employee_id', $profile->user_id)); ?>

                                                    <?php echo e(Form::hidden('form_type', 'loaction')); ?>

                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="card-footer text-end py-0 pe-2 border-0">
                                            <button type="submit" class="btn btn-primary"><?php echo e(__('Save Changes')); ?></button>
                                        </div>
                                        <?php echo e(Form::close()); ?>

                                    </div>
                                </div>

                                <div id="Roles" class="card">
                                    <div class="card-header">
                                        <h5><?php echo e(__('Roles')); ?></h5>
                                        <small
                                            class="text-muted"><?php echo e(__('Details about your Roles information')); ?></small>
                                    </div>
                                    <div class="card-body">
                                        <?php echo e(Form::model($profile, ['route' => ['profile.update', $profile->id], 'method' => 'PUT', 'class' => 'role_information'])); ?>

                                        <?php echo e(Form::hidden('employee_id', $profile->user_id)); ?>

                                        <?php echo e(Form::hidden('form_type', 'role')); ?>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <?php echo e(Form::label('', __('Set Role'), ['class' => 'form-label'])); ?>

                                                    <?php echo Form::select('role_id[]', $role_options, $profile->role_id, [
                                                        'required' => false,
                                                        'multiple' => 'multiple',
                                                        'class' => 'form-control multi-select',
                                                        'id' => 'choices-multiple3',
                                                    ]); ?>

                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="card-footer text-end py-0 pe-2 border-0">
                                            <button type="submit" class="btn btn-primary"><?php echo e(__('Save Changes')); ?></button>
                                        </div>
                                        <?php echo e(Form::close()); ?>

                                    </div>
                                </div>

                                <div id="Wage_Salary" class="card">
                                    <div class="card-header">
                                        <h5><?php echo e(__('Wage & Salary')); ?></h5>
                                        <small class="text-muted"><?php echo e(__('Details about your Wage & Salary')); ?></small>
                                    </div>
                                    <div class="card-body">
                                        <?php echo e(Form::model($profile, ['route' => ['profile.update', $profile->id], 'method' => 'PUT', 'class' => 'salary_information'])); ?>

                                        <?php echo e(Form::hidden('employee_id', $profile->user_id)); ?>

                                        <?php echo e(Form::hidden('form_type', 'salary')); ?>

                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label"> <?php echo e(__('Default Wage / Salary')); ?>

                                                    </label>
                                                    <span class="clearfix"> </span>
                                                    <div class="col-sm-5 col-md-5 float-start px-2">
                                                        <div class="input-group">
                                                            <span
                                                                class="input-group-text"><?php echo e(\App\Models\User::CompanycurrencySymbol()); ?></span>
                                                            <?php echo e(Form::number('default_salary[salary]', !empty($profile->CustomDefaultSalary()['salary']) ? $profile->CustomDefaultSalary()['salary'] : null, ['class' => 'form-control', 'step' => '0.01', 'min' => '0.00'])); ?>

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-7 col-md-7 float-start px-2">
                                                        <?php echo Form::select(
                                                            'default_salary[salary_per]',
                                                            ['hourly' => 'Per Hour'],
                                                            !empty($profile->CustomDefaultSalary()['salary_per']) ? $profile->CustomDefaultSalary()['salary_per'] : null,
                                                            ['required' => false, 'id' => 'choices-multiple-location_id', 'class' => 'form-control multi-select'],
                                                        ); ?>

                                                    </div>
                                                    <span class="clearfix"> </span>
                                                </div>
                                            </div>
                                        </div>

                                        <br>
                                        <div class="card-header w-100 p-0 mb-3">
                                            <h5 class="h6 mb-4">
                                                <span data-toggle="tooltip"
                                                    title="Pay codes are used by payroll systems to identify which pay rate should be applied to a number of hours worked. Apply a pay code to a custom role rate and any hours worked by this employee will be labelled with this pay code.">
                                                    <?php echo e(__('Custom Role Rates')); ?>

                                                </span>
                                            </h5>
                                        </div>
                                        <div class="row">
                                            <?php if(!empty($profile->role_id)): ?>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <?php $__currentLoopData = $custom_role_rates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $custom_role_rate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="form-group" data_id="<?php echo e($key); ?>">
                                                            <div class="row">
                                                                <div class="col-2">
                                                                    <span
                                                                        class="float-dark lh-50 text-dark"><?php echo e($custom_role_rate); ?>

                                                                    </span>
                                                                </div>
                                                                <div class="col-3">
                                                                    <div class="input-group input-group-merge">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <?php echo e(\App\Models\User::CompanycurrencySymbol()); ?>

                                                                            </span>
                                                                        </div>
                                                                        <?php echo e(Form::number('salary[' . $key . '][custom_salary_by_hour]', !empty($salary_data[$key]['custom_salary_by_hour']) ? $salary_data[$key]['custom_salary_by_hour'] : null, ['class' => 'form-control', 'step' => '0.01'])); ?>

                                                                    </div>
                                                                </div>
                                                                <div class="col-2 text-start text-dark"> <span
                                                                        class="lh-50">
                                                                        &nbsp; <?php echo e(__('Per Hour')); ?> </span>
                                                                </div>
                                                                <div class="col-3">
                                                                    <div class="input-group input-group-merge">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <?php echo e(\App\Models\User::CompanycurrencySymbol()); ?>

                                                                            </span>
                                                                        </div>
                                                                        <?php echo e(Form::number('salary[' . $key . '][custom_salary_by_shift]', !empty($salary_data[$key]['custom_salary_by_shift']) ? $salary_data[$key]['custom_salary_by_shift'] : null, ['class' => 'form-control', 'step' => '0.01'])); ?>

                                                                    </div>
                                                                </div>
                                                                <div class="col-2"> <span class="lh-50">
                                                                        &nbsp; <?php echo e(__('Per Shift')); ?> </span> </div>
                                                            </div>
                                                            <span class="clearfix"></span>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            <?php else: ?>
                                                <div class="col-xs-12 col-sm-12 col-md-12"> <?php echo e($custom_role_rates); ?>

                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <hr>
                                        <div class="card-footer text-end py-0 pe-2 border-0">
                                            <input name="from" type="hidden" value="password">
                                            <button type="submit" class="btn btn-primary"><?php echo e(__('Save Changes')); ?></button>
                                        </div>
                                        <?php echo e(Form::close()); ?>

                                    </div>
                                </div>
                                <?php endif; ?>


                                <div id="Work_Schedule" class="card">
                                    <div class="card-header">
                                        <h5><?php echo e(__('Work Schedule')); ?></h5>
                                        <small class="text-muted"><?php echo e(__('Details about your Work Schedule')); ?></small>
                                    </div>
                                    <div class="card-body">
                                        <small class="text-dark">
                                            <?php echo e(__("Use the work schedule to set your employee's regular days off. They will then display on the rota accordingly. Changes to work schedules will apply from the current day forwards.")); ?>

                                        </small>

                                        <?php echo e(Form::model($profile, ['route' => ['profile.update', $profile->id], 'method' => 'PUT', 'class' => 'work_table_information'])); ?>

                                        <?php echo e(Form::hidden('employee_id', $profile->user_id)); ?>

                                        <?php echo e(Form::hidden('form_type', 'work_table')); ?>

                                        <div class="row">
                                            <div class="col-xs-6 col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <?php echo e(Form::label('', __('Monday'), ['class' => 'form-label'])); ?>

                                                    <?php echo Form::select(
                                                        'work_schedule[monday]',
                                                        ['working' => __('Working'), 'day_off' => __('Day Off') , 'am_off' => __('AM Off'), 'pm_off' => __('PM Off')],
                                                        !empty($profile->WorkSchedule()['monday']) ? $profile->WorkSchedule()['monday'] : null,
                                                        [
                                                            'id' => 'choices-multiple-monday',
                                                            'class' => 'form-control multi-select',
                                                            'data-placeholder' => __('select option'),
                                                        ],
                                                    ); ?>

                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <?php echo e(Form::label('', __('Tuesday'), ['class' => 'form-label'])); ?>

                                                    <?php echo Form::select(
                                                        'work_schedule[tuesday]',
                                                        ['working' => __('Working'), 'day_off' => __('Day Off'), 'am_off' => __('AM Off'), 'pm_off' => __('PM Off')],
                                                        !empty($profile->WorkSchedule()['tuesday']) ? $profile->WorkSchedule()['tuesday'] : null,
                                                        [
                                                            'id' => 'choices-multiple-tuesday',
                                                            'class' => 'form-control multi-select',
                                                            'data-placeholder' => __('select option'),
                                                        ],
                                                    ); ?>

                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <?php echo e(Form::label('', __('Wednesday'), ['class' => 'form-label'])); ?>

                                                    <?php echo Form::select(
                                                        'work_schedule[wednesday]',
                                                        ['working' => __('Working'), 'day_off' => __('Day Off') , 'am_off' => __('AM Off'), 'pm_off' => __('PM Off')],
                                                        !empty($profile->WorkSchedule()['wednesday']) ? $profile->WorkSchedule()['wednesday'] : null,
                                                        [
                                                            'id' => 'choices-multiple-wednesday',
                                                            'class' => 'form-control multi-select',
                                                            'data-placeholder' => __('select option'),
                                                        ],
                                                    ); ?>

                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <?php echo e(Form::label('', __('Thursday'), ['class' => 'form-label'])); ?>

                                                    <?php echo Form::select(
                                                        'work_schedule[thursday]',
                                                        ['working' => __('Working'), 'day_off' => __('Day Off'), 'am_off' => __('AM Off'), 'pm_off' => __('PM Off')],
                                                        !empty($profile->WorkSchedule()['thursday']) ? $profile->WorkSchedule()['thursday'] : null,
                                                        [
                                                            'id' => 'choices-multiple-thursday',
                                                            'class' => 'form-control multi-select',
                                                            'data-placeholder' => __('select option'),
                                                        ],
                                                    ); ?>

                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <?php echo e(Form::label('', __('Friday'), ['class' => 'form-label'])); ?>

                                                    <?php echo Form::select(
                                                        'work_schedule[friday]',
                                                        ['working' => __('Working'), 'day_off' => __('Day Off'), 'am_off' => __('AM Off'), 'pm_off' => __('PM Off')],
                                                        !empty($profile->WorkSchedule()['friday']) ? $profile->WorkSchedule()['friday'] : null,
                                                        [
                                                            'id' => 'choices-multiple-friday',
                                                            'class' => 'form-control multi-select',
                                                            'data-placeholder' => __('select option'),
                                                        ],
                                                    ); ?>

                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <?php echo e(Form::label('', __('Saturday'), ['class' => 'form-label'])); ?>

                                                    <?php echo Form::select(
                                                        'work_schedule[saturday]',
                                                        ['working' => __('Working'), 'day_off' => __('Day Off'), 'am_off' => __('AM Off'), 'pm_off' => __('PM Off')],
                                                        !empty($profile->WorkSchedule()['saturday']) ? $profile->WorkSchedule()['saturday'] : null,
                                                        [
                                                            'id' => 'choices-multiple-saturday',
                                                            'class' => 'form-control multi-select',
                                                            'data-placeholder' => __('select option'),
                                                        ],
                                                    ); ?>

                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <?php echo e(Form::label('', __('Sunday'), ['class' => 'form-label'])); ?>

                                                    <?php echo Form::select(
                                                        'work_schedule[sunday]',
                                                        ['working' => __('Working'), 'day_off' => __('Day Off'), 'am_off' => __('AM Off'), 'pm_off' => __('PM Off')],
                                                        !empty($profile->WorkSchedule()['sunday']) ? $profile->WorkSchedule()['sunday'] : null,
                                                        [
                                                            'id' => 'choices-multiple-sunday',
                                                            'class' => 'form-control multi-select',
                                                            'data-placeholder' => __('select option'),
                                                        ],
                                                    ); ?>

                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <?php if(Auth::user()->acount_type == 2 || Auth::user()->acount_type == 1): ?>
                                        <div class="card-footer text-end py-0 pe-2 border-0">
                                            <input name="from" type="hidden" value="password">
                                            <button type="submit" class="btn btn-primary"><?php echo e(__('Save Changes')); ?></button>
                                        </div>
                                        <?php endif; ?>
                                        <?php echo e(Form::close()); ?>


                                    </div>
                                </div>


                            </div>
                        </div>
                        <!-- [ sample-page ] end -->
                    </div>
                </div>
            </div>
        </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sandbox\resources\views/profile/index.blade.php ENDPATH**/ ?>