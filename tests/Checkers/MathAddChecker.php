<?php
/**
 * Created by PhpStorm.
 * User: vestin
 * Date: 5/27/17
 * Time: 4:56 PM
 */

namespace Vestin\Checker\Tests\Checkers;

use Vestin\Checker\CheckerInterface;
use Vestin\Checker\CheckNotPassException;

class MathAddChecker implements CheckerInterface
{

    private $paramOne;
    private $paramTwo;
    private $result;

    /**
     * MathAddChecker constructor.
     * @param $paramOne
     * @param $paramTwo
     * @param $result
     */
    public function __construct($paramOne, $paramTwo, $result)
    {
        $this->paramOne = $paramOne;
        $this->paramTwo = $paramTwo;
        $this->result = $result;
    }


    public function check() {
        if( ($this->paramOne + $this->paramTwo) != $this->result){
            throw new CheckNotPassException('calc error');
        }
    }

}