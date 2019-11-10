<?php


namespace app\logic;


class NewAction extends AbstractAction
{
    public function giveTitle($title)
    {
        // TODO: Implement giveTitle() method.
        return $title = "Создать";
    }


    public function giveName($name)
    {
        // TODO: Implement giveName() method.
        return $name = 'action_new';
    }

    public function verifyAbility($ability)
    {

        // TODO: Implement verifyAbility() method.

            if ($tasks['executor_id'] === $usera['id']) {
                return "Проверку прошёл, это исполнитель";
            }
    }
}
