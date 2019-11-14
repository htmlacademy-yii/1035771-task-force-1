<?php
namespace app\models;

class User
{
    const ROLE_CUSTOMER = 'customer';
    const ROLE_EXECUTOR = 'executor';

    private $user_id;
    private $role;

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
