<?php

namespace andyp\tree;

class render
{

    public $tree;
    public $counts;
    public $html;


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

    public function build_list()
    {
        $this->key();
        $this->level_one();
    }

    private function key()
    {
        $this->key = new render\key;
        $this->key->set_tree($this->tree);
        $this->key->set_counts($this->counts);
        $this->key->generate();
        $this->html = $this->key->get_html();
    }


    private function level_one()
    {
        $this->one = new render\level_one;
        $this->one->set_tree($this->tree);
        $this->one->set_counts($this->counts);
        $this->one->generate();
        $this->html = $this->one->get_html();
    }




}