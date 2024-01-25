<?php echo e(Form::open(['url' => 'employees', 'enctype' => 'multipart/form-data'])); ?>

    <div class="form-group">
        <div class="row">
            <div class="col-6">
                <?php echo e(Form::label('', __('First Name'), ['class' => 'form-label'])); ?>

                <?php echo e(Form::text('first_name', null, ['class' => 'form-control', 'required' => ''])); ?>

            </div>
            <div class="col-6">
                <?php echo e(Form::label('', __('Last Name'), ['class' => 'form-label'])); ?>

                <?php echo e(Form::text('last_name', null, ['class' => 'form-control', 'required' => ''])); ?>

            </div>
        </div>
    </div>
    <div class="form-group">
        <?php echo e(Form::label('', __('Email'), ['class' => 'form-label'])); ?>

        <?php echo e(Form::email('email', null, ['class' => 'form-control', 'required' => ''])); ?>

    </div>
    <div class="form-group">
        <?php echo e(Form::label('', __('Employee Role'), ['class' => 'form-label'])); ?>

        <?php echo e(Form::select('role_id[]', $role_select,null, ['class' => 'form-control multi-select', 'id'=>'choices-multiple' ,'multiple'=>'','required'=>false])); ?>

    </div>
    <div class="form-group">
        <?php echo e(Form::label('', __('Location'), ['class' => 'form-label'])); ?>

        <?php echo Form::select('location_id[]', $location_select, null, ['required' => false, 'multiple' => 'multiple', 'id'=>'choices-multiple-location_id' ,'class'=> 'form-control multi-select']); ?>

    </div>
    <div class="modal-footer border-0 p-0">
        <button type="button" class="btn  btn-light" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>   
        <button type="submit" class="btn  btn-primary"><?php echo e(__('Create')); ?></button>
    </div>
<?php echo e(Form::close()); ?>

<?php /**PATH C:\xampp\htdocs\sandbox\resources\views/employee/create.blade.php ENDPATH**/ ?>