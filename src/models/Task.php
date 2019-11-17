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

    public function getExecutor(): ?int
    {
        return $this->executor_id;
    }

    public function complete(int $initiator_id) {

        if (CompleteAction::verifyAbility($initiator_id, $this)) {
            $this->status = self::STATUS_COMPLETED;
        }

    }

    public function cancel(int $initiator_id) {

        if (CancelAction::verifyAbility($initiator_id, $this)) {
            $this->status = self::STATUS_CANCELED;
        }

    }

    public function refuse(int $initiator_id) {

        if (RefuseAction::verifyAbility($initiator_id, $this)) {
            $this->status = self::STATUS_FAILED;
        }

    }

    public function start(int $initiator_id) {

        if (StartAction::verifyAbility($initiator_id, $this)) {
            $this->status = self::STATUS_PROCESS;
        }

    }

    public function propose(int $initiator_id) {

        if (ProposeAction::verifyAbility($initiator_id, $this)) {
            $this->status = self::STATUS_NEW;
        }

    }

    public function getAvailableActions(int $initiator_id): array
    {
        $result = [];

        if (StartAction::verifyAbility($initiator_id, $this)) {
            $result[] = StartAction::getName();
        }

        if (CompleteAction::verifyAbility($initiator_id, $this)) {
            $result[] = CompleteAction::getName();
        }

        if (RefuseAction::verifyAbility($initiator_id, $this)) {
            $result[] = RefuseAction::getName();
        }

        if (CancelAction::verifyAbility($initiator_id, $this)) {
            $result[] = CancelAction::getName();
        }

        if (ProposeAction::verifyAbility($initiator_id, $this)) {
            $result[] = ProposeAction::getName();
        }
        return $result;
    }

    public function setExecutor(int $executor_id)
    {
        $this->executor_id = $executor_id;

    }

    public function getNewStatus ($action) {

        switch ($action) {
            case StartAction::getName():
                return self::STATUS_PROCESS;

            case CompleteAction::getName():
                return self::STATUS_COMPLETED;

            case CancelAction::getName():
                return self::STATUS_CANCELED;

            case RefuseAction::getName():
                return self::STATUS_FAILED;
        }
        return null;
    }
}
