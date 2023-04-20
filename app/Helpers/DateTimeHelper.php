<?php

use Carbon\Carbon;

if (! function_exists('today')) {
    /**
     * Returns the current time.
     *
     * @param  string  $format
     * @return Carbon
     */
    function today($format = null)
    {
        $format = $format ? $format : 'Y-m-d H:i:s';
        return Carbon::today()->format($format);
    }
}

if (! function_exists('tomorrow')) {
    /**
     * Returns the tomorrow time.
     * @param  string  $format
     * @return Carbon
     */
    function tomorrow($format = null)
    {
        $format = $format ? $format : 'Y-m-d H:i:s';
        return Carbon::tomorrow()->format($format);
    }
}

if (! function_exists('yesterday')) {
    /**
     * Returns the yesterday time.
     * @param  string  $format
     * @return Carbon
     */
    function yesterday($format = null)
    {
        $format = $format ? $format : 'Y-m-d H:i:s';
        return Carbon::yesterday()->format($format);
    }
}

if (! function_exists('nextDay')) {
    /**
     * Returns the next day time.
     * @param  string  $datetime
     * @param  string  $day
     * @param  string  $format
     * @return Carbon
     */
    function nextDay($datetime = null, $day, $format = null)
    {
        $day = strtoupper($day);
        $format = $format ? $format : 'Y-m-d H:i:s';
        $datetime = $datetime ? $datetime:Carbon::now();
        $days = ['SUNDAY' => Carbon::SUNDAY, 'MONDAY' => Carbon::MONDAY, 'TUESDAY' => Carbon::TUESDAY, 'WEDNESDAY' => Carbon::WEDNESDAY, 'THURSDAY' => Carbon::THURSDAY, 'FRIDAY' => Carbon::FRIDAY, 'SATURDAY' => Carbon::SATURDAY];
        return Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->next($days[$day])->format($format);
    }
}

if (! function_exists('dayOfWeek')) {
    function dayOfWeek($datetime=null)
    {
        $days = ['Sunday','Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        $datetime = $datetime ? $datetime:Carbon::now();
        return $days[Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->dayOfWeek];
    }
}

if (! function_exists('dayOfWeek')) {
    function ukDate($datetime=null, $timestamp=false)
    {
        $datetime = $datetime ? $datetime:Carbon::now();
        $timestamp = $timestamp ? 'd/m/Y H:ia':'d/m/Y';
        return Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->format($timestamp);
    }
}

if (! function_exists('dayOfWeek')) {
    function ukDateToDate($datetime=null, $timestamp=false)
    {
        $datetime = $datetime ? $datetime:Carbon::now();
        $format = $timestamp ? 'd/m/Y H:i:s':'d/m/Y';
        $timestamp = $timestamp ? 'Y-m-d H:i:s':'Y-m-d';
        return Carbon::createFromFormat($format, $datetime)->format($timestamp);
    }
}

if (! function_exists('dayOfWeek')) {
    function humanDate($datetime)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->diffForHumans();
    }
}

if (! function_exists('dayOfWeek')) {
    function age($datetime)
    {
        return Carbon::createFromFormat('Y-m-d', $datetime)->age;
    }
}

if (! function_exists('dayOfWeek')) {
    function weekend($datetime=null)
    {
        $datetime = $datetime ? $datetime:Carbon::now();
        return Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->isWeekend();
    }
}

if (! function_exists('dayOfWeek')) {
    function diffInDays($datetime)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->diffInDays();
    }
}

if (! function_exists('dayOfWeek')) {
    function addYears($datetime=null, $years, $format=null)
    {
        $format = $format ? $format:'Y-m-d H:i:s';
        $datetime = $datetime ? $datetime:Carbon::now();
        return Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->addYears($years)->format($format);
    }
}

if (! function_exists('dayOfWeek')) {
    function addMonths($datetime=null, $months, $format=null)
    {
        $format = $format ? $format:'Y-m-d H:i:s';
        $datetime = $datetime ? $datetime:Carbon::now();
        return Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->addMonths($months)->format($format);
    }
}

