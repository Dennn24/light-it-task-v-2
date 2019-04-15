<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Encoder;
use application\lib\Db;
use application\domain\Number;
use application\validation\Validator;

class MainController extends Controller
{

    public function indexAction()
    {
		$this->view->render('Главная страница');
	}

    public function encodeAction()
    {
        if (Validator::isValid(Controller::param('input_number')))
        {
            $number = new Number(
                Controller::param('input_number'),
                Encoder::encode(Controller::param('input_number'))
            );
            $db = new Db();
            $db -> saveToDatabase($number);
            echo Encoder::encode(Controller::param('input_number'));
        } else {
            echo Validator::INVALID_INPUT;
        }
    }

}