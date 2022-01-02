<?php

namespace App\Observers;

use App\Models\Lesson;
use Illuminate\Support\Str;

class LessonObserver
{
   /**
     * Handle the Module "creating" event.
     *
     * @param  \App\Models\Lesson  $module
     * @return void
     */
    public function creating(Lesson $lesson)
    {
        $lesson->uuid = (string) Str::uuid();
    }
}
