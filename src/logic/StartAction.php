<?php


namespace app\logic;


class StartAction extends AbstractAction
{
    public function giveTitle($title)
    {
        // TODO: Implement giveTitle() method.
        return $title = "Начать";
    }


    public function giveName($name)
    {
        // TODO: Implement giveName() method.
        return $name = 'action_start';
    }

    public function verifyAbility($ability)
    {
        $con = mysqli_connect('task-force', 'root', '', 'task_force');
        mysqli_set_charset($con, 'utf8');
        $sql = 'SELECT executor_id, customer_id FROM tasks JOIN users';
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

        // TODO: Implement verifyAbility() method.
       foreach ($row as $value) {

            if ($value['executor_id'] === $value['id']) {
                return "Проверку прошёл, это исполнитель";
            }
        return null;
       }

        //OR
        // BD: users_categories
        /* switch ($id_user) {
             case isset($id_user):
                 return $role = self::ROLE_EXECUTOR;
         }
         return $role = self::ROLE_CUSTOMER; */
    }
}
