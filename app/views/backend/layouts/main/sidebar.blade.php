<div id="sidebar" class="sidebar responsive ace-save-state">
  <script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

  <div class="sidebar-shortcuts" id="sidebar-shortcuts">
    <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
      <button class="btn btn-success">
        <i class="ace-icon fa fa-signal"></i>
      </button>

      <button class="btn btn-info">
        <i class="ace-icon fa fa-pencil"></i>
      </button>

      <button class="btn btn-warning">
        <i class="ace-icon fa fa-users"></i>
      </button>

      <button class="btn btn-danger">
        <i class="ace-icon fa fa-cogs"></i>
      </button>
    </div>

    <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
      <span class="btn btn-success"></span> <span class="btn btn-info"></span>

      <span class="btn btn-warning"></span> <span class="btn btn-danger"></span>
    </div>
  </div>
  <!-- /.sidebar-shortcuts -->

  <ul class="nav nav-list">
    <li class=""><a href="<?php echo Uri::to('system/dashboard', false); ?>"> <i
        class="menu-icon fa fa-tachometer"></i> <span class="menu-text">
          {{ Lang::get('backend.dashboard') }}</span>
    </a> <b class="arrow"></b></li>
    <?php if(\Auth::admin()->check()): ?>
        <?php if(\Session::has('backend.' . \Auth::admin()->get()->username)): ?>
            <?php
                $priviledges = json_decode(\Session::get('backend.' . \Auth::admin()->get()->username), true);
            ?>
            <?php foreach($priviledges as $_priviledge):?>
            <li class="">
                <a href="" class="dropdown-toggle">
                    <i class="menu-icon fa fa-<?php echo $_priviledge['icon']; ?>"></i>
                    <span class="menu-text"><?php echo $_priviledge['name']; ?></span>
                    <b class="arrow fa fa-angle-down"></b>
                </a>
                <b class="arrow"></b>
                <?php if(array_key_exists('children', $_priviledge) && is_array($_priviledge['children'])): ?>
                    <ul class="submenu">
                        <?php foreach($_priviledge['children'] as $_resource): ?>
                            <?php if($_resource['type'] == 'menu' && $_resource['is_menu']):?>
                            <li class="">
								                <a href="<?php echo Uri::to($_resource['pattern'], false); ?>">
									              <i class="menu-icon fa fa-caret-right"></i>
									              <?php echo $_resource['name']?>
								                </a>
								                <b class="arrow"></b>
							              </li>
							              <?php endif; ?>
							          <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </li>
            <?php endforeach; ?>
        <?php endif; ?>
    <?php endif; ?>
  </ul>
  <!-- /.nav-list -->

  <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
    <i id="sidebar-toggle-icon"
      class="ace-icon fa fa-angle-double-left ace-save-state"
      data-icon1="ace-icon fa fa-angle-double-left"
      data-icon2="ace-icon fa fa-angle-double-right"></i>
  </div>
</div>