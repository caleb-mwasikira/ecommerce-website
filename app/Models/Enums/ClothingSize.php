<?php

namespace App\Models\Enums;

enum ClothingSize: string {
    case ExtraExtraSmall = "XXS";
    case ThriceExtraLarge = "3XL";
    case TwiceExtraLarge = "2XL";
    case ExtraLarge = "XL";
    case Large = "L";
    case Medium = "M";
    case Small = "S";
}
