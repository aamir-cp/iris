<?php

/*
|===================================================================================|
|																					|
|      IRIS Member's Contact Details Meta Box                                       |
|																					|
|===================================================================================| 
 */
 /*
 
// Add the Meta Box
function add_irismembers_contact_meta_box() {
    add_meta_box(
        'contact_meta_box_contact', // $id
        'Contact Details', // $title 
        'show_irismembers_contact_meta_box', // $callback
        'irismembers', // $page
        'normal', // $context
        'high'); // $priority
}
add_action('add_meta_boxes', 'add_irismembers_contact_meta_box');
 // Field Array
$contact_prefix = 'irismembers_contact_';
$custom_irismembers_contact_meta_fields_options = array(
    array(
        'label'=> 'Application Color',
        'desc'  => '',
        'id'    => $contact_prefix.'application_color',
        'type'  => 'text',
		'class' => 'color_box'
    ),
	array(
        'label'=> 'Either These Will Be Checkboxes or Radio Buttons',
        'desc'  => '',
        'id'    => $contact_prefix.'checkbox_or_radio',
		'values' => array('checkbox','radio'),
        'type'  => 'radio'
    ),
	array(
        'label'=> 'App Note',
        'desc'  => '',
        'id'    => $contact_prefix.'app_note_in_kurdish',
        'type'  => 'textarea'
    ),
	array(
        'label'=> 'Name of Required Group Members',
        'desc'  => '',
        'id'    => $prefix.'name_of_document',
        'type'  => 'recurring_group'
    ),
	array(
        'label'=> 'Add New Required Document',
        'desc'  => '',
        'id'    => $prefix.'add_new_required_document',
        'type'  => 'recurring_group_add_new'
    ),
);
 
// The Callback
function show_irismembers_contact_meta_box() {
global $custom_irismembers_contact_meta_fields_options, $post;
// Use nonce for verification
echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';
     
    // Begin the field table and loop
    echo '<table class="form-table">';
    foreach ($custom_irismembers_contact_meta_fields_options as $field) {
        // get value of this field if it exists for this post
        $meta = get_post_meta($post->ID, $field['id'], true);
        // begin a table row with
        echo '<tr>
                <th><label for="'.$field['id'].'">'.$field['label'].'</label></th>
                <td class="'.$field['id'].'_td_class">';
                switch($field['type']) {
                    // case items will go here
					// text
case 'upload':
    echo '<div class="row" >
	<div class="col-sm-4"><input type="text" readonly name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="30" /></div>
	<div class="col-sm-2"><input type="button" name="logo" id="upload-btn" class="button-secondary" value="Upload Image"></div>
	<div class="col-sm-6" style="padding-top: 20px;"></div>
	</div>
	<div class="col-sm-6"><div class="col-sm-12"><div class="col-sm-9 upload-delete" style="text-align:right;"><i class="fa fa-times" aria-hidden="true"></i></div></div><img src="'.$meta.'" id="new-img" width="150" height="150" 
	style="margin-left: auto; margin-right: auto; display: block;"/></div>
	            <br /><span class="description">'.$field['desc'].'</span>
		
		<script>
		jQuery(document).ready(function($){
	$("#upload-btn").click(function(e) {
		e.preventDefault();
		var image = wp.media({ 
			title: "Upload Image",
			// mutiple: true if you want to upload multiple files at once
			multiple: false
		}).open()
		.on("select", function(e){
			// This will return the selected image from the Media Uploader, the result is an object
			var uploaded_image = image.state().get("selection").first();
			// We convert uploaded_image to a JSON object to make accessing it easier
			// Output to the console uploaded_image
			console.log(uploaded_image);
			var image_url = uploaded_image.toJSON().url;
			// Lets assign the url value to the input field
			$("#'.$field['id'].'").val(image_url);
			$("#new-img").attr("src" , image_url);
		});
	});
});
jQuery(".upload-delete .fa").click(function(){
	jQuery("#event_upload").val("");
	jQuery("#new-img").attr("src" , "");
	if(jQuery("#event_upload").val()=="" || jQuery("#new-img").attr("src")=="")
{
	jQuery(".upload-delete .fa").hide();
}
if(jQuery("#event_upload").val()!=="" || jQuery("#new-img").attr("src")!=="")
{
	jQuery(".upload-delete .fa").show();
}
});
		</script>
		';
break;
case 'text':
    echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="30" />
        <br /><span class="description">'.$field['desc'].'</span>';
break;
case 'textwithdatatype':
    echo '<input type="text" data-control="hue" class="'.$field['class'].'" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="30" autocomplete="false" />
        <br /><span class="description">'.$field['desc'].'</span>';
break;
// select
case 'select':
    echo '<select name="'.$field['id'].'" id="'.$field['id'].'">';
    foreach ($field['options'] as $option) {
        echo '<option', $meta == $option['value'] ? ' selected="selected"' : '', ' value="'.$option['value'].'">'.$option['label'].'</option>';
    }
    echo '</select><br /><span class="description">'.$field['desc'].'</span>';
break;
// textarea
case 'textarea':
    echo '<textarea name="'.$field['id'].'" id="'.$field['id'].'" cols="60" rows="4">'.$meta.'</textarea>
        <br /><span class="description">'.$field['desc'].'</span>';
break;
case 'radio': // checkbox or radio
foreach($field['values'] as $value){
    echo '<input type="radio" name="'.$field['id'].'" id="'.$field['id'].'_'.$value.'" '.($meta == $value ? ' checked="checked"' : '').' value="'.$value.'"/>'.$value.'<br>
        <label for="'.$field['id'].'">'.$field['desc'].'</label>';
		}
break;
// checkbox
case 'checkbox':
    echo '<input type="checkbox" name="'.$field['id'].'" id="'.$field['id'].'" ',$meta ? ' checked="checked"' : '','/>
        <label for="'.$field['id'].'">'.$field['desc'].'</label>';
break;

case 'recurring_group':
    echo '<div class="group_wrap"><input type="text" name="'.$field['id'].'[]" class="'.$field['id'].'" value="'.$meta[0].'" size="30" /></div>';
	$counter = 0;
	foreach($meta as $meta_fields)
	{
		if($counter > 0){
		echo '<div class="group_wrap"><input type="text" name="'.$field['id'].'[]" class="'.$field['id'].'" value="'.$meta_fields.'" size="30" /><span class="remove_group">X</span></div>';
		}
		$counter++;
	}

break;
case 'recurring_group_add_new':
    echo '<input type="button" class="button add_new_group" value="Add Document">';
break;
                } //end switch
        echo '</td></tr>';
    } // end foreach
    echo '</table>'; // end table
	?>
                	<script>
var $ = jQuery;
$( document ).ready(function() {
$(".add_new_group").on("click", function(e) {  
e.preventDefault();  
$(".irismembers_name_of_document_td_class").append("<div class='group_wrap'><input type='text' name='irismembers_name_of_document[]' class='irismembers_name_of_document' size='30' /><span class='remove_group'>X</span></div>");			
});

$(document).on("click",".group_wrap .remove_group",function(e){
	e.preventDefault();

$(this).parent(".group_wrap").remove();		
})
});
</script>
<style>
.remove_group {
    cursor: pointer;
    background-color: black;
    color: white;
    font-weight: bold;
    display: inline-block;
    text-align: center;
    padding: 4px 10px;
}
</style>
                <?php
	
}
// Save the Data
function save_irismembers_contact_meta($post_id) {
    global $custom_irismembers_contact_meta_fields_options;
     
    // verify nonce
    if (!wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__))) 
        return $post_id;
    // check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return $post_id;
    // check permissions
    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id))
            return $post_id;
        } elseif (!current_user_can('edit_post', $post_id)) {
            return $post_id;
    }
     
    // loop through fields and save the data
    foreach ($custom_irismembers_contact_meta_fields_options as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    } // end foreach
}
add_action('save_post', 'save_irismembers_contact_meta'); */