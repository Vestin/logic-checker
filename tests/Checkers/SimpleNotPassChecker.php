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

class SimpleNotPassChecker implements CheckerInterface
{

    public function check() {
        throw new CheckNotPassException('Simplily not pass, you knew it');
    }
}