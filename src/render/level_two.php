<?php

namespace andyp\tree\render;


class level_two
{

    private $key;
    private $tree   = [];
    private $counts = [];
    private $values = [];
    private $html   = [];

    public function __construct()
    {
        $this->two   =   new html\level_two;
        $this->three =   new html\level_three;
    }

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
        /**     
         * Level TWO Parts
         */
        $this->html[] = $this->two->open_flex_row($this->values['level_two_loop_count'], $this->values['level_two_last'], $this->values['level_two_single']);

            $this->html[] = $this->two->level2_checkbox($this->values['level_two_value']['slug']);

            $this->html[] = $this->two->open_level2_label($this->values['level_two_value']['slug']);

                $this->html[] = $this->two->level2_arrowhead();
                $this->html[] = $this->two->level2_title($this->values['level_two_value']['name'], $this->values['level_two_value']["count"]);
                $this->html[] = $this->two->level2_open_link($this->values['level_two_value']['term_id']);
                $this->html[] = $this->two->level2_hover();
                $this->html[] = $this->two->level2_image($this->values['level_two_value']["acf"]["featured_image"]["sizes"]["thumbnail"]);
                $this->html[] = $this->two->level2_close_link();

            $this->html[] = $this->two->close_level2_label();


            /**
             * Level THREE Parts
             */
            $this->html[] = $this->three->open_flex_col();
            $this->values['level_three_loop_count'] = 0;
            $this->values['level_three_last'] = '';
            $this->values['level_three_single'] = '';
            foreach( $this->values['level_two_value']['posts'] as $this->values['level_three_key'] => $this->values['level_three_value'] )
            {
                if (count($this->values['level_two_value']['posts']) == 1){ $this->values['level_three_single'] = 'single'; }
                if (array_key_last($this->values['level_two_value']['posts']) == $this->values['level_three_key']){ $this->values['level_three_last'] = 'last'; }
                $this->level_three();
                $this->values['level_three_loop_count']++;
            }
            $this->html[] = $this->three->close_flex_col();

        $this->html[] = $this->two->close_flex_row();
    }


    private function level_three()
    {
        $this->generate_three = new level_three;
        $this->generate_three->set_tree($this->tree);
        $this->generate_three->set_counts($this->counts);
        $this->generate_three->set_values($this->values);
        $this->generate_three->generate();
        $this->html = array_merge($this->html, $this->generate_three->get_html());
    }

    


}
