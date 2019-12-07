<?php


namespace app\models;


use app\logic\CreateArray;

class UserMessage
{
    private $id;
    private $viewed;
    private $sender_id;
    private $recipient_id;
    private $message;
    private $task_id;

    public function loadCsvArray(array $array): void
    {
        $this->id = $array['message_number'];
        $this->viewed = $array['message_count'];
        $this->sender_id = $array['message_sender'];
        $this->recipient_id = $array['message_recipient'];
        $this->message = $array['message_text'];
        $this->task_id = $array['message_task'];
    }

    public function getAttributes()
    {
        return [
            'id' => $this->id,
            'viewed' => $this->viewed,
            'sender' => $this->sender_id,
            'recipient' => $this->recipient_id,
            'message' => $this->message,
            'task' => $this->task_id
        ];
    }
}

$arraysForQueryBuilder = [];
$csvParser = new CreateArray('data\messages.csv');


$arraysFromCsv = $csvParser->toArray();

foreach ($arraysFromCsv as $arrayFromCsv) {

    $category = new UserMessage;
    $category->loadCsvArray($arrayFromCsv);
    $arraysForQueryBuilder[] = $category->getAttributes();
}
