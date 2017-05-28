<?php


class SimpleTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testSomeFeature()
    {
        $dispatcher = new \Vestin\Checker\Dispatchers\SimpleDispatcher();
        $checkerBus = new \Vestin\Checker\CheckerBus($dispatcher);

        $passChecker = new \Vestin\Checker\Tests\Checkers\SimplePassChecker();
        $mathChecker = new \Vestin\Checker\Tests\Checkers\MathAddChecker(1, 2, 3);

        $checkerBus->addChecker($passChecker)
            ->addChecker($mathChecker);
        $ret = $checkerBus->check();
        $this->assertTrue($ret);
    }
}