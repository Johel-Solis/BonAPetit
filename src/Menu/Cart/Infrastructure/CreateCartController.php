<?php

declare(strict_types=1);

namespace Src\Menu\Cart\Infrastructure;

use Illuminate\Http\Request;
use Src\Menu\cart\Application\{CreateCartUseCase,CreateCartPlateSpecialUseCase,CreateCartPlateExecutiveUseCase};
use Src\Menu\Cart\Infrastructure\Repositories\{EloquentCartRepository,EloquentCartPlateSpecialRepository,EloquentCartPlateExecutiveRepository};
use Src\Menu\Cart\Domain\ValueObjects\CartId;




final class CreateCartController
{
    private $repositorySpecial;
    private $repositoryExecutive;
    private $repositoryCart;


    public function __construct()
    {
        $this->repositorySpecial = new EloquentCartPlateSpecialRepository();
        $this->repositoryExecutive = new EloquentCartPlateExecutiveRepository();
        $this->repositoryCart = new EloquentcartRepository();
    }

    public function __invoke(string $date,int $total, Array $Executives,Array $Specials)
    {
        
        $createCartUseCase = new CreateCartUseCase($this->repositoryCart);
         $cart =$createCartUseCase->__invoke( $date, $total, $Specials, $Executives);
    if($Executives!=null){
        $createCartExecutiveUseCase = new CreateCartPlateExecutiveUseCase($this->repositoryExecutive);
        $createCartExecutiveUseCase->__invoke($cart->id(),$Executives);

    }

    if($Specials!=null){
        $createCartSpecialUseCase = new CreateCartPlateSpecialUseCase($this->repositorySpecial);
        $createCartSpecialUseCase->__invoke($cart->id(),$Specials);

    }
        

        


    }
}
