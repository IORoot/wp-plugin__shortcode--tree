<?php

namespace andyp\tree\render\html;


class tutorial
{

    public function open_flex_col()
    {
        return '<div class="lvl3 lvl3_col w-full flex-col pl-4 lg:ml-20 hidden transition-all">';
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

                $link =  '<a href="'.$href.'" ';
                    $link .= 'id="'.$id.'" ';
                    $link .= 'class="lvl3 tutorial tutorial_item_'.$item.' '.$first.' ';
                    $link .= 'relative w-full mb-4 bg-gray-100 rounded-2xl h-16 flex fill-gray-800 ';
                    $link .= 'hover:bg-green-500 hover:text-white hover:fill-white"';
                $link .= '>';
        
                return $link;
            }

            public function close_level3_box()
            {
                return '</a>';
            }


                    
                    public function level3_node($key)
                    {
                        if ($key != 0){return;}
                        return '<div class="absolute top-5 text-black" style="left:-6.25rem;">&#10687;</div>';
                    }

                    public function level3_arrowhead($key)
                    {
                        if ($key != 0){return;}
                        return '<div class="absolute top-5 -left-2 text-green-500">&#9656;</div>';
                    }

                    public function level3_title($name, $id = null)
                    {
                        return '<div class="lvl3_title font-thin font-xs my-auto text-left flex-1 pl-6 md:pl-4 relative">'.$name.'</div>';
                    }

                    public function level3_count($key)
                    {
                        $key++;
                        return '<div class="bg-gray-300 w-10 text-center text-white ml-20 my-auto hidden md:block">'.$key.'</div>';
                    }

                    public function level3_bullet()
                    {
                        return '<div class="absolute top-5 left-1 lg:left-9 z-10">&#10687;</div>';
                    }

                    public function level3_hover()
                    {
                        $hover =  '<div class="lvl3_hover absolute top-0 right-0 bg-green-500 w-32 h-full opacity-0 rounded-r-2xl inline-block">';
                        $hover .= '<svg class="fill-white w-6 h-full m-auto"><use xlink:href="#open-external"></use></svg>';
                        $hover .= '</div>'; 
                        return $hover;
                    }

                    public function level3_image($post_id)
                    {
                        $url = get_the_post_thumbnail_url($post_id);
                        return '<div class="lvl3_image bg-no-repeat bg-cover bg-center w-20 md:w-28 h-14 m-1 rounded-2xl lazyload" style="background-image:url(\''.$url.'\')"></div>';
                    }

                    


}