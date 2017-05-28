<?php
/**
 * Created by PhpStorm.
 * User: vestin
 * Date: 5/27/17
 * Time: 4:01 PM
 */

namespace Vestin\Checker;


interface DispatcherInterface
{
    /**
     * 添加检查者
     * @return mixed
     */
    public function addChecker(CheckerInterface $checker);

    /**
     * 检查工作
     * 检查工作只能返回 pass:true, not pass:false
     * @return boolean
     */
    public function check();

    /**
     * 获取错误信息
     * @return mixed
     */
    public function getError();
}