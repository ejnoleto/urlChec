<?php

namespace App\Console\Commands;

use App\Models\Url;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;

class CheckUrls extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:urls';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checks all registered URLs';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
      $urlsToCheck = Url::all();
      foreach ($urlsToCheck as $url) {
        $urlItem = Url::find($url->id);
        try {
          $urlResponse = Http::timeout(3)->get($url->address);
          $urlItem->status = $urlResponse->status();
          $urlItem->html_body = substr(($urlResponse->body()), 0, 65000);
        } catch (ConnectionException $e) {
          $urlItem->status = 408;
        }
        $urlItem->access_date_time = Carbon::now();
        $urlItem->save();
      };
      $this->info('Successfully check all urls');
      return 0;
    }
}
