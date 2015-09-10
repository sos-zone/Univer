<?php
namespace User\Controller;
use User\Model\User;
use User\Model\City;
use User\Model\Education;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Db\Sql\Sql;
use Zend\Db\ResultSet\ResultSet;
use Zend\View\Model\JsonModel; //add jsonModel
use Zend\Db\TableGateway\TableGateway;

class IndexController extends AbstractActionController
{
    protected $userTable;       //property
    protected $cityTable;
    protected $educationTable;

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


    public function infoAction()
    {
        //$this->layout('layout/index');    //use own page template

//-------Main version---------------------------------
         $view= new ViewModel();
         $view->setTemplate('user/index/info');


//-------TestVersion-------------------------------
        /*
        $view= new ViewModel(array('education' => $this->getEducationTable()->fetchAll(),));
        $view->setTemplate('user/index/info');
        return $view;
        */

    }


    public function dataAction()
    {
        /*
        $newusername = file_get_contents('php://input');    //Получаем JSON запрос от extjs.jsonstore
        $newusername = json_decode($newusername);
        if(isset($newusername->user_name) && !empty($newusername->user_name)){}
        */

        if(isset($_GET['act']))
        {
            $action = $_GET['act'];

            $user = new User();
            $user->user_id = $_GET['user_id'];
            $user->user_name = $_GET['user_name'];
            $user->user_educ = $_GET['user_educ'];
            $user->city_name = $_GET['city_name'];

            $city = new City();
            $city->user_id = $_GET['user_id'];
            $city->city_name = $_GET['city_name'];

            $education = new Education();
            $education->user_id = $_GET['user_id'];
            $education->user_educ = $_GET['user_educ'];


        switch($action)
        {
            case "update":
                $user->user_id = $this->getUserTable()->saveUser($user);
                $this->getCityTable()->saveCity($city, $user->user_id);
                $this->getEducationTable()->saveEducation($education, $user->user_id);
                header('Location:http://univer/user');
                exit;
                break;

            case "delete":
                $this->getUserTable()->deleteUser($user->user_id);
                $this->getCityTable()->deleteCity($user->user_id);
                $this->getEducationTable()->deleteEducation($user->user_id);
                header('Location:http://univer/user');
                exit;
                break;
        }

        } else
        {
            //$jsonfile = array(array("user_id"=> "1","user_name"=>"ОШИБКА!"),);
        }


//-----------------------------------------------------------------------------------
//---------------Передача данных клиенту---------------------------------------------
//-----------------------------------------------------------------------------------
        $user_data = array('user' => $this->getUserTable()->fetchUserInfo(),);

//-----------переработать!!!!!------------------------
        $jsonfile = "[";
        foreach ($user_data['user'] as $user)
        {
            $jsonfile = $jsonfile.'{"user_id": "'.$user->user_id.'",
                                    "user_name":"'.$user->user_name.'",
                                    "user_educ":"'.$user->user_educ.'",
                                    "city_name":"'.$user->city_name.'"},';
        }
        $jsonfile = substr($jsonfile, 0, -1); //удалаем последний символ(запятую)
        $jsonfile = $jsonfile.']';


        $jsonfile = json_decode($jsonfile);
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

    public function getCityTable()
    {
        if (!$this->cityTable) {
            $sm = $this->getServiceLocator();
            $this->cityTable = $sm->get('User\Model\CityTable');
        }
        return $this->cityTable;
    }

    public function getEducationTable()
    {
        if (!$this->educationTable) {
            $sm = $this->getServiceLocator();
            $this->educationTable = $sm->get('User\Model\EducationTable');
        }
        return $this->educationTable;
    }


}