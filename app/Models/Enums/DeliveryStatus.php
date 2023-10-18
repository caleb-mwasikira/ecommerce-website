<?php

namespace App\Models\Enums;

enum DeliveryStatus: string {
    case Pending = "pending";
    case onTransit = "on-transit";
    case Delivered = "delivered";
}
