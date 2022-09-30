<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$current_user_id = $this->session->userdata('user_id');
$page = $this->session->userdata('page');
$level = $this->session->userdata('level');
?>
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
        <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
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
            <a <?= ($page === 'Logs') ? 'class="nav-link text-white active bg-gradient-primary""' : 'class="nav-link text-white"' ?> href="/dashboards/logs">
                <span class="nav-link-text ms-1">Logs</span>
            </a>
            </li>
            <li class="nav-item">
            <a <?= ($page === 'Messages') ? 'class="nav-link text-white active bg-gradient-primary""' : 'class="nav-link text-white"' ?> href="/dashboards/messages">
                <span class="nav-link-text ms-1">Messages</span>
            </a>
            </li>
        </ul>
        </div>
        <p class="text-muted fixed-bottom ms-5 mb-5 text-white fw-bold nav-link">login as: <?=$level?></p>
    </aside>