<?php


class AllCheckPassTest extends \Codeception\Test\Unit
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
        $dispatcher = new \Vestin\Checker\Dispatchers\AllCheckDispatcher();
        $checkerBus = new \Vestin\Checker\CheckerBus($dispatcher);

        $passOneChecker = new \Vestin\Checker\Tests\Checkers\SimplePassChecker();
        $passTwoChecker = new \Vestin\Checker\Tests\Checkers\MathAddChecker(1, 2, 3);
        $passThreeChecker = new \Vestin\Checker\Tests\Checkers\SimplePassChecker();
        $passFourChecker = new \Vestin\Checker\Tests\Checkers\MathAddChecker(2,2,4);

        $checkerBus->addChecker($passOneChecker)
            ->addChecker($passTwoChecker)
            ->addChecker($passThreeChecker)
            ->addChecker($passFourChecker);
        $ret = $checkerBus->check();
        $this->assertTrue($ret);
    }
}