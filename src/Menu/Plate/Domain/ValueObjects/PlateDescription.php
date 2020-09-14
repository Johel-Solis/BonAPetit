<?php
declare(strict_types=1);

namespace Src\Menu\Plate\Domain\ValueObjects;
use InvalidArgumentException;

final class PlateDescription
{

    private $value;

    public function __construct(string $description)
    {
        //$this->validate($description);
        $this->value = $description;
    }

    private function validate(string $description): void
    {

        if (empty($description)) {
            throw new InvalidArgumentException(
                sprintf('<%s> does not allow the value <%s>.', static::class, $description)
            );
        }
    }

    public function value(): string
    {
        return $this->value;
    }
    
 }



