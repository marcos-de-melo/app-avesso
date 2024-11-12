<?php
function activeLink($pageLinkActive)
{
    if (isset($_GET['page'])) {
        if ($pageLinkActive == $_GET['page']) {
            return 'active';
        }
    }
}
function activeLinkIcon($pageLinkActive)
{
    if (isset($_GET['page'])) {
        if ($pageLinkActive == $_GET['page']) {
            return '-fill';
        }
    }
}

?>
<aside id="sidebar" class="expand">
    <div class="d-flex">
        <button class="toggle-btn" type="button">
            <i class="lni lni-grid-alt"></i>
        </button>
        <div class="sidebar-logo">
            <a href="#">
                <img src="./img/logo.png" alt="">
            </a>
        </div>
    </div>
    <ul class="sidebar-nav">
        <li class="sidebar-item">
            <a href="?page=search" class="sidebar-link <?= activeLink('search') ?>">
                <img width="45px" src="./img/account.png" alt="">
                <span>Perfil</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="?page=home" class="sidebar-link <?= activeLink('home') ?>">
                <i class="bi bi-house<?= activeLinkIcon('home') ?>"></i>
                <span>Página inicial</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="?page=messages" class="sidebar-link <?= activeLink('messages') ?>">
                <i class="bi bi-chat-dots<?= activeLinkIcon('messages') ?>"></i>
                <span>Mensagens</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="?page=notifications" class="sidebar-link <?= activeLink('notifications') ?>">
                <i class="bi bi-envelope<?= activeLinkIcon('notifications') ?>"></i>
                <span>Notificações</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="?page=search" class="sidebar-link <?= activeLink('search') ?>">
                <i class="bi bi-search"></i>
                <span>Pesquisar</span>
            </a>
        </li>


        <!-- <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#multi" aria-expanded="false" aria-controls="multi">
                        <i class="lni lni-layout"></i>
                        <span>Multi Level</span>
                    </a>
                    <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse"
                                data-bs-target="#multi-two" aria-expanded="false" aria-controls="multi-two">
                                Two Links
                            </a>
                            <ul id="multi-two" class="sidebar-dropdown list-unstyled collapse">
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">Link 1</a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">Link 2</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li> -->


    </ul>
    <div class="sidebar-footer">
        <a href="?page=settings" class="sidebar-link <?= activeLink('settings') ?>">
            <i class="bi bi-gear<?= activeLinkIcon('settings') ?>"></i>
            <span>Configurações</span>
        </a>
        <a href="logout.php" class="sidebar-link">
            <i class="lni lni-exit"></i>
            <span>Logout</span>
        </a>
    </div>
</aside>