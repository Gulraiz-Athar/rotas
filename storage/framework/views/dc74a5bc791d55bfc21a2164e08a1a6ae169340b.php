<?php
// $logos=asset(Storage::url('uploads/logo/'));
$logos=\App\Models\Utility::get_file('uploads/logo/');
$company_logo = \App\Models\Utility::getValByName('company_logo');
$company_logos = \App\Models\Utility::getValByName('company_dark_logo');
$company_small_logo = Utility::getValByName('company_small_logo');
$setting = \App\Models\Utility::colorset();
$SITE_RTL= isset($setting['SITE_RTL'])?$setting['SITE_RTL']:'off';
$settings = \App\Models\Utility::settings();
?>

<?php if(isset($setting['cust_theme_bg']) && $setting['cust_theme_bg'] == 'on'): ?>
    <nav class="dash-sidebar light-sidebar transprent-bg">
<?php else: ?>
   <nav class="dash-sidebar light-sidebar">
<?php endif; ?>
  
      <div class="navbar-wrapper">
          <div class="m-header main-logo d-flex justify-content-center">
                  <?php if(!empty($darklayout) && $darklayout == 'on'): ?>
                  <img src="<?php echo e($logos.'/'.(isset($company_logo) && !empty($company_logo)?$company_logo:'logo-light.png')); ?>"
                  class="logo logo-lg" alt="..."  style="height=30px ; width: 135px !important;">
                  <?php else: ?>
                  <img src="<?php echo e($logos.'/'.(isset($company_logos) && !empty($company_logos)?$company_logos:'logo-dark.png')); ?>"
                  class="logo logo-lg" alt="..."  style="height=30px ; width: 135px !important;">
                  <?php endif; ?>
                  <a href="<?php echo e(url('dashboard')); ?>" class="b-brand">
                  <!-- ========   change your logo hear   ============ -->
              </a>
          </div>
          <div class="navbar-content">
              <ul class="dash-navbar">
                  <li class="dash-item
                  <?php echo e(Request::segment(1) == '' || Request::segment(1) == 'home' || Request::segment(1) == 'dashboard' || Request::segment(1) == 'day' || Request::segment(1) == 'user-view' ? 'active' : ''); ?>

                  ">
                      <a href="<?php echo e(url('dashboard')); ?>" class="dash-link">
                          <span class="dash-micon"> <i class="ti ti-home"></i> </span>
                          <span class="dash-mtext"><?php echo e(__('Dashboard')); ?></span>
                      </a>
                  </li>

                  <?php if(Auth::user()->type != 'super admin'): ?>
                      <!-- Rotas  -->
                      <li class="dash-item dash-hasmenu <?php echo e(Request::segment(1) == 'past-employees' || Request::segment(1) == 'profile' ? 'active dash-trigger' : ''); ?>">
                          <a href="#" class="dash-link">
                              <span class="dash-micon"> <i class="ti ti-calendar-event"></i> </span>
                              <span class="dash-mtext"><?php echo e(__('Rotas')); ?></span>
                              <span class="dash-arrow"><i data-feather="chevron-right"></i></span>
                          </a>
                            <ul class="dash-submenu">
                                <?php if(Auth::user()->acount_type == 1 || Auth::user()->getAddEmployeePermission() == 1): ?>
                                    <li
                                        class="dash-item <?php echo e(Request::segment(1) == 'past-employees' || Request::segment(1) == 'profile' ? 'active' : ''); ?>">
                                        <a href="<?php echo e(url('rotas')); ?>"
                                            class="dash-link"><?php echo e(__('Current Week')); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(Auth::user()->acount_type == 1): ?>
                                    <li class="dash-item">
                                        <a href="<?php echo e(route('two_weeks')); ?>"
                                            class="dash-link"><?php echo e(__('2 Weeks')); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(Auth::user()->acount_type == 1): ?>
                                    <li class="dash-item">
                                        <a href="<?php echo e(route('three_weeks')); ?>"
                                            class="dash-link"><?php echo e(__('3 Weeks')); ?></a>
                                    </li>
                                <?php endif; ?>
                                <?php if(Auth::user()->acount_type == 1): ?>
                                    <li class="dash-item">
                                        <a href="<?php echo e(route('four_weeks')); ?>"
                                            class="dash-link"><?php echo e(__('4 Weeks')); ?></a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                      </li>

                      <?php if(Auth::user()->acount_type == 1 || Auth::user()->getAddEmployeePermission() == 1): ?>
                          <li
                              class="dash-item dash-hasmenu <?php echo e(Request::segment(1) == 'past-employees' || Request::segment(1) == 'profile' ? 'active dash-trigger' : ''); ?>">
                              <a href="#!" class="dash-link">
                                  <span class="dash-micon"><i class="ti ti-vocabulary"></i></span>
                                  <span class="dash-mtext"><?php echo e(__('Company')); ?></span>
                                  <span class="dash-arrow"><i data-feather="chevron-right"></i></span>
                              </a>
                              <ul class="dash-submenu">
                                  <?php if(Auth::user()->acount_type == 1 || Auth::user()->getAddEmployeePermission() == 1): ?>
                                      <li
                                          class="dash-item <?php echo e(Request::segment(1) == 'past-employees' || Request::segment(1) == 'profile' ? 'active' : ''); ?>">
                                          <a href="<?php echo e(url('employees')); ?>"
                                              class="dash-link"><?php echo e(__('Employee')); ?></a>
                                      </li>
                                  <?php endif; ?>
                                  <?php if(Auth::user()->acount_type == 1): ?>
                                      <li class="dash-item">
                                          <a href="<?php echo e(url('locations')); ?>"
                                              class="dash-link"><?php echo e(__('Location')); ?></a>
                                      </li>
                                  <?php endif; ?>
                                  <?php if(Auth::user()->acount_type == 1 || Auth::user()->getAddRolePermission() == 1): ?>
                                      <li class="dash-item">
                                          <a href="<?php echo e(url('roles')); ?>" class="dash-link"><?php echo e(__('Role')); ?></a>
                                      </li>
                                  <?php endif; ?>
                              </ul>
                          </li>
                      <?php endif; ?>
                      <!-- Leave  -->
                      <li
                          class="dash-item <?php echo e(Request::segment(1) == 'holidays' || Request::segment(1) == 'embargoes' || Request::segment(1) == 'leave-request' ? 'active' : ''); ?>">
                          <a href="<?php echo e(url('holidays')); ?>" class="dash-link">
                              <span class="dash-micon"> <i class="ti ti-user-off"></i> </span>
                              <span class="dash-mtext"><?php echo e(__('Leave')); ?></span>
                          </a>
                      </li>
                      <!-- Availability  -->
                      <?php if(Auth::user()->getViewAvailabilities() == 1): ?>
                          <li class="dash-item">
                              <a href="<?php echo e(url('availabilities')); ?>" class="dash-link">
                                  <span class="dash-micon"> <i class="ti ti-antenna-bars-5"></i> </span>
                                  <span class="dash-mtext"><?php echo e(__('Availability')); ?></span>
                              </a>
                          </li>
                      <?php endif; ?>
                      <?php if(Auth::user()->type != 'super admin'): ?>
                      <!-- Settings  -->
                      <li class="dash-item <?php echo e(Request::segment(1) == 'contract' ? 'active' : ''); ?>">
                          <a href="<?php echo e(url('contract')); ?>" class="dash-link">
                              <span class="dash-micon"> <i class="ti ti-device-floppy"></i> </span>
                              <span class="dash-mtext"><?php echo e(__('Contract')); ?></span>
                          </a>
                      </li>
                      <?php endif; ?>
                  	  <?php if(Auth::user()->type == 'company' || \Auth::user()->acount_type == 1): ?>
                      <!-- Settings  -->
                      <li class="dash-item">
                          <a href="<?php echo e(url('contract_type')); ?>" class="dash-link">
                              <span class="dash-micon"> <i class="ti ti-clipboard-check"></i> </span>
                              <span class="dash-mtext"><?php echo e(__('Contract Type')); ?></span>
                          </a>
                      </li>
                      <?php endif; ?>
                      <?php /* DIT Comment out Messenger tab
                      <!-- Chat  -->
                      <li class="dash-item">
                          <a href="{{ url('chats') }}" class="dash-link">
                              <span class="dash-micon"> <i class="ti ti-message"></i> </span>
                              <span class="dash-mtext">{{ __('Messenger') }}</span>
                          </a>
                      </li>
                      */?>
                  <?php endif; ?>
                  
                  <?php /* DIT Comment out Zoom tab
                  @if(Auth::user()->type != 'super admin')
                  <!-- Zoom  -->
                  <li class="dash-item {{ Request::segment(1) == 'zoommeeting' ? 'active' : '' }}">
                      <a href="{{ url('zoom-meeting') }}" class="dash-link">
                          <span class="dash-micon"> <i class="ti ti-award"></i> </span>
                          <span class="dash-mtext">{{ __('Zoom Meeting') }}</span>
                      </a>
                  </li>
                  @endif
                  */?>
                  
                  <?php if(Auth::user()->acount_type == 1 || Auth::user()->getviewRepotsPermission() == 1): ?>
                      <!-- Reports  -->
                      <li class="dash-item">
                          <a href="<?php echo e(url('reports')); ?>" class="dash-link">
                              <span class="dash-micon"> <i class="ti ti-notebook"></i> </span>
                              <span class="dash-mtext"><?php echo e(__('Reports')); ?></span>
                          </a>
                      </li>
                  <?php endif; ?>
                  <?php if(Auth::user()->acount_type == 1 && Auth::user()->type != 'employee'): ?>
                      <!-- Settings  -->
                      <li class="dash-item">
                          <a href="<?php echo e(url('setting')); ?>" class="dash-link">
                              <span class="dash-micon"> <i class="ti ti-settings"></i> </span>
                              <span class="dash-mtext"><?php echo e(__('Settings')); ?></span>
                          </a>
                      </li>
                  <?php endif; ?>
                  
                   
              </ul>
          </div>
      </div>
  </nav>
<?php /**PATH C:\xampp\htdocs\sandbox\resources\views/partision/sidebar.blade.php ENDPATH**/ ?>