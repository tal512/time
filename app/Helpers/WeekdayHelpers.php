<?php

if (!function_exists('current_weekday_date')) {
    function current_weekday_of_month()
    {
        $timestamp = time();

        while (date('N', $timestamp) > 5) {
            $timestamp += 86400;
        }

        return date('Y-m-d', $timestamp);
    }
}

if (!function_exists('first_weekday_of_month')) {
    function first_weekday_of_month($date = null)
    {
        if ($date === null) {
            $date = date('Y-m-d');
        }

        $timestamp = strtotime('first day of '.date('F Y', strtotime($date)));

        while (date('N', $timestamp) > 5) {
            $timestamp += 86400;
        }

        return date('Y-m-d', $timestamp);
    }
}

if (!function_exists('last_weekday_of_month')) {
    function last_weekday_of_month($date = null)
    {
        if ($date === null) {
            $date = date('Y-m-d');
        }

        $firstWeekdayOfMonth = first_weekday_of_month($date);

        if ($firstWeekdayOfMonth > $date) {
            $date = $firstWeekdayOfMonth;
        }

        $timestamp = strtotime('last day of '.date('F Y', strtotime($date)));

        while (date('N', $timestamp) > 5) {
            $timestamp -= 86400;
        }

        return date('Y-m-d', $timestamp);
    }
}
