<?php
declare(strict_types=1);

namespace Src\Menu\PlateExecutive\Domain\ValueObjects;
use InvalidArgumentException;

final class PlateExecutiveObservation
{

    private $value;

    public function __construct(string $observation)
    {
        $this->validate($observation);
        $this->value = $observation;

    }

    private function validate(string $observation): void
    {

        if (empty($observation)) {
            throw new InvalidArgumentException(
                sprintf('<%s> does not allow the value <%s>.', static::class, $observation)
            );
        }
    }
    public function value(): string
    {
        return $this->value;
    }
    
 }




