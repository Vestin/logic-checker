<?php


class AllCheckNotPassTest extends \Codeception\Test\Unit
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
        $notPassTwoChecker = new \Vestin\Checker\Tests\Checkers\MathAddChecker(1, 2, 4);
        $passThreeChecker = new \Vestin\Checker\Tests\Checkers\SimplePassChecker();
        $notPassFourChecker = new \Vestin\Checker\Tests\Checkers\MathAddChecker(2,2,5);
        $notPassFiveChecker = new \Vestin\Checker\Tests\Checkers\SimpleNotPassChecker();

        $checkerBus->addChecker($passOneChecker)
            ->addChecker($notPassTwoChecker)
            ->addChecker($passThreeChecker)
            ->addChecker($notPassFourChecker)
            ->addChecker($notPassFiveChecker);
        $ret = $checkerBus->check();
        $this->assertFalse($ret);
        $this->assertCount(3,$checkerBus->getError());
    }
}