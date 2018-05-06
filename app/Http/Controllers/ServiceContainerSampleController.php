<?php

namespace App\Http\Controllers;

use App\Contracts\IServiceA;
use App\Contracts\IServiceB;
use App\Contracts\IServiceC;
use App\Contracts\IServiceD;
use App\Contracts\IServiceAggregator;
use App\Services\ServiceA;
use App\Services\ServiceB;
use App\Services\ServiceC;
use App\Http\Controllers\Controller;
use Psr\Container\ContainerInterface;
use App\Facades\B;
use App\User;

class ServiceContainerSampleController extends Controller
{
    private $a;
    private $primitive;

    public function __construct(ServiceA $a, IServiceB $b, IServiceC $c, $primitive)
    {
        echo "*** constructor *** <br/>";
        echo "resolved ServiceA<br/>";
        echo "resolved IServiceB<br/>";
        echo "resolved IServiceC<br/>";
        echo 'resolve $primitive<br/>';

        $this->a = $a;
        $this->primitive = $primitive;
    }

    public function one()
    {
        echo "*** one *** <br/>";
        var_dump($this->a->getValue());
    }

    public function two(ServiceB $b)
    {
        echo "*** two *** <br/>";
        echo "ServiceB in reflection<br/>";
        var_dump($b->getValue());
    }
    

    public function three(ServiceA $a)
    {
        echo "*** three *** <br/>";
        echo "resolved ServiceA<br/>";
        var_dump($a->getValue());
    }

    public function four(IServiceA $a)
    {
        echo "*** four *** <br/>";
        echo "resolved IServiceA<br/>";
        var_dump($a->getValue());
    }

    public function five(IServiceB $b)
    {
        echo "*** five *** <br/>";
        var_dump($b->getValue());
    }

    public function six(IServiceC $c)
    {
        echo "*** six *** <br/>";
        var_dump($c->getValue());
    }

    public function seven()
    {
        echo "*** seven *** <br/>";
        var_dump($this->primitive);
    }

    public function eight(ContainerInterface $app)
    {
        echo "*** eight *** <br/>";
        echo "*** resolving Service Container with PSR-11 *** <br/>";
        var_dump($app);
    }

    public function nine(IServiceAggregator $aggregator)
    {
        echo "*** nine *** <br/>";
        echo "resolved ServiceA, ServiceB, ServiceC with aggregator<br/>";
        $value = $aggregator->getValue();
        var_dump($value);
    }

    public function ten()
    {
        echo "*** ten *** <br/>";

        $d = app()->make(IServiceD::class);
        var_dump($d->getValue());

        $d = resolve(IServiceD::class);
        var_dump($d->getValue());

        $d = app()->makeWith(IServiceD::class, [ 'value' => 'value-D-makeWith' ]);
        var_dump($d->getValue());
    }

    public function eleven()
    {
        echo "*** eleven *** <br/>";
        echo "Facades resolution <br/>";
        var_dump(B::getValue());
    }

    public function twelve()
    {
        echo "*** twelve *** <br/>";
        echo "Real-Time facades resolution <br/>";
        $user = new User();
        var_dump($user->getValueC());
    }
}