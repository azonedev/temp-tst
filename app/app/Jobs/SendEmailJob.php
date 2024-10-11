<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Mail\BasicMarkdownMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $subject = "Welcome to Safe app";
        $email = "abdullah@test.com";
        Mail::to($email)->send(new BasicMarkdownMail($subject));
    }
}
