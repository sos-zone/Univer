<?php
namespace User\Model;

class User
{
    public $user_id;
    public $user_name;

    public function exchangeArray($data)
    {
        $this->user_id   = (isset($data['user_id'])) ? $data['user_id'] : null;
        $this->user_name = (isset($data['user_name'])) ? $data['user_name'] : null;
        $this->city_name = (isset($data['city_name'])) ? $data['city_name'] : null;
        $this->user_educ = (isset($data['user_educ'])) ? $data['user_educ'] : null;
    }
}