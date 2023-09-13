<div class="iq-sidebar  sidebar-default ">
    <div class="iq-sidebar-logo d-flex align-items-center">
        <a href="<?= base_url() ?>/backend/index.html" class="header-logo">
            <img src="<?= base_url() ?>/assets/images/logo.svg" alt="logo">
            <h3 class="logo-title light-logo">Webkit</h3>
        </a>
        <div class="iq-menu-bt-sidebar ml-0">
            <i class="las la-bars wrapper-menu"></i>
        </div>
    </div>
    <div class="data-scrollbar" data-scroll="1">
        <nav class="iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="iq-menu">
                <li class="<?= ($title == 'Dashboard') ? 'active' : '' ?>">
                    <a href="#" class="svg-icon">
                        <i class="fas fa-house ml-1 mr-3"></i> Dashboard
                    </a>
                </li>
                <li class="<?= ($title == 'Data Asset') ? 'active' : '' ?>">
                    <a href="#" class="svg-icon">
                        <i class="fas fa-boxes-stacked ml-1 mr-3"></i> Asset
                    </a>
                </li>
                <li class="">
                    <a href="#" class="svg-icon">
                        <i class="fas fa-users ml-1 mr-3"></i> User
                    </a>
                </li>

                <li class=" ">
                    <a href="#otherpage" class="collapsed" data-toggle="collapse" aria-expanded="false">
                        <i class="fas fa-list ml-1 mr-3"></i>
                        Other Page
                        <i class="las la-angle-right iq-arrow-right arrow-active"></i>
                        <i class="las la-angle-down iq-arrow-right arrow-hover"></i>
                    </a>
                    <ul id="otherpage" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li class="">
                            <a href="../backend/timeline.html" class="svg-icon">
                                <svg class="svg-icon" id="p-dash016" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 6 12 12 16 14"></polyline>
                                </svg>
                                <span class="ml-4">Timeline</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="../backend/pages-invoice.html" class="svg-icon">
                                <svg class="svg-icon" id="p-dash07" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                    <polyline points="14 2 14 8 20 8"></polyline>
                                    <line x1="16" y1="13" x2="8" y2="13"></line>
                                    <line x1="16" y1="17" x2="8" y2="17"></line>
                                    <polyline points="10 9 9 9 8 9"></polyline>
                                </svg>
                                <span class="ml-4">Invoice</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="../backend/pages-blank-page.html">
                                <svg class="svg-icon" id="p-dash18" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                                    <polyline points="13 2 13 9 20 9"></polyline>
                                </svg>
                                <span class="ml-4">Blank Page</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="../backend/pages-maintenance.html">
                                <svg class="svg-icon" id="p-dash19" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path>
                                </svg>
                                <span class="ml-4">Maintenance</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

        <div class="pt-5 pb-2"></div>
    </div>
</div>