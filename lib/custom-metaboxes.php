<?php
/* Based on a snippet from http://wp-snippets.com/add-meta-boxes/ */


/* AUTHOR */
$meta_boxes[1] = array(
    'id' => 'book-author',                            // meta box id, unique per meta box
    'title' => 'Author Name',            // meta box title
    'pages' => array('book'),    // post types, accept custom post types as well, default is array('post'); optional
    'context' => 'normal',                        // where the meta box appear: normal (default), advanced, side; optional
    'priority' => 'high',                        // order of meta box: high (default), low; optional

    'fields' => array(                            // list of meta fields
        array(
            'name' => 'Author Name',                    // field name
            'desc' => 'Format: Firstname Lastname',    // field description, optional
            'id' => $prefix . 'aname',                // field id, i.e. the meta key
            'type' => 'text',                        // text box
            'std' => ' ',                    // default value, optional
            'validate_func' => 'check_name'            // validate function, created below, inside RW_Meta_Box_Validate class
        )
    )
);

// Add as many as you want by copy the arrays and naming them $meta_boxes[1], $meta_boxes[2] etc.

foreach ($meta_boxes as $meta_box) {
    new RW_Meta_Box($meta_box);
}
?>