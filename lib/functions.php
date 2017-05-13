<?php
function rss_merge($rss_data, $rss_present_merge){
  foreach ($rss_data->item as $item) {
    $content = $item->children('http://purl.org/rss/1.0/modules/content/');
    $datetime = $item->children('http://purl.org/dc/elements/1.1/');
    $date = DateTime::createFromFormat(DateTime::ISO8601, $datetime);
    $dateFormat = date_format($date, 'U');

    foreach ($item as $key => $itemIn) {
      $rss_present_merge[$dateFormat][$key] = $itemIn;
    }
    $rss_present_merge[$dateFormat]['date'] = $dateFormat;
    $rss_present_merge[$dateFormat]['content'] = $content;
  }
  krsort($rss_present_merge);
  return $rss_present_merge;
}