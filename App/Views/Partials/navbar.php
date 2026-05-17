<?php

use Framework\Session;
?>

<!-- Navbar -->

<header class="site-header">
    <div class="container mx-auto max-w-6xl px-4">
        <div class="header-inner">


            <h1 class="brand">
                <a href="/WS03/Public/">
                    <span class="brand-mark">P</span>
                    <span class="brand-text">Prosple</span>
                </a>
            </h1>

            <nav class="main-nav">
                <?php if (Session::has('user')) : ?>
                    <div class="flex justify-between items-center gap-4">
                        <div>Welcome <?= Session::get('user')['name'] ?? 'Guest' ?></div>
                        <form method="POST" action="/WS03/Public/auth/logout" class="d-inline">
                            <button type="submit" class="btn btn-link nav-link">Logout</button>
                        </form>

                        <a href="/WS03/Public/listings/create" class="btn btn-primary nav-cta">
                            <i class="fa fa-edit"></i>
                            <span>Post a Job</span>
                        </a>
                    </div>
                <?php else : ?>
                    <a href="/WS03/Public/auth/login" class="nav-link">Login</a>
                    <a href="/WS03/Public/auth/register" class="nav-link">Register</a>
                <?php endif; ?>

            </nav>
        </div>
    </div>
</header>