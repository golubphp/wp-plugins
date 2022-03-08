<?php
/*
Plugin Name: Modalni Prozor
Plugin URI:
Description: Modalni prozor je grafički kontrolni element koji je podređen glavnom prozoru aplikacije. To stvara način koji onemogućuje glavni prozor, ali ga zadržava vidljivim, s modalnim prozorom ispred njega.
Author: Marjan Golubović
Version: 1.0
Author URI: https://marjangolubovic.github.io/
*/


function marjan_plugin_fun() {
	add_menu_page(
		'Uredi Modalni Prozor',
		'Modalni Prozor',
		'administrator',
		'opcije_mp',
		'modal_window_plugin_front_end',
		plugin_dir_url( __FILE__ ) . 'admin/images/window.png'
	);
}
add_action('admin_menu', 'marjan_plugin_fun');

function marjan_plugin_settings() {

 register_setting( 'modal_window_group', 'mp_title' );
 register_setting( 'modal_window_group', 'mp_body_text' );
 
}
add_action('admin_init', 'marjan_plugin_settings');



function modal_window_plugin_front_end () {
?>
<section id="dodaj_oglas_forma">
	<div class="container">
	  <div class="row">
		<div class="col-8">
	
<h1>Modalni Prozor</h1>

<form id="ModalWindowFormId" method="post" action="options.php">
<?php settings_fields( "modal_window_group" ); ?>
<?php do_settings_sections( "modal_window_group" ); ?>


<div class="form-group">
	<label for="formGroupExampleInput">Naslov</label>
	<input type="text" class="form-control" name="mp_title" value="<?php print get_option('mp_title'); ?>" required>
</div>

<div class="form-group">
    <label for="exampleFormControlTextarea1">Tekst Poruke</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="mp_body_text" rows="3" required><?php print get_option('mp_body_text'); ?></textarea>
</div>

<div class="form-group">
 <p class="submit">
 <input type="submit" name="mp_button" class="button-primary" value="<?php _e('Sačuvaj'); ?>" />

 </p>
</div>


</form>



</div>

	  </div>
	</div>
</section>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	wp_redirect( admin_url('admin.php?page=opcije_mp&status=1') );
}
}


function modal_window_front_end () {

echo '
<script type="text/javascript">
$(window).on("load",function(){
$("#exampleModal").modal("show");
});
</script>

<!--
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
Launch demo modal
</button>
-->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header"> ';
	  
	echo " <h5 class='modal-title' id='exampleModalLabel'>"; 
	print get_option('mp_title'); 
	echo "</h5> ";
		
echo '
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>';


	echo "<div class='modal-body'>"; 
	print get_option('mp_body_text'); 
	echo "</div>";
	
echo '	
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvori</button>
</div>
</div>
</div>
</div> ';	

}


function modal_window_shortcode() {
 
return	modal_window_front_end();

}
add_shortcode('colombo_modal', 'modal_window_shortcode');



require_once('init.php');
modal_window_init();

