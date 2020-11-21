<?php
require_once './Model/CommentaryModel.php';
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
}

