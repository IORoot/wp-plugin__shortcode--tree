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
        $this->key = new html\key;
        $this->one = new html\level_one;
        $this->two = new html\level_two;
        $this->three = new html\level_three;

        $this->key();

        $this->html[] = $this->one->open_flex_col();

        $this->level_one_loop_count = 0;
        $this->level_one_last = '';
        foreach( $this->tree as $this->level_one_key => $this->level_one_value )
        {
            // check if this is last entry.
            if (array_key_last($this->tree) == $this->level_one_key){ $this->level_one_last = 'last'; }
            $this->level_one();
            $this->level_one_loop_count++;
        }

        $this->html[] = $this->one->close_flex_col(); 
    }


    private function key()
    {
        $this->html[] = $this->key->open_header();

            $this->html[] = $this->key->open_header1_col();
            $this->html[] = $this->key->category_header();
            $this->html[] = $this->key->category_count(count($this->tree));
            $this->html[] = $this->key->close_header1_col();

            $this->html[] = $this->key->open_header2_col();
            $this->html[] = $this->key->subcategory_header();
            $this->html[] = $this->key->series_count($this->counts['series']);
            $this->html[] = $this->key->close_header2_col();

            $this->html[] = $this->key->open_header3_col();
            $this->html[] = $this->key->video_header();
            $this->html[] = $this->key->video_count($this->counts['videos']);
            $this->html[] = $this->key->close_header3_col();
        
        $this->html[] = $this->key->close_header();
    }


    private function level_one()
    {
        $this->html[] = $this->one->open_flex_row($this->level_one_loop_count, $this->level_one_last);
        
            /**
             * Level One Parts
             */ 
            $this->html[] = $this->one->open_level1_box($this->level_one_value['slug'], $this->level_one_value['term_id']);

                $this->html[] = $this->one->level1_hover();
                $this->html[] = $this->one->level1_glyph($this->level_one_value['acf']["meta_fields"][0]["meta_field_value"]);
                $this->html[] = $this->one->level1_title($this->level_one_value['name']);
                $this->html[] = $this->one->level1_node();

            $this->html[] = $this->one->close_level1_box();


            /**
             * Level Two Parts
             */
            $this->html[] = $this->two->open_flex_col();
            $this->level_two_loop_count = 0;
            $this->level_two_last = '';
            $this->level_two_single = '';
            foreach( $this->level_one_value['children'] as $this->level_two_key => $this->level_two_value )
            {
                if (count($this->level_one_value['children']) == 1){ $this->level_two_single = 'single'; }
                if (array_key_last($this->level_one_value['children']) == $this->level_two_key){ $this->level_two_last = 'last'; }
                $this->level_two();
                $this->level_two_loop_count++;
            }
            $this->html[] = $this->two->close_flex_col(); 



        $this->html[] = $this->one->close_flex_row(); 
    }




    private function level_two()
    {
        /**
         * Level TWO Parts
         */
        $this->html[] = $this->two->open_flex_row($this->level_two_loop_count, $this->level_two_last, $this->level_two_single);

            $this->html[] = $this->two->level2_checkbox($this->level_two_value['slug']);

            $this->html[] = $this->two->open_level2_label($this->level_two_value['slug']);

                $this->html[] = $this->two->level2_arrowhead();
                $this->html[] = $this->two->level2_title($this->level_two_value['name']);
                $this->html[] = $this->two->level2_open_link($this->level_two_value['term_id']);
                $this->html[] = $this->two->level2_hover();
                $this->html[] = $this->two->level2_image($this->level_two_value["acf"]["featured_image"]["sizes"]["thumbnail"]);
                $this->html[] = $this->two->level2_close_link();

            $this->html[] = $this->two->close_level2_label();


            /**
             * Level THREE Parts
             */
            $this->html[] = $this->three->open_flex_col();
            $this->level_three_loop_count = 0;
            $this->level_three_last = '';
            $this->level_three_single = '';
            foreach( $this->level_two_value['posts'] as $this->level_three_key => $this->level_three_value )
            {
                if (count($this->level_two_value['posts']) == 1){ $this->level_three_single = 'single'; }
                if (array_key_last($this->level_two_value['posts']) == $this->level_three_key){ $this->level_three_last = 'last'; }
                $this->level_three();
                $this->level_three_loop_count++;
            }
            $this->html[] = $this->three->close_flex_col();

        $this->html[] = $this->two->close_flex_row();
    }



    private function level_three()
    {

        $this->html[] = $this->three->open_level3_box(
                $this->level_three_value['post_name'], 
                $this->level_three_loop_count, 
                $this->level_three_last, 
                $this->level_three_single,
                $this->level_three_value['guid']
            );

            $this->html[] = $this->three->level3_node($this->level_three_key);
            $this->html[] = $this->three->level3_arrowhead($this->level_three_key);
            $this->html[] = $this->three->level3_bullet();
            $this->html[] = $this->three->level3_count($this->level_three_key);
            $this->html[] = $this->three->level3_title($this->level_three_value['post_title']);
            $this->html[] = $this->three->level3_hover();
            $this->html[] = $this->three->level3_image($this->level_three_value['ID']);

        $this->html[] = $this->three->close_level3_box();

    }


}