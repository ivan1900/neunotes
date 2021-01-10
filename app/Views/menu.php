<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                        <!-- <img alt="image" class="rounded-circle" src="img/profile_small.jpg"/> -->
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold"><?= $user ?></span>
                        <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> 
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a class="dropdown-item" href="profile.html">Profile</a></li>
                        <li><a class="dropdown-item" href="contacts.html">Contacts</a></li>
                        <li><a class="dropdown-item" href="mailbox.html">Mailbox</a></li>
                        <li class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="login.html">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
                <?php foreach ($menu as $item): ?>
                    <?php if($item->nivel() == "1"): ?>
                        <li  <?php if($actualPage == $item->ruta()): ?>
                                class="active"
                            <?php endif ?>>
                            <a href="<?=base_url() . '/' . $item->ruta(); ?>"><i class="fa <?= $item->fa(); ?>"></i> <span class="nav-label"><?= $item->elemento() ?>
                            <?php if ($item->padre() == 1): ?>
                                </span> <span class="fa arrow"></span>
                            <?php endif ?>
                            </a>
                        </li>
                    <?php elseif($item->nivel() == "2"): ?>
                        <ul class="nav nav-second-level collapse">
                            <li>
                                <a href="<?=$base_url . $item->ruta(); ?>"><?= $item->elemento() ?></a>
                            </li>
                        </ul>
                    <?php endif ?>
                <?php endforeach;?>
        </ul>
    </div>
</nav>