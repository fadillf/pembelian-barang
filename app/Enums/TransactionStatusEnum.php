<?php

namespace App\Enums;

enum TransactionStatusEnum: int
{
    case default = 0;
    case authorize = 1;
    case capture = 2;
    case settlement = 3;
    case deny = 4;
    case pending = 5;
    case cancel = 6;
    case refund = 7;
    case partial_refund = 8;
    case chargeback = 9;
    case partial_chargeback = 10;
    case expire = 11;
    case failure = 12;

    public function labels(): string
    {
        return match ($this) {
            self::default => "Default",
            self::authorize => "Authorized",
            self::capture => "Captured",
            self::settlement => "Settlement",
            self::deny => "Denied",
            self::pending => "Pending",
            self::cancel => "Canceled",
            self::refund => "Refunded",
            self::partial_refund => "Partially Refunded",
            self::chargeback => "Chargeback",
            self::partial_chargeback => "Partial Chargeback",
            self::expire => "Expired",
            self::failure => "Failed",
        };
    }
}
