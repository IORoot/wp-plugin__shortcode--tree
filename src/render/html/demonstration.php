<?php

namespace andyp\tree\render\html;


class demonstration
{

    public function open_flex_col()
    {
        return '<div class="lvl3 lvl2_col w-full flex-wrap hidden transition-all">';
    }

    public function close_flex_col()
    {
        return '</div>';
    }

            public function open_level3_box($id, $item, $last, $single, $href)
            {
                $first = 'notfirst'; 
                if ($last != ''){$first = $last;}
                if ($item == 0){$first = 'first';}
                if ($single != ''){$first = $single;}

                $link = '<div class="w-1/2 md:w-1/4 pr-1 md:pr-4 mb-4">';
                $link .=  '<a href="'.$href.'" ';
                    $link .= 'id="'.$id.'" ';
                    $link .= 'class="lvl3 demonstration demonstration_item_'.$item.' '.$first.' ';
                    $link .= 'relative w-full bg-gray-100 rounded-2xl h-16 flex fill-gray-800 ';
                    $link .= 'hover:bg-blue-500 hover:text-white hover:fill-white"';
                $link .= '>';
        
                return $link;
            }

            public function close_level3_box()
            {
                return '</a></div>';
            }


                    public function level3_node($key)
                    {
                        return;
                    }

                    public function level3_arrowhead($key)
                    {
                        if ($key != 0){return;}
                        return '<div class="absolute top-5 -left-2 text-blue-500">&#9656;</div>';
                    }

                    public function level3_title($name, $id = null)
                    {
                        
                        $parts = explode(' - ', $name);
                        return '<div class="lvl3_title font-thin my-auto text-left text-xs md:text-sm flex-1 pl-3 md:pl-4 relative">'.$parts[1].'</div>';
                    }

                    // public function level3_title($name, $id = null)
                    // {
                    //     $parts = explode(' - ', $name);

                    //     $html = '<div class="w-full flex flex-col pl-2 py-2">';
                    //         $html .= '<div class="lvl3_title font-thin font-xs my-auto text-left text-sm flex-1 relative">'.$parts[1].'</div>';
                    //         $html .= '<div class="w-full flex">';
                    //         foreach(get_the_terms($id, 'demonstration_tags') as $tag) {
                    //             $html .= '<div class="inline-block font-light text-gray-400 text-xs h-5 mr-1">' . $tag->name . '. </div>';
                    //         }
                    //         $html .= '</div>';

                    //     $html .= '</div>';

                    //     return $html;
                    // }

                    public function level3_count($key)
                    {
                        $key++;
                        return '<div class="bg-gray-200 w-10 h-16 text-gray-500 font-light text-center rounded-l-2xl py-5 text-sm hidden md:block">'.$key.'</div>';
                    }

                    public function level3_bullet()
                    {
                        return ;
                    }

                    public function level3_hover()
                    {
                        $hover =  '<div class="lvl3_hover absolute top-0 right-0 bg-blue-500 w-16 h-full opacity-0 rounded-r-2xl inline-block">';
                        $hover .= '<svg class="fill-white w-6 h-full m-auto"><use xlink:href="#open-external"></use></svg>';
                        $hover .= '</div>'; 
                        return $hover;
                    }

                    public function level3_image($post_id)
                    {
                        $url = get_the_post_thumbnail_url($post_id);
                        return '<div class="lvl3_image bg-no-repeat bg-cover bg-center w-14 h-14 m-1 rounded-xl md:rounded-2xl lazyload" style="background-image:url(\''.$url.'\')"></div>';
                    }

}