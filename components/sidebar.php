<?php 
    $user = $auth->user;
    $sql = "SELECT A.kode_menu,A.grup_menu,A.caption FROM menus A 
            INNER JOIN roles B ON B.menu_id = A.id
            WHERE B.jabatan_id='$user->jabatan_id'
            ORDER BY A.grup_menu ASC";
    $action = $conn->prepare($sql);
    $action->execute();
    $rrs = $action->get_result();
    $menu = [];
    $grp = "";
    while ($rs = $rrs->fetch_assoc()) {
        $tm = ToObj($rs);
        if($tm->grup_menu!==$grp){
            $grp = $tm->grup_menu;
            $menu[$grp] = [];
        }
        $menu[$grp][] = $tm;
    }

    $action->close();

?>

        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-file"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SISPENSUR</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?=$BASE_URL?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->

            <hr class="sidebar-divider">
            <?php foreach ($menu as $key => $value): ?>
                <div class="sidebar-heading">
                    <?=$key?>
                </div>
                <?php foreach ($value as $ckey => $cvalue): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=$cvalue->kode_menu?>">
                            <i class="fas fa-fw fa-chart-area"></i>
                            <span><?=$cvalue->caption?></span></a>
                    </li>

                <?php endforeach ?>     
                <hr class="sidebar-divider">
            <?php endforeach; ?>
                    <li class="nav-item">
                        <a class="nav-link" href="auth/logout.php">
                            <i class="fas fa-fw fa-chart-area"></i>
                            <span>Logout</span></a>
                    </li>
                    


            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>