<?php


namespace app\logic;


class AvailableActions
{
    const ACTION_NEW = 'action_new';
    const ACTION_START = 'action_start';
    const ACTION_CANCEL = 'action_cancel';
    const ACTION_REFUSE = 'action_refuse';
    const ACTION_FINISH = 'action_finish';

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
            case self::ACTION_NEW:
                return self::STATUS_NEW;

            case CompleteAction::class:
                return self::STATUS_COMPLETED;

            case CancelAction::class:
                return self::STATUS_CANCELED;

            case RefuseAction::class:
                return self::STATUS_FAILED;

            case StartAction::class:
                return self::STATUS_PROCESS;
        }
         return null;
    }

    public function showAllActions ($role, $id_user) {

        if ($role === self::ROLE_EXECUTOR && $id_user === $tasks['executor_id']) {

            if (self::STATUS_NEW) {
                return ProposeAction::class;
                }
            if (self::STATUS_PROCESS) {
                return RefuseAction::class;
            }
        }

        if ($role === self::ROLE_CUSTOMER && $id_user === $tasks['customer_id']) {

            if (self::STATUS_NEW) {
                return CancelAction::class;
            }

            if (self::STATUS_NEW) {
                return StartAction::class;
            }

            if (self::STATUS_PROCESS) {
                return CompleteAction::class;
            }
        }

    }
}
