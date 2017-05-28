<?php
/**
 * Created by PhpStorm.
 * User: vestin
 * Date: 5/27/17
 * Time: 2:58 PM
 */

namespace Vestin\Checker;


class CheckerBus
{

    private $dispatcher;

    /**
     * CheckerBus constructor.
     * @param $dispatcher
     */
    public function __construct(DispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    /**
     * @param CheckerInterface $checker
     */
    public function addChecker(CheckerInterface $checker)
    {
        $this->dispatcher->addChecker($checker);
        return $this;
    }

    public function check()
    {
        return $this->dispatcher->check();
    }

    public function getError(){
        return $this->dispatcher->getError();
    }

}