<?php

require_once "../view/HomeView.php";

class HomeController
{
    private $homeView;

    public function __construct()
    {
        $this->homeView = new HomeView();
    }

    public function showHome()
    {
        $this->homeView->showHome();
    }
}
