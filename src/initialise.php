<?php

namespace andyp\tree;

class initialise
{

    private $config;
    private $attributes;
    private $tree;
    private $counts = [];
    private $results;


    public function set_config($config)
    {
        $this->config = $config;
    }


    public function register()
    {
        add_shortcode( 'tree', [$this, 'run'] );
    }

    public function run($attributes = array())
    {
        $this->attributes = $attributes;

        $this->build_heirarchy();

        $this->arrayify_tree();

        $this->build_list();

        $this->implode_list();

        $this->enqueue_assets();

        return $this->results;
    }




    private function build_heirarchy()
    {
        $this->tree = $this->get_taxonomy_hierarchy($this->attributes['tax']);
    }


    /**
     * Recursively get taxonomy and its children
     * 
     * https://gist.github.com/daggerhart/8edb645b92945a11a728e64c0b4de247
     *
     * @param string $taxonomy
     * @param int $parent - parent term id
     * @return array
     */
    private function get_taxonomy_hierarchy( $taxonomy, $parent = 0 ) {
        // only 1 taxonomy
        $taxonomy = is_array( $taxonomy ) ? array_shift( $taxonomy ) : $taxonomy;

        // get all direct decendants of the $parent
        $terms = get_terms( $taxonomy, array( 'parent' => $parent, 'hide_empty' => false ) );


        // prepare a new array.  these are the children of $parent
        // we'll ultimately copy all the $terms into this new array, but only after they
        // find their own children
        $children = array();

        // go through all the direct decendants of $parent, and gather their children
        foreach ( $terms as $term ){        
            // recurse to get the direct decendants of "this" term
            $term->children = $this->get_taxonomy_hierarchy( $taxonomy, $term->term_id );

            // accumulate all child terms.
            $this->counts['series'] += count($term->children);
            $this->counts['videos'] += $term->count;

            // add the term to our new array
            $children[ $term->term_id ] = $term;

            // get posts
            $term->posts = $this->append_posts_to_tree($term->term_id);

            // get meta
            $term->acf = $this->get_acf_fields($term);
        }

        // send the results back to the caller
        return $children;
    }


    private function append_posts_to_tree( $term_id )
    {
        return get_posts([
            'post_type' => get_post_types(),
            'numberposts' => -1,
            'order' => 'ASC',
            'tax_query' => [
                [
                    'taxonomy' => $this->attributes['tax'],
                    'field' => 'term_id' , 
                    'terms' => $term_id
                ]
            ]
        ]);
    }



    private function get_acf_fields($term)
    {
        if( ! class_exists('ACF') ) { return; }
        return get_fields( $term );
    }


    private function arrayify_tree()
    {
        $json = json_encode($this->tree);
        $this->tree = (array) json_decode($json, true);
    }


    private function implode_list()
    {
        $this->results = implode($this->html);
    }



    private function build_list()
    {
        $render = new render();
        $render->set_tree($this->tree);
        $render->set_counts($this->counts);
        $render->build_list();
        $this->html = $render->get_html();
    }

    private function enqueue_assets()
    {
        wp_register_style(  'andyp_tree_css', ANDYP_TREE_URL . '/src/css/style.css' ); 
        wp_enqueue_style( 'andyp_tree_css');
        wp_register_style(  'andyp_tutorial_css', ANDYP_TREE_URL . '/src/css/tutorial.css' ); 
        wp_enqueue_style( 'andyp_tutorial_css');
        wp_register_style(  'andyp_demonstration_css', ANDYP_TREE_URL . '/src/css/demonstration.css' ); 
        wp_enqueue_style( 'andyp_demonstration_css');
        wp_register_script(  'andyp_tree_toggle_checkboxes', ANDYP_TREE_URL . '/src/js/toggle_checkboxes.js' ); 
        wp_enqueue_script( 'andyp_tree_toggle_checkboxes');
    }

}