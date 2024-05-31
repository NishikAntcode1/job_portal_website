<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Twilio\Rest\Client;

class JobApplication extends Model
{
    use HasFactory;
    protected $fillable = [
        'job_id',
        'user_id',
        'employer_id',
        'applied_date'
    ];

    public function sendSMS($apply_data)
    {
        $message = "
    Hello " . $apply_data['employer']->name . ",Mr/Mrs." . $apply_data['user']->name . 
    " has applied on " . $apply_data['job']->job_title . " job. Mobile: " . $apply_data['user']->mobile_no;


        try {
            $account_id = getenv("TWILIO_SID");
            $auth_token = getenv("TWILIO_TOKEN");
            $twilio_number = getenv("TWILIO_PHONE");

            $client = new Client($account_id, $auth_token);

            $client->messages
                ->create(
                    $apply_data['employer']->mobile_no,
                    [
                        'body' => $message,
                        'from' => $twilio_number,
                    ]
                );


            info("SMS sent sucessfully!");
        } catch (\Exception $e) {
            Log::info("Error" . $e);
        }
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function employer()
    {
        return $this->belongsTo(User::class, 'employer_id');
    }
}
