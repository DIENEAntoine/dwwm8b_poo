<?php
namespace App\Trait;
    
    trait ChangeTimeZone
    {
        public function changeTimeZone($timeZone) : void
        {
            date_default_timezone_set($timeZone);
        }
    }