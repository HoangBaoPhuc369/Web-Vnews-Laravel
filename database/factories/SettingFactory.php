<?php

namespace Database\Factories;

use App\Models\Setting;
use Illuminate\Database\Eloquent\Factories\Factory;

class SettingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Setting::class;

    public function definition()
    {
        return [
            'about_first_text' => $this->faker->paragraph(),
            'about_second_text' => $this->faker->paragraph(),
            'about_first_image' => 'setting/about-img-1.jpg',
            'about_second_image' => 'setting/about-img-2.jpg',
            'about_third_image' => 'setting/about-i3.mg-9.jpg',
            'banner_image_1' => 'setting/about-img-jpg',
            'banner_image_2' => 'setting/about-img-4.jpg',
            'banner_image_3' => 'setting/about-img-5.jpg',
            'banner_image_4' => 'setting/about-img-6.jpg',
            'sub_banner1' => 'setting/about-img-7.jpg',
            'sub_banner2' => 'setting/about-img-8.jpg',
            'about_our_vision' => $this->faker->paragraph(),
            'about_our_mission' => $this->faker->paragraph(),
            'about_services' => $this->faker->paragraph(),
        ];
    }
}
