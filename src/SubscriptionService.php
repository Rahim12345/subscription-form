<?php

namespace App;

use App\Models\Subscription;

class SubscriptionService
{
    public function handle(string $email): string
    {
        $email = filter_var(trim($email), FILTER_SANITIZE_EMAIL);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Email düzgün deyil.";
        }

        if (Subscription::where('email', $email)->exists()) {
            return "Bu email artıq qeydiyyatdan keçib.";
        }

        Subscription::create(['email' => $email]);
        return "Abunəliyiniz uğurla qeydə alındı.";
    }
}
