<?php

namespace App\Models\Enums;

enum FileType: string {
    case Image = "image";
    case Video = "video";
    case Audio = "audio";
    case File = "file";
}
