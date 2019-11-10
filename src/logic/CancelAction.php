<?php


namespace app\logic;


class CancelAction extends AbstractAction
{
    public function giveTitle($title)
    {
        // TODO: Implement giveTitle() method.
        return $title = "Отменить";
    }


    public function giveName($name)
    {
        // TODO: Implement giveName() method.
        return $name = 'action_cancel';
    }

    public function verifyAbility($ability)
    {

        // TODO: Implement verifyAbility() method.

            if ($tasks['executor_id'] === $users['id']) {
                return "Проверку прошёл, это исполнитель";
            }
        return null;
    }
}
