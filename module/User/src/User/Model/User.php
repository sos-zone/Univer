<?php
namespace User\Model;

class User
{
    public $user_id;
    public $user_name;

    public function exchangeArray($data)
    {
        $this->user_id     = (isset($data['user_id'])) ? $data['user_id'] : null;
        $this->user_name = (isset($data['user_name'])) ? $data['user_name'] : null;
    }
}