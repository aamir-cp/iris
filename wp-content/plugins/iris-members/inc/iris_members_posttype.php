<?php
/*****************irismembers cpt*********/
function irismembers_post_type() {
	$irismembers_labels = array(
		'name'                  => _x( 'IRIS Members', 'Post Type General Name', 'iris-members' ),
		'singular_name'         => _x( 'IRIS Members', 'Post Type Singular Name', 'iris-members' ),
		'menu_name'             => __( 'IRIS Members', 'iris-members' ),
		'name_admin_bar'        => __( 'IRIS Members', 'iris-members' ),
		'archives'              => __( 'Item Archives', 'iris-members' ),
		'parent_item_colon'     => __( 'Parent Item:', 'iris-members' ),
		'all_items'             => __( 'All Items', 'iris-members' ),
		'add_new_item'          => __( 'Add New IRIS Members', 'iris-members' ),
		'add_new'               => __( 'Add New', 'iris-members' ),
		'new_item'              => __( 'New Item', 'iris-members' ),
		'edit_item'             => __( 'Edit Item', 'iris-members' ),
		'update_item'           => __( 'Update Item', 'iris-members' ),
		'view_item'             => __( 'View Item', 'iris-members' ),
		'search_items'          => __( 'Search Item', 'iris-members' ),
		'not_found'             => __( 'Not found', 'iris-members' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'iris-members' ),
		'featured_image'        => __( 'Featured Image', 'iris-members' ),
		'set_featured_image'    => __( 'Set featured image', 'iris-members' ),
		'remove_featured_image' => __( 'Remove featured image', 'iris-members' ),
		'use_featured_image'    => __( 'Use as featured image', 'iris-members' ),
		'insert_into_item'      => __( 'Insert into item', 'iris-members' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'iris-members' ),
		'items_list'            => __( 'Items list', 'iris-members' ),
		'items_list_navigation' => __( 'Items list navigation', 'iris-members' ),
		'filter_items_list'     => __( 'Filter items list', 'iris-members' ),
	);
	$irismembers_args = array(
		'label'                 => __( 'IRIS Members', 'iris-members' ),
		'description'           => __( 'IRIS Members information page.', 'iris-members' ),
		'labels'                => $irismembers_labels,
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
	register_post_type( 'irismembers', $irismembers_args );
}
add_action( 'init', 'irismembers_post_type', 0 );
/*
|===================================================================================|
|																					|
|      IRIS Member's Details Meta Box                                               |
|																					|
|===================================================================================| 
 */
// Add the Meta Box
function add_irismembers_meta_box() {
    add_meta_box(
        'custom_meta_box', // $id
        'Details', // $title 
        'show_irismembers_meta_box', // $callback
        'irismembers', // $page
        'normal', // $context
        'high'); // $priority
}
add_action('add_meta_boxes', 'add_irismembers_meta_box');
 // Field Array
$member_prefix = 'irismembers_';
$custom_irismembers_meta_fields_options = array(
	array(
        'label'=> 'Member Name',
        'desc'  => '',
        'id'    => $member_prefix.'member_name',
        'type'  => 'text'
    ),
		array(
        'label'=> 'Address',
        'desc'  => '',
        'id'    => $member_prefix.'address',
        'type'  => 'textarea'
    ),
array(
        'label'=> 'City',
        'desc'  => '',
        'id'    => $member_prefix.'city',
        'type'  => 'text'
    ),
/*	array(
        'label'=> 'Country',
        'desc'  => '',
        'id'    => $member_prefix.'country',
		'options' => array
(
	'US' => 'United States',
	'GB' => 'United Kingdom',
	'AF' => 'Afghanistan',
	'AX' => 'Aland Islands',
	'AL' => 'Albania',
	'DZ' => 'Algeria',
	'AS' => 'American Samoa',
	'AD' => 'Andorra',
	'AO' => 'Angola',
	'AI' => 'Anguilla',
	'AQ' => 'Antarctica',
	'AG' => 'Antigua And Barbuda',
	'AR' => 'Argentina',
	'AM' => 'Armenia',
	'AW' => 'Aruba',
	'AU' => 'Australia',
	'AT' => 'Austria',
	'AZ' => 'Azerbaijan',
	'BS' => 'Bahamas',
	'BH' => 'Bahrain',
	'BD' => 'Bangladesh',
	'BB' => 'Barbados',
	'BY' => 'Belarus',
	'BE' => 'Belgium',
	'BZ' => 'Belize',
	'BJ' => 'Benin',
	'BM' => 'Bermuda',
	'BT' => 'Bhutan',
	'BO' => 'Bolivia',
	'BA' => 'Bosnia And Herzegovina',
	'BW' => 'Botswana',
	'BV' => 'Bouvet Island',
	'BR' => 'Brazil',
	'IO' => 'British Indian Ocean Territory',
	'BN' => 'Brunei Darussalam',
	'BG' => 'Bulgaria',
	'BF' => 'Burkina Faso',
	'BI' => 'Burundi',
	'KH' => 'Cambodia',
	'CM' => 'Cameroon',
	'CA' => 'Canada',
	'CV' => 'Cape Verde',
	'KY' => 'Cayman Islands',
	'CF' => 'Central African Republic',
	'TD' => 'Chad',
	'CL' => 'Chile',
	'CN' => 'China',
	'CX' => 'Christmas Island',
	'CC' => 'Cocos (Keeling) Islands',
	'CO' => 'Colombia',
	'KM' => 'Comoros',
	'CG' => 'Congo',
	'CD' => 'Congo, Democratic Republic',
	'CK' => 'Cook Islands',
	'CR' => 'Costa Rica',
	'CI' => 'Cote D\'Ivoire',
	'HR' => 'Croatia',
	'CU' => 'Cuba',
	'CY' => 'Cyprus',
	'CZ' => 'Czech Republic',
	'DK' => 'Denmark',
	'DJ' => 'Djibouti',
	'DM' => 'Dominica',
	'DO' => 'Dominican Republic',
	'EC' => 'Ecuador',
	'EG' => 'Egypt',
	'SV' => 'El Salvador',
	'GQ' => 'Equatorial Guinea',
	'ER' => 'Eritrea',
	'EE' => 'Estonia',
	'ET' => 'Ethiopia',
	'FK' => 'Falkland Islands (Malvinas)',
	'FO' => 'Faroe Islands',
	'FJ' => 'Fiji',
	'FI' => 'Finland',
	'FR' => 'France',
	'GF' => 'French Guiana',
	'PF' => 'French Polynesia',
	'TF' => 'French Southern Territories',
	'GA' => 'Gabon',
	'GM' => 'Gambia',
	'GE' => 'Georgia',
	'DE' => 'Germany',
	'GH' => 'Ghana',
	'GI' => 'Gibraltar',
	'GR' => 'Greece',
	'GL' => 'Greenland',
	'GD' => 'Grenada',
	'GP' => 'Guadeloupe',
	'GU' => 'Guam',
	'GT' => 'Guatemala',
	'GG' => 'Guernsey',
	'GN' => 'Guinea',
	'GW' => 'Guinea-Bissau',
	'GY' => 'Guyana',
	'HT' => 'Haiti',
	'HM' => 'Heard Island & Mcdonald Islands',
	'VA' => 'Holy See (Vatican City State)',
	'HN' => 'Honduras',
	'HK' => 'Hong Kong',
	'HU' => 'Hungary',
	'IS' => 'Iceland',
	'IN' => 'India',
	'ID' => 'Indonesia',
	'IR' => 'Iran, Islamic Republic Of',
	'IQ' => 'Iraq',
	'IE' => 'Ireland',
	'IM' => 'Isle Of Man',
	'IL' => 'Israel',
	'IT' => 'Italy',
	'JM' => 'Jamaica',
	'JP' => 'Japan',
	'JE' => 'Jersey',
	'JO' => 'Jordan',
	'KZ' => 'Kazakhstan',
	'KE' => 'Kenya',
	'KI' => 'Kiribati',
	'KR' => 'Korea',
	'KW' => 'Kuwait',
	'KG' => 'Kyrgyzstan',
	'LA' => 'Lao People\'s Democratic Republic',
	'LV' => 'Latvia',
	'LB' => 'Lebanon',
	'LS' => 'Lesotho',
	'LR' => 'Liberia',
	'LY' => 'Libyan Arab Jamahiriya',
	'LI' => 'Liechtenstein',
	'LT' => 'Lithuania',
	'LU' => 'Luxembourg',
	'MO' => 'Macao',
	'MK' => 'Macedonia',
	'MG' => 'Madagascar',
	'MW' => 'Malawi',
	'MY' => 'Malaysia',
	'MV' => 'Maldives',
	'ML' => 'Mali',
	'MT' => 'Malta',
	'MH' => 'Marshall Islands',
	'MQ' => 'Martinique',
	'MR' => 'Mauritania',
	'MU' => 'Mauritius',
	'YT' => 'Mayotte',
	'MX' => 'Mexico',
	'FM' => 'Micronesia, Federated States Of',
	'MD' => 'Moldova',
	'MC' => 'Monaco',
	'MN' => 'Mongolia',
	'ME' => 'Montenegro',
	'MS' => 'Montserrat',
	'MA' => 'Morocco',
	'MZ' => 'Mozambique',
	'MM' => 'Myanmar',
	'NA' => 'Namibia',
	'NR' => 'Nauru',
	'NP' => 'Nepal',
	'NL' => 'Netherlands',
	'AN' => 'Netherlands Antilles',
	'NC' => 'New Caledonia',
	'NZ' => 'New Zealand',
	'NI' => 'Nicaragua',
	'NE' => 'Niger',
	'NG' => 'Nigeria',
	'NU' => 'Niue',
	'NF' => 'Norfolk Island',
	'MP' => 'Northern Mariana Islands',
	'NO' => 'Norway',
	'OM' => 'Oman',
	'PK' => 'Pakistan',
	'PW' => 'Palau',
	'PS' => 'Palestinian Territory, Occupied',
	'PA' => 'Panama',
	'PG' => 'Papua New Guinea',
	'PY' => 'Paraguay',
	'PE' => 'Peru',
	'PH' => 'Philippines',
	'PN' => 'Pitcairn',
	'PL' => 'Poland',
	'PT' => 'Portugal',
	'PR' => 'Puerto Rico',
	'QA' => 'Qatar',
	'RE' => 'Reunion',
	'RO' => 'Romania',
	'RU' => 'Russian Federation',
	'RW' => 'Rwanda',
	'BL' => 'Saint Barthelemy',
	'SH' => 'Saint Helena',
	'KN' => 'Saint Kitts And Nevis',
	'LC' => 'Saint Lucia',
	'MF' => 'Saint Martin',
	'PM' => 'Saint Pierre And Miquelon',
	'VC' => 'Saint Vincent And Grenadines',
	'WS' => 'Samoa',
	'SM' => 'San Marino',
	'ST' => 'Sao Tome And Principe',
	'SA' => 'Saudi Arabia',
	'SN' => 'Senegal',
	'RS' => 'Serbia',
	'SC' => 'Seychelles',
	'SL' => 'Sierra Leone',
	'SG' => 'Singapore',
	'SK' => 'Slovakia',
	'SI' => 'Slovenia',
	'SB' => 'Solomon Islands',
	'SO' => 'Somalia',
	'ZA' => 'South Africa',
	'GS' => 'South Georgia And Sandwich Isl.',
	'ES' => 'Spain',
	'LK' => 'Sri Lanka',
	'SD' => 'Sudan',
	'SR' => 'Suriname',
	'SJ' => 'Svalbard And Jan Mayen',
	'SZ' => 'Swaziland',
	'SE' => 'Sweden',
	'CH' => 'Switzerland',
	'SY' => 'Syrian Arab Republic',
	'TW' => 'Taiwan',
	'TJ' => 'Tajikistan',
	'TZ' => 'Tanzania',
	'TH' => 'Thailand',
	'TL' => 'Timor-Leste',
	'TG' => 'Togo',
	'TK' => 'Tokelau',
	'TO' => 'Tonga',
	'TT' => 'Trinidad And Tobago',
	'TN' => 'Tunisia',
	'TR' => 'Turkey',
	'TM' => 'Turkmenistan',
	'TC' => 'Turks And Caicos Islands',
	'TV' => 'Tuvalu',
	'UG' => 'Uganda',
	'UA' => 'Ukraine',
	'AE' => 'United Arab Emirates',
	'UM' => 'United States Outlying Islands',
	'UY' => 'Uruguay',
	'UZ' => 'Uzbekistan',
	'VU' => 'Vanuatu',
	'VE' => 'Venezuela',
	'VN' => 'Viet Nam',
	'VG' => 'Virgin Islands, British',
	'VI' => 'Virgin Islands, U.S.',
	'WF' => 'Wallis And Futuna',
	'EH' => 'Western Sahara',
	'YE' => 'Yemen',
	'ZM' => 'Zambia',
	'ZW' => 'Zimbabwe',
),
        'type'  => 'select'
    ),*/
	array(
        'label'=> 'State',
        'desc'  => '',
        'id'    => $member_prefix.'state',
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
        'id'    => $member_prefix.'postal_code',
        'type'  => 'text'
    ),
	array(
        'label'=> 'Date of Birth',
        'desc'  => '',
        'id'    => $member_prefix.'bday',
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
        'id'    => $member_prefix.'bmonth',
            'options'=>array('Month'=>'Month', 'Jan'=>'Jan', 'Feb'=>'Feb', 'Mar'=>'Mar', 'Apr'=>'Apr', 'May'=>'May', 'Jun'=>'Jun', 'Jul'=>'Jul', 'Aug'=>'Aug', 'Sep'=>'Sep', 'Oct'=>'Oct', 'Nov'=>'Nov', 'Dec'=>'Dec'),
        'type'  => 'select'
    ),
	array(
        'label'=> '',
        'desc'  => 'Please enter full year. i.e: 1988',
        'id'    => $member_prefix.'byear',
        'type'  => 'text'
    ),
	array(
        'label'=> 'Gender',
        'desc'  => '',
        'id'    => $member_prefix.'gender',
		'options'=>array('M'=>'Male','F'=>'Female'),
        'type'  => 'select'
    ),
	array(
        'label'=> 'Email',
        'desc'  => '',
        'id'    => $member_prefix.'email',
        'type'  => 'text'
    ),
	array(
        'label'=> 'Home #',
        'desc'  => '',
        'id'    => $member_prefix.'home_number',
        'type'  => 'text'
    ),
	array(
        'label'=> 'Cell #',
        'desc'  => '',
        'id'    => $member_prefix.'cell_number',
        'type'  => 'text'
    ),
	array(
        'label'=> 'Weight (lbs/kg)',
        'desc'  => '',
        'id'    => $member_prefix.'weight_lb_kg',
        'type'  => 'text'
    ),
	array(
        'label'=> 'Height (inches/cm)',
        'desc'  => '',
        'id'    => $member_prefix.'height_inches_cm',
        'type'  => 'text'
    ),
	array(
        'label'=> 'Race',
        'desc'  => '',
        'id'    => $member_prefix.'race',
        'type'  => 'text'
    ),
	array(
        'label'=> 'Member\'s Questions:',
        'desc'  => '',
        'id'    => $member_prefix.'member_questions'
    ),
	array(
        'label'=> 'What is their Language Capability',
        'desc'  => '',
        'id'    => $member_prefix.'language_capability',
		'options'=> array('select'=>'Select','NONVERBAL'=>'Non-Verbal','NONVERBALSIGN'=>'Non-Verbal Uses Sign','VERDIFF'=>'Verbal with Difficulty','VERDIFFOUT'=>'Verbal without Difficulty','NONVERSTRESS'=>'Non-Verbal when Stressed',),
        'type'  => 'select'
    ),
    array(
        'label'=> 'Are they Sensitive to Sound? If so what Kind?',
        'desc'  => '',
        'id'    => $prefix.'sound_sesitivity',
		'options'=> array('select'=>'Select','yes'=>'Yes','no'=>'No'),
        'type'  => 'select'
    ),
	array(
        'label'=> 'What is your Diagnosis?:',
        'desc'  => 'Please Select the Diagnosis from List: For Mac/Window users: Hold the command/Ctrl Key down',
        'id'    => $prefix.'whats_our_diagnosis',
		'options' => array('Alzheimers'=>'Alzheimers','Amylotropic Sclerosis ALS'=>'Amylotropic Sclerosis ALS','Anxiety'=>'Anxiety','Aspergers'=>'Aspergers','Ataxia'=>'Ataxia','Autism High Functioning'=>'Autism High Functioning','Autism Low Functioning'=>'Autism Low Functioning','Bipolar'=>'Bipolar','Brain Injury'=>'Brain Injury','Cerebral Palsy'=>'Cerebral Palsy','Dementia'=>'Dementia','Down???s Syndrome'=>'Down???s Syndrome','Huntington???s Disease'=>'Huntington???s Disease','Multiple Sclerosis'=>'Multiple Sclerosis','Obsessive Compulsive Disorder'=>'Obsessive Compulsive Disorder','Oppositional Defiant Disorder'=>'Oppositional Defiant Disorder','Other'=>'Other','Parkinson???s Disease'=>'Parkinson???s Disease','Persuasive Developmental Delay'=>'Persuasive Developmental Delay','Post Traumatic Stress Disorder'=>'Post Traumatic Stress Disorder','Stroke'=>'Stroke','Touretts'=>'Touretts'),
        'type'  => 'multiselect'
    ),
	array(
        'label'=> 'Sensitive to Touch',
        'desc'  => '',
        'id'    => $prefix.'sensitive_to_touch',
		'options'=> array('select'=>'Select','yes'=>'Yes','no'=>'No'),
        'type'  => 'select'
    ),
	array(
        'label'=> 'Sensitive to Taste',
        'desc'  => '',
        'id'    => $prefix.'sensitive_to_taste',
		'options'=> array('select'=>'Select','yes'=>'Yes','no'=>'No'),
        'type'  => 'select'
    ),
	array(
        'label'=> 'Do they Have a Tracking Device. If Yes Please Indicate Device Type:',
        'desc'  => '',
        'id'    => $prefix.'indicate_tracking_device',
		'options'=> array('select'=>'Select','yes'=>'Yes','no'=>'No'),
        'type'  => 'select'
    ),
	array(
        'label'=> 'Are they Toilet Trained',
        'desc'  => '',
        'id'    => $prefix.'are_they_toilet_trained',
		'options'=> array('select'=>'Select','yes'=>'Yes','no'=>'No'),
        'type'  => 'select'
    ),
	array(
        'label'=> 'If Other Diagnosis Please indicate:',
        'desc'  => '',
        'id'    => $prefix.'indicate_other_diagnosis',
        'type'  => 'textarea'
    ),
	array(
        'label'=> 'Are there Strategies that Decrease the Stressful Reactions',
        'desc'  => '',
        'id'    => $prefix.'strategies_to_decrease_sr',
		'options'=> array('select'=>'Select','yes'=>'Yes','no'=>'No'),
        'type'  => 'select'
    ),
	array(
        'label'=> 'What is their Prescribers Name and #:',
        'desc'  => '',
        'id'    => $member_prefix.'prescriber_name_number',
        'type'  => 'text'
    ),
	array(
        'label'=> 'Are there Cognitive (IQ) delay? If so what Degree?',
        'desc'  => '',
        'id'    => $prefix.'iq_delay_degree',
		'options'=> array('select'=>'Select','UNKNOWN'=>'Unknown','LESS60'=>'Less than 60','G60LES100'=>'60 and Less than 100','GREATER100'=>'Greater Than 100',),
        'type'  => 'select'
    ),
	array(
        'label'=> 'Are they on Medications: If so please indicate:',
        'desc'  => '',
        'id'    => $prefix.'if_on_medications',
		'options'=> array('select'=>'Select','yes'=>'Yes','no'=>'No'),
        'type'  => 'select'
    ),
	array(
        'label'=> 'Are there Behavioral Issues? If Yes Please Explain:',
        'desc'  => '',
        'id'    => $prefix.'if_behavioral_issues',
		'options'=> array('select'=>'Select','yes'=>'Yes','no'=>'No'),
        'type'  => 'select'
    ),
	array(
        'label'=> 'What allergies do they have?:',
        'desc'  => '',
        'id'    => $member_prefix.'allergies_list',
        'type'  => 'text'
    ),
	array(
        'label'=> 'Do they Wander ot Elope?',
        'desc'  => '',
        'id'    => $prefix.'wander_elope',
		'options'=> array('select'=>'Select','yes'=>'Yes','no'=>'No'),
        'type'  => 'select'
    ),
	array(
        'label'=> 'Are there in Danger to Self and Others?If Yes PLease Explain:',
        'desc'  => '',
        'id'    => $prefix.'self_danger_or_others',
		'options'=> array('select'=>'Select','yes'=>'Yes','no'=>'No'),
        'type'  => 'select'
    ),
	array(
        'label'=> 'Do they become Combative when Stressed?:',
        'desc'  => '',
        'id'    => $prefix.'combative_when_stressed',
		'options'=> array('select'=>'Select','yes'=>'Yes','no'=>'No'),
        'type'  => 'select'
    ),
	array(
        'label'=> 'What type of Living Arrangement Are They In:',
        'desc'  => '',
        'id'    => $prefix.'living_arrangements',
        'type'  => 'textarea'
    ),
	array(
        'label'=> 'Is there a Seizure Disorder?',
        'desc'  => '',
        'id'    => $prefix.'seizure_disorder',
		'options'=> array('select'=>'Select','yes'=>'Yes','no'=>'No'),
        'type'  => 'select'
    ),
	array(
        'label'=> 'Are there Behavioral Conditions and Triggers:',
        'desc'  => '',
        'id'    => $prefix.'behavioral_conditions_and_triggers',
		'options'=> array('select'=>'Select','yes'=>'Yes','no'=>'No'),
        'type'  => 'select'
    ),
	array(
        'label'=> 'Typical Response to being Approached?',
        'desc'  => '',
        'id'    => $prefix.'typical_response_being_approached',
		'options'=> array('select'=>'Select','COOP'=>'Cooperative','UNCOOP'=>'Un-Cooperative','WITHDRAWN'=>'Withdrawn','COMABT'=>'Combative','LOUD'=>'Loud',),
        'type'  => 'select'
    ),
	array(
        'label'=> 'Is there Anything an Emergency Responder Should Know?',
        'desc'  => '',
        'id'    => $prefix.'anything_else_for_responder',
        'type'  => 'textarea'
    ),
	array(
        'label'=> 'How Did You Hear About Us?',
        'desc'  => '',
        'id'    => $prefix.'how_did_you_hear',
		'options'=> array('select'=>'Select','Website'=>'Website','Google'=>'Google','Advertising'=>'Advertising','Friend'=>'Friend','Relative'=>'Relative','Other'=>'Other - Please Indicate'),
        'type'  => 'select'
    ),
	array(
        'label'=> 'Nearest Police Department:',
        'desc'  => '',
        'id'    => $member_prefix.'nearest_police_department'
    ),
	array(
        'label'=> 'Name',
        'desc'  => '',
        'id'    => $member_prefix.'police_department_name',
        'type'  => 'text'
    ),
	array(
        'label'=> 'City',
        'desc'  => '',
        'id'    => $member_prefix.'police_department_city',
        'type'  => 'text'
    ),
	array(
        'label'=> 'State',
        'desc'  => '',
        'id'    => $member_prefix.'police_department_state',
		'options'=> array(
    'AL'=>'Alabama',
    'AK'=>'Alaska',
    'AZ'=>'Arizona',
    'AR'=>'Arkansas',
    'CA'=>'California',
    'CO'=>'Colorado',
    'CT'=>'Connecticut',
    'DE'=>'Delaware',
    'DC'=>'District of Columbia',
    'FL'=>'Florida',
    'GA'=>'Georgia',
    'HI'=>'Hawaii',
    'ID'=>'Idaho',
    'IL'=>'Illinois',
    'IN'=>'Indiana',
    'IA'=>'Iowa',
    'KS'=>'Kansas',
    'KY'=>'Kentucky',
    'LA'=>'Louisiana',
    'ME'=>'Maine',
    'MD'=>'Maryland',
    'MA'=>'Massachusetts',
    'MI'=>'Michigan',
    'MN'=>'Minnesota',
    'MS'=>'Mississippi',
    'MO'=>'Missouri',
    'MT'=>'Montana',
    'NE'=>'Nebraska',
    'NV'=>'Nevada',
    'NH'=>'New Hampshire',
    'NJ'=>'New Jersey',
    'NM'=>'New Mexico',
    'NY'=>'New York',
    'NC'=>'North Carolina',
    'ND'=>'North Dakota',
    'OH'=>'Ohio',
    'OK'=>'Oklahoma',
    'OR'=>'Oregon',
    'PA'=>'Pennsylvania',
    'RI'=>'Rhode Island',
    'SC'=>'South Carolina',
    'SD'=>'South Dakota',
    'TN'=>'Tennessee',
    'TX'=>'Texas',
    'UT'=>'Utah',
    'VT'=>'Vermont',
    'VA'=>'Virginia',
    'WA'=>'Washington',
    'WV'=>'West Virginia',
    'WI'=>'Wisconsin',
    'WY'=>'Wyoming',
),
        'type'  => 'select'
    ),
	array(
        'label'=> 'County',
        'desc'  => '',
        'id'    => $member_prefix.'police_department_county',
        'type'  => 'text'
    ),
	array(
        'label'=> 'Phone#',
        'desc'  => '',
        'id'    => $member_prefix.'police_department_phone',
        'type'  => 'text'
    ),
	array(
        'label'=> 'Nearest Fire / Rescue Department:',
        'desc'  => '',
        'id'    => $member_prefix.'nearest_rescue_department'
    ),
	array(
        'label'=> 'Name',
        'desc'  => '',
        'id'    => $member_prefix.'rescue_department_name',
        'type'  => 'text'
    ),
	array(
        'label'=> 'City',
        'desc'  => '',
        'id'    => $member_prefix.'rescue_department_city',
        'type'  => 'text'
    ),
	array(
        'label'=> 'State',
        'desc'  => '',
        'id'    => $member_prefix.'rescue_department_state',
		'options'=> array(
    'AL'=>'Alabama',
    'AK'=>'Alaska',
    'AZ'=>'Arizona',
    'AR'=>'Arkansas',
    'CA'=>'California',
    'CO'=>'Colorado',
    'CT'=>'Connecticut',
    'DE'=>'Delaware',
    'DC'=>'District of Columbia',
    'FL'=>'Florida',
    'GA'=>'Georgia',
    'HI'=>'Hawaii',
    'ID'=>'Idaho',
    'IL'=>'Illinois',
    'IN'=>'Indiana',
    'IA'=>'Iowa',
    'KS'=>'Kansas',
    'KY'=>'Kentucky',
    'LA'=>'Louisiana',
    'ME'=>'Maine',
    'MD'=>'Maryland',
    'MA'=>'Massachusetts',
    'MI'=>'Michigan',
    'MN'=>'Minnesota',
    'MS'=>'Mississippi',
    'MO'=>'Missouri',
    'MT'=>'Montana',
    'NE'=>'Nebraska',
    'NV'=>'Nevada',
    'NH'=>'New Hampshire',
    'NJ'=>'New Jersey',
    'NM'=>'New Mexico',
    'NY'=>'New York',
    'NC'=>'North Carolina',
    'ND'=>'North Dakota',
    'OH'=>'Ohio',
    'OK'=>'Oklahoma',
    'OR'=>'Oregon',
    'PA'=>'Pennsylvania',
    'RI'=>'Rhode Island',
    'SC'=>'South Carolina',
    'SD'=>'South Dakota',
    'TN'=>'Tennessee',
    'TX'=>'Texas',
    'UT'=>'Utah',
    'VT'=>'Vermont',
    'VA'=>'Virginia',
    'WA'=>'Washington',
    'WV'=>'West Virginia',
    'WI'=>'Wisconsin',
    'WY'=>'Wyoming',
),
        'type'  => 'select'
    ),
	array(
        'label'=> 'County',
        'desc'  => '',
        'id'    => $member_prefix.'rescue_department_county',
        'type'  => 'text'
    ),
	array(
        'label'=> 'Phone#',
        'desc'  => '',
        'id'    => $member_prefix.'rescue_department_phone',
        'type'  => 'text'
    ),
	array(
        'label'=> 'Upload Member Photo:',
        'desc'  => '',
        'id'    => $member_prefix.'upload_member_photo'
    ),

    array(
        'label'=> 'irismembers_logo',
        'desc'  => '',
        'id'    => 'irismembers_logo',
		'options'=> array(''=>'Select','BraininHand'=>'BraininHand','PuzzlePiece'=>'PuzzlePiece'),
        'type'  => 'select'
    ),
	array(
        'label'=> 'Upload Photo:',
        'desc'  => '',
        'id'    => $member_prefix.'photo_upload',
        'type'  => 'upload'
    )
);
 
// The Callback
function show_irismembers_meta_box() {
global $custom_irismembers_meta_fields_options, $post;
// Use nonce for verification
echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';
     
    // Begin the field table and loop
    echo '<table class="form-table">';
    foreach ($custom_irismembers_meta_fields_options as $field) {
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
		
		<script>
		var $ = jQuery;
		jQuery(document).ready(function($){
	$("#<?php echo $field['id'].'_upload-btn'; ?>").click(function(e) {
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
			$('.<?php echo $field['id']; ?>_imagetextarea').html('<div class="col-sm-4"><input type="text" readonly name="<?php echo $field['id']; ?>" id="<?php echo $field['id']; ?>" value="'+image_url+'" size="30" /></div>');
			$('.<?php echo $field['id']; ?>_imagearea').html('<div class="col-sm-6"><div class="col-sm-12 images_parent_class"><div class="col-sm-9 <?php echo $field['id']; ?>_upload-delete delete_btn">X</div><img src="'+image_url+'" id="<?php echo $field['id']; ?>_new-img" style="margin-left: auto; margin-right: auto; display: block;"/></div></div>');
		});
	});
});
$(document).on('click','.<?php echo $field['id']; ?>_upload-delete',function(){
	$('.<?php echo $field['id']; ?>_imagetextarea .col-sm-4').remove();
	$('.<?php echo $field['id']; ?>_imagearea .col-sm-6').remove();
});
		</script>
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
function save_irismembers_meta($post_id) {
    global $custom_irismembers_meta_fields_options;
     
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
    foreach ($custom_irismembers_meta_fields_options as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    } // end foreach
}
add_action('save_post', 'save_irismembers_meta');


