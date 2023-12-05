<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $records = [
            [
                'id' => 1,
                'title' => 'Giới thiệu',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore delectus molestiae, provident eius repellendus aspernatur, quas ipsam officiis officia magnam repellat? Eligendi exercitationem sint veritatis porro corrupti asperiores, natus eaque.',
                'url' => 'gioi-thieu',
                'meta_title' => 'Giới thiệu',
                'meta_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod non necessitatibus praesentium dolorem voluptates tempore.',
                'meta_keywords' => 'about, about us, giới thiệu, về chúng tôi',
                'status' => 1
            ],
            [
                'id' => 2,
                'title' => 'Chính sách và điều khoản',
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quia possimus nisi maxime blanditiis, quos sed a hic veniam ea aut reiciendis quasi fugit suscipit mollitia. Omnis asperiores totam dolores quas.',
                'url' => 'chinh-sach-dieu-khoan',
                'meta_title' => 'Chính sách và điều khoản',
                'meta_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus sit, asperiores minus velit dolores enim.',
                'meta_keywords' => 'terms, condition, chính sách, điều khoản, chính sách & điều khoản',
                'status' => 1
            ],
            [
                'id' => 3,
                'title' => 'Chính sách bảo mật',
                'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vitae consequatur saepe magnam sequi necessitatibus dolorem aut maxime quo facilis ratione, velit perspiciatis rerum assumenda accusantium laudantium magni rem deserunt temporibus?',
                'url' => 'chinh-sach-bao-mat',
                'meta_title' => 'Chính sách bảo mật',
                'meta_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos ad molestiae eaque a voluptatum nemo?',
                'meta_keywords' => 'privacy policy, privacy, policy, chính sách bảo mật',
                'status' => 1
            ],
        ];

        Page::insert($records);
    }
}
