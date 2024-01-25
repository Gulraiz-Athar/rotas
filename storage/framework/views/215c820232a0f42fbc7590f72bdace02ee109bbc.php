
<form method="post" class='rotas_ctrate_location rotas_cteate_frm'>
    <div class="row">
        <?php echo e(Form::input('hidden', 'user_id', $user_id)); ?>

        <?php echo e(Form::input('hidden', 'rotas_date', $date)); ?>

        <?php echo e(Form::input('hidden', 'location_id', $first_location, array('id' => 'rotas_ctrate_location'))); ?>


        <div class="col-4">
            <div class="form-group">
                <?php echo e(Form::label('', __('Start Time'), ['class' => 'form-label'])); ?>                
                <?php echo Form::time('start_time', null, ["class" => "form-control start_time rotas_time",  "placeholder" => "Select time" , 'required' => true]); ?>

            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <?php echo e(Form::label('', __('End Time'), ['class' => 'form-label'])); ?>

                <?php echo Form::time('end_time', null, ["class" => "form-control end_time rotas_time", "placeholder" => "Select time" , 'required' => true]); ?>

            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <?php echo e(Form::label('', __('Break'), ['class' => 'form-label'])); ?>

                <?php echo e(Form::input('number', 'break_time', 0, array('class' => 'form-control', 'required' => true, 'min' => 0))); ?>

                <small><?php echo e(__('in minute')); ?></small>
            </div>            
        </div>
        <div class="col-12">
            <div class="form-group">
                <?php echo e(Form::label('', __('Role'), ['class' => 'form-label'])); ?>

                <?php echo e(Form::select('role_id', $role_option,null, ['class' => 'form-control multi-select', 'id'=>'choices-multiplepop_roleotiuon' ])); ?>

            </div>
        </div>        
        <div class="col-12">
            <div class="form-group">
                <?php echo e(Form::label('', __('Note'), ['class' => 'form-label'])); ?>

                <?php echo e(Form::textarea('note', null, ['class' => 'form-control autogrow' ,'rows'=>'2' ,'style'=>'resize: none'])); ?>

                <small><?php echo e(__('Employees can only see notes for their own shifts')); ?></small>
            </div>
        </div>
        <div class="modal-footer border-0 p-0">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
            <button type="button" class="btn btn-primary rotas_cteatetwo"><?php echo e(__('Create')); ?></button>
        </div>
    </div>
</form>
<?php /**PATH C:\xampp\htdocs\sandbox\resources\views/rotas/createtwo.blade.php ENDPATH**/ ?>