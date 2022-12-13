<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$current_user_id = $this->session->userdata('user_id');
$page = $this->session->userdata('page');
$level = $this->session->userdata('level');
?>
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
        <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="/">
            <!-- <img src="../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo"> -->
            <span class="ms-1 font-weight-bold text-white">FICOBank | DMVS</span>
        </a>
        </div>
        <hr class="horizontal light mt-0 mb-2">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a <?= ($page === 'Dashboard') ? 'class="nav-link text-white active bg-gradient-primary""' : 'class="nav-link text-white"' ?> href="/">
                <span class="nav-link-text ms-1">Dashboard</span>
            </a>
            </li>
<?php       if($level === 'Admin') {
?>            <li class="nav-item">
            <a <?= ($page === 'User') ? 'class="nav-link text-white active bg-gradient-primary""' : 'class="nav-link text-white"' ?> href="/dashboards/users">
                <span class="nav-link-text ms-1">Users</span>
            </a>
            </li>
            <li class="nav-item">
            <a <?= ($page === 'User Logs') ? 'class="nav-link text-white active bg-gradient-primary""' : 'class="nav-link text-white"' ?> href="/dashboards/users_logs">
                <span class="nav-link-text ms-1">Users Logs</span>
            </a>
            </li>
            <li class="nav-item">
            <!-- <a <?= ($page === 'Export') ? 'class="nav-link text-white active bg-gradient-primary""' : 'class="nav-link text-white"' ?> href="/dashboards/export_backup" onclick="return confirm('Are you sure you want to backup the DataBase?')">
                <span class="nav-link-text ms-1">Export Database</span>
            </a> -->
            </li>
<?php       }
?>            <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-muted text-uppercase text-xs text-white font-weight-bolder opacity-8">Transactions</h6>
            </li>
<?php       if($level === 'Admin' || $level === 'Bookeeper') {
?>            <li class="nav-item">
            <a <?= ($page === 'Form') ? 'class="nav-link text-white active bg-gradient-primary""' : 'class="nav-link text-white"' ?> href="/dashboards/form">
                <span class="nav-link-text ms-1">Forms</span>
            </a>
            </li>
<?php       }
?>            <li class="nav-item">
                <a <?= ($page === 'Logs') ? 'class="nav-link text-white active bg-gradient-primary dropdown-toggle"' : 'class="nav-link text-white dropdown-toggle"' ?> href="#" role="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="nav-link-text ms-1">Documents</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li>
                        <a class="nav-dropdown-item" href="/dashboards/offices">Office</a>
                    </li>
                    <li>
                        <a class="nav-dropdown-item" href="/dashboards/rod">ROD</a>
                    </li>
                    <li>
                        <a class="nav-dropdown-item" href="/dashboards/treasury">Treasury</a>
                    </li>
                    <li>
                        <a class="nav-dropdown-item" href="/dashboards/lto">LTO</a>
                    </li>
                    <hr class="horizontal light mt-0 mb-2">
                </ul>
            </li>
            <li class="nav-item">
            <a <?= ($page === 'Return') ? 'class="nav-link text-white active bg-gradient-primary""' : 'class="nav-link text-white"' ?> href="/dashboards/return_doc">
                <span class="nav-link-text ms-1">Returned Document</span>
            </a>
            </li>
            <li class="nav-item">
            <a <?= ($page === 'Block') ? 'class="nav-link text-white active bg-gradient-primary""' : 'class="nav-link text-white"' ?> href="/dashboards/block">
                <span class="nav-link-text ms-1">Block Document</span>
            </a>
            </li>
        </ul>
        </div>
        
        <div class="sidenav-footer position-absolute w-100 bottom-0 ">
            <div class="mx-3">
                <p class="text-muted ms-2 mb-5 text-white fw-bold nav-link">login as: 
<?php           if($this->session->userdata('auth')){
?>                    Manager
<?php           }
                elseif($this->session->userdata('mgr')){
?>                    Asst. Manager
<?php           }
                elseif($this->session->userdata('bkpr')){
?>                    <br>Bookeeper/Loan Officer
<?php           }
?>                <br>  
                <a href="/dashboards/change_password">Change Password</a> 
                </p>
            
            </div>
        </div>
    </aside>