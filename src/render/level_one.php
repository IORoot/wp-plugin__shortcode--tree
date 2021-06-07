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
        $this->one =   new html\category;
        $this->two =   new html\series;
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
        $this->loop_tree();
        $this->html[] = $this->one->close_flex_col(); 
    }


    private function loop_tree()
    {
        $this->values['level_one_loop_count'] = 0;
        $this->values['level_one_last'] = '';

        foreach( $this->tree as $this->values['level_one_key'] => $this->values['level_one_value'] )
        {
            // check if this is last entry.
            if (array_key_last($this->tree) == $this->values['level_one_key']){ $this->values['level_one_last'] = 'last'; }
            $this->determine_next_level();
            $this->level_one_column();
            $this->values['level_one_loop_count']++;
        }
    }


    private function determine_next_level()
    {
        // default to sub-categories.
        $this->level = 'two';
        $this->children = $this->values['level_one_value']['children'];
        $this->three = new html\tutorial;
        $this->colour = 'green-500';
        $this->subtitle = 'series';

        // if there are no sub-categories, switch to level-3 posts.
        if (!$this->counts["series"]) {
            $this->level = 'three';
            $this->children = $this->values['level_one_value']['posts'];
            $this->three = new html\demonstration;
            $this->colour = 'blue-500';
            $this->subtitle = 'demos';
        }
    }



    private function level_one_column()
    {
        $this->html[] = $this->one->open_flex_row($this->values['level_one_loop_count'], $this->values['level_one_last']);
        
            $this->html[] = $this->one->level1_checkbox($this->values['level_one_value']['slug']);

            $this->html[] = $this->one->open_level1_label($this->values['level_one_value']['slug'],$this->colour);

                $this->html[] = $this->one->level1_content_open();
                    
                    $this->html[] = $this->one->level1_title($this->values['level_one_value']['name'], count($this->children), $this->subtitle);
                    $this->html[] = $this->one->level1_open_link($this->values['level_one_value']['term_id']);
                    $this->html[] = $this->one->level1_hover($this->colour);
                    $this->html[] = $this->one->level1_glyph($this->values['level_one_value']['acf']["meta_fields"][0]["meta_field_value"]);
                    $this->html[] = $this->one->level1_close_link();

                $this->html[] = $this->one->level1_content_close();

                $this->html[] = $this->one->level1_node();
                
            $this->html[] = $this->one->close_level1_label();

            
            $this->next_level_loop();

        $this->html[] = $this->one->close_flex_row(); 
    }




    /**
     * Level 2 or Level 3
     */
    private function next_level_loop()
    {
        
        $level = $this->level;
        $this->html[] = $this->$level->open_flex_col();
        $this->values['level_'.$level.'_loop_count'] = 0;
        $this->values['level_'.$level.'_last'] = '';
        $this->values['level_'.$level.'_single'] = '';

        foreach( $this->children as $this->values['level_'.$level.'_key'] => $this->values['level_'.$level.'_value'] )
        {
            if (count($this->children) == 1){ $this->values['level_'.$level.'_single'] = 'single'; }
            if (array_key_last($this->children) == $this->values['level_'.$level.'_key']){ $this->values['level_'.$level.'_last'] = 'last'; }
            $this->next_level();
            $this->values['level_'.$level.'_loop_count']++;
        }
        $this->html[] = $this->two->close_flex_col(); 
    }




    
    private function next_level()
    {
        $ns = '\\andyp\\tree\\render\\level_'.$this->level;
        $this->next_level = new $ns;
        $this->next_level->set_tree($this->tree);
        $this->next_level->set_counts($this->counts);
        $this->next_level->set_values($this->values);
        $this->next_level->generate();
        $this->html = array_merge($this->html, $this->next_level->get_html());
    }




}
