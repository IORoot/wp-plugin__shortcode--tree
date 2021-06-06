<?php

namespace andyp\tree\render\html;


class key
{

    public function open_header()
    {
        return '<div class="header flex h-full w-full absolute -top-20">';
    }

    public function close_header()
    {
        return '</div>';
    }

    public function open_header1_col()
    {
        return '<div class="header_col header_1 w-1/6 flex-1 h-full border-r border-gray-200 border-dashed">';
    }

    public function close_header1_col()
    {
        return '</div>';
    }

            public function category_header()
            {
                return '<div class="w-full text-center text-gray-600 font-semibold text-sm">Movement Categories</div>';
            }

            public function category_count($count)
            {
                return '<div class="w-full text-center text-gray-400 font-light text-xs">'.$count.' total</div>';
            }




    public function open_header2_col()
    {
        return '<div class="header_col header_2 flex-1 h-full border-r border-gray-200 border-dashed hidden">';
    }

    public function close_header2_col()
    {
        return '</div>';
    }

            public function subcategory_header()
            {
                return '<div class="w-full text-center text-gray-600 font-semibold text-sm">Series</div>';
            }

            public function series_count($count)
            {
                return '<div class="w-full text-center text-gray-400 font-light text-xs">'.$count.' total</div>';
            }




    public function open_header3_col()
    {
        return '<div class="header_col header_3 w-7/12 h-full hidden">';
    }

    public function close_header3_col()
    {
        return '</div>';
    }

            public function video_header()
            {
                return '<div class="w-full text-center text-gray-600 font-semibold text-sm">Lessons</div>';
            }

            public function video_count($count)
            {
                return '<div class="w-full text-center text-gray-400 font-light text-xs">'.$count.' total</div>';
            }

}