<?php


namespace app\logic;


class CompleteAction extends AbstractAction
{
    public function giveTitle($title)
    {
        // TODO: Implement giveTitle() method.
        return $title = "Завершить";
    }


    public function giveName($name)
    {
    // TODO: Implement giveName() method.
          return $name = 'action_finish';
     }

    public function verifyAbility($ability)
    {
        // TODO: Implement verifyAbility() method.

        if ($tasks['executor_id'] === $users['id']) {
            return "Проверку прошёл, это исполнитель";
        }

    }
}
