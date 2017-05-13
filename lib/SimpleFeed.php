<?php
class SimpleFeed {

  private $_file_time;
  
  public function __construct($life_time = LIFE_TIME) {
    $this->_file_time = $life_time;
  }
  
  public function load($url) {
    $value = $this->getFeed($url);
    if ($value === false) {
      $value = file_get_contents($url);
      $this->putCache($url, $value);
    }
    $simplexml = simplexml_load_string($value);

    return $simplexml;
  }

  private function putCache($key, $value) {
    $filePath = $this->getFilePath($key);
    file_put_contents($filePath, serialize($value));
  }

  private function getFeed($key) {
    $filePath = $this->getFilePath($key);
    if (file_exists($filePath) && (filemtime($filePath) + $this->_file_time) > time()) {
      return unserialize(file_get_contents($filePath));
    }
    else {
      return false;
    }
  }

  private function getFilePath($key) {
    return CACHE_DIR . sha1(serialize($key));
  }
}