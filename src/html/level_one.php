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


                    public function level1_checkbox($id)
                    {
                        return '<input class="lvl1_checkbox absolute opacity-0 z-0" type="checkbox" id="'.$id.'">';
                    }


                    public function open_level1_label($id)
                    {
                        return '<label for="'.$id.'" class="lvl1 lvl1_item w-full mb-4 relative bg-gray-200 rounded-2xl h-16 flex p-1 fill-gray-800 hover:bg-green-500 hover:text-white hover:fill-white cursor-pointer transition-all">';
                    }

                    public function close_level1_label()
                    {
                        return '</label>';
                    }


                            public function level1_content_open()
                            {
                                return '<div class="m-auto flex">';
                            }

                            public function level1_content_close()
                            {
                                return '</div>';
                            }


                            public function level1_glyph($name)
                            {
                                $glyph =  '<svg class="w-10 h-10">';
                                    $glyph .= '<use xlink:href="#'.$name.'"></use>';
                                $glyph .= '</svg>';

                                return $glyph;
                            }
                            
                            public function level1_title($name, $count)
                            {
                                $title = '<div class="font-thin font-xs my-auto px-2">';
                                $title .=   $name;
                                $title .=   '<div class="text-xs w-full text-center">';
                                $title .=       $count . ' series';
                                $title .=   '</div>';
                                $title .= '</div>';

                                return $title;
                            }


                            public function level1_open_link($term_id)
                            {
                                $url = get_term_link($term_id);
                                return '<a href="'.$url.'" class="relative">';
                            }

                            public function level1_close_link()
                            {
                                return '</a>';
                            }

                            
                            public function level1_hover()
                            {
                                $hover =  '<div class="lvl1_hover absolute top-0 left-0 bg-white w-full h-full opacity-0 rounded inline-block">';
                                $hover .= '<svg class="fill-green-500 w-6 h-full m-auto"><use xlink:href="#open-external"></use></svg>';
                                $hover .= '</div>'; 
                                return $hover;
                            }


                            public function level1_node()
                            {
                                return '<div class="absolute top-5 -right-1.5">&#10687;</div>';
                            }


}