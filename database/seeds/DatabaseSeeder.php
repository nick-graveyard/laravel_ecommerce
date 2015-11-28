<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Image;
use App\Models\Category;
use App\Models\UserProfile;
use App\Models\Product;
use App\Models\PriceAdjustment;
use App\Models\OrderItem;
use App\Models\Order;


// until min and max records are implemented in SeederUtil,
// run this seeder with the command:
// php artisan migrate:refresh --seed

class DatabaseSeeder extends Seeder {


	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

        //base tables
		$this->call('UsersTableSeeder');
        $this->call('ImagesTableSeeder');
        $this->call('UsersProfileTableSeeder');
        $this->call('CategoriesTableSeeder');
        $this->call('ProductsTableSeeder');
        //$this->call('PasswordResetsTableSeeder');

        //order related tables
        $this->call('OrdersTableSeeder');
		$this->call('OrderItemsTableSeeder');
        $this->call('PriceAdjustmentsTableSeeder');
	}

}


  
class SeederUtil extends Seeder {

     protected $faker;

     // change this variable for more or less records
     protected $num_records = 10;


     // need this to guard against repeated seeding/unseeding
     // messing up the database indexes
     // change the getRandRec function to begin and end with these
     // protected $minimum_record = blah;
     // protected $maximum_record = blah; 


     public function getRandRec()
     {
        return rand(0, $this->num_records - 1);
     }

      public function getFaker()
      {
        if (empty($this->faker))
        {
          $this->faker = Faker\Factory::create();
        }
        return $this->faker;
      }


}

class UsersTableSeeder extends SeederUtil {

    public function run()
    {
        DB::table('users')->delete();

        for ($i = 0; $i < $this->num_records; $i++)
        {
            $array = [
                "name" => $this->getFaker()->name,
                "email" => $this->getFaker()->email,
                "password" => Hash::make("password")
            ];

            User::create($array);
        }



    }
}


class ImagesTableSeeder extends SeederUtil {

    public function run()
    {
        DB::table('images')->delete();

        $faker = $this->getFaker();

        $image_list = [
            "http://i.imgur.com/j3NXQsK.jpg",
            "http://i.imgur.com/VxmP5AS.jpg",
            "http://i.imgur.com/IlFQw7c.jpg",
            "http://i.imgur.com/YFlyOti.jpg",
            "http://i.imgur.com/wU6f7XT.jpg",
            ];

        for ($i = 0; $i < $this->num_records; $i++)
        { 
            $array = [
                "url_location" => $image_list[ $this->getRandRec() % 5 ], 
                "description" => $this->getFaker()->text
                ];

            Image::create($array);
        }

    }

}


class UsersProfileTableSeeder extends SeederUtil {

    public function run()
    {
        DB::table('user_profiles')->delete();


        for ($i = 0; $i < $this->num_records; $i++)
        { 
            $array = [
                'user_id'=>$this->getRandRec(),
                'image_id'=>$this->getRandRec(),
                'about_me'=> $this->getFaker()->text
            ];

            UserProfile::create($array);

        }
    }

}

class CategoriesTableSeeder extends SeederUtil {

    public function run()
    {
        DB::table('categories')->delete();

        for ($i = 0; $i < $this->num_records; $i++)
        { 
            $array = [

                //this is a unique relation so needs the unique $i attached to it.
                'name' => $this->getFaker()->word . '_' . $i, 
                'image_id' => $this->getRandRec()
            ];


            Category::create($array);
        }

    }

}

class ProductsTableSeeder extends SeederUtil {

    public function run()
    {
        DB::table('products')->delete();


        for ($i = 0; $i < $this->num_records; $i++)
        { 
            $array = [
                "name" =>           $this->getFaker()->word, 
                "description" =>    $this->getFaker()->text, 
                "price" =>          $this->getFaker()->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100), 
                "category_id" =>    $this->getRandRec(), 
                "image_id" =>       $this->getRandRec()
            ];

            Product::create($array);
        }

    }

}



class OrderItemsTableSeeder extends SeederUtil {

    public function run()
    {
        DB::table('order_items')->delete();

        for ($i = 0; $i < $this->num_records; $i++)
        { 
            $array = [
                "order_id"      =>  $this->getRandRec(), 
                "product_id"    =>  $this->getRandRec(), 
                "quantity"      =>  $this->getFaker()->numberBetween($min = 1, $max = 20),
                'price'         =>  $this->getFaker()->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100)
            ];

            OrderItem::create($array);
        }



    }

}


class OrdersTableSeeder extends SeederUtil {

    public function run()
    {
        DB::table('orders')->delete();

        for ($i = 0; $i < $this->num_records; $i++)
        {
            $array = [
            'user_id' => $this->getRandRec()
            ];

            Order::create($array);

        }

    }

}



class PriceAdjustmentsTableSeeder extends SeederUtil {

    public function run()
    {
        DB::table('price_adjustments')->delete();

         for ($i = 0; $i < $this->num_records; $i++)
        {
            $array = [
            'type'          => $this->getFaker()->word, 
            'description'   => $this->getFaker()->text,
            'order_id'      => $this->getRandRec(), 
            'amount'        => $this->getFaker()->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100)
            ];

            PriceAdjustment::create($array);
        }

    }


}


/*
class PasswordResetsTableSeeder extends SeederUtil {

    public function run()
    {
        DB::table('password_resets')->delete();

    }

}

*/




