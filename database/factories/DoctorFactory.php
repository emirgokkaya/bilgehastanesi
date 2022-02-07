<?php

namespace Database\Factories;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DoctorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Doctor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'degree' => $this->faker->name,
            'name' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'profile_photo' => $this->faker->imageUrl(250, 250),
            'speciality' => $this->faker->text,
            'education' => $this->faker->text,
            'experience' => $this->faker->text,
            'email' => $this->faker->email,
            'biography' => $this->faker->text,
            'facebook' => 'https://facebook.com',
            'instagram' => 'https://instagram.com',
            'whatsapp' => 'https://whatsapp.com',
            'twitter' => 'https://twitter.com',
            'linkedin' => 'https://linkedin.com',
            'date_of_birth' => $this->faker->date(),
            'foreign_language' => $this->faker->languageCode,
        ];
    }
}
