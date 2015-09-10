<?php
namespace User\Model;

class City
{
    public $city_id;
    public $user_id;
    public $city_name;

    public function exchangeArray($data)
    {
        $this->city_id    = (isset($data['city_id'])) ? $data['city_id'] : null;
        $this->user_id    = (isset($data['user_id'])) ? $data['user_id'] : null;
        $this->city_name  = (isset($data['city_name'])) ? $data['city_name'] : null;
    }
}