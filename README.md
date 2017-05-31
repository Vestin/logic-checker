logic-checker
----
a reusable,SRP component for complex logic checker.
* write DRY code
* preventing to use lots of if else statement
* make logic checker reusable

### usage:
install
```
composer require "vestin/logic-checker:*",
```
### example:
write a checker
```
use Vestin\Checker\CheckNotPassException;

class MathAddChecker implements CheckerInterface
{

    private $paramOne;
    private $paramTwo;
    private $result;

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
```

check passed example:
```
include 'vendor/autolad.php'

$dispatcher = new \Vestin\Checker\Dispatchers\SimpleDispatcher();
$checkerBus = new \Vestin\Checker\CheckerBus($dispatcher);

$checker = new MathAddChecker(1, 2, 3); // 1+2=3
$checker2 = new MathAddChecker(2, 3, 5); // 2+3=5

$checkerBus->addChecker($checker)
           ->addChecker($cherker2);
    
if($checkerBus->check()){
    // check pass
    echo 'check passed'; // this will called
}else{
    // check not pass
    $error = $checkerBus->getError();
}
```

check not passed example:
```
include 'vendor/autolad.php'

$dispatcher = new \Vestin\Checker\Dispatchers\SimpleDispatcher();
$checkerBus = new \Vestin\Checker\CheckerBus($dispatcher);

$checker = new MathAddChecker(1, 2, 3); // 1+2=3
$checker2 = new MathAddChecker(2, 3, 6); // 2+3=5 this is wrong

$checkerBus->addChecker($checker)
           ->addChecker($cherker2);
    
if($checkerBus->check()){
    // check pass
    // echo 'check passed';
}else{
    // check not pass
    // this will called
    $error = $checkerBus->getError(); // $error will be a string 'calc error';
}
```