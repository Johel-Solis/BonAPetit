<?php
declare(strict_types=1);

namespace Src\Menu\PlateExecutive\Domain\ValueObjects;

use InvalidArgumentException;

final class PlateExecutiveCost
{
    private $value;

    
    public function __construct(int $cost)
    {
        $this->validate($cost);
        $this->value = $cost;
    }

    /**
     * @param int $cost
     * @throws InvalidArgumentException
     */
    private function validate(int $cost): void
    {
        $options = array(
            'options' => array(
                'min_range' => 1,
            )
        );

        if (!filter_var($cost, FILTER_VALIDATE_INT, $options)) {
            throw new InvalidArgumentException(
                sprintf('<%s> does not allow the value <%s>.', static::class, $cost)
            );
        }
    }

    public function value(): int
    {
        return $this->value;
    }

}

