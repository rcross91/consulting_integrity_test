 <aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User Profile-->
        <div class="user-profile">
            <div class="user-pro-body">
                <div>
                    <img src="<?= base_url('images/user.png') ?>" alt="user-img" class="img-circle">
                </div>
                <div class="dropdown">
                    <a href="javascript:void(0)" class="dropdown-toggle u-dropdown link hide-menu" data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false">Rafael Cruz Enjamio
                        <span class="caret"></span>
                    </a>
                    
                </div>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li >
                    <a aria-expanded="false" style="color: #8d97ad;" href="<?php echo base_url('/') ?>">
                        <i class="ti-home"></i>
                        <span class="hide-menu">Solutec</span>
                    </a>
                </li>

                <li >
                    <a aria-expanded="false" style="color: #8d97ad;" href="<?php echo base_url('areas-list') ?>">
                        <i class="ti-clipboard"></i>
                        <span class="hide-menu">Áreas</span>
                    </a>
                </li>

                 <li >
                    <a aria-expanded="false" style="color: #8d97ad;" href="<?php echo base_url('empleados-list') ?>">
                        <i class="ti-user"></i>
                        <span class="hide-menu">Empleados</span>
                    </a>
                </li>

                <li>
                    <a class="waves-effect waves-dark"aria-expanded="false" style="color: #8d97ad;"
                        >
                        <i class="far fa-circle text-success"></i>
                        <span class="hide-menu">Cerrar sesion</span>
                        
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>