<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Exception;
use Illuminate\Support\Facades\Log;

use Twilio\Rest\Client;


class UserOtp extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "otp",
        "expire_at"
    ];

    public function sendSMS($receiverNumber) {
        $message = "Login OTP is ".$this->otp;
        $receiverNumber = '+91'.$receiverNumber;
        try {
            $account_id = getenv("TWILIO_SID");
            $auth_token = getenv("TWILIO_TOKEN");
            $twilio_number = getenv("TWILIO_PHONE");

            $client = new Client($account_id, $auth_token);

            $client->messages
            ->create(
                $receiverNumber, 
                [
                    'body' => $message,
                    'from' => $twilio_number,
                ]
            );


            info("SMS sent sucessfully!");
        } catch (\Exception $e) {
            Log::info("Error".$e);
        }
    }
}
