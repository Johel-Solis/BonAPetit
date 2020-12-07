<?php
declare(strict_types=1);

namespace Src\Menu\Cart\Domain\ValueObjects;

use Illuminate\Support\Facades\Date;
use InvalidArgumentException;
use Symfony\Component\VarDumper\Cloner\Data;

final class CartDate
{

    private $value;

    public function __construct(string $date)
    {
        $this->validate($date);
        $this->value = $date;
    }

    private function validate(string $date): void
    {

        if (empty($date)) {
            throw new InvalidArgumentException(
                sprintf('<%s> does not allow the value <%s>.', static::class, $date)
            );
        }
    }
    public function value(): string
    {
        return $this->value;
    }

 }




