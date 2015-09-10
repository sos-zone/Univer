<?php
namespace User\Model;

use Zend\Db\TableGateway\TableGateway;

class EducationTable
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

    public function getEducation($educ_id)
    {
        $educ_id  = (int) $educ_id;
        $rowset = $this->tableGateway->select(array('educ_id' => $educ_id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $educ_id");
        }
        return $row;
    }

    public function getEducationByUserID($user_id)
    {
        $user_id  = (int) $user_id;
        $rowset = $this->tableGateway->select(array('user_id' => $user_id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $user_id");
        }
        return $row;
    }

    public function saveEducation(Education $education,$user_id)
    {
        $data = array(
            //'educ_id' => $education->educ_id,
            'user_id'  => $education->user_id,
            'user_educ'  => $education->user_educ,
        );

        $educ_id = (int)$education->educ_id;

        if ($education->user_id == 0)
        {
            $data['user_id'] = $user_id;
            $this->tableGateway->insert($data);

        }
        else
        {
            if ($this->getEducationByUserID($education->user_id))
            {
                $this->tableGateway->update($data, array('user_id' => $education->user_id));
            }
            else
            {
                throw new \Exception('Education_id does not exist');
            }
        }
    }

    public function deleteEducation($user_id)
    {
        $this->tableGateway->delete(array('user_id' => $user_id));
    }
}