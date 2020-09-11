<?php
declare(strict_types=1);

namespace src\Menu\Plate\Domain\ValueObjects;
use InvalidArgumentException;

final class PlateName
{

    private $value;

    public function __construct(string $name)
    {
        $this->value = $name;
    }

    public function value(): string
    {
        return $this->value;
    }
    
 }



?>
