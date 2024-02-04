<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidationVideo implements Rule
{
    public function passes($attribute, $value)
    {
        // Use GetID3 to analyze the video
        $getID3 = app('getID3');
        $fileInfo = $getID3->analyze($value->getRealPath());
        $filesize = $fileInfo['filesize'];
        $duration = $fileInfo['playtime_seconds'];

        $maxDurationSeconds = 10; // Maximum duration 10* seconds
        $maxFileSizeBytes = 20971520; // Maximum file size in bytes (20 MB * 1024 * 1024)
        return $filesize > 0 &&
            $duration > 0 &&
            $duration <= $maxDurationSeconds &&
            $filesize <= $maxFileSizeBytes;
    }

    public function message()
    {
        return 'The :attribute duration > 10s or size > 20mb.';
    }
}
