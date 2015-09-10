<?php
namespace User\Model;

class Education
{
    public $educ_id;
    public $user_id;
    public $user_educ;

    public function exchangeArray($data)
    {
        $this->educ_id    = (isset($data['educ_id'])) ? $data['educ_id'] : null;
        $this->user_id    = (isset($data['user_id'])) ? $data['user_id'] : null;
        $this->user_educ  = (isset($data['user_educ'])) ? $data['user_educ'] : null;
    }
}