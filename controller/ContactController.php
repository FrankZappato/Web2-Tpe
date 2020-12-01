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
        if (
            isset($_POST['name']) && !empty($_POST['name']) &&
            isset($_POST['email']) && !empty($_POST['email']) &&
            isset($_POST['message']) && !empty($_POST['message'])
            ) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];

            $result = $this->adminModel->saveMessage($name, $email, $message);
            if ($result) {
                $this->contactView->showContactForm("Message sent succesfully");
            } else {
                $this->contactView->showContactForm("There was an error. Please try again.");
            }
        } else {
            $this->contactView->showContactForm("Error : Missing fields");

        }
    }
}
