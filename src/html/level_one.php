<?php

namespace andyp\tree\html;


class level_one
{

    public function open_flex_col()
    {
        return '<div class="lvl1 lvl1_col flex flex-col">';
    }

    public function close_flex_col()
    {
        return '</div>';
    }

            public function open_flex_row($row, $last)
            {
                return '<div class="lvl1 lvl1_row lvl1_row_'.$row.' '.$last.' flex mb-10">';
            }

            public function close_flex_row()
            {
                return '</div>';
            }

            

                    public function open_level1_box($id, $term_id)
                    {
                        $url = get_term_link($term_id);
                        return '<a href="'.$url.'" id="'.$id.'" class="lvl1 lvl1_cell w-1/6 mr-20 relative bg-gray-200 rounded-xl h-16 flex p-1 fill-gray-800 hover:bg-green-500 hover:text-gray-100 hover:fill-white">';
                    }

                    public function close_level1_box()
                    {
                        return '</a>';
                    }



                            public function level1_glyph($name)
                            {
                                $glyph =  '<svg class="w-10 h-10 ml-4 mr-2 my-2">';
                                    $glyph .= '<use xlink:href="#'.$name.'"></use>';
                                $glyph .= '</svg>';

                                return $glyph;
                            }
                            
                            public function level1_title($name)
                            {
                                return '<div class="font-thin font-xs my-auto">'.$name.'</div>';
                            }

                            public function level1_hover()
                            {
                                $hover =  '<div class="lvl1_hover absolute top-0 left-0 bg-green-500 w-full h-full opacity-0 rounded-2xl inline-block">';
                                $hover .= '<svg class="fill-white w-6 h-full m-auto"><use xlink:href="#open-external"></use></svg>';
                                $hover .= '</div>'; 
                                return $hover;
                            }

                            public function level1_node()
                            {
                                return '<div class="absolute top-5 -right-1.5">&#10687;</div>';
                            }


}