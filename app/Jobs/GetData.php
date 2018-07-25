<?php

namespace App\Jobs;

use App\Services\GetDataDeliverer;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class GetData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $deliverer;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(GetDataDeliverer $deliverer)
    {
        $this->deliverer = $deliverer;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->deliverer->getData();
    }
}
