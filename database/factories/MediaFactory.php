<?php

namespace Database\Factories;

use App\Models\Enums\FileType;
use Mimey\MimeTypes;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Media>
 */
class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $imgUrls = [
            "/images/ian-kiragu-GSh_PwsZsPQ-unsplash.jpg",
            "/images/mediamodifier-7cERndkOyDw-unsplash.jpg",
            "/images/pablo-lancaster-jones-9ay2Q3-NKCI-unsplash.jpg",
            "/images/pablo-lancaster-jones-NymiJ3ZHsQo-unsplash.jpg",
            "/images/pablo-lancaster-jones-rYIru_nEXmo-unsplash.jpg",
            "/images/mnz-ToLMORRb97Q-unsplash.jpg",
            "/images/tu-tu-QZGQO3NvsLo-unsplash.jpg",
            "/images/heather-ford-5gkYsrH_ebY-unsplash.jpg",
        ];
        $mimes = new MimeTypes;
        $filepath = fake()->randomElement($imgUrls);
        $ext = pathinfo($filepath, PATHINFO_EXTENSION);

        return [
            "type" => FileType::Image->value,
            "file_name" => basename($filepath),
            "file_path" => parse_url($filepath)["path"],
            "mime_type" => $mimes->getMimeType($ext),
            "file_size" => fake()->randomNumber(4),
        ];
    }
}
