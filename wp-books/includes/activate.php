<?php

function cu_activate_plugin() {
if(version_compare(get_bloginfo('version'),'4.2', '<') ) {
wp_die(__('Morate Imati Minimalnu 4.2 Verziju WordPress-a.') );
}

}

?>