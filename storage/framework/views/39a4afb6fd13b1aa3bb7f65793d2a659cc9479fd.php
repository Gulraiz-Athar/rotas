<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <?php echo e(Form::hidden('loaction_id', $rota['loaction_id'])); ?>

        <?php echo e(Form::hidden('role_id', $rota['role_id'])); ?>

        <?php echo e(Form::hidden('create_by', $rota['create_by'])); ?>

        <?php echo e(Form::hidden('week', $rota['week'])); ?>

        <?php echo e(Form::hidden('user_array', $rota['user_array'])); ?>

        <div class="form-group">
            <?php echo e(__('Share links provide read-only access to your rotas. By default anyone with the link can view all past and future rotas for this location.')); ?>

        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <div class="form-check form-check-inline">
                <input class="form-check-input set_expiry_date" type="checkbox" id="customCheckinlh3" value="yes" name="set_expiry_date">
                <label class="form-label" for="customCheckinlh3">
                    <?php echo e(__('Set expiry date')); ?>

                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input set_password" type="checkbox" id="customCheckinlh34" value="yes" name="set_password" checked> 
                <label class="form-label" for="customCheckinlh34">
                    <?php echo e(__('Only people with the password')); ?>

                </label>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 expiry_date_box" style="display: none;">
        <label for="" class="form-label"><?php echo e(__('Expiry Date')); ?></label>
        <div class="form-group">
            <input type="date" name="expiry_date" class="form-control" placeholder="Select date" value=""/>            
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 password_box">
        <label for="" class="form-label"><?php echo e(__('Set Password')); ?></label>
        <div class="form-group">
            <input type="password" name="share_password" class="form-control">
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12" id="copy_box" style="display: none;">
        <div class="input-group mb-3">
            <input type="text" id="click_link" class="form-control" aria-describedby="click_to_copy">
            <span class="input-group-text pointer" id="click_to_copy"> <i class="ti ti-copy"></i> </span>
        </div>        
    </div>

    <div class="col-12">
        <div class="modal-footer border-0 p-0">
            <button type="button" class="btn  btn-light" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>   
            <button type="submit" class="btn  btn-primary create_link"><?php echo e(__('Create Link')); ?></button>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\sandbox\resources\views/rotas/shift_share.blade.php ENDPATH**/ ?>