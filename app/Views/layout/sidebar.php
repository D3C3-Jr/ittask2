<div class="iq-sidebar  sidebar-default ">
    <div class="iq-sidebar-logo d-flex align-items-center">
        <a href="<?= base_url() ?>/backend/index.html" class="header-logo">
            <img src="<?= base_url() ?>/assets/images/logo-it.png" alt="logo">
            <h3 class="logo-title light-logo">itventory</h3>
        </a>
        <div class="iq-menu-bt-sidebar ml-0">
            <i class="las la-bars wrapper-menu"></i>
        </div>
    </div>
    <div class="data-scrollbar" data-scroll="1">
        <nav class="iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="iq-menu">
                <li class="<?= ($title == 'Home') ? 'active' : '' ?>">
                    <a href="/" class="svg-icon">
                        <i class="fas fa-house ml-1 mr-3"></i> Home
                    </a>
                </li>
                <li class="<?= ($title == 'Data Asset') ? 'active' : '' ?>">
                    <a href="/asset" class="svg-icon">
                        <i class="fas fa-boxes-stacked ml-1 mr-3"></i> Asset
                    </a>
                </li>
                <li class="<?= ($title == 'Task') ? 'active' : '' ?>">
                    <a href="/task" class="svg-icon">
                        <i class="fas fa-edit ml-1 mr-3"></i> Task
                    </a>
                </li>

                <li class="<?= ($title == 'Departemen') ? 'active' : '' ?>">
                    <a href="#otherpage" class="collapsed" data-toggle="collapse" aria-expanded="false">
                        <i class="fas fa-key ml-1 mr-3"></i>
                        Master
                        <i class="las la-angle-right iq-arrow-right arrow-active"></i>
                        <i class="las la-angle-down iq-arrow-right arrow-hover"></i>
                    </a>
                    <ul id="otherpage" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li class="<?= ($title == 'Departemen') ? 'active' : '' ?>">
                            <a href="/departemen" class="svg-icon">
                                <i class="fas fa-circle fa-sm"></i>
                                <span class="ml-4">Departemen</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

        <div class="pt-5 pb-2"></div>
    </div>
</div>