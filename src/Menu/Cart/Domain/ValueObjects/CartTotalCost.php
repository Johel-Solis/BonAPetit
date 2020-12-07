<?php
declare(strict_types=1);

namespace Src\Menu\Cart\Domain\ValueObjects;

use InvalidArgumentException;

final class CartTotalCost
{
    private $value;

    
    public function __construct(int $totalCost)
    {
        $this->validate($totalCost);
        $this->value = $totalCost;
    }

    
    private function validate(int $totalCost): void
    {
        $options = array(
            'options' => array(
                'min_range' => 1,
            )
        );

        if (!filter_var($totalCost, FILTER_VALIDATE_INT, $options)) {
            throw new InvalidArgumentException(
                sprintf('<%s> does not allow the value <%s>.', static::class, $totalCost)
            );
        }
    }

    public function value(): int
    {
        return $this->value;
    }

}

