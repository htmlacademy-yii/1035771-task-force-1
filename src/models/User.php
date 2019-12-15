<?php
namespace app\models;

use app\logic\CreateArray;

class User
{
    const ROLE_CUSTOMER = 'customer';
    const ROLE_EXECUTOR = 'executor';

    private $user_id;
    private $role;

    private $id;
    private $name;
    private $email;
    private $password;
    private $creation;
    private $birthday;
    private $info;
    private $avatar;
    private $phone;
    private $skype;
    private $other;
    private $views;
    private $location_id;

    public function loadCsvArray(array $array): void
    {
        $this->id = $array['user_number'];
        $this->name = $array['user_name'];
        $this->email = $array['user_email'];
        $this->password = $array['user_password'];
        $this->creation = $array['user_dt_add'];
        $this->birthday = $array['user_birthday'];
        $this->info = $array['user_info'];
        $this->avatar = $array['user_avatar'];
        $this->phone = $array['user_phone'];
        $this->skype = $array['user_skype'];
        $this->other = $array['user_other'];
        $this->views = $array['user_views'];
        $this->location_id = $array['user_location_id'];
    }

    public function getAttributes()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'creation' => $this->creation,
            'birthday' => $this->birthday,
            'info' => $this->info,
            'avatar' => $this->avatar,
            'phone' => $this->phone,
            'skype' => $this->skype,
            'other' => $this->other,
            'views' => $this->views,
            'location_id' => $this->location_id
        ];
    }

    public function __construct(int $user_id)
    {
        $this->user_id = $user_id;
        $this->role = self::ROLE_CUSTOMER;
    }

    public function isExecutor(): string
    {
        return $this->role = self::ROLE_EXECUTOR;
    }
}
