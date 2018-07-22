<?php
/**
* Admin Redesign
*
* @since Pillar 2.3
* @author MaakuW
* @todo This should hook into the admin so this info can be changes via WP. They should also be updated
*/
function pillar_admin_color_schemes() {
    //Get the theme directory  
    $theme_dir = get_template_directory_uri();  

    //Pillar Custom Colors
    wp_admin_css_color( 'pillar', __( 'Pillar' ),  
        $theme_dir . '/assets/css/admin.css',  
        array( '#32373c', '#ececec', '#333333', '#373e49' )  
    );
}
add_action('admin_init', 'pillar_admin_color_schemes');

function pillar_default_admin_color($user_id) {
    $args = array(  
        'ID' => $user_id,  
        'admin_color' => 'pillar'  
    );  
    wp_update_user( $args );  
}  

add_action('user_register', 'pillar_default_admin_color');
function shortcode_button_script() {
  //Get the theme directory  
  $photo_box_img = '/assets/images/fpo-photo_box.png';
    
  if(wp_script_is("quicktags")) :?>
  <script type="text/javascript">
      
      //this function is used to retrieve the selected text from the text editor
      function get_selected(){
        var txtarea = document.getElementById("content");
        var start = txtarea.selectionStart;
        var finish = txtarea.selectionEnd;
        return txtarea.value.substring(start, finish);
      }

      function gradient_box(){
        var selected_text = get_selected();
        QTags.insertContent('[gradient_box id="gb-' + Math.random().toString(36).substring(2, 15) + '"]' +  selected_text + '[/gradient_box]');
      }

      function photo_box(){
        var selected_text = get_selected();
        QTags.insertContent('[photo_box id="pb-' + Math.random().toString(36).substring(2, 15) + '" src="<?php echo $photo_box_img; ?>"]' +  selected_text + '[/photo_box]');
      }

      function vector_box(){
        var selected_text = get_selected();
        QTags.insertContent('[vector_box id="vb-' + Math.random().toString(36).substring(2, 15) + '"]' +  selected_text + '[/vector_box]');
      }

      function callout(){
        var selected_text = get_selected();
        QTags.insertContent('[callout id="callout_' + Math.random().toString(36).substring(2, 15) + '"]' +  selected_text + '[/callout]');
      }

      QTags.addButton( 
        "code_shortcode", 
        "gradient box", 
        gradient_box
      );

      QTags.addButton( 
        "code_shortcode", 
        "photo box", 
        photo_box
      );

      QTags.addButton( 
        "code_shortcode", 
        "vector box", 
        vector_box
      );

      QTags.addButton( 
        "code_shortcode", 
        "callout", 
        callout
      );
  </script>
<?php
  endif;
}

add_action("admin_print_footer_scripts", "shortcode_button_script");
?>