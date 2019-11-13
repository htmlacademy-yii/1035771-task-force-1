<?php
namespace app\models;
use app\models\actions\CancelAction;
use app\models\actions\CompleteAction;
use app\models\actions\ProposeAction;
use app\models\actions\RefuseAction;
use app\models\actions\StartAction;

class Task
{
    const STATUS_NEW = 'new';
    const STATUS_PROCESS = 'process';
    const STATUS_COMPLETED = 'completed';
    const STATUS_FAILED = 'failed';
    const STATUS_CANCELED = 'canceled';

    private $executor_id;
    private $customer_id;
    private $status;

    public function __construct(int $customer_id)
    {
        $this->customer_id = $customer_id;
        $this->status = self::STATUS_NEW;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getCustomer(): int
    {
        return $this->customer_id;
    }

    public function getExecutor(): int
    {
        return $this->executor_id;
    }

    public function complete(int $initiator_id) {
        //проверяет доступность действия Complete
        if (CompleteAction::verifyAbility($initiator_id, $this)) {
            $this->status = self::STATUS_COMPLETED;
        }
        //если доступно выставляет статус Completed
    }

    public function cancel(int $initiator_id) {
        //проверяет доступность действия Cancel
        if (CancelAction::verifyAbility($initiator_id, $this)) {
            $this->status = self::STATUS_CANCELED;
        }
        //если доступно выставляет статус Canceled
    }

    public function refuse(int $initiator_id) {
        //проверяет доступность действия Refuse
        if (RefuseAction::verifyAbility($initiator_id, $this)) {
            $this->status = self::STATUS_FAILED;
        }
        //если доступно выставляет статус Failed
    }

    public function start(int $initiator_id) {
        //проверяет доступность действия Start
        if (StartAction::verifyAbility($initiator_id, $this)) {
            $this->status = self::STATUS_PROCESS;
        }
        //если доступно выставляет статус PROCESS
    }

    public function propose(int $initiator_id) {
        //проверяет доступность действия Propose
        if (ProposeAction::verifyAbility($initiator_id, $this)) {
            $this->status = self::STATUS_NEW;
        }
        //если доступно выставляет статус NEW
    }
}
