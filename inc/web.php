<?php

// Redirect to error page if user is not authenticated or if user is authenticated but not verified, and trying to access /profile or /admin
if (auth() && !authVerify(USERS) || in_array(SLUG, ["/profile", "/admin"]) && !auth()) {
    if (logout()) redirect(DIR . "login" . PHP_EXTENSION);
    redirect(DIR . "error");
}

if (!empty($_GET["logout"])) {
    if (auth()) {
        if (logout()) redirect(DIR . "login" . PHP_EXTENSION . "?ms=exi&msm=sesionfinalizada");
        redirect(DIR . "error");
    }
}

if (in_array(SLUG, ["/login", "/register", "/forgot-password"])) {
    if (auth()) redirect(DIR . "profile" . PHP_EXTENSION);
    require_once __DIR__ . "/auth.php";
}

if (SLUG == "/admin") {
    if (!isAdmin()) redirect(DIR . "login" . PHP_EXTENSION . "?ms=err&msm=accdenegado");
    require_once __DIR__ . "/admin.php";
    echo view("admin", $admin);
    return;
}

require_once __DIR__ . "/scripts/scrPosts.php";