<?php
namespace User\Model;

use Zend\Db\TableGateway\TableGateway;

class CityTable
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

    public function getCity($city_id)
    {
        $city_id  = (int) $city_id;
        $rowset = $this->tableGateway->select(array('city_id' => $city_id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $city_id");
        }
        return $row;
    }

    public function getCityByUserID($user_id)
    {
        $user_id  = (int) $user_id;
        $rowset = $this->tableGateway->select(array('user_id' => $user_id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $user_id");
        }
        return $row;
    }

    public function saveCity(City $city,$user_id)
    {
        $data = array(
            //'city_id' => $city->city_id,
            'user_id'  => $city->user_id,
            'city_name'  => $city->city_name,
        );

        $city_id = (int)$city->city_id;
        if ($city->user_id == 0)
        {
            $data['user_id'] = $user_id;
            $this->tableGateway->insert($data);
        }
        else
        {
            if ($this->getCityByUserID($city->user_id)) {
                $this->tableGateway->update($data, array('user_id' => $city->user_id));
            }
            else
            {
                throw new \Exception('City_id does not exist');
            }
        }
    }

    public function deleteCity($user_id)
    {
        $this->tableGateway->delete(array('user_id' => $user_id));
    }
}