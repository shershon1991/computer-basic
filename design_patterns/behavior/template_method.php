<?php


/***************************************************************************
 *
 * Copyright (c) 2021 doushen.com, Inc. All Rights Reserved
 *
 **************************************************************************/

// 模板方法模式
abstract class AskForLeaveFlow {

    // 一级组长直接审批
    protected abstract function firstGroupLeader(string $name);

    // 二级组长部门负责人审批
    protected function secondGroupLeader(string $name) {

    }

    // 告知HR有人请假了
    private final function notifyHr(string $name) {
        echo "当前有人请假了，请假人：{$name}" . PHP_EOL;
    }

    // 请假流程模板
    public function askForLeave(string $name) {
        $this->firstGroupLeader($name);
        $this->secondGroupLeader($name);
        $this->notifyHr($name);
    }

}

class CompanyA extends AskForLeaveFlow {

    protected function firstGroupLeader(string $name) {
        echo "CompanyA 组内有人请假，请假人：{$name}" . PHP_EOL;
    }

}

class CompanyB extends AskForLeaveFlow {

    protected function firstGroupLeader(string $name) {
        echo "CompanyB 组内有人请假，请假人：{$name}" . PHP_EOL;
    }

    protected function secondGroupLeader(string $name){
        echo "CompanyB 组内有人请假，请假人：{$name}" . PHP_EOL;
    }

}

// test
// 公司A请假流程模版
$companyA = new CompanyA();
$companyA->askForLeave("敖丙");
// 结果：CompanyA 组内有人请假，请假人：敖丙
//       当前有人请假了，请假人：敖丙

$companyB = new CompanyB();
$companyB->askForLeave("敖丙");
// 结果：CompanyB 组内有人请假，请假人：敖丙
//      CompanyB 部门有人请假，请假人：敖丙
//      当前有人请假了，请假人：敖丙