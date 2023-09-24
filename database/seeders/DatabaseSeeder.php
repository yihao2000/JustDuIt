<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);



        //Roles
        DB::table('roles')->insert([
            'name' => 'Admin'
        ]);
        DB::table('roles')->insert([
            'name' => 'Member'
        ]);


         //Users
         DB::table('users')->insert([
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'username' => 'admin',
            'role_id' => 1,
        ]);


        DB::table('users')->insert([
            'email' => 'andrew@andrew.com',
            'password' => Hash::make('andrew'),
            'username' => 'andrew',
            'role_id' => 2,
        ]);


        //Products
        DB::table('products')->insert([
            'name' => 'Nike Air Force 1 07 Triple White',
            'description' => 'The radiance lives on in the Nike Air Force 1 ’07, the b-ball OG that puts a fresh spin on what you know best: durably stitched overlays, clean finishes and the perfect amount of flash to make you shine.',
            'price' => 900000,
            'image' => 'airforce1tw.jpg',
        ]);

        DB::table('products')->insert([
            'name' => 'Nike Dunk Low Retro White',
            'description' => 'The Nike Dunk Low Retro White Black (2021) treats the retro model to an essential two-tone color scheme that accentuates the sneaker’s clean lines, developed by designer Peter Moore and responsible for the shoes.',
            'price' => 3300000,
            'image' => 'nikedunklowrwb.png',
        ]);

        DB::table('products')->insert([
            'name' => 'Adidas Yeezy Foam RNNR Sulfur',
            'description' => 'The adidas Yeezy Foam Runner ‘Sulfur’ showcases a yellowish beige hue throughout the one-piece EVA foam build, featuring strategically placed vents throughout the vamp and side panels for maximum breathability.',
            'price' => 1850000,
            'image' => 'yeezysulfur.jpeg',
        ]);

        DB::table('products')->insert([
            'name' => 'Converse Chuck Taylor All-Star 70S Cdg Play Black',
            'description' => 'Converse Chuck Taylor All-Star 70S Cdg Play Black shoes',
            'price' => 2850000,
            'image' => 'conversecdg.jpg',
        ]);

        DB::table('products')->insert([
            'name' => 'Vans Classic Slip-On Checkerboard',
            'description' => 'Vans Classic Slip-On Checkerboard Shoes',
            'price' => 600000,
            'image' => 'vanschecker.jpg',
        ]);

        DB::table('products')->insert([
            'name' => 'Adidas Yeezy Boost 350 V2 MX Rock',
            'description' => 'The adidas Yeezy Boost 350 V2 MX Rock showcases sedimentary streaks of brown and grey throughout a breathable Primeknit upper in a dark charcoal finish.',
            'price' => 4350000,
            'image' => 'yeezymxrock.jpg',
        ]);

        DB::table('products')->insert([
            'name' => 'Puma RS-X Toys White High Risk Red',
            'description' => 'Designed for the most dedicated runner, the Cabana Racer Fun kept the foot low to the ground to power muscles with its breathable cushioning both on and off the track.',
            'price' => 962000,
            'image' => 'pumarsx.jpg',
        ]);

        DB::table('products')->insert([
            'name' => 'Nike Air Max 90 White Black Hot Curry',
            'description' => 'The Nike Air Max 90 White Black Hot Curry has been privy to some pretty clean colorways since its fully-fledged 30th anniversary run in 2020, with the trend continuing all the way through 2021 ',
            'price' => 2200000,
            'image' => 'airmaxhotcurry.png',
        ]);

        DB::table('products')->insert([
            'name' => 'Adidas Ultra Boost DNA Cloud White Silver Metallic',
            'description' => 'In honor of the 60th anniversary of visually impaired athletes competing in the Paralympic Games, these adidas running shoes incorporate Braille-like lettering on the upper that spells Run.',
            'price' => 1550000,
            'image' => 'ubdnacloud.jpg',
        ]);

        DB::table('products')->insert([
            'name' => 'Jordan 1 Retro High COJP Midnight Navy',
            'description' => 'he 2020 reissue of the Air Jordan 1 Retro High CO.JP ‘Midnight Navy’ brings back a Japan-exclusive colorway that first launched in 2001 in a limited run of just 3,000 pairs. ',
            'price' => 3300000,
            'image' => 'jordancojp.jpg',
        ]);

        DB::table('products')->insert([
            'name' => 'Nike PG 2.5 Playstation Multi-Color',
            'description' => 'Paul George and Nike Basketball will expand on the PlayStation releases which celebrates his love of gaming. Once again using the Nike PG 2.5, this time around it comes covered in Blue.',
            'price' => 6050000,
            'image' => 'nikepgps.jpg',
        ]);

        DB::table('products')->insert([
            'name' => 'Jordan 11 Retro Low IE Bred ',
            'description' => 'While the Air Jordan 11 IE Low doesn’t receive as much mention in the media compared to its other AJ counterparts.',
            'price' => 1450000,
            'image' => 'jordan11.png',
        ]);






    }
}
