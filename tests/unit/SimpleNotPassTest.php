<?php


class SimpleNotPassTest extends \Codeception\Test\Unit
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
    public function testNotPass()
    {
        $dispatcher = new \Vestin\Checker\Dispatchers\SimpleDispatcher();
        $checkerBus = new \Vestin\Checker\CheckerBus($dispatcher);

        $passChecker = new \Vestin\Checker\Tests\Checkers\SimplePassChecker();
        $checker = new \Vestin\Checker\Tests\Checkers\SimpleNotPassChecker();

        $checkerBus->addChecker($passChecker)->addChecker($checker);
        $ret = $checkerBus->check();

        $this->assertFalse($ret);
        $this->assertEquals($checkerBus->getError(), 'Simplily not pass, you knew it');
    }

    // tests
    public function testNotPassTwo()
    {
        $dispatcher = new \Vestin\Checker\Dispatchers\SimpleDispatcher();
        $checkerBus = new \Vestin\Checker\CheckerBus($dispatcher);

        $passChecker = new \Vestin\Checker\Tests\Checkers\SimplePassChecker();
        $passTwoChecker = new \Vestin\Checker\Tests\Checkers\SimplePassChecker();
        $mathChecker = new \Vestin\Checker\Tests\Checkers\MathAddChecker(1, 2, 4);
        $passThreeChecker = new \Vestin\Checker\Tests\Checkers\SimplePassChecker();

        $checkerBus->addChecker($passChecker)
            ->addChecker($passTwoChecker)
            ->addChecker($mathChecker)
            ->addChecker($passThreeChecker);
        $ret = $checkerBus->check();

        $this->assertFalse($ret);
        $this->assertEquals($checkerBus->getError(), 'calc error');
    }
}