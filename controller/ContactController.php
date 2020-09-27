<?php

require_once "../view/ContactView.php";

class ContactController
{
    private $contactView;

    public function __construct()
    {
        $this->contactView = new ContactView();
    }

    public function showContactForm()
    {
        $this->contactView->showContactForm();
    }
}
