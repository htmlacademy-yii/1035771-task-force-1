<?php


namespace app\logic;


class RefuseAction extends AbstractAction
{
    public function giveTitle($title)
    {
        // TODO: Implement giveTitle() method.
        return $title = "Отказаться";
    }


    public function giveName($name)
    {
        // TODO: Implement giveName() method.
        return $name = 'action_refuse';
    }

    public function verifyAbility($ability)
    {
        // TODO: Implement verifyAbility() method.

            if ($tasks['executor_id'] === $users['id']) {
                return "Проверку прошёл, это исполнитель";
            }
    }
}
