<?php
/**
 * Created by PhpStorm.
 * User: vestin
 * Date: 5/27/17
 * Time: 3:39 PM
 */

namespace Vestin\Checker;

interface CheckerInterface
{
    /**
     * 检查工作
     * 检查通过，不做任何处理
     * 检查失败，抛出检查失败异常
     * @throws \Vestin\Checker\CheckNotPassException
     * @return null
     */
    public function check();
}