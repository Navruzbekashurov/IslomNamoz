<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Region;
use App\Models\Translation;
use App\Models\RamadanCalendar;
use Carbon\Carbon;

class RegionSeeder extends Seeder
{
    public function run(): void
    {
        $regions = [
            ['uz' => 'Toshkent', 'ru' => 'Ташкент', 'en' => 'Tashkent', 'уз' => 'Тошкент'],
            ['uz' => 'Samarqand', 'ru' => 'Самарканд', 'en' => 'Samarkand', 'уз' => 'Самарканд'],
            ['uz' => 'Fargʻona', 'ru' => 'Фергана', 'en' => 'Fergana', 'уз' => 'Фарғона'],
            ['uz' => 'Andijon', 'ru' => 'Андижан', 'en' => 'Andijan', 'уз' => 'Андижон'],
            ['uz' => 'Namangan', 'ru' => 'Наманган', 'en' => 'Namangan', 'уз' => 'Наманган'],
            ['uz' => 'Buxoro', 'ru' => 'Бухара', 'en' => 'Bukhara', 'уз' => 'Бухоро'],
            ['uz' => 'Xorazm', 'ru' => 'Хорезм', 'en' => 'Khorezm', 'уз' => 'Хоразм'],
            ['uz' => 'Qashqadaryo', 'ru' => 'Кашкадарья', 'en' => 'Kashkadarya', 'уз' => 'Қашқадарё'],
            ['uz' => 'Surxondaryo', 'ru' => 'Сурхандарья', 'en' => 'Surkhandarya', 'уз' => 'Сурхондарё'],
            ['uz' => 'Jizzax', 'ru' => 'Джизак', 'en' => 'Jizzakh', 'уз' => 'Жиззах'],
            ['uz' => 'Sirdaryo', 'ru' => 'Сырдарья', 'en' => 'Sirdaryo', 'уз' => 'Сирдарё'],
            ['uz' => 'Navoiy', 'ru' => 'Навои', 'en' => 'Navoi', 'уз' => 'Навоий'],
            ['uz' => 'Qoraqalpogʻiston', 'ru' => 'Каракалпакстан', 'en' => 'Karakalpakstan', 'уз' => 'Қорақалпоғистон'],
        ];

        foreach ($regions as $regionData) {
            $region = Region::create(); // agar kerak bo‘lsa, ustunlar qo‘shing

            // 🈶 Tarjimalar (Translation)
            foreach ($regionData as $lang => $name) {
                Translation::create([
                    'entity_id' => $region->id,
                    'entity_type' => Region::class,
                    'language' => $lang,
                    'field_name' => 'name',
                    'field_value' => $name,
                ]);
            }

            // 🕌 Ramadan 30 kunlik jadval
            $startDate = Carbon::create(2025, 3, 1); // Ramazon boshlanish sanasi

            for ($day = 0; $day < 30; $day++) {
                RamadanCalendar::create([
                    'region_id' => $region->id,
                    'date' => $startDate->copy()->addDays($day)->toDateString(),
                    'suhoor_time' => '04:30', // vaqtincha umumiy
                    'iftar_time' => '18:30',  // vaqtincha umumiy
                ]);
            }
        }
    }
}
