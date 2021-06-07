<?php

namespace andyp\tree\render;


class level_three
{

    private $key;
    private $tree   = [];
    private $counts = [];
    private $values = [];
    private $html   = [];

    public function set_tree($tree)
    {
        $this->tree = $tree;
    }

    public function set_counts($counts)
    {
        $this->counts = $counts;
    }

    public function set_values($values)
    {
        $this->values = $values;
    }

    public function get_html()
    {
        return $this->html;
    }

    public function generate()
    {
        $this->determine_posttype();

        $this->html[] = $this->three->open_level3_box(
            $this->values['level_three_value']['post_name'], 
            $this->values['level_three_loop_count'], 
            $this->values['level_three_last'], 
            $this->values['level_three_single'],
            $this->values['level_three_value']['guid']
        );

        $this->html[] = $this->three->level3_node($this->values['level_three_key']);
        $this->html[] = $this->three->level3_arrowhead($this->values['level_three_key']);
        $this->html[] = $this->three->level3_bullet();
        $this->html[] = $this->three->level3_count($this->values['level_three_key']);
        $this->html[] = $this->three->level3_title($this->values['level_three_value']['post_title'], $this->values["level_three_value"]["ID"]);
        $this->html[] = $this->three->level3_hover();
        $this->html[] = $this->three->level3_image($this->values['level_three_value']['ID']);

        $this->html[] = $this->three->close_level3_box();
    }

    private function determine_posttype()
    {
        $ns = '\\andyp\\tree\\render\\html\\'.$this->values["level_three_value"]["post_type"];
        $this->three = new $ns;
    }

}
