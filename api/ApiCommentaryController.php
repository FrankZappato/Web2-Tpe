<?php
require_once '../model/CommentaryModel.php';
require_once 'ApiController.php';

class ApiCommentaryController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new CommentaryModel();
        $this->view = new APIView();
    }

    public function getCommentaries($params = null)
    {
        $commentaries = $this->model->getCommentaries($params[':ID']);
        if ($commentaries) {
            $this->view->response($commentaries, 200);
        } else {
            $this->view->response($commentaries, 204);
        }
    }

    public function addCommentary($params = null)
    {
        $commentary = $this->getData();
        if ($commentary->from_user == "" || $commentary->commentary == "" || $commentary->rating == "") {
            $this->view->response(null, 400);
        } else {
            $this->model->addCommentary($commentary->from_user, $commentary->commentary, $commentary->rating, $params[':ID']);
            $this->view->response($commentary, 200);
        }
    }

    public function deleteCommentary($params = null)
    {
        $commentaries = $this->model->deleteCommentary($params[':ID']);
        $this->view->response($commentaries, 200);
    }
}
