<?php


namespace app\logic;


abstract class AbstractAction
{
    abstract protected function giveTitle($title);

    abstract protected function giveName($name);

    abstract protected function verifyAbility($ability);
}
