<?php
namespace User\Controller;
use User\Model\User;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Db\Sql\Sql;
use Zend\Db\ResultSet\ResultSet;
use Zend\View\Model\JsonModel; //add jsonModel
use Zend\Db\TableGateway\TableGateway;

class IndexController extends AbstractActionController
{
    protected $userTable;


    public function indexAction()
    {
        //$this->layout('layout/index');    //use own page template


        $user_data=array('user' => $this->getUserTable()->fetchAll(),);

        $view= new ViewModel($user_data);
        $view->setTemplate('user/index/index');
        return $view;

    }

    public function selectnameAction()
    {

        //$user_data=array('user' => $this->getUserTable()->fetchAll(),);
        $user_data = array('user' => $this->getUserTable()->fetchUserInfo(),);


        $view= new ViewModel($user_data);
        $view->setTemplate('user/index/selectname');
        return $view;

    }

    public function dataAction()
    {
        if(isset($_GET['act']))
        {

            $action = $_GET["act"];

            switch($action)
            {
                case "update":

                    break;

            }

        } else
        {
            $jsonfile = array(array("user_id"=> "1","user_name"=>"ОШИБКА!"),);
        }



        $newusername = file_get_contents('php://input');    //Получаем JSON запрос от extjs.jsonstore
        $newusername = json_decode($newusername);

        if(isset($newusername->user_name) && !empty($newusername->user_name))
        {
            //Сохраняем его в базу данных
            $user = new User();
            $user->user_id = $newusername->user_id; //0;
            $user->user_name = $newusername->user_name;
            $this->getUserTable()->saveUser($user);

        }



        $user_data = array('user' => $this->getUserTable()->fetchUserInfo(),);


//-----------переработать!!!!!------------------------
        $jsonfile = "[";
        foreach ($user_data['user'] as $user)
        {
            $jsonfile = $jsonfile.'{"user_id": "'.$user->user_id.'","user_name":"'.$user->user_name.'"},';
        }
        $jsonfile = substr($jsonfile, 0, -1); //удалаем последний символ(запятую)
        $jsonfile = $jsonfile.']';

        $jsonfile = json_decode($jsonfile);
//------------------------------------------------

//------Запись в файл-----------------------------
        /*
        $file="public/4.json";
        $fp = fopen($file, "w"); // ("r" - считывать "w" - создавать "a" - добовлять к тексту), мы создаем файл
        fwrite($fp, $jsonfile);
        fclose (fp);
        */
//------------------------------------------------

        $result = new JsonModel($jsonfile);
        //$view->setTemplate('user/index/data');    //установка шаблона
        $result->setTerminal(true);                 //don't load layout
        return $result;


    }


    public function getUserTable()
    {
        if (!$this->userTable) {
            $sm = $this->getServiceLocator();
            $this->userTable = $sm->get('User\Model\UserTable');
        }
        return $this->userTable;
    }

}