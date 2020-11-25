<?php
require_once '../model/CommentaryModel.php';
require_once 'ApiController.php';

class ApiCommentaryController extends ApiController {

    function __construct() {
        parent::__construct();
        $this->model = new CommentaryModel();
        $this->view = new APIView();
    }

    public function getCommentaries($params = null) {
        $commentaries = $this->model->getCommentaries($params[':ID']);
        $this->view->response($commentaries, 200);
    }
    public function addCommentary($params = null) {
        $commentary = $this->getData();
        $this->model->addCommentary($commentary->from, $commentary->commentary, $commentary->rating, $params[':ID']);
        $this->view->response($commentary, 200);
    }

    public function deleteCommentary($params = null) {
        $commentaries = $this->model->deleteCommentary($params[':ID']);
        $this->view->response($commentaries, 200);
    }

}

