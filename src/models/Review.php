<?php


namespace app\models;


use app\logic\CreateArray;

class Review
{
    private $id;
    private $task_id;
    private $score;
    private $comment;

    public function loadCsvArray(array $array): void
    {
        $this->id = $array['review_number'];
        $this->task_id = $array['review_task'];
        $this->score = $array['review_score'];
        $this->comment = $array['review_comment'];
    }

    public function getAttributes()
    {
        return [
            'id' => $this->id,
            'task' => $this->task_id,
            'score' => $this->score,
            'comment' => $this->comment
        ];
    }
}
