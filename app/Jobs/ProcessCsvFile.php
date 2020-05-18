<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\CsvFile;

class ProcessCsvFile implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $file;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(CsvFile $file)  
    {
        $this->file = $file;
    }

    /**
     * Process each line in the file
     * Filter for valid email and numeric phone numbers
     * Create contact for each valid line
     * Update Klaviyo for each valid contact
     * 
     * @return void
     */
    public function handle()
    {
        $file = $this->file;
        $fileData = unserialize($file->data);
        $user = $file->user;

        foreach ($fileData as $row) {
            //sanitize data
            $row = preg_replace('~[\r\n]+~', '', $row);
            $row = explode(',', $row);

            //check for improper fields
            if (!filter_var($row[1], FILTER_VALIDATE_EMAIL)) {
                continue;
            } elseif (!is_numeric($row[2])) {
                continue;
            }
            
            //create new contact
            $user->contacts()->create([
                'first_name' => $row[0],
                'email' => $row[1],
                'phone' => $row[2],
            ]);
        }


    }
}
