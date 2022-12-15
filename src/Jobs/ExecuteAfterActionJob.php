<?php

namespace Pinetcodev\LaravelPowerActions\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Pinetcodev\LaravelPowerActions\ActionContract;

class ExecuteAfterActionJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public ActionContract $action;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(ActionContract $action)
    {
        $this->action = $action;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->action->afterAsync();
    }
}
