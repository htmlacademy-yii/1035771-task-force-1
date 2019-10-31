<?php


namespace app\logic;


class ActionStatus
{
    const ACTION_NEW = 'newTask';
    const ACTION_START = 'startTask';
    const ACTION_CANCEL = 'cancelTask';
    const ACTION_REFUSE = 'refuseTask';
    const ACTION_FINISH = 'doneTask';

    const STATUS_NEW = 'new';
    const STATUS_PROCESS = 'process';
    const STATUS_DONE = 'done';
    const STATUS_FAILED = 'failed';
    const STATUS_CANCELED = 'canceled';

    public function listActs () {
        return $acts = [self::ACTION_CANCEL, self::ACTION_FINISH, self::ACTION_REFUSE, self::ACTION_START, self::ACTION_NEW];
    }

    public function listStatus () {
        return $status = [self::STATUS_CANCELED, self::STATUS_NEW, self::STATUS_DONE, self::STATUS_PROCESS, self::STATUS_FAILED];
    }

    public function getNewStatus ($action) {

        switch ($action) {
            case self::ACTION_NEW:
                return self::STATUS_NEW;

            case self::ACTION_FINISH:
                return self::STATUS_DONE;

            case self::ACTION_CANCEL:
                return self::STATUS_CANCELED;

            case self::ACTION_REFUSE:
                return self::STATUS_FAILED;

            case self::ACTION_START:
                return self::STATUS_PROCESS;
        }
         return null;
    }
}
