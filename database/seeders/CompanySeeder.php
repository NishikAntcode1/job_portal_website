<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = [
            [
                'company_name' => 'DAMRO',
                'company_website' => 'https://www.damroindia.com',
                'company_logo' => 'DAMRO_logo.png',
            ],
            [
                'company_name' => 'Royaloak',
                'company_website' => 'https://www.royaloakindia.com',
                'company_logo' => 'Royaloak_logo.png',
            ],
            [
                'company_name' => 'SAJM BRAND HUB PVT.LTD',
                'company_website' => 'https://www.company-c.com',
                'company_logo' => 'SAJM_brand_hub_logo.jpeg',
            ],
            [
                'company_name' => 'Jubilant Foodworks',
                'company_website' => 'https://sajmbrandhubpvtltd.com',
                'company_logo' => 'jubilant-foodworks-logo.png',
            ],
            [
                'company_name' => 'Good Flippin Burgers',
                'company_website' => 'https://goodflippin.com',
                'company_logo' => 'gfb-logo.png',
            ],
            [
                'company_name' => 'Pottery Barn',
                'company_website' => 'https://www.potterybarn.in',
                'company_logo' => 'PotteryBarn-logo.png',
            ],
            [
                'company_name' => 'Fleetx',
                'company_website' => 'https://www.fleetx.io',
                'company_logo' => 'fleetx-logo-blog.png',
            ],
            [
                'company_name' => 'Justdial',
                'company_website' => 'https://www.justdial.com',
                'company_logo' => 'justdial-logo.png',
            ],
            [
                'company_name' => 'Paytm',
                'company_website' => 'https://paytm.com',
                'company_logo' => 'Paytm_logo.png',
            ],
            [
                'company_name' => 'Fincare',
                'company_website' => 'https://fincarebank.com',
                'company_logo' => 'Fincare-logo-tc.png',
            ],
            [
                'company_name' => 'Aditya Birla Capital',
                'company_website' => 'https://www.adityabirlacapital.com',
                'company_logo' => 'aditya-birla-capital-logo.png',
            ],
            [
                'company_name' => 'Wakefit',
                'company_website' => 'https://www.wakefit.co',
                'company_logo' => 'wakefit_logo.png',
            ],
            [
                'company_name' => 'Hoffmann Group',
                'company_website' => 'https://www.hoffmann-group.com',
                'company_logo' => 'Hoffmann_Group_logo.png',
            ],
            [
                'company_name' => 'Delhi Flour Mills',
                'company_website' => 'https://delhiflourmills.com',
                'company_logo' => 'delhi_flour_mills.jpeg',
            ],
            [
                'company_name' => 'PropTiger',
                'company_website' => 'https://www.proptiger.com',
                'company_logo' => 'prop_tiger_logo.jpg',
            ],
            [
                'company_name' => 'Trent Limited',
                'company_website' => 'https://trentlimited.com',
                'company_logo' => 'Trent_Limited_logo.png',
            ],
            [
                'company_name' => 'Reliance Retail',
                'company_website' => 'https://relianceretail.com',
                'company_logo' => 'reliance-retail-logo.png',
            ],
            [
                'company_name' => 'FYN',
                'company_website' => 'https://www.fynmobility.com',
                'company_logo' => 'fynlogo.png',
            ],
            [
                'company_name' => 'ICICI Prudential',
                'company_website' => 'https://www.iciciprulife.com',
                'company_logo' => 'ICICI_prudential_logo.jpg',
            ],
            [
                'company_name' => 'The Sleep Company',
                'company_website' => 'https://thesleepcompany.in',
                'company_logo' => 'the_sleep_company_logo.jpeg',
            ],
        ];

        DB::table('companies')->insert($companies);
    }
}
