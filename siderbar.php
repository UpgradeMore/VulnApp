        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas"></i>
                </div>
                <div class="sidebar-brand-text mx-3">pentesting lab</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Vulnerablities
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsesql"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>SQL Injection</span>
                </a>
                <div id="collapsesql" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="sqli_1.php">SQL Injection (GET/Search)</a>
                        <a class="collapse-item" href="sqli_6.php">SQL Injection (GET/Select)</a>
                        <a class="collapse-item" href="sqli_2.php">SQL Injection (POST/Search)</a>
                        <a class="collapse-item" href="sqli_7.php">SQL Injection (POST/Select)</a>     
                        <a class="collapse-item" href="sqli_5.php">SQL Injection - Blind (WS/SOAP)</a>
                        <a class="collapse-item" href="sqli_4_1.php">SQL Injection - Blind - Boolean-Based</a>
                        <a class="collapse-item" href="sqli_14.php">SQL Injection - Blind (SQLite)</a>
                        <a class="collapse-item" href="sqli_3.php">SQL Injection - Blind - Time-Based</a>
                        <a class="collapse-item" href="sqli_12.php">SQL Injection - Stored (SQLite)</a>
                        <a class="collapse-item" href="sqli_8-1.php">SQL Injection - Stored (XML)</a>
                        <a class="collapse-item" href="sqli_11.php">SQL Injection (SQLite)</a>
                        <a class="collapse-item" href="sqli_16.php">Server-Side Includes (SSI) Injection</a>
                        <a class="collapse-item" href="sqli_4.php">SQL Injection - Authentication Bypass</a>
                    </div>
                </div>
                
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsebam"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Cross-Site Scripting (XSS)</span>
                </a>
                <div id="collapsebam" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="xss_ajax_2-1.php">Cross-Site Scripting - Reflected (AJAX/JSON)</a>
                        <a class="collapse-item" href="xss_ajax_1-1.php">Cross-Site Scripting - Reflected (AJAX/XML)</a>
                        <a class="collapse-item" href="xss_login.php">Cross-Site Scripting - Reflected (Login Form)</a>
                        <a class="collapse-item" href="xss_referer.php">Cross-Site Scripting - Reflected (Referer)</a>
                        <a class="collapse-item" href="xss_user_agent.php">Cross-Site Scripting - Reflected (User-Agent)</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsehtml"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>HTML Injection</span>
                </a>
                <div id="collapsehtml" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="htmli_get.php">Reflected(GET Method)</a>
                        <a class="collapse-item" href="htmli_post.php">Reflected(POST Method)</a>
                        <a class="collapse-item" href="htmli_stored.php">Stored(Blog)</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseosc"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>OS Command Injection</span>
                </a>
                <div id="collapseosc" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="os_cmd_i.php">Reflected(GET and POST)</a>
                        <a class="collapse-item" href="os_cmd_iblind.php">Blind(GET and POST)</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsephpc"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>PHP Code Injection</span>
                </a>
                <div id="collapsephpc" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="phpi.php">Reflected(GET)</a>
                    </div>
                </div>
            </li>
            
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsebasm"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Broken Auth. & Session Mgmt.</span>
                </a>
                <div id="collapsebasm" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="ba_forgotten.php">Broken Authentication - Forgotten Function</a>
                        <a class="collapse-item" href="ba_insecure_login_1.php">Broken Authentication - Insecure Login Forms</a>
                        <a class="collapse-item" href="ba_pwd_attacks_1.php">Broken Authentication - Password Attacks</a>
                        <a class="collapse-item" href="ba_weak_pwd.php">Broken Authentication - Weak Passwords</a>
                        <a class="collapse-item" href="smgmt_admin_portal.php">Session Management - Administrative Portals</a>
                    </div>
                </div>
            </li>


     
            <!-- Divider -->
            <hr class="sidebar-divider">

        

            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
 

        <!-- End of Sidebar -->