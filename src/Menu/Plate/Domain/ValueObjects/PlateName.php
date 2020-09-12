<?php
declare(strict_types=1);

namespace src\Menu\Plate\Domain\ValueObjects;
use InvalidArgumentException;

final class PlateName
{

    private $value;

    public function __construct(string $name)
    {
        $this->validate($name);
        $this->value = $name;
    }

    private function validate(string $name): void
    {

        if (empty($name)) {
            throw new InvalidArgumentException(
                sprintf('<%s> does not allow the value <%s>.', static::class, $name)
            );
        }
    }
    public function value(): string
    {
        return $this->value;
    }
    
 }



?>
