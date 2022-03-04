<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/2/14
 * Time: 10:53
 */

// 命令行模式
interface ICommand {
    function onCommand($name, $args);
}

class UserCommand implements ICommand {
    public function onCommand($name, $args)
    {
        if($name != 'addUser')
            return false;

        echo "UserCommand handing 'addUser' \n";
        return true;
    }
}

class MailCommand implements ICommand {
    public function onCommand($name, $args)
    {
        if($name != 'mail')
            return false;

        echo "MailCommand handing 'mail' \n";
        return true;
    }
}

class CommandChain {
    private $_commands = [];

    public function addCommand($cmd) {
        $this->_commands[] = $cmd;
    }

    public function runCommand($name, $args) {
        foreach($this->_commands as $cmd) {
            $cmd->onCommand($name, $args);
        }
    }
}

$cc = new CommandChain();
$cc->addCommand(new UserCommand());
$cc->addCommand(new MailCommand());
$cc->runCommand('addUser', NULL);
$cc->runCommand('mail', NULL);