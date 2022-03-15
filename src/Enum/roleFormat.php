<?php

namespace App\Enum;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

class roleFormat extends Type
{
    const ENUM_format = "roleFormat";
    const ChoiceAd = 'admin';
    const ChoiceUS = 'user';
    public function getSQLDeclaration(array $column, AbstractPlatform $platform): string
    {
        return "ENUM('admin', 'user')";
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
        if (!in_array($value, array(roleFormat::ChoiceAd, roleFormat::ChoiceUS))) {
            throw new \InvalidArgumentException("Invalid status");
        }
        return $value;
    }

    public function requiresSQLCommentHint(AbstractPlatform $platform)
    {
        return true;
    }



}