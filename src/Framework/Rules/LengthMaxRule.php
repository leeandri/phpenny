<?php

namespace Framework\Rules;

use Framework\Contracts\RuleInterface;
use InvalidArgumentException;

class LengthMaxRule implements RuleInterface
{
    public function validate(array $data, string $field, array $params): bool
    {
        if (empty($params[0])) {
            throw new InvalidArgumentException('Valeur maximum non spécifié');
        }

        $length = (int) $params[0];

        return strlen($data[$field]) < $length;
    }

    public function getMessage(array $data, string $field, array $params): string
    {
        return "Dépasse la limite maximale de {$params[0]} caractères";
    }
}
