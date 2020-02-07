<?php
///ADDING STYLES PARENT THEMES:
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

//USER PROF
function iris_user_profile_fields($user){?>
<style>table, tr, td{border:none !important;}.submit #submit {padding: 4px 24px;font-size: 16px;}.user-first-name-wrap, .user-last-name-wrap, .user-admin-color-wrap, .user-comment-shortcuts-wrap, .user-description-wrap, .user-profile-picture{display:none !important;}</style>
<?php //    print_r($_POST); //print_r($user); exit;?>

    <h3><?php _e("IRIS user information", "blank");?></h3>
<style>tr.user-url-wrap {    display: none;}.form-control { min-width: 450px !important;border:1px solid #ced4da !important;}tr td {
    padding: 10px 0 10px 5px;text-transform:capitalize;    font-size: 15px !important;font-weight: 600;}.description{font-size:11px;color:#999;} form *{font-family: arial, sans-serif !important ;}input[type="file"] {    font-size: 10px;}</style>
<?php include_once 'css.php';?>
<div class="row"><div class="col-12">

        <hr/>
        <div class="">&nbsp</div>
        <table class="table">
    <tr>
            <td><label class="control-label text-right" for="fullname">Full name <span class="text-danger">*</span></label></td>
            <td><input class="form-control" type="text" id="fullname" name="fullname"  value="<?php echo esc_attr(get_the_author_meta('fullname', $user->ID)); ?>"/></td>
    </tr>
    <tr>
            <td><label class="control-label text-right" for="address">Address <span class="text-danger">*</span></label></td>
            <td><textarea id="address" name="address" class="form-control"><?php echo esc_attr(get_the_author_meta('address', $user->ID)); ?></textarea></td>
    </tr>
    <tr>
            <td><label class="control-label text-right" for="city">city <span class="text-danger">*</span></label></td>
            <td><input class="form-control" type="text" id="city" name="city" value="<?php echo esc_attr(get_the_author_meta('city', $user->ID)); ?>"/></td>
    </tr>

<!--    <tr>
            <td><label class="control-label text-right" for="state">state <span class="text-danger">*</span></label></td>
            <td><select name="state" id="state" style="width:100%;" class="form-control">
                <?php if ($current_user->state != ""): ?>
<option selected="selected" value="<?=(get_the_author_meta('state', $user->ID));?>"><?=(get_the_author_meta('state', $user->ID));?></option>
                <?php endif;?>
                <option value="">Select</option>
         <?php include('inc/states.php');?>       
                <?php foreach ($states as $state): ?><option value="<?=$state?>"><?=$state?></option><?php endforeach;?>
                </select></td>
    </tr>-->
    
        <tr>
            <td><label class="control-label text-right" for="state">state<span class="text-danger">*</span></label></td>
            <td><select name="state" id="state" style="width:100%;" class="form-control">
                <?php if (get_the_author_meta('state', $user->ID) != ""): ?>
                <option selected="selected" value="<?=get_the_author_meta('state', $user->ID);?>"><?=get_the_author_meta('state', $user->ID);?></option>
                <?php endif;?>
                <option value="">---Select---</option>
                <?php include('inc/state.php');?>
                <?php foreach ($states as $state): ?><option value="<?=$state?>"><?=$state?></option><?php endforeach;?>
                </select></td>
    </tr>
    
    <tr>
            <td><label class="control-label text-right" for="date_of_birth">Date of Birth: <span class="text-danger">*</span></label></td>
            <td>
            <select name="bday" id="bday" class="day">
            <?php $bday = (get_the_author_meta('bday', $user->ID));?>    
                <?php if(!empty($bday)){?><option value='<?=$bday;?>' selectd><?=$bday;?></option><?php }?>       
        <option value=''>Day</option>
        
        <?php
        for ($d = 1; $d <= 31; $d++) {  echo "<option value='$d'>$d</option>"; } ?>
    </select>
    <select name="bmonth" id="bmonth" class="month">
        <?php $bmonth = (get_the_author_meta('bmonth', $user->ID));?>
        <?php if(!empty($bmonth)){?><option value='<?=$bmonth;?>' selectd><?=$bmonth;?></option><?php }?>
        <option value=''>Month</option>              
        <?php $months =  array('Jan','Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
        foreach ($months as $month) {    echo "<option value='$month'>$month</option>";}
        ?>
    </select>
    
    <select name="byear" id="byear" class="year">
                <?php $byear = (get_the_author_meta('byear', $user->ID));?>
        <?php if(!empty($byear)){?><option value='<?=$byear;?>' selectd><?=$byear;?></option><?php }?>
        <option value=''>Year</option>
        <?php
        for ($y = 2018; $y >= 1970; $y--) {    echo "<option value='$y'>$y</option>";}
        ?>
    </select>
                
                <!--<input type="text" name="date_of_birth" id="date_of_birth"  value="<?=(get_the_author_meta('date_of_birth', $user->ID));?>" class="form-control"/>-->
            
            </td>
    </tr>
    <tr>
            <td><label class="control-label text-right" for="contact">Contact No.<span class="text-danger">*</span></label></td>
            <td><input class="form-control" type="text" id="contact" name="contact" value="<?=(get_the_author_meta('contact', $user->ID));?>"/></td>
    </tr>

    <tr>
            <td><label class="control-label text-right" for="male">Gender:</label></td>
            <td><label class="radio-inline"><input type="radio" class="" id="male" value="male" name="gender" <?php if(get_the_author_meta('gender', $user->ID) == 'male'):?>checked="checked" <?php endif;?>/> Male</label> &nbsp;&nbsp;
                <label class="radio-inline"><input type="radio" class="" id="female" value="female" name="gender" <?php if(get_the_author_meta('gender', $user->ID) == 'female'):?>checked="checked" <?php endif;?>/> Female</label>
            </td>
    </tr>
    <tr>
            <td><label class="control-label text-right" for="relationship">Relationship to Member <span class="text-danger">*</span></label></td>
            <td><select name="relationship" id="relationship" style="width:100%;" class="form-control">
                <?php if (get_the_author_meta('relationship', $user->ID) != ""): ?>
                <option selected="selected" value="<?=get_the_author_meta('relationship', $user->ID);?>"><?=get_the_author_meta('relationship', $user->ID);?></option>
                <?php endif;?>
                <option value="">---Select---</option>
                <?php include('inc/relationships.php');?>
                <?php foreach ($relationships as $relationship): ?><option value="<?=$relationship?>"><?=$relationship?></option><?php endforeach;?>
                </select></td>
    </tr>
    <tr>
            <td><label class="control-label text-right" for="work_no">Work No.</label></td>
            <td><input class="form-control" type="text" id="work_no" name="work_no" value="<?=(get_the_author_meta('work_no', $user->ID));?>"/></td>
    </tr>
<!-- 
    <tr>
            <td><label class="control-label text-right" for="email">Email <span class="text-danger">*</span></label></td>
            <td><input class="form-control" type="email" id="email" name="email" value="<?=(get_the_author_meta('user_email', $user->ID));?>"/></td>
    </tr>
   <tr>
            <td><label class="control-label text-right" for="password">Password <span class="text-danger">*</span></label></td>
            <td><input class="form-control" type="password" id="password" name="password" value="<?=(get_the_author_meta('user_pass', $user->ID));?>"/></td>
    </tr>-->
</table>


</div>
</div>
<?php
}

add_action('show_user_profile', 'iris_user_profile_fields');
add_action('edit_user_profile', 'iris_user_profile_fields');

// saving extra fields details in database:

function save_iris_user_profile_fields($user_id)
{
 
    if (!current_user_can('edit_user', $user_id)) {
        return false;
    }
        $name = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];

    $date_of_birth = $bday.'-'.$bmonth.'-'.$byear; 
    $bday = $_POST['bday'];
    $bmonth = $_POST['bmonth'];
    $byear = $_POST['byear'];
    
    $contact = $_POST['contact'];
    $gender = $_POST['gender'];
    $relationship = $_POST['relationship'];
    $work_no = $_POST['work_no'];
  
    
    update_user_meta($user_id, 'fullname', $name);
    update_user_meta($user_id, 'city', $city);
    update_user_meta($user_id, 'address', $address);
    update_user_meta($user_id, 'state', $state);
    update_user_meta($user_id, 'date_of_birth', $date_of_birth);
    update_user_meta($user_id, 'contact', $contact);
    update_user_meta($user_id, 'gender', $gender);
    update_user_meta($user_id, 'relationship', $relationship);
    update_user_meta($user_id, 'work_no', $work_no);
    update_user_meta($user_id, 'bday', $bday);
    update_user_meta($user_id, 'bmonth', $bmonth);
    update_user_meta($user_id, 'byear', $byear);

}

add_action('personal_options_update', 'save_iris_user_profile_fields');
add_action('edit_user_profile_update', 'save_iris_user_profile_fields');
?>