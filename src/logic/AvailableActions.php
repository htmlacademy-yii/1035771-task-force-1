<?php


namespace app\logic;

use app\models\actions\StartAction;
use app\models\Task;
use app\models\User;

class AvailableActions
{
    const ACTION_NEW = 'action_new';
    const ACTION_START = 'action_start';
    const ACTION_CANCEL = 'action_cancel';
    const ACTION_REFUSE = 'action_refuse';
    const ACTION_FINISH = 'action_finish';
    const ACTION_PROPOSE = 'action_propose';

    const STATUS_NEW = 'new';
    const STATUS_PROCESS = 'process';
    const STATUS_COMPLETED = 'done';
    const STATUS_FAILED = 'failed';
    const STATUS_CANCELED = 'canceled';

    const ROLE_CUSTOMER = 'customer';
    const ROLE_EXECUTOR = 'executor';

    public function listActs () {
        return $acts = [self::ACTION_CANCEL, self::ACTION_FINISH, self::ACTION_REFUSE, self::ACTION_START, self::ACTION_NEW];
    }

    public function listStatus () {
        return $status = [self::STATUS_CANCELED, self::STATUS_NEW, self::STATUS_COMPLETED, self::STATUS_PROCESS, self::STATUS_FAILED];
    }

    public function getNewStatus ($action) {

        switch ($action) {

            case CompleteAction::getName():
                return self::STATUS_COMPLETED;

            case CancelAction::getName():
                return self::STATUS_CANCELED;

            case RefuseAction::getName():
                return self::STATUS_FAILED;

            case StartAction::getName():
                return self::STATUS_PROCESS;
        }
         return null;
    }

}
