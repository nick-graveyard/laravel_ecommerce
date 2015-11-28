<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Image;
use App\Models\Product;

class DatabaseSeeder extends Seeder {


	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
		$this->call('UsersTableSeeder');
        $this->call('ImagesTableSeeder');
        $this->call('UsersProfileTableSeeder');
        $this->call('PasswordResetsTableSeeder');
		$this->call('CategoriesTableSeeder');
		$this->call('ProductsTableSeeder');
		$this->call('OrdersTableSeeder');
		$this->call('OrdersProductsTableSeeder');
        $this->call('PriceAdjustmentsTableSeeder');
	}

}


  
class SeederUtil extends Seeder {

     protected $faker;



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

        $faker = $this->getFaker();

        for ($i = 0; $i < 10; $i++)
        {
            $name     = $faker->name;
            $email    = $faker->email;
            $password = Hash::make("password");

            User::create( ["name" => $name, "email" => $email, "password" => $password] );
            // $user = new User()
        }



    }
}

class UsersProfileTableSeeder extends SeederUtil {

    public function run()
    {
        DB::table('user_profiles')->delete();


        for ($i = 0; $i < 10; $i++)
        {

           // $user_id = User->find($i)
           // $image_id
           // $about_me

            // 
        }
    }

}

class PasswordResetsTableSeeder extends SeederUtil {

    public function run()
    {
        DB::table('password_resets')->delete();

    }

}


class CategoriesTableSeeder extends SeederUtil {

    public function run()
    {
        DB::table('categories')->delete();

    }

}


class OrdersTableSeeder extends SeederUtil {

    public function run()
    {
        DB::table('orders')->delete();

    }

}

class OrdersProductsTableSeeder extends SeederUtil {

    public function run()
    {
        DB::table('order_products')->delete();

    }

}

class ProductsTableSeeder extends SeederUtil {

    public function run()
    {
        DB::table('products')->delete();

    }

}

class ImagesTableSeeder extends SeederUtil {

    public function run()
    {
        DB::table('images')->delete();

    }

}

class PriceAdjustmentsTableSeeder extends SeederUtil {

    public function run()
    {
        DB::table('price_adjustments')->delete();

    }

}




