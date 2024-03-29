<?php

namespace andyp\tree\render;


class key
{

    private $key;
    private $tree   = [];
    private $counts = [];
    private $html   = [];

    public function __construct()
    {
        $this->key = new html\key;
    }

    public function set_tree($tree)
    {
        $this->tree = $tree;
    }

    public function set_counts($counts)
    {
        $this->counts = $counts;
    }

    public function get_html()
    {
        return $this->html;
    }

    public function generate()
    {
        $this->html[] = $this->key->open_header();
            $this->generate_header_one();
            $this->generate_header_two();
            $this->generate_header_three();
        $this->html[] = $this->key->close_header();
    }

    private function generate_header_one()
    {
        $this->html[] = $this->key->open_header1_col();
        $this->html[] = $this->key->category_header();
        $this->html[] = $this->key->category_count(count($this->tree));
        $this->html[] = $this->key->close_header1_col();
    }

    private function generate_header_two()
    {
        if (!$this->counts["series"]){ return; }
        $this->html[] = $this->key->open_header2_col();
        $this->html[] = $this->key->subcategory_header();
        $this->html[] = $this->key->series_count($this->counts['series']);
        $this->html[] = $this->key->close_header2_col();
    }

    private function generate_header_three()
    {
        if (!$this->counts["videos"]){ return; }
        $this->html[] = $this->key->open_header3_col();
        $this->html[] = $this->key->video_header();
        $this->html[] = $this->key->video_count($this->counts['videos']);
        $this->html[] = $this->key->close_header3_col();
    }


}
