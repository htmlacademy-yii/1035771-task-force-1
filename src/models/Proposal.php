<?php


namespace app\models;


use app\logic\CreateArray;

class Proposal
{
    private $id;
    private $comment;
    private $budget;
    private $creation_time;
    private $executor_id;
    private $task_id;

    public function loadCsvArray(array $array): void
    {
        $this->id = $array['proposal_number'];
        $this->comment = $array['proposal_comment'];
        $this->budget = $array['proposal_budget'];
        $this->creation_time = $array['proposal_dt_add'];
        $this->executor_id = $array['proposal_executor'];
        $this->task_id = $array['proposal_task'];
    }

    public function getAttributes()
    {
        return [
            'id' => $this->id,
            'comment' => $this->comment,
            'budget' => $this-> budget,
            'creation_time' => $this->creation_time,
            'executor' => $this->executor_id,
            'task' => $this->task_id
        ];
    }
}
