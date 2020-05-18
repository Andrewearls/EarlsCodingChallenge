<?php

namespace App\Listeners;

use App\Events\CsvFileRecieved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Jobs\ProcessCsvFile;

class HandleCsvFile
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CsvRecieved  $event
     * @return void
     */
    public function handle(CsvFileRecieved $event)
    {
        ProcessCsvFile::dispatch($event->file);
    }
}
