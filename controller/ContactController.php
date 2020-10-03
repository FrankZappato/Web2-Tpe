<?php

require_once "../view/ContactView.php";
require_once "../model/AdminModel.php";

class ContactController
{
    private $contactView;
    private $adminModel;

    public function __construct()
    {
        $this->contactView = new ContactView();
        $this->adminModel = new AdminModel();
    }

    public function showContactForm()
    {
        $this->contactView->showContactForm(null);
    }

    public function saveMessage()
    {
        $result = $this->adminModel->saveMessage();
        if ($result) {
            $this->contactView->showContactForm("Message sent succesfully");
        } else {
            $this->contactView->showContactForm("There was an error. Please try again.");
        }
    }
}
