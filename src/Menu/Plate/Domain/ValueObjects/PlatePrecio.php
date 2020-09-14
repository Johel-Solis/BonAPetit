<?php

declare(strict_types=1);

namespace Src\Menu\Plate\Domain\ValueObjects;

use InvalidArgumentException;

final class PlatePrecio
{
    private $value;

    /**
     * UserId constructor.
     * @param int $id
     * @throws InvalidArgumentException
     */
    public function __construct(int $precio)
    {
        $this->validate($precio);
        $this->value = $precio;
    }

    /**
     * @param int $id
     * @throws InvalidArgumentException
     */
    private function validate(int $precio): void
    {
        $options = array(
            'options' => array(
                'min_range' => 0,
            )
        );

        if (!filter_var($precio, FILTER_VALIDATE_INT, $options)) {
            throw new InvalidArgumentException(
                sprintf('<%s> does not allow the value <%s>.', static::class, $precio)
            );
        }
    }

    public function value(): int
    {
        return $this->value;
    }

}
