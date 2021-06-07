<?php

namespace andyp\tree\render\html;


class series
{

    public function open_flex_col()
    {
        return '<div class="lvl2 lvl2_col w-full flex-col hidden">';
    }

    public function close_flex_col()
    {
        return '</div>';
    }


            public function open_flex_row($row, $last, $single)
            {
                $first = 'notfirst'; 
                if ($last  != ''){$first = $last;}
                if ($row == 0){$first = 'first';}   
                if ($single != ''){$first = $single;}

                return '<div class="lvl2 lvl2_row lvl2_row_'.$row.' '.$first.' flex relative">';
            }

            public function close_flex_row()
            {
                return '</div>';
            }



                    public function open_level2_label($id)
                    {
                        return '<label for="'.$id.'" class="lvl2 lvl2_item w-full mb-4 bg-gray-200 rounded-2xl h-16 flex p-1 fill-gray-800 hover:bg-green-500 hover:text-white hover:fill-white cursor-pointer transition-all">';
                    }

                    public function close_level2_label()
                    {
                        return '</label>';
                    }


                    
                            public function level2_arrowhead()
                            {
                                return '<div class="absolute top-5 -left-2 text-green-500">&#9656;</div>';
                            }

                            public function level2_checkbox($id)
                            {
                                return '<input class="lvl2_checkbox absolute opacity-0 z-0" type="checkbox" id="'.$id.'">';
                            }

                            // public function level2_title($name)
                            // {
                            //     return '<div class="font-thin font-xs my-auto text-center flex-1">'.$name.'</div>';
                            // }

                            public function level2_title($name, $count = null)
                            {
                                $title = '<div class="font-thin font-xs my-auto text-center flex-1">';
                                $title .=   $name;
                                $title .=   '<div class="text-xs w-full text-center">';
                                $title .=       $count . ' lessons';
                                $title .=   '</div>';
                                $title .= '</div>';

                                return $title;
                            }

                            public function level2_open_link($term_id)
                            {
                                $url = get_term_link($term_id);
                                return '<a href="'.$url.'" class="relative">';
                            }

                            public function level2_close_link()
                            {
                                return '</a>';
                            }

                            public function level2_hover()
                            {
                                $hover =  '<div class="lvl2_hover absolute top-0 left-0 bg-white w-full h-full opacity-0 rounded-2xl inline-block">';
                                    $hover .= '<svg class="fill-green-500 w-6 h-full m-auto"><use xlink:href="#open-external"></use></svg>';
                                $hover .= '</div>'; 
                                return $hover;
                            }

                            public function level2_image($url)
                            {
                                return '<div class="bg-no-repeat bg-contain bg-center w-20 h-14 rounded-2xl lazyload" style="background-image:url(\''.$url.'\')"></div>';
                            }

}