<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\Permission;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        DB::table('categories')->insert(
            [
                [
                    'name' => 'Pizza',
                    'slug' => 'pizza',
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()


                ],
                [
                    'name' => 'Drinks',
                    'slug' => 'drinks',
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()


                ],
                [
                    'name' => 'Burgers',
                    'slug' => 'burgers',
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()


                ],
                [
                    'name' => 'Pasta',
                    'slug' => 'pasta',
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()


                ],

            ]
        );


        DB::table('roles')->insert(
           [
            [
                'name' => 'admin',

            ],
            [
                'name' => 'user',

            ],
            [
                'name' => 'vice_admin',

            ]
           ]
        );

     

        DB::table('users')->insert(
            [
                [
                    'name' => 'admin',
                    'email' => 'admin@gmail.com',
                    'password' => Hash::make('123456'),
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()


                ],
                [
                    'name' => 'nam',
                    'email' => 'nam@gmail.com',
                    'password' => Hash::make('123'),
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()


                ],


            ]
        );
        DB::table('products')->insert(
            [
                [
                    'name' => 'Italian Pizza',
                    'slug' => 'italian-pizza',
                    'image' => 'https://themewagon.github.io/pizza/images/pizza-1.jpg',
                    'price' => 2.09,
                    'description' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia',
                    'category_id' => 1,
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()
                ],
                [
                    'name' => 'Greek Pizza',
                    'slug' => 'greek-pizza',
                    'image' => 'https://themewagon.github.io/pizza/images/pizza-2.jpg',
                    'price' => 2.90,
                    'description' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia',
                    'category_id' => 1,
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()

                ],
                [
                    'name' => 'Caucasian Pizza',
                    'slug' => 'caucasian-pizza',
                    'image' => 'https://themewagon.github.io/pizza/images/pizza-3.jpg',
                    'price' => 3.90,
                    'description' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia',
                    'category_id' => 1,
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()

                ],
                [
                    'name' => 'American Pizza',
                    'slug' => 'american-pizza',
                    'image' => 'https://themewagon.github.io/pizza/images/pizza-4.jpg',
                    'price' => 6.90,
                    'description' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia',
                    'category_id' => 1,
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()

                ],
                [
                    'name' => 'Tomatoe Pie',
                    'slug' => 'tomatoe-pie',
                    'image' => 'https://themewagon.github.io/pizza/images/pizza-5.jpg',
                    'price' => 7.90,
                    'description' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia',
                    'category_id' => 1,
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()

                ],
                [
                    'name' => 'Margherita',
                    'slug' => 'margherita',
                    'image' => 'https://themewagon.github.io/pizza/images/pizza-6.jpg',
                    'price' => 10.90,
                    'description' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia',
                    'category_id' => 1,
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()

                ],
                [
                    'name' => 'Ham & Pineapple',
                    'slug' => 'ham-pineapple',
                    'image' => 'https://themewagon.github.io/pizza/images/pizza-7.jpg',
                    'price' => 30.90,
                    'description' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia',
                    'category_id' => 1,
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()

                ],
                [
                    'name' => 'Lemonade Juice',
                    'slug' => 'lemonade-juice',
                    'image' => 'https://themewagon.github.io/pizza/images/drink-1.jpg',
                    'price' => 1.90,
                    'description' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia',
                    'category_id' => 2,
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()

                ],
                [
                    'name' => 'Pineapple Juice',
                    'slug' => 'pineapple-juice',
                    'image' => 'https://themewagon.github.io/pizza/images/drink-2.jpg',
                    'price' => 2.90,
                    'description' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia',
                    'category_id' => 2,
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()

                ],
                [
                    'name' => 'Soda Drinks',
                    'slug' => 'soda-drinks',
                    'image' => 'https://themewagon.github.io/pizza/images/drink-3.jpg',
                    'price' => 3.90,
                    'description' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia',
                    'category_id' => 2,
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()

                ],
                [
                    'name' => 'France Burger',
                    'slug' => 'france-burger',
                    'image' => 'https://themewagon.github.io/pizza/images/burger-1.jpg',
                    'price' => 4.90,
                    'description' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia',
                    'category_id' => 3,
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()

                ],
                [
                    'name' => 'Itallian Burger',
                    'slug' => 'itallian-burger',
                    'image' => 'https://themewagon.github.io/pizza/images/burger-2.jpg',
                    'price' => 5.90,
                    'description' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia',
                    'category_id' => 3,
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()

                ],
                [
                    'name' => 'VietNam Burger',
                    'slug' => 'vietnam-burger',
                    'image' => 'https://themewagon.github.io/pizza/images/burger-3.jpg',
                    'price' => 6.90,
                    'description' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia',
                    'category_id' => 3,
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()

                ],
                [
                    'name' => 'China Pasta',
                    'slug' => 'china-pasta',
                    'image' => 'https://themewagon.github.io/pizza/images/pasta-1.jpg',
                    'price' => 7.90,
                    'description' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia',
                    'category_id' => 4,
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()

                ],
                [
                    'name' => 'Englane Pasta',
                    'slug' => 'englane-pasta',
                    'image' => 'https://themewagon.github.io/pizza/images/pasta-2.jpg',
                    'price' => 8.90,
                    'description' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia',
                    'category_id' => 4,
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()

                ],
                [
                    'name' => 'Egypt Pasta',
                    'slug' => 'egypt-pasta',
                    'image' => 'https://themewagon.github.io/pizza/images/pasta-3.jpg',
                    'price' => 90.90,
                    'description' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia',
                    'category_id' => 4,
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()

                ],

            ]

        );


         $permissions = [
            'admin.dashboard',
            'admin.showCategorySort',
            'admin.category.create',
            'admin.category.delete',
            'admin.category.edit',
            'admin.category.store',
            'admin.category.update',
            'admin.category.show',
            'admin.sort',
            'admin.product.index',
            'admin.product.create',
            'admin.product.store',
            'admin.product.edit',
            'admin.product.update',
            'admin.product.show',
            'admin.product.delete',
            'admin.role.index',
            'admin.role.create',
            'admin.role.store',
            'admin.user.index',
            'admin.user.create',
            'admin.user.store',
            'admin.user.edit',
            'admin.user.update',
            'admin.user.delete',
        ];
       
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }


        DB::table('posts')->insert(
            [
                [
                    'name' => 'The Delicious Pizza',
                    'image' => 'https://themewagon.github.io/pizza/images/image_1.jpg',
                    'slug' => 'the-delicious-pizza',
                    'content' => 'A small river named Duden flows by their place and supplies it with the necessary regelialia.',
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()
                ],
                [
                    'name' => 'The Delicious Pizza Italya',
                    'image' => 'https://themewagon.github.io/pizza/images/image_2.jpg',
                    'slug' => 'the-delicious-pizza-italya',
                    'content' => 'A small river named Duden flows by their place and supplies it with the necessary regelialia.',
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()
                ],
                [
                    'name' => 'The Delicious Pizza China',
                    'image' => 'https://themewagon.github.io/pizza/images/image_3.jpg',
                    'slug' => 'the-delicious-pizza-china',
                    'content' => 'A small river named Duden flows by their place and supplies it with the necessary regelialia.',
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()
                ],
                [
                    'name' => 'The Delicious Pizza Japan',
                    'image' => 'https://themewagon.github.io/pizza/images/image_4.jpg',
                    'slug' => 'the-delicious-pizza-japan',
                    'content' => 'A small river named Duden flows by their place and supplies it with the necessary regelialia.',
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()
                ],
                [
                    'name' => 'The Delicious Pizza India',
                    'image' => 'https://themewagon.github.io/pizza/images/image_5.jpg',
                    'slug' => 'the-delicious-pizza-india',
                    'content' => 'A small river named Duden flows by their place and supplies it with the necessary regelialia.',
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()
                ],
                [
                    'name' => 'Hot blog',
                    'image' => 'https://themewagon.github.io/pizza/images/image_6.jpg',
                    'slug' => 'hot-blog',
                    'content' => 'A small river named Duden flows by their place and supplies it with the necessary regelialia.',
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()
                ],


            ]
        );
    }
}
