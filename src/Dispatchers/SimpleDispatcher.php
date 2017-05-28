<?php
/**
 * Created by PhpStorm.
 * User: vestin
 * Date: 5/27/17
 * Time: 4:09 PM
 */

namespace Vestin\Checker\Dispatchers;


use Vestin\Checker\CheckerInterface;
use Vestin\Checker\CheckNotPassException;
use Vestin\Checker\DispatcherInterface;

/**
 * 检查者中，其中一项没有通过检查，则终止检查，返回结果
 * Class SimpleDispatcher
 * @package vestin\checker\dispatchers
 */
class SimpleDispatcher implements DispatcherInterface
{

    /**
     * @var CheckerInterface[] array
     */
    private $checkers = [];
    private $error;

    public function addChecker(CheckerInterface $checker)
    {
        $this->checkers[] = $checker;
    }

    public function check()
    {
        try {
            foreach ($this->checkers as $checker) {
                $checker->check();
            }
        } catch (CheckNotPassException $e) {
            $this->error = $e->getMessage();
            return false;
        }

        return true;
    }

    public function getError()
    {
        return $this->error;
    }

}