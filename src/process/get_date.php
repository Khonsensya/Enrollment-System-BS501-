<?php
    date_default_timezone_set('Asia/Manila');
    function getCurrentSemester() {
        $currentYear = date('Y');
        $nextYear = $currentYear + 1;
        $currentMonth = date('n');

        if ($currentMonth >= 9 || $currentMonth <= 1) { // September - December, January
            return 'SY' . $currentYear . $nextYear . '-1T';
        } 
        elseif ($currentMonth >= 2 && $currentMonth <= 7) { // February - July
            return 'SY' . $currentYear . '-2T';
        } 
        else {
            return 'Semestral Break';
        }
    }

    $currentDateTime = date('Y-m-d');