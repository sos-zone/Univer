<?php
namespace User\Model;

use Zend\Db\Sql\Sql;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

class UserTable
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }

    public function fetchUserInfo()
    {

        $mySql = new Sql($this->tableGateway->getAdapter());
        $mySelect = $mySql

                ->select()
                ->columns(array('user_name'))
                ->from('user')
                //->where(array('user_id' => '1'))
                //->join('city','user.user_id=city.user_id',array('*'))
                /////->joinUsing('city','user_id')
                //->where(array('user.user_id=city.user_id'))
                //->order('user.user_id DESC')
                ;


        //$query= $select->getSqlString();

        $myResultSet = $this->tableGateway->selectWith($mySelect);
        return $myResultSet; //$query;

    }

    public function getUser($user_id)
    {
        $user_id  = (int) $user_id;
        $rowset = $this->tableGateway->select(array('user_id' => $user_id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $user_id");
        }
        return $row;
    }

    public function saveUser(User $user)
    {
        $data = array(
            'user_name' => $user->user_name,
        );

        $user_id = (int)$user->user_id;
        if ($user_id == 0) {
            $this->tableGateway->insert($data);
        } else {
            if ($this->getUser($user_id)) {
                $this->tableGateway->update($data, array('user_id' => $user_id));
            } else {
                throw new \Exception('User id does not exist');
            }
        }
    }

    public function deleteUser($user_id)
    {
        $this->tableGateway->delete(array('user_id' => $user_id));
    }
}