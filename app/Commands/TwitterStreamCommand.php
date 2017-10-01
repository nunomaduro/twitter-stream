<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;
use Spatie\LaravelTwitterStreamingApi\TwitterStreamingApiFacade as TwitterStreamingApi;

class TwitterStreamCommand extends Command
{
    /**
     * The name and signature of the command.
     *
     * @var string
     */
    protected $signature = 'twitter-stream {hears=laravel}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'The twitter stream command.';

    /**
     * Execute the command. Here goes the code.
     *
     * @return void
     */
    public function handle(): void
    {
        TwitterStreamingApi::publicStream()
            ->whenHears($this->argument('hears'), function(array $tweet) {
                $this->notify(
                    $tweet['user']['screen_name'],
                    $tweet['text'] ,
                    BASE_PATH . '/assets/laravel.png'
                );
            })
            ->startListening();
    }

    /**
     * Define the command's schedule.
     *
     * Add the following cron entry:
     *     * * * * * php /path-to-your-project/your-app-name schedule:run >> /dev/null 2>&1
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     *
     * @return void
     */
    public function schedule(Schedule $schedule): void
    {
        $schedule->command(static::class)->everyMinute()->withoutOverlapping();
    }
}
