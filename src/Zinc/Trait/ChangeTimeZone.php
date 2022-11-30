<?php
namespace App\Zinc\Trait;

    
    trait ChangeTimeZone
    {
        public function changeTimeZone($timeZone) : void
        {
            date_default_timezone_set($timeZone);
        }
    }