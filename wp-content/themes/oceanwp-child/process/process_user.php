<?php require('./../../../../wp-load.php'); 

    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $date_of_birth = $_POST['date_of_birth']; 
    $contact = $_POST['contact'];
    $gender = $_POST['gender'];
    $relationship = $_POST['relationship'];
    $work_no = $_POST['work_no'];
    
//print_r($email_user);
if(email_exists($email)){
    echo '2';
} else{
    
    $id_check = false;
$user_id = wp_create_user( $name, $password, $email);
if($user_id)
{
    $id_check = true;
}
//
//if (!is_wp_error( $user_id )) {
// Set the nickname
 wp_update_user(
array(
'ID'          =>    $user_id,
'nickname'    =>    $_POST['fullname']
)
);

update_user_meta( $user_id, 'fullname', $name );
update_user_meta( $user_id, 'city', $city );
update_user_meta( $user_id, 'address', $address );
update_user_meta( $user_id, 'state', $state );
update_user_meta( $user_id, 'date_of_birth', $date_of_birth );
update_user_meta( $user_id, 'contact', $contact );
update_user_meta( $user_id, 'gender', $gender );
update_user_meta( $user_id, 'relationship', $relationship );
update_user_meta( $user_id, 'work_no', $work_no );

$user = new WP_User( $user_id );
$user->add_role( 'subscriber' );

echo '1';
//if($id_check == 1){ header('Location: '. site_url().'/registered.php');}
//wp_die();
}