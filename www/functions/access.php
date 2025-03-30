<?php

function is_auth()
{
    if (isset($_SESSION['username']))
        return true;


    return false;
}

function is_admin()
{
    if (isset($_SESSION['role']) && $_SESSION['role'] === "admin") {
        return true;
    }

    return false;
}

function logout()
{
    if (isset($_SESSION['username'])) {
        unset($_SESSION['username']);
        unset($_SESSION['role']);
    }
    ;

    echo "<script> location.href='" . HOST . "'; </script>";
    exit;
}