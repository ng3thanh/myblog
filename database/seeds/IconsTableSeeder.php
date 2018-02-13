<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class IconsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('setting_icons')->truncate();
        $data = [
            [
                'icon' => 'icomoon icon-heart-broken',
                'name' => 'Heartbroken',
                'type' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'icon' => 'icomoon icon-shocked',
                'name' => 'Shocked',
                'type' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'icon' => 'fa fa-frown-o',
                'name' => 'Sad',
                'type' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'icon' => 'icomoon icon-wondering',
                'name' => 'Wondering',
                'type' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'icon' => 'fa fa-meh-o',
                'name' => 'Normal',
                'type' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'icon' => 'icomoon icon-wink',
                'name' => 'Wink',
                'type' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'icon' => 'fa fa-smile-o',
                'name' => 'Happy',
                'type' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'icon' => 'icomoon icon-grin',
                'name' => 'Crazy',
                'type' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'icon' => 'ionicons ion-android-sunny',
                'name' => 'Sunny',
                'type' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'icon' => 'ionicons ion-android-cloud-outline',
                'name' => 'Clear',
                'type' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'icon' => 'ionicons ion-ios-rainy',
                'name' => 'Rain',
                'type' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'icon' => 'ionicons ion-ios-cloud',
                'name' => 'Mist',
                'type' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'icon' => 'ionicons ion-ios-snowy',
                'name' => 'Snow',
                'type' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'icon' => 'icomoon icon-quill',
                'name' => 'Windy',
                'type' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'icon' => 'ionicons ion-ios-thunderstorm-outline',
                'name' => 'Tornado',
                'type' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ];

        foreach ($data as $value) {
            DB::table('setting_icons')->insert($value);
        }

    }
}
