<?php

use App\Plan;
use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

		$plan1 = new Plan();
		$plan1->name = 'SILVER';
		$plan1->price_year = 1050;
		$plan1->old_price_year = 1590;
		$plan1->price_half_year = 600;
		$plan1->html = "<ul class=\"list-group list-group-flush\">
              <li class=\"list-group-item\">Company profile page</li><li class=\"list-group-item\">Company listing in catalog</li><li class=\"list-group-item\">Newsletter</li><li class=\"list-group-item\">Basic support</li><li class=\"list-group-item disabled\"><span style=\"color: rgb(156, 156, 148); background-color: rgb(255, 255, 255);\">Individual support</span></li><li class=\"list-group-item disabled\"><span style=\"color: rgb(156, 156, 148); background-color: rgb(255, 255, 255);\">Advertisement in catalog</span></li><li class=\"list-group-item disabled\"><span style=\"color: rgb(156, 156, 148); background-color: rgb(255, 255, 255);\">Partners matching service</span></li><li class=\"list-group-item disabled\"><span style=\"color: rgb(156, 156, 148); background-color: rgb(255, 255, 255);\">Logistic service request</span></li><li class=\"list-group-item disabled\"><span style=\"color: rgb(156, 156, 148); background-color: rgb(255, 255, 255);\">First in the catalog</span></li>
            </ul>";

		$plan1->save();


		$plan2 = new Plan();
		$plan2->name = 'GOLD';
		$plan2->price_year = 1750;
		$plan2->old_price_year = 2900;
		$plan2->price_half_year = 900;
		$plan2->html = "<ul class=\"list-group list-group-flush\">
              <li class=\"list-group-item\">Company profile page</li><li class=\"list-group-item\">Company listing in catalog</li><li class=\"list-group-item\">Newsletter</li><li class=\"list-group-item\">Basic support</li><li class=\"list-group-item\">Individual support</li><li class=\"list-group-item\">Advertisement in catalog</li><li class=\"list-group-item\">Partners matching service</li><li class=\"list-group-item\">Logistic service request</li><li class=\"list-group-item\">First in the catalog</li>
            </ul>";

		$plan2->save();
    }
}
