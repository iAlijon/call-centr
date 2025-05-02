<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\YammtCategory;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arrs = [
            [
                'id' => 1,
                'name' => 'Ходимларни киритиш/расмийлаштириш масалалари',
                'category_type' => 1
            ],
            [
                'id' => 2,
                'name' => 'Бўлим, иш ўринларига боғлик масалалар',
                'category_type' => 1
            ],
            [
                'id' => 3,
                'name' => 'Шаффоф қурилиш тизимига оид масалалар',
                'category_type' => 1
            ],
            [
                'id' => 4,
                'name' => 'Шаффоф қурилиш тизимига оид масалалар',
                'category_type' => 1
            ],
            [
                'id' => 5,
                'name' => 'Бошқа лавозимга олиш, таътиллар',
                'category_type' => 1
            ],
            [
                'id' => 6,
                'name' => 'Аввалги меҳнат фаолиятига оид масалалар',
                'category_type' => 1
            ],
            [
                'id' => 7,
                'name' => 'Ташкилотнинг қайта ташкил этилиши бўйича',
                'category_type' => 1
            ],
            [
                'id' => 8,
                'name' => 'Шартномани бекор қилиш ҳолатлари',
                'category_type' => 1
            ],
            [
                'id' => 9,
                'name' => 'Тизимдаги носозликлар',
                'category_type' => 1
            ],
            [
                'id' => 10,
                'name' => 'Диплом маълумотлари бўйича саволлар',
                'category_type' => 1
            ],
            [
                'id' => 11,
                'name' => 'Ишдан бўшаш бўйича огоҳлантириш бериш ҳолатлари',
                'category_type' => 1
            ],
            [
                'id' => 12,
                'name' => 'Ходимнинг қариндошларини қўшиш масаласи',
                'category_type' => 1
            ],
            [
                'id' => 23,
                'name' => 'Ташкилот филиаллари/бошқармаларига доступ бериш масаласи',
                'category_type' => 1
            ],
            [
                'id' => 24,
                'name' => 'Ишга жойлашиш учун йўлланмалар масаласи',
                'category_type' => 1
            ],
            [
                'id' => 25,
                'name' => 'Бўш иш ўринлари бўйича отчет юбориш',
                'category_type' => 1
            ],
            [
                'id' => 26,
                'name' => 'Бахтсиз ҳодисаларни киритиш масалалари',
                'category_type' => 1
            ],
            [
                'id' => 27,
                'name' => 'Ходимларни бўшатилиши бўйича отчет масаласи',
                'category_type' => 1
            ],
            [
                'id' => 28,
                'name' => 'Меҳнатга лаёқатсизлик варақаси/больничный масалалари',
                'category_type' => 1
            ],
            [
                'id' => 29,
                'name' => 'Ҳомиладорлик ва туғиш нафақаси',
                'category_type' => 1
            ],
            [
                'id' => 30,
                'name' => 'Меҳнат дафтарчасидан кўчирма олиш',
                'category_type' => 1
            ],
            [
                'id' => 31,
                'name' => 'Токен калит масаласи',
                'category_type' => 1
            ],
            [
                'id' => 32,
                'name' => 'Меҳнат дафтарчасидан кўчирма олиш',
                'category_type' => 2
            ],
            [
                'id' => 33,
                'name' => 'Объективка масаласи (шахсий маълумотлар, партиявийлик, бошқалар)',
                'category_type' => 2
            ]
        ];

        foreach ($arrs  as $arr) {
            YammtCategory::create([
               'id' => $arr['id'],
               'name' => $arr['name'],
               'category_type' => $arr['category_type']
            ]);
        }
    }
}
