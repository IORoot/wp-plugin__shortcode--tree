<?php

namespace andyp\tree\render;


class level_one
{

    private $key;
    private $values = [];
    private $tree   = [];
    private $counts = [];
    private $html   = [];

    public function __construct()
    {
        $this->one =   new html\level_one;
        $this->two =   new html\level_two;
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
        $this->html[] = $this->one->open_flex_col();

        $this->values['level_one_loop_count'] = 0;
        $this->values['level_one_last'] = '';
        
        foreach( $this->tree as $this->values['level_one_key'] => $this->values['level_one_value'] )
        {
            // check if this is last entry.
            if (array_key_last($this->tree) == $this->values['level_one_key']){ $this->values['level_one_last'] = 'last'; }
            $this->level_one();
            $this->values['level_one_loop_count']++;
        }

        $this->html[] = $this->one->close_flex_col(); 
    }





    private function level_one()
    {
        $this->html[] = $this->one->open_flex_row($this->values['level_one_loop_count'], $this->values['level_one_last']);
        
            /**
             * Level One Parts
             */ 
            
            $this->html[] = $this->one->level1_checkbox($this->values['level_one_value']['slug']);

            $this->html[] = $this->one->open_level1_label($this->values['level_one_value']['slug']);

                $this->html[] = $this->one->level1_content_open();
                    
                    $this->html[] = $this->one->level1_title($this->values['level_one_value']['name'], count($this->values['level_one_value']['children']));
                    $this->html[] = $this->one->level1_open_link($this->values['level_one_value']['term_id']);
                    $this->html[] = $this->one->level1_hover();
                    $this->html[] = $this->one->level1_glyph($this->values['level_one_value']['acf']["meta_fields"][0]["meta_field_value"]);
                    $this->html[] = $this->one->level1_close_link();

                $this->html[] = $this->one->level1_content_close();

                $this->html[] = $this->one->level1_node();
                
            $this->html[] = $this->one->close_level1_label();





            /**
             * Level Two Parts
             */
            $this->html[] = $this->two->open_flex_col();
            $this->values['level_two_loop_count'] = 0;
            $this->values['level_two_last'] = '';
            $this->values['level_two_single'] = '';
            foreach( $this->values['level_one_value']['children'] as $this->values['level_two_key'] => $this->values['level_two_value'] )
            {
                if (count($this->values['level_one_value']['children']) == 1){ $this->values['level_two_single'] = 'single'; }
                if (array_key_last($this->values['level_one_value']['children']) == $this->values['level_two_key']){ $this->values['level_two_last'] = 'last'; }
                $this->level_two();
                $this->values['level_two_loop_count']++;
            }
            $this->html[] = $this->two->close_flex_col(); 



        $this->html[] = $this->one->close_flex_row(); 
    }



    private function level_two()
    {
        $this->generate_two = new level_two;
        $this->generate_two->set_tree($this->tree);
        $this->generate_two->set_counts($this->counts);
        $this->generate_two->set_values($this->values);
        $this->generate_two->generate();
        $this->html = array_merge($this->html, $this->generate_two->get_html());
    }

}
