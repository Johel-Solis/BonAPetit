<?php
declare(strict_types=1);

namespace src\Menu\Plate\Domain\ValueObjects;
use InvalidArgumentException;

final class PlateDescription
{

    private $value;

    public function __construct(string $description)
    {
        $this->value = $description;
    }

    public function value(): string
    {
        return $this->value;
    }
    
 }



?>
