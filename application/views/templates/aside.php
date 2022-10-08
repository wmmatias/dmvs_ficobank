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
            <li class="nav-item">
            <a <?= ($page === 'User') ? 'class="nav-link text-white active bg-gradient-primary""' : 'class="nav-link text-white"' ?> href="/dashboards/users">
                <span class="nav-link-text ms-1">Users</span>
            </a>
            </li>
            <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-muted text-uppercase text-xs text-white font-weight-bolder opacity-8">Transactions</h6>
            </li>
            <li class="nav-item">
            <a <?= ($page === 'Form') ? 'class="nav-link text-white active bg-gradient-primary""' : 'class="nav-link text-white"' ?> href="/dashboards/form">
                <span class="nav-link-text ms-1">Forms</span>
            </a>
            </li>
            <li class="nav-item">
                <a <?= ($page === 'Logs') ? 'class="nav-link text-white active bg-gradient-primary"' : 'class="nav-link text-white"' ?> href="/dashboards/history" >
                    <span class="nav-link-text ms-1">Documents</span>
                </a>
                <!-- <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    role="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false"
                    <li>
                        <a class="nav-dropdown-item" href="#">ROD</a>
                    </li>
                    <li>
                        <a class="nav-dropdown-item" href="#">Treasury</a>
                    </li>
                    <li>
                        <a class="nav-dropdown-item" href="#">LTO</a>
                    </li>
                    <li>
                        <a class="nav-dropdown-item" href="#">Office</a>
                    </li>
                    <hr class="horizontal light mt-0 mb-2">
                </ul> -->
            </li>
            <!-- <li class="nav-item">
            <a <?= ($page === 'Messages') ? 'class="nav-link text-white active bg-gradient-primary""' : 'class="nav-link text-white"' ?> href="/dashboards/messages">
                <span class="nav-link-text ms-1">Messages</span>
            </a>
            </li> -->
        </ul>
        </div>
        
        <div class="sidenav-footer position-absolute w-100 bottom-0 ">
            <div class="mx-3">
                <p class="text-muted ms-2 mb-5 text-white fw-bold nav-link">login as: <?=$level?></p>
            </div>
        </div>
    </aside>