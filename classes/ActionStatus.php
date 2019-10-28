<?php


namespace classes;


class ActionStatus
{

    const ACTION_ADD = 'addTask';
    const ACTION_SEND = 'sendMessage';
    //const ACTION_TAKE = 'wantToTake';
    const ACTION_START = 'startTask';
    const ACTION_CANCEL = 'cancelTask';
    const ACTION_REFUSE = 'refuseTask';
    const ACTION_FINISH = 'doneTask';

    const STATUS_NEW = 'new';
    const STATUS_PROCESS = 'process';
    const STATUS_DONE = 'done';
    const STATUS_FAILED = 'failed';
    const STATUS_CANCELED = 'canceled';

    const ROLE_CUSTOMER = 'customer';
    const ROLE_WORKER = 'worker';

    const ACTS = ['addTask', 'sendMessage', 'wantToTake', 'startTask', 'cancelTask', 'refuseTask', 'doneTask'];
    const STATUS = ['new', 'process', 'done', 'failed', 'canceled'];
    const ROLES= ['customer', 'worker'];

    public $idWorker = [];
    public $idCustomer = [];
    public $activeStatus = [];
    public $deadline = [];

    /*public function __construct($acts, $status)
    {
        $this->acts = $acts;
        $this->status = $status;

    }*/

    public function listActs () {
        //return $acts=[self::ACTION_ADD, self::ACTION_SEND, self::ACTION_CANCEL, self::ACTION_FINISH, self::ACTION_REFUSE, self::ACTION_START];
        return $acts = self::ACTS;
    }

    public function listStatus () {
        return $status = self::STATUS;
    }


    /*public function NewStatus()
    {
        foreach ($this->acts as $key => $act) {

            if ($this->act == self::ACTION_CANCEL) return 'canceled';
            if ($this->act == self::ACTION_START) return 'process';
            if ($this->act == self::ACTION_FINISH) return 'done';
            if ($this->act == self::ACTION_REFUSE) return 'failed';
        }

    }*/

    public function NewStatus1 () {
            return 'canceled';
    }

}
