<?php
namespace User\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
class IndexController extends AbstractActionController
{
    protected $userTable;


    public function indexAction()
    {
/*

        $cart = array(
            "orderID" => 12345,
            "shopperName" => "John Smith",
            "shopperEmail" => "johnsmith@example.com",
            "contents" => array(
                array(
                    "productID" => 34,
                    "productName" => "SuperWidget",
                    "quantity" => 1
                ),
                array(
                    "productID" => 56,
                    "productName" => "WonderWidget",
                    "quantity" => 3
                )
            ),
            "orderCompleted" => true
        );
        echo json_encode( $cart );


        $view = new ViewModel();

        $tarr=$view->getUserTable()->fetchAll();
        $view->user=$tarr;
        $view->varibl='переменная';

        $view->name="Sergei2";
        $view->cart=$cart;


        return $view;
*/
        $user_data=array('user' => $this->getUserTable()->fetchAll(),);


        $view= new ViewModel($user_data);
        $view->setTemplate('user/index/index');
        return $view;





        //return new ViewModel(array('user' => $this->getUserTable()->fetchAll(),));
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