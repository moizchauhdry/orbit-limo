<?php

namespace App\Console\Commands;

use App\Models\Booking;
use App\Notifications\RideNotification;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

class RideNotificationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ride:notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $bookings = Booking::whereDate('pickup_date', Carbon::tomorrow())->get();
        foreach ($bookings as $key => $booking) {
            Notification::send($booking, new RideNotification($booking));
        }
    }
}
