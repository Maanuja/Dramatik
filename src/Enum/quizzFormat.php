<?php

namespace App\Enum;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

class quizzFormat extends Type
{
    const ENUM_format = "enumFormat";
    const ChoiceDe = '5';
    const Choice_seven = '7';
    const Choice_ten = '10';
    public function getSQLDeclaration(array $column, AbstractPlatform $platform): string
    {
        return "ENUM('5', '7', '10')";
    }

    public function getName(): string
    {
        return quizzFormat::ENUM_format;
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return $value;
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        if (!in_array($value, array(quizzFormat::ChoiceDe, quizzFormat::Choice_seven, quizzFormat::Choice_ten))) {
            throw new \InvalidArgumentException("Invalid status");
        }
        return $value;
    }

    public function requiresSQLCommentHint(AbstractPlatform $platform)
    {
        return true;
    }

}