<?php ob_start();
/**
 * Template Name: Register
 */
global $current_user;
get_header(); 
if (is_user_logged_in()) {
    $location = site_url().'/user-dashboard';
    wp_redirect($location);}
?>	<?php //do_action( 'ocean_before_content_wrap' ); ?>
	<div id="content-wrap" class="container clr">
<?php do_action( 'ocean_before_content_inner' ); ?>
<?php
// Elementor `single` location
if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'single' ) ) {
// Start loop
        while ( have_posts() ) : the_post();?>        
<style>h1.page-header-title.clr {color: #000 !important;} body{    font-family: "ABeeZee";    font-size: 15px;} label,input,textarea{font-size:14px;font-family:Arial !important;}label{font-size: 15px;    font-weight: 600 !important;    padding: 7px; text-transform: capitalize;}
.sec-title{font-family:ABeeZee,Sans-serif;font-size:24px;font-weight:400;text-transform:uppercase;line-height:35px;letter-spacing:2px}.form-control{display:block;width:100%;padding:16px 10px;font-size:15px !important;line-height:1.5;color:#495057;background-color:#fff;background-clip:padding-box;border:1px solid #ced4da;border-radius:.25rem;transition:border-color .15s ease-in-out,box-shadow .15s ease-in-out}
textarea {overflow: auto;resize: vertical;min-height: 110px;}select{border-radius: .25rem;}
#resp {    font-size: 16px;font-family: Arial;}
</style><?php include_once('css.php');?>
<div class="row">
    <div class="col-md-2">&nbsp</div>
    <div class="col-md-8"><form action="#" method="post" id="reg">
            <h2 class="sec-title">REGISTRATION</h2>
        
        <hr/>
        <div class="" id="resp"></div>
        <div class="">&nbsp</div>
        <div class="form-group row">
            <div class="col-md-4"><label class="control-label text-right" for="fullname">Full name <span class="text-danger">*</span></label></div>
            <div class="col-md-8"><input class="form-control" type="text" id="fullname" name="fullname"  value="<?=(is_user_logged_in()?$current_user->fullname:'');?>" required="required"/></div>
        </div>
        <div class="form-group row">
            <div class="col-md-4"><label class="control-label text-right" for="address">Address <span class="text-danger">*</span></label></div>
            <div class="col-md-8"><textarea id="address" name="address" class="form-control" required="required"><?=(is_user_logged_in()?$current_user->address:'');?></textarea></div>
        </div>
        <div class="form-group row">
            <div class="col-md-4"><label class="control-label text-right" for="city">city <span class="text-danger">*</span></label></div>
            <div class="col-md-8"><input class="form-control" type="text" id="city" name="city" value="<?=(is_user_logged_in()?$current_user->city:'');?>" required="required"/></div>
        </div>

        <div class="form-group row">
            <div class="col-md-4"><label class="control-label text-right" for="state">state <span class="text-danger">*</span></label></div>
<div class="col-md-8"><select name="state" id="state" style="width:100%;" class="" required="required">
<?php if($current_user->state != ""):?>
        <option selected="selected" value="<?=(is_user_logged_in()?$current_user->state:'');?>"><?=(is_user_logged_in()?$current_user->state:'');?></option>
<?php endif;?>
<option value="">Select</option>
                <?php include('inc/states.php');?>
<?php foreach($states as $state):?><option value="<?=$state?>"><?=$state?></option><?php endforeach;?>
</select></div>
        </div>
<div class="form-group row">
<div class="col-md-4"><label class="control-label text-right" for="date_of_birth">Date of Birth: <span class="text-danger">*</span></label></div>
<div class="col-md-8">
    <select name="bday" id="bday" class="day">
        <option value=''>Day</option>
        <?php
        for ($d = 1; $d <= 31; $d++) {    echo "<option value='$d'>$d</option>";}
        ?>
    </select>
    <select name="bmonth" id="bmonth" class="month">
        <option value=''>Month</option>
        <?php $months =  array('Jan','Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
        foreach ($months as $month) {    echo "<option value='$month'>$month</option>";}
        ?>
    </select>
    
    <select name="byear" id="byear" class="year">
        <option value=''>Year</option>
        <?php
        for ($y = 2018; $y >= 1970; $y--) {    echo "<option value='$y'>$y</option>";}
        ?>
    </select>
 <!--<input type="date" name="date_of_birth" value="" dateformat="dd-mm-yyyy"/>--> 
<!--<input type="text" name="date_of_birth"  id="date_of_birth" value="<?=(is_user_logged_in()?$current_user->date_of_birth:'1990-01-01');?>">-->
</div>
</div>
<div class="form-group row">
<div class="col-md-4"><label class="control-label text-right" for="contact">Contact No.<span class="text-danger">*</span></label></div>
<div class="col-md-8"><input class="form-control" type="text" id="contact" name="contact" value="<?=(is_user_logged_in()?$current_user->contact:'');?>"/></div>
</div>
<div class="form-group row">
    <div class="col-md-4"><label class="control-label text-right" for="male">Gender:</label></div>
<div class="col-md-8">
    <label class="radio-inline"><input type="radio" class="payment_type" id="male" value="male" name="gender" <?php if($current_user->gender == "male"):?>checked="checked" <?php endif;?>/> Male</label> &nbsp;&nbsp;
    <label class="radio-inline"><input type="radio" class="payment_type" id="female" value="female" name="gender" <?php if($current_user->gender == "female"):?>checked="checked" <?php endif;?>/> Female</label>
</div>
</div>
<div class="form-group row">
<div class="col-md-4"><label class="control-label text-right" for="relationship">Relationship to Member <span class="text-danger">*</span></label></div>
<div class="col-md-8">
<select name="relationship" id="relationship" style="width:100%;">
<?php if($current_user->relationship != ""):?>
<option selected="selected" value="<?=(is_user_logged_in()?$current_user->relationship:'');?>"><?=(is_user_logged_in()?$current_user->relationship:'');?></option>
<?php endif;?> 	
<option value="">---Select---</option>
<?php include('inc/relationships.php');?>
<?php foreach($relationships as $relationship):?><option value="<?=$relationship?>"><?=$relationship?></option><?php endforeach;?>
</select>
</div>
</div> 
<div class="form-group row">
<div class="col-md-4"><label class="control-label text-right" for="work_no">Work No.</label></div>
<div class="col-md-8"><input class="form-control" type="text" id="work_no" name="work_no" value="<?=(is_user_logged_in()?$current_user->work_no:'');?>"/></div>
</div> 
<div class="form-group row">
<div class="col-md-4"><label class="control-label text-right" for="email">Email <span class="text-danger">*</span></label></div>
<div class="col-md-8"><input class="form-control" type="email" id="email" name="email" value="<?=(is_user_logged_in()?$current_user->user_email:'');?>"/></div>
</div>  
<div class="form-group row">
<div class="col-md-4"><label class="control-label text-right" for="password">Password <span class="text-danger">*</span></label></div>
<div class="col-md-8"><input class="form-control" type="password" id="password" name="password" value="<?=(is_user_logged_in()? $current_user->user_pass :'');?>"/></div>
</div>  
<div class="form-group row">
<div class="col-md-4"></div>
<div class="col-md-8"></div>
</div> 
<div class="form-group row">
<div class="col-md-4"></div>
<div class="col-md-8"></div>
</div> 
<div class="form-group row p-4">
<div class="col-md-12"><hr/></div>
<div class="col-md-2"><a class="" id="loginLink" href="<?=site_url()?>/login"><input id="reg_btn" type="button" class="btn button login" value="Members Login Here" /></a></div>
<div class="col-md-4"></div>
<div class="col-md-4"></div>
<div class="col-md-2"><input class="btn button" type="submit" id="submit" name="submit" value="Register" /></div>
</div>

</form>     
    </div>
    <div class="col-md-2">&nbsp</div>
</div>
<div class="clearfix">&nbsp;</div>
<?php get_template_part( 'partials/page/layout' );
	endwhile;
	} ?>
		<?php //do_action( 'ocean_after_primary' ); ?>
	</div><!-- #content-wrap -->

	<?php //do_action( 'ocean_after_content_wrap' ); ?>
<?php $process = get_stylesheet_directory_uri().'/process/process_user.php';?>         
<script>
//
$ = jQuery;
var jq = $.noConflict();
jq(document).ready(function () {  
   //
   jq('#submit').click(function(e){
       e.preventDefault();
       //       
            if(jq('#fullname').val() == ""){
                jq('html, body').animate({
                scrollTop: jq("#main").offset().top
                }, 1000);
                jq('#resp').html('Please provide your full name.');
                jq('#resp').addClass('text-danger');
                return false;
            } else if(jq('#address').val() == ""){
                jq('html, body').animate({
                scrollTop: jq("#main").offset().top
                }, 1000);
                jq('#resp').html('Please provide your address.');
                jq('#resp').addClass('text-danger');
                return false;
            } else if(jq('#city').val() == ""){
                jq('html, body').animate({
                scrollTop: jq("#main").offset().top
                }, 1000);
                jq('#resp').html('Please enter your city name.');
                jq('#resp').addClass('text-danger');
                return false;
            }else if(jq('#state').val() == ""){
                jq('html, body').animate({
                scrollTop: jq("#main").offset().top
                }, 1000);
                jq('#resp').html('Please provide your state name.');
                jq('#resp').addClass('text-danger');
                return false;
            }else if(jq('#day_ob').val() == ""){
                jq('html, body').animate({
                scrollTop: jq("#main").offset().top
                }, 1000);
                jq('#resp').html('Please provide your full date of birth.');
                jq('#resp').addClass('text-danger');
                return false;
            } else if(jq('#month_ob').val() == ""){
                jq('html, body').animate({
                scrollTop: jq("#main").offset().top
                }, 1000);
                jq('#resp').html('Please provide your full date of birth.');
                jq('#resp').addClass('text-danger');
                return false;
            }else if(jq('#year_ob').val() == ""){
                jq('html, body').animate({
                scrollTop: jq("#main").offset().top
                }, 1000);
                jq('#resp').html('Please provide your full date of birth.');
                jq('#resp').addClass('text-danger');
                return false;
            } else if(jq('#contact').val() == ""){
                jq('html, body').animate({
                scrollTop: jq("#main").offset().top
                }, 1000);
                jq('#resp').html('Please provide your contact number.');
                jq('#resp').addClass('text-danger');
                return false;
            }else if(jq('#relationship').val() == ""){
                jq('html, body').animate({
                scrollTop: jq("#main").offset().top
                }, 1000);
                jq('#resp').html('Please select your relationship to member.');
                jq('#resp').addClass('text-danger');
                return false;
            } else if(jq('#email').val() == ""){
                jq('html, body').animate({
                scrollTop: jq("#main").offset().top
                }, 1000);
                jq('#resp').html('Please enter your email.');
                jq('#resp').addClass('text-danger');
                return false;
            } else if(jq('#password').val() == ""){
                jq('html, body').animate({
                scrollTop: jq("#main").offset().top
                }, 1000);
                jq('#resp').html('Please enter a strong password.');
                jq('#resp').addClass('text-danger');
                return false;
            } else {
            jq.ajax({
            url: '<?=$process;?>',
            type: 'POST',

            data:jq("form").serialize(),
            success: function(res) {
                
////                       jq('#reg').find('#submit').prop('disabled', true);
////                       jq('#resp').addClass('text-success');
////                       jq('#resp').html(res);
////                       jq('html, body').animate({
////                       scrollTop: $("#main").offset().top
////                       }, 1000);  
               
                if(res == '1'){
                       jq('#reg').find('#submit').prop('disabled', true);
                       jq('#resp').addClass('text-success');
                       jq('#resp').html('Registration successful.<br/> You can login <a href="<?=$location = site_url().'/user-dashboard';?>">Here</a> using your email and password.');
                       jq('html, body').animate({
                       scrollTop: jq("#main").offset().top
                       }, 1000);jq('#reg')[0].reset();   
                }else if(res == '2'){
                       jq('#resp').addClass('text-danger');
                       jq('#resp').html('The email address you have entered is already registered');
                       jq('html, body').animate({
                       scrollTop: jq("#main").offset().top
                       }, 1000);jq('#reg')[0].reset();
                } /*else if(res == '3'){
                       jq('#resp').addClass('text-success');
                       jq('#resp').html('Your information has been updated.');
                       jq('html, body').animate({
                       scrollTop: jq("#main").offset().top
                       }, 1000);jq('#reg')[0].reset();
                } */
//            console.log(res);

            },
            error: function(e) {
                    
//jq('html, body').animate({
//scrollTop: $("#main").offset().top
//}, 1000);
//                     jq('#resp').addClass('text-danger');
//                     jq('#resp').html('Registration Failed, please try again later!');
//            console.log(e);
            }//err
            });//ends ajax
       } //ends else
   });//ends click
   //   
});//DOC READY</script>
<?php 
// if(is_user_logged_in()){
//    echo "<script>jq('h1.page-header-title.clr').html('Your Profile')</script>";
//}?>
<?php get_footer(); ?>