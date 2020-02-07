<?php  

/*if (!is_user_logged_in()) {
    $location = site_url() . '/login';
    wp_redirect($location);}*/
	global $current_user;
    //get_currentuserinfo();
    $authorID = $current_user->ID;

/*****************irisinsurances cpt*********/
function irisinsurances_post_type() {
	$irisinsurances_labels = array(
		'name'                  => _x( 'IRIS insurances', 'Post Type General Name', 'iris-insurances' ),
		'singular_name'         => _x( 'IRIS insurances', 'Post Type Singular Name', 'iris-insurances' ),
		'menu_name'             => __( 'IRIS insurances', 'iris-insurances' ),
		'name_admin_bar'        => __( 'IRIS insurances', 'iris-insurances' ),
		'archives'              => __( 'Item Archives', 'iris-insurances' ),
		'parent_item_colon'     => __( 'Parent Item:', 'iris-insurances' ),
		'all_items'             => __( 'All insurances', 'iris-insurances' ),
		'add_new_item'          => __( 'Add New IRIS insurances', 'iris-insurances' ),
		'add_new'               => __( 'Add New', 'iris-insurances' ),
		'new_item'              => __( 'New Item', 'iris-insurances' ),
		'edit_item'             => __( 'Edit Item', 'iris-insurances' ),
		'update_item'           => __( 'Update Item', 'iris-insurances' ),
		'view_item'             => __( 'View Item', 'iris-insurances' ),
		'search_items'          => __( 'Search Item', 'iris-insurances' ),
		'not_found'             => __( 'Not found', 'iris-insurances' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'iris-insurances' ),
		'featured_image'        => __( 'Featured Image', 'iris-insurances' ),
		'set_featured_image'    => __( 'Set featured image', 'iris-insurances' ),
		'remove_featured_image' => __( 'Remove featured image', 'iris-insurances' ),
		'use_featured_image'    => __( 'Use as featured image', 'iris-insurances' ),
		'insert_into_item'      => __( 'Insert into item', 'iris-insurances' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'iris-insurances' ),
		'items_list'            => __( 'Items list', 'iris-insurances' ),
		'items_list_navigation' => __( 'Items list navigation', 'iris-insurances' ),
		'filter_items_list'     => __( 'Filter items list', 'iris-insurances' ),
	);
	$irisinsurances_args = array(
		'label'                 => __( 'IRIS insurances', 'iris-insurances' ),
		'description'           => __( 'IRIS insurances information page.', 'iris-insurances' ),
		'labels'                => $irisinsurances_labels,
		'supports'              => array( 'title', 'editor','author', 'thumbnail', 'revisions', ),
		'taxonomies'            => array(  ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-admin-page',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'irisinsurances', $irisinsurances_args );
}
add_action( 'init', 'irisinsurances_post_type', 0 );
/*
|===================================================================================|
|																					|
|      IRIS Member's Details Meta Box                                               |
|																					|
|===================================================================================| 
 */
// Add the Meta Box
function add_irisinsurances_meta_box() {
    add_meta_box(
        'custom_meta_box', // $id
        'Details', // $title 
        'show_irisinsurances_meta_box', // $callback
        'irisinsurances', // $page
        'normal', // $context
        'high'); // $priority
}
add_action('add_meta_boxes', 'add_irisinsurances_meta_box');
 // Field Array
$insurance_prefix = 'irisinsurances_';
$custom_irisinsurances_meta_fields_options = array(
	
    	array(
        'label'=> 'belongs to member',
        'desc'  => '',
        'id'    => 'insurance_belongs_to_member',
        'type'  => 'insurance_dropdown'
    ),
	array(
        'label'=> 'Insurance Carrier',
        'desc'  => '',
        'id'    => $insurance_prefix.'insurance_carrier',
        'type'  => 'text'
    ),
	array(
        'label'=> 'policy number',
        'desc'  => '',
        'id'    => $insurance_prefix.'policy_number',
        'type'  => 'text'
    ),
	array(
        'label'=> 'group name',
        'desc'  => '',
        'id'    => $insurance_prefix.'group_name',
        'type'  => 'text'
    ),
	array(
        'label'=> 'group number',
        'desc'  => '',
        'id'    => $insurance_prefix.'group_number',
        'type'  => 'text'
    ),
	array(
        'label'=> 'physician name',
        'desc'  => '',
        'id'    => $insurance_prefix.'physician_name',
        'type'  => 'text'
    ),
	array(
        'label'=> 'physician tel',
        'desc'  => '',
        'id'    => $insurance_prefix.'physician_tel',
        'type'  => 'text'
    ),
	array(
        'label'=> 'insurer full name',
        'desc'  => '',
        'id'    => $insurance_prefix.'insurer_fullname',
        'type'  => 'text'
    ),
	array(
        'label'=> 'Date of Birth',
        'desc'  => '',
        'id'    => $insurance_prefix.'bday',
            'options'=>array(''=>'Day',
                '01'=>'01','02'=>'02','03'=>'03','04'=>'04','05'=>'05','06'=>'06','07'=>'07','08'=>'08','09'=>'09','10'=>'10',
                '11'=>'11','12'=>'12','13'=>'13','14'=>'14','15'=>'15','16'=>'16','17'=>'17','18'=>'18','19'=>'19','20'=>'20',
                '21'=>'21','22'=>'22','23'=>'23','24'=>'24','25'=>'25','26'=>'26','27'=>'27','28'=>'28','29'=>'29','30'=>'30',
                '31'=>'31'
            ),
        'type'  => 'select'
    ),
	array(
        'label'=> '',
        'desc'  => '',
        'id'    => $insurance_prefix.'bmonth',
            'options'=>array('Month'=>'Month', 'Jan'=>'Jan', 'Feb'=>'Feb', 'Mar'=>'Mar', 'Apr'=>'Apr', 'May'=>'May', 'Jun'=>'Jun', 'Jul'=>'Jul', 'Aug'=>'Aug', 'Sep'=>'Sep', 'Oct'=>'Oct', 'Nov'=>'Nov', 'Dec'=>'Dec'),
        'type'  => 'select'
    ),
	array(
        'label'=> '',
        'desc'  => 'Please enter full year. i.e: 1988',
        'id'    => $insurance_prefix.'byear',
        'type'  => 'text'
    ),
	array(
        'label'=> 'mailing addresss',
        'desc'  => '',
        'id'    => $insurance_prefix.'mailing_addresss',
        'type'  => 'textarea'
    ),array(
        'label'=> 'city',
        'desc'  => '',
        'id'    => $insurance_prefix.'city',
        'type'  => 'text'
    ),
//	array(
//        'label'=> 'Country',
//        'desc'  => '',
//        'id'    => $insurance_prefix.'country',
//		'options' => array
//(
//	'US' => 'United States',
//	'GB' => 'United Kingdom',
//	'AF' => 'Afghanistan',
//	'AX' => 'Aland Islands',
//	'AL' => 'Albania',
//	'DZ' => 'Algeria',
//	'AS' => 'American Samoa',
//	'AD' => 'Andorra',
//	'AO' => 'Angola',
//	'AI' => 'Anguilla',
//	'AQ' => 'Antarctica',
//	'AG' => 'Antigua And Barbuda',
//	'AR' => 'Argentina',
//	'AM' => 'Armenia',
//	'AW' => 'Aruba',
//	'AU' => 'Australia',
//	'AT' => 'Austria',
//	'AZ' => 'Azerbaijan',
//	'BS' => 'Bahamas',
//	'BH' => 'Bahrain',
//	'BD' => 'Bangladesh',
//	'BB' => 'Barbados',
//	'BY' => 'Belarus',
//	'BE' => 'Belgium',
//	'BZ' => 'Belize',
//	'BJ' => 'Benin',
//	'BM' => 'Bermuda',
//	'BT' => 'Bhutan',
//	'BO' => 'Bolivia',
//	'BA' => 'Bosnia And Herzegovina',
//	'BW' => 'Botswana',
//	'BV' => 'Bouvet Island',
//	'BR' => 'Brazil',
//	'IO' => 'British Indian Ocean Territory',
//	'BN' => 'Brunei Darussalam',
//	'BG' => 'Bulgaria',
//	'BF' => 'Burkina Faso',
//	'BI' => 'Burundi',
//	'KH' => 'Cambodia',
//	'CM' => 'Cameroon',
//	'CA' => 'Canada',
//	'CV' => 'Cape Verde',
//	'KY' => 'Cayman Islands',
//	'CF' => 'Central African Republic',
//	'TD' => 'Chad',
//	'CL' => 'Chile',
//	'CN' => 'China',
//	'CX' => 'Christmas Island',
//	'CC' => 'Cocos (Keeling) Islands',
//	'CO' => 'Colombia',
//	'KM' => 'Comoros',
//	'CG' => 'Congo',
//	'CD' => 'Congo, Democratic Republic',
//	'CK' => 'Cook Islands',
//	'CR' => 'Costa Rica',
//	'CI' => 'Cote D\'Ivoire',
//	'HR' => 'Croatia',
//	'CU' => 'Cuba',
//	'CY' => 'Cyprus',
//	'CZ' => 'Czech Republic',
//	'DK' => 'Denmark',
//	'DJ' => 'Djibouti',
//	'DM' => 'Dominica',
//	'DO' => 'Dominican Republic',
//	'EC' => 'Ecuador',
//	'EG' => 'Egypt',
//	'SV' => 'El Salvador',
//	'GQ' => 'Equatorial Guinea',
//	'ER' => 'Eritrea',
//	'EE' => 'Estonia',
//	'ET' => 'Ethiopia',
//	'FK' => 'Falkland Islands (Malvinas)',
//	'FO' => 'Faroe Islands',
//	'FJ' => 'Fiji',
//	'FI' => 'Finland',
//	'FR' => 'France',
//	'GF' => 'French Guiana',
//	'PF' => 'French Polynesia',
//	'TF' => 'French Southern Territories',
//	'GA' => 'Gabon',
//	'GM' => 'Gambia',
//	'GE' => 'Georgia',
//	'DE' => 'Germany',
//	'GH' => 'Ghana',
//	'GI' => 'Gibraltar',
//	'GR' => 'Greece',
//	'GL' => 'Greenland',
//	'GD' => 'Grenada',
//	'GP' => 'Guadeloupe',
//	'GU' => 'Guam',
//	'GT' => 'Guatemala',
//	'GG' => 'Guernsey',
//	'GN' => 'Guinea',
//	'GW' => 'Guinea-Bissau',
//	'GY' => 'Guyana',
//	'HT' => 'Haiti',
//	'HM' => 'Heard Island & Mcdonald Islands',
//	'VA' => 'Holy See (Vatican City State)',
//	'HN' => 'Honduras',
//	'HK' => 'Hong Kong',
//	'HU' => 'Hungary',
//	'IS' => 'Iceland',
//	'IN' => 'India',
//	'ID' => 'Indonesia',
//	'IR' => 'Iran, Islamic Republic Of',
//	'IQ' => 'Iraq',
//	'IE' => 'Ireland',
//	'IM' => 'Isle Of Man',
//	'IL' => 'Israel',
//	'IT' => 'Italy',
//	'JM' => 'Jamaica',
//	'JP' => 'Japan',
//	'JE' => 'Jersey',
//	'JO' => 'Jordan',
//	'KZ' => 'Kazakhstan',
//	'KE' => 'Kenya',
//	'KI' => 'Kiribati',
//	'KR' => 'Korea',
//	'KW' => 'Kuwait',
//	'KG' => 'Kyrgyzstan',
//	'LA' => 'Lao People\'s Democratic Republic',
//	'LV' => 'Latvia',
//	'LB' => 'Lebanon',
//	'LS' => 'Lesotho',
//	'LR' => 'Liberia',
//	'LY' => 'Libyan Arab Jamahiriya',
//	'LI' => 'Liechtenstein',
//	'LT' => 'Lithuania',
//	'LU' => 'Luxembourg',
//	'MO' => 'Macao',
//	'MK' => 'Macedonia',
//	'MG' => 'Madagascar',
//	'MW' => 'Malawi',
//	'MY' => 'Malaysia',
//	'MV' => 'Maldives',
//	'ML' => 'Mali',
//	'MT' => 'Malta',
//	'MH' => 'Marshall Islands',
//	'MQ' => 'Martinique',
//	'MR' => 'Mauritania',
//	'MU' => 'Mauritius',
//	'YT' => 'Mayotte',
//	'MX' => 'Mexico',
//	'FM' => 'Micronesia, Federated States Of',
//	'MD' => 'Moldova',
//	'MC' => 'Monaco',
//	'MN' => 'Mongolia',
//	'ME' => 'Montenegro',
//	'MS' => 'Montserrat',
//	'MA' => 'Morocco',
//	'MZ' => 'Mozambique',
//	'MM' => 'Myanmar',
//	'NA' => 'Namibia',
//	'NR' => 'Nauru',
//	'NP' => 'Nepal',
//	'NL' => 'Netherlands',
//	'AN' => 'Netherlands Antilles',
//	'NC' => 'New Caledonia',
//	'NZ' => 'New Zealand',
//	'NI' => 'Nicaragua',
//	'NE' => 'Niger',
//	'NG' => 'Nigeria',
//	'NU' => 'Niue',
//	'NF' => 'Norfolk Island',
//	'MP' => 'Northern Mariana Islands',
//	'NO' => 'Norway',
//	'OM' => 'Oman',
//	'PK' => 'Pakistan',
//	'PW' => 'Palau',
//	'PS' => 'Palestinian Territory, Occupied',
//	'PA' => 'Panama',
//	'PG' => 'Papua New Guinea',
//	'PY' => 'Paraguay',
//	'PE' => 'Peru',
//	'PH' => 'Philippines',
//	'PN' => 'Pitcairn',
//	'PL' => 'Poland',
//	'PT' => 'Portugal',
//	'PR' => 'Puerto Rico',
//	'QA' => 'Qatar',
//	'RE' => 'Reunion',
//	'RO' => 'Romania',
//	'RU' => 'Russian Federation',
//	'RW' => 'Rwanda',
//	'BL' => 'Saint Barthelemy',
//	'SH' => 'Saint Helena',
//	'KN' => 'Saint Kitts And Nevis',
//	'LC' => 'Saint Lucia',
//	'MF' => 'Saint Martin',
//	'PM' => 'Saint Pierre And Miquelon',
//	'VC' => 'Saint Vincent And Grenadines',
//	'WS' => 'Samoa',
//	'SM' => 'San Marino',
//	'ST' => 'Sao Tome And Principe',
//	'SA' => 'Saudi Arabia',
//	'SN' => 'Senegal',
//	'RS' => 'Serbia',
//	'SC' => 'Seychelles',
//	'SL' => 'Sierra Leone',
//	'SG' => 'Singapore',
//	'SK' => 'Slovakia',
//	'SI' => 'Slovenia',
//	'SB' => 'Solomon Islands',
//	'SO' => 'Somalia',
//	'ZA' => 'South Africa',
//	'GS' => 'South Georgia And Sandwich Isl.',
//	'ES' => 'Spain',
//	'LK' => 'Sri Lanka',
//	'SD' => 'Sudan',
//	'SR' => 'Suriname',
//	'SJ' => 'Svalbard And Jan Mayen',
//	'SZ' => 'Swaziland',
//	'SE' => 'Sweden',
//	'CH' => 'Switzerland',
//	'SY' => 'Syrian Arab Republic',
//	'TW' => 'Taiwan',
//	'TJ' => 'Tajikistan',
//	'TZ' => 'Tanzania',
//	'TH' => 'Thailand',
//	'TL' => 'Timor-Leste',
//	'TG' => 'Togo',
//	'TK' => 'Tokelau',
//	'TO' => 'Tonga',
//	'TT' => 'Trinidad And Tobago',
//	'TN' => 'Tunisia',
//	'TR' => 'Turkey',
//	'TM' => 'Turkmenistan',
//	'TC' => 'Turks And Caicos Islands',
//	'TV' => 'Tuvalu',
//	'UG' => 'Uganda',
//	'UA' => 'Ukraine',
//	'AE' => 'United Arab Emirates',
//	'UM' => 'United States Outlying Islands',
//	'UY' => 'Uruguay',
//	'UZ' => 'Uzbekistan',
//	'VU' => 'Vanuatu',
//	'VE' => 'Venezuela',
//	'VN' => 'Viet Nam',
//	'VG' => 'Virgin Islands, British',
//	'VI' => 'Virgin Islands, U.S.',
//	'WF' => 'Wallis And Futuna',
//	'EH' => 'Western Sahara',
//	'YE' => 'Yemen',
//	'ZM' => 'Zambia',
//	'ZW' => 'Zimbabwe',
//),
//        'type'  => 'select'
//    ),
	array(
        'label'=> 'State',
        'desc'  => '',
        'id'    => $insurance_prefix.'state',
		'options'=> array(
    'Alabama'=>'Alabama',
    'Alaska'=>'Alaska',
    'Arizona'=>'Arizona',
    'Arkansas'=>'Arkansas',
    'California'=>'California',
    'Colorado'=>'Colorado',
    'Connecticut'=>'Connecticut',
    'Delaware'=>'Delaware',
    'District of Columbia'=>'District of Columbia',
    'Florida'=>'Florida',
    'Georgia'=>'Georgia',
    'Hawaii'=>'Hawaii',
    'Idaho'=>'Idaho',
    'Illinois'=>'Illinois',
    'Indiana'=>'Indiana',
    'Iowa'=>'Iowa',
    'Kansas'=>'Kansas',
    'Kentucky'=>'Kentucky',
    'Louisiana'=>'Louisiana',
    'Maine'=>'Maine',
    'Maryland'=>'Maryland',
    'Massachusetts'=>'Massachusetts',
    'Michigan'=>'Michigan',
    'Minnesota'=>'Minnesota',
    'Mississippi'=>'Mississippi',
    'Missouri'=>'Missouri',
    'Montana'=>'Montana',
    'Nebraska'=>'Nebraska',
    'Nevada'=>'Nevada',
    'New Hampshire'=>'New Hampshire',
    'New Jersey'=>'New Jersey',
    'New Mexico'=>'New Mexico',
    'New York'=>'New York',
    'North Carolina'=>'North Carolina',
    'North Dakota'=>'North Dakota',
    'Ohio'=>'Ohio',
    'Oklahoma'=>'Oklahoma',
    'Oregon'=>'Oregon',
    'Pennsylvania'=>'Pennsylvania',
    'Rhode Island'=>'Rhode Island',
    'South Carolina'=>'South Carolina',
    'South Dakota'=>'South Dakota',
    'Tennessee'=>'Tennessee',
    'Texas'=>'Texas',
    'Utah'=>'Utah',
    'Vermont'=>'Vermont',
    'Virginia'=>'Virginia',
    'Washington'=>'Washington',
    'West Virginia'=>'West Virginia',
    'Wisconsin'=>'Wisconsin',
    'Wyoming'=>'Wyoming',
),
        'type'  => 'select'
    ),
	array(
        'label'=> 'Postal Code',
        'desc'  => '',
        'id'    => $insurance_prefix.'postal_code',
        'type'  => 'text'
    ),
	
	array(
        'label'=> 'Email',
        'desc'  => '',
        'id'    => $insurance_prefix.'email',
        'type'  => 'text'
    ),
	
);

// The Callback
function show_irisinsurances_meta_box() {
    include('styles.php');
global $custom_irisinsurances_meta_fields_options, $post;
// Use nonce for verification
echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';
$args = new WP_Query(['post_type' => 'irismembers', 'posts_per_page' => -1 , 'post_status' => 'publish' ]);
 //echo '<pre>';
 //print_r($posts[0]);
 //exit;
  
    // Begin the field table and loop
    echo '<table class="form-table">';
    foreach ($custom_irisinsurances_meta_fields_options as $field) {
        // get value of this field if it exists for this post
        $meta = get_post_meta($post->ID, $field['id'], true);
        // begin a table row with
        echo '<tr>
                <th class="'.$field['id'].'_td_header"><label for="'.$field['id'].'">'.$field['label'].'</label></th>
                <td class="'.$field['id'].'_td_class">';
                switch($field['type']) {
                    // case items will go here
					// text
case 'upload':
?>
    <div class="row image_upload_row" >
    <div class="<?php echo $field['id']; ?>_imagetextarea">
    <?php if($meta){ ?>
	<div class="col-sm-4"><input type="text" readonly name="<?php echo $field['id']; ?>" id="<?php echo $field['id']; ?>" value="<?php echo $meta; ?>" size="30" /></div>
    <?php } ?>
    </div>
	<div class="col-sm-2"><input type="button" name="logo" id="<?php echo $field['id']; ?>_upload-btn" class="button-secondary" value="Upload Image"></div>
	<div class="col-sm-6" style="padding-top: 20px;"></div>
	</div>
    <div class="<?php echo $field['id']; ?>_imagearea">
    <?php if($meta){ ?>
	<div class="col-sm-6"><div class="col-sm-12 images_parent_class"><div class="col-sm-9 <?php echo $field['id']; ?>_upload-delete delete_btn">X</div><img src="<?php echo $meta; ?>" id="<?php echo $field['id']; ?>_new-img" style="margin-left: auto; margin-right: auto; display: block;"/></div></div> <?php } ?>
    </div>
	            <br /><span class="description"><?php echo $field['desc']; ?></span>
		

 <?php include('styles.php');?>
		<?php
break;
case 'multiupload':
    echo '<div class="row" >
	<div class="col-sm-4 '.$field['id'].'_readonly_meta_upload_txtbox">';
	$counter = 0;
	foreach($meta as $inner_meta){
	echo '<input type="text" data-imglink="img_link_'.$counter.'" readonly name="'.$field['id'].'[]" id="'.$field['id'].'-'.$counter.'" value="'.$inner_meta.'" size="30" />';
	$counter++;
	}
	echo '</div><div class="col-sm-2"><input type="button" name="logo" id="'.$field['id'].'-btn" class="button-secondary" value="Upload Image"></div>
	<div class="col-sm-6" style="padding-top: 20px;"></div>
	</div>
	<div class="col-sm-6 '.$field['id'].'_append_images_here" > ';
	$another_counter = 0;
	foreach($meta as $another_inner_meta){
	echo '<div class="col-sm-12 images_parent_class" style="position:relative;"><div class="col-sm-9 '.$field['id'].'_upload-delete delete_btn">Delete</div><div class="image_div"><img data-imglink="img_link_'.$another_counter.'" src="'.$another_inner_meta.'" id="new-img-'.$another_counter.'" width="150" height="150" style="margin-left: auto; margin-right: auto; display: block;"/></div></div>';
	$another_counter ++;
	}
	echo '</div><br /><span class="description">'.$field['desc'].'</span>';
				//print_r($meta);
				?>
		<script>
		var $ = jQuery;
		jQuery(document).ready(function($){
	$("#<?php echo $field['id'].'-btn';?>").click(function(e) {
		e.preventDefault();
		var image = wp.media({
			title: "Upload Image",
			// mutiple: true if you want to upload multiple files at once
			multiple: true
		}).open()
		.on("select", function(e){
			// This will return the selected image from the Media Uploader, the result is an object
			var uploaded_images = image.state().get("selection").map( function( uploaded_image ) {
                    uploaded_image.toJSON();
                    return uploaded_image;
            });
			// We convert uploaded_image to a JSON object to make accessing it easier
			// Output to the console uploaded_image
			//console.log(uploaded_image);
			var i;
           for (i = 0; i < uploaded_images.length; ++i) {
                $('.<?php echo $field['id'].'_append_images_here'; ?>').append('<div class="col-sm-12 images_parent_class" style="position:relative"><div class="col-sm-9 <?php echo $field['id']; ?>_upload-delete delete_btn">Delete</div><div class="image_div"><img data-imglink="img_link_'+i+'" src="'+uploaded_images[i].attributes.url+'" id="new-img-0" width="150" height="150" style="margin-left: auto; margin-right: auto; display: block;"></div></div>');
				$('.<?php echo $field['id'];?>_readonly_meta_upload_txtbox').append('<input type="text" data-imglink="img_link_'+i+'" readonly="" name="<?php echo $field['id'];?>[]" value="'+uploaded_images[i].attributes.url+'" size="30">');
			}
		});
	});
});
$(document).on('click','.<?php echo $field['id']; ?>_upload-delete',function(){
	var check_img_link = $(this).parent('.images_parent_class').children('.image_div').children('img').data('imglink');
	$('.<?php echo $field['id'];?>_readonly_meta_upload_txtbox input').each( function () {
		if($(this).data('imglink') == check_img_link)
		{
			$(this).remove();
		}
		});
		$(this).parent('.images_parent_class').remove();
});
		</script>
		<style>
		.delete_btn {
    color: red;
    font-weight: bold;
    cursor: pointer;
    position: absolute;
    top: 0;
    right: 0;
    border: 2px solid red;
    border-radius: 50px;
    text-align: center;
}
.images_parent_class
{
	display: inline-block;
}
        </style><?php
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
    foreach ($field['options'] as $key => $option) {
        echo '<option', $meta == $key ? ' selected="selected"' : '', ' value="'.$key.'">'.$option.'</option>';
    }
    echo '</select><br /><span class="description">'.$field['desc'].'</span>';
break;
//cdd
case 'insurance_dropdown':
echo '<select name="'.$field['id'].'" id="'.$field['id'].'">';
echo '<option value="">select</option>';
foreach ($args->get_posts() as $mem_query) {
echo '<option '.($meta == $mem_query->ID ? 'selected' : '').' value="'.$mem_query->ID.'">'.$mem_query->post_title.'</option>';
}
wp_reset_postdata();
break;
//multiselect
case 'multiselect':
echo '<select name="'.$field['id'].'[]" id="'.$field['id'].'" multiple>';
foreach ($field['options'] as $key => $option) { ?>
<option <?php if(!empty($meta)){foreach($meta as $inner_meta){  if($key == $inner_meta){echo 'selected="selected"';}}} ?> value="<?php echo $key; ?>"><?php echo $option; ?></option>
<?php
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
                } //end switch
        echo '</td>';
    } // end foreach
    echo '</table>'; // end table
	?>
    <style>
	/*.form-table tr
	{
		display:inline-block;
	}
	.form-table th
	{
		width:auto;
	}*/
    </style>
    <?php
	
}
// Save the Data
function save_irisinsurances_meta($post_id) {
    global $custom_irisinsurances_meta_fields_options;
/*echo '<pre>';
print_r( $custom_irisinsurances_meta_fields_options);
exit;*/
     
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
    foreach ($custom_irisinsurances_meta_fields_options as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    } // end foreach
}
add_action('save_post', 'save_irisinsurances_meta');

