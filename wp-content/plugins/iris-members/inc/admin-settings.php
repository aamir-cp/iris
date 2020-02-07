<?php
/*
// create custom plugin settings menu
add_action('admin_menu', 'iris_members_create_menu');

function iris_members_create_menu() {
	
	add_menu_page('iris members', 'iris Teams', 'manage_options', 'iris-members', 'iris_members_settings_page','dashicons-clipboard',6);
	//call register settings function
	add_action( 'admin_init', 'register_iris_members_settings' );
}


function register_iris_members_settings() {
	register_setting( 'iris-members-settings-group', 'team' );
}
function iris_members_settings_page() {
?>
<div class="wrap">
<h1>iris Teams</h1>

<form method="post" action="options.php">
    <?php settings_fields( 'iris-members-settings-group' ); ?>
    <?php do_settings_sections( 'iris-members-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Team</th>
        <td class="teams_text_boxes">
        <?php $get_teams = get_option('team');  ?>
        <div class="team_wrap"><input type="text" name="team[]" value="<?php echo esc_attr( $get_teams[0] ); ?>" /></div>
		<?php
		$teamscounter = 0;
		foreach($get_teams as $get_team)
		{
			if($teamscounter > 0){
			?>
            <div class="team_wrap"><input type="text" name="team[]" value="<?php echo esc_attr( $get_team ); ?>" /><span class="remove_team">X</span></div>
            <?php
			}
		$teamscounter++;
		}
		?>
        </td>
        </tr>
        <tr><th>Add New Team</th><td><input type="button" class="button add_new_team" value="Add Item"></td></tr>
        
        
        
        
        
        
    </table>
    
    <?php submit_button(); ?>

</form>
</div>
<style>
.remove_team
{
	cursor: pointer;
    background-color: black;
    color: white;
    font-weight: bold;
    display: inline-block;
    text-align: center;
    padding: 4px 10px;
}
</style>
<script>
var $ = jQuery;
$( document ).ready(function() {
$('.add_new_team').on('click', function(e) {  
e.preventDefault();  
$('.teams_text_boxes').append('<div class="team_wrap"><input type="text" name="team[]" value="" /><span class="remove_team">X</span></div>');		
});

$(document).on('click','.team_wrap .remove_team',function(e){
	e.preventDefault();

$(this).parent('.team_wrap').remove();		
});

});
</script>
<?php }*/