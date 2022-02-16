<?php

namespace App\Console;

use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function() {
            //get all the investments that are active.
            $investments = DB::table('investments')->where('is_open', 1)->get();
            //foreach investments,
            foreach ($investments as $investment) {

                $today = Carbon::now();
                $maturityDate = $investment->maturity_date;

                //check if current date is greater than maturity date
                if ( $today->gt($maturityDate))
                {
                    DB::table('investments')->where('id', $investment->id)->update([
                        'is_open' => 0
                    ]);
                    continue;
                }

                //calculate the percentage increment
                $roi = ($investment->qty * $investment->pkg_amt) * ($investment->roi/100);
                //add percentage increment to investment histories
                DB::table('investment_histories')->insert([
                    'investment_id' => $investment->id,
                    'amount_paid' => $roi,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            }
        })->everyFiveMinutes();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
