<?php

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            [
                'icon' => '<i class="fas fa-stethoscope font-weight-600 text-theme-colored font-38"></i>',
                'service' => 'consultation'
            ],
            [
                'icon' => '<i class="fas fa-syringe font-weight-600 text-theme-colored font-38"></i>',
                'service' => 'operation'
            ],
            [
                'icon' => '<i class="fas fa-ambulance font-weight-600 text-theme-colored font-38"></i>',
                'service' => 'emergency'
            ],
            [
                'icon' => '<i class="fa fa-credit-card-alt font-weight-600 text-theme-colored font-38"></i>',
                'service' => 'payment'
            ],
            [
                'icon' => '<i class="fas fa-file-medical-alt font-weight-600 text-theme-colored font-38"></i>',
                'service' => 'charges'
            ],
            [
                'icon' => '<i class="fas fa-procedures font-weight-600 text-theme-colored font-38"></i>',
                'service' => 'hospitalisation'
            ],
            [
                'icon' => '<i class="fas fa-user-md font-weight-600 text-theme-colored font-38"></i>',
                'service' => 'doctors'
            ],
            [
                'icon' => '<i class="fas fa-user-nurse font-weight-600 text-theme-colored font-38"></i>',
                'service' => 'nurse'
            ],
            [
                'icon' => '<i class="fas fa-crutch font-weight-600 text-theme-colored font-38"></i>',
                'service' => 'handicap'
            ],
        ];

        foreach ($services as $service) {
            \App\Service::create($service);
        }
        $r = [];
        $r[] .= 1;
        $r[] .= 2;
        dd($r);
    }
}