if (! function_exists('dayOfWeek')) {
    function addWeeks($datetime=null, $weeks, $format=null)
    {
        $format = $format ? $format:'Y-m-d H:i:s';
        $datetime = $datetime ? $datetime:Carbon::now();
        return Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->addWeeks($weeks)->format($format);
    }
}

if (! function_exists('dayOfWeek')) {
    function addDays($datetime=null, $days, $format=null)
    {
        $format = $format ? $format:'Y-m-d H:i:s';
        $datetime = $datetime ? $datetime:Carbon::now();
        return Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->addDays($days)->format($format);
    }
}

if (! function_exists('dayOfWeek')) {
    function startOfDay($datetime=null, $format=null)
    {
        $format = $format ? $format:'Y-m-d H:i:s';
        $datetime = $datetime ? $datetime:Carbon::now();
        return Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->startOfDay()->format($format);
    }
}

if (! function_exists('dayOfWeek')) {
    function endOfDay($datetime=null, $format=null)
    {
        $format = $format ? $format:'Y-m-d H:i:s';
        $datetime = $datetime ? $datetime:Carbon::now();
        return Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->endOfDay()->format($format);
    }
}

if (! function_exists('dayOfWeek')) {
    function startOfWeek($datetime=null, $format=null)
    {
        $format = $format ? $format:'Y-m-d H:i:s';
        $datetime = $datetime ? $datetime:Carbon::now();
        return Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->startOfWeek()->format($format);
    }
}
    
if (! function_exists('dayOfWeek')) {
    function endOfWeek($datetime=null, $format=null)
    {
        $format = $format ? $format:'Y-m-d H:i:s';
        $datetime = $datetime ? $datetime:Carbon::now();
        return Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->endOfWeek()->format($format);
    }
}

if (! function_exists('dayOfWeek')) {
    function startOfMonth($datetime=null, $format=null)
    {
        $format = $format ? $format:'Y-m-d H:i:s';
        $datetime = $datetime ? $datetime:Carbon::now();
        return Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->startOfMonth()->format($format);
    }
}

if (! function_exists('dayOfWeek')) {
    function endOfMonth($datetime=null, $format=null)
    {
        $format = $format ? $format:'Y-m-d H:i:s';
        $datetime = $datetime ? $datetime:Carbon::now();
        return Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->endOfMonth()->format($format);
    }
}

if (! function_exists('dayOfWeek')) {
    function startOfYear($datetime=null, $format=null)
    {
        $format = $format ? $format:'Y-m-d H:i:s';
        $datetime = $datetime ? $datetime:Carbon::now();
        return Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->startOfYear()->format($format);
    }
}

if (! function_exists('dayOfWeek')) {
    function endOfYear($datetime=null, $format=null)
    {
        $format = $format ? $format:'Y-m-d H:i:s';
        $datetime = $datetime ? $datetime:Carbon::now();
        return Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->endOfYear()->format($format);
    }
}

if (! function_exists('dayOfWeek')) {
    function startOfDecade($datetime=null, $format=null)
    {
        $format = $format ? $format:'Y-m-d H:i:s';
        $datetime = $datetime ? $datetime:Carbon::now();
        return Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->startOfDecade()->format($format);
    }
}

if (! function_exists('dayOfWeek')) {
    function endOfDecade($datetime=null, $format=null)
    {
        $format = $format ? $format:'Y-m-d H:i:s';
        $datetime = $datetime ? $datetime:Carbon::now();
        return Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->endOfDecade()->format($format);
    }
}

if (! function_exists('dayOfWeek')) {
    function startOfCentury($datetime=null, $format=null)
    {
        $format = $format ? $format:'Y-m-d H:i:s';
        $datetime = $datetime ? $datetime:Carbon::now();
        return Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->startOfCentury()->format($format);
    }
}

if (! function_exists('dayOfWeek')) {
    function endOfCentury($datetime=null, $format=null)
    {
        $format = $format ? $format:'Y-m-d H:i:s';
        $datetime = $datetime ? $datetime:Carbon::now();
        return Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->endOfCentury()->format($format);
    }
}