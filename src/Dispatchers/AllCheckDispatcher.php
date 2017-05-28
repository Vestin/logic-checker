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
 * 对所有设置的检查做检测，检查出错不会终止后续检查,做完全部检测后返回检测结果。
 * Class AllCheckDispatcher
 * @package vestin\checker\dispatchers
 */
class AllCheckDispatcher implements DispatcherInterface
{

    /**
     * @var CheckerInterface[] array
     */
    private $checkers = [];
    private $errors;

    public function addChecker(CheckerInterface $checker)
    {
        $this->checkers[] = $checker;
    }

    public function check()
    {
        $result = true;
        foreach ($this->checkers as $checker) {
            try {
                $checker->check();
            } catch (CheckNotPassException $e) {
                $this->errors[] = $e->getMessage();
                $result = false;
            }
        }

        return $result;
    }

    public function getError()
    {
        return $this->errors;
    }

}