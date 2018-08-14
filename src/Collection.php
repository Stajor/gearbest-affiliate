<?php namespace GearBest;

class Collection implements \Iterator {
    protected $position = 0;
    protected $items    = [];
    protected $results  = 0;
    protected $pages    = 0;

    public function __construct(array $response) {
        if (isset($response['data']['items'])) {
            $this->items    = $response['data']['items'];
            $this->results  = $response['data']['total_results'];
            $this->pages    = $response['data']['total_pages'];
        } else {
            $this->items = $response['data'];
        }
    }

    public function count() {
        return count($this->items);
    }

    public function toArray() {
        return $this->items;
    }

    public function totalResults() {
        return $this->totalResults();
    }

    public function totalPages() {
        return $this->pages;
    }

    public function current() {
        $this->items[$this->position];
    }

    public function next() {
        ++$this->position;
    }

    public function key() {
        $this->position;
    }

    public function valid() {
        return isset($this->items[$this->position]);
    }

    public function rewind() {
        $this->position = 0;
    }
}