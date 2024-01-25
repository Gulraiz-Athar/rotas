<footer class="dash-footer">
    <div class="footer-wrapper">
        <div class="py-1">
            <span class="text-muted"><?php echo e(__('Copyright')); ?> <?php echo e((App\Models\Utility::getValByName('footer_text')) ? App\Models\Utility::getValByName('footer_text') :config('app.name', 'WorkGo')); ?> <?php echo e(date('Y')); ?></span>
        </div>
    </div>
</footer>
<?php /**PATH C:\xampp\htdocs\sandbox\resources\views/partision/footer.blade.php ENDPATH**/ ?>