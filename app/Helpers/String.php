<?php

if (!function_exists('str_markdown')) {
    function str_markdown(string $text, array $options = []): string
    {
        //As Markdown Will render as html you must escape the html entities and stripe tags else you are fool:)
        $text = htmlentities(strip_tags($text));

        //Options will apply on later update.

        return preg_replace('/(#[\w\-\._]+)/m', '<a href="${1}">${1}</a>', $text);
    }
}
