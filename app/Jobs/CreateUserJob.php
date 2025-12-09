<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;

use App\Models\User;
use App\Mail\CreateUserMail;

class CreateUserJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $email;
    protected $user;
    protected $password;

    /**
     * Create a new job instance.
     */
    public function __construct($id, $password)
    {
        $user = User::findOrFail($id);
        $this->email = $user->email;
        $this->user = $user;
        $this->password = $password;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->email)->send(new CreateUserMail($this->user, $this->password));
    }
}
