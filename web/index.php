<?php
    require_once __DIR__ . '/../vendor/autoload.php';
    //require_once  __DIR__ . '/../setup/setup_database.php';

    session_start();

    use Itb\WebApplication;

    $webApplication = new WebApplication();
    $webApplication->run();

