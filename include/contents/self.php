<?php 
#   Copyright by: Manuel Staechele
#   Support: www.ilch.de


defined ('main') or die ( 'no direct access' );

if ( $menu->get(1) != '' ) {
  # moegliche endungen
	$ende_ar = array ('.html','.htm','.php');
	$um = $menu->get(1);
	# um ../ backlinks in unterordner kicken.
	$um = str_replace('../','',$um);
	$um = str_replace('./','',$um);
	
	foreach ($ende_ar as $ext ) {
	  $file='include/contents/selfbp/selfp/'.$menu->get(1).$ext;
    if ( file_exists ( $file ) ) {
		
        $title = $allgAr['title'].' :: '.ucfirst($menu->get(1));
        $hmenu = ucfirst($menu->get(1));
        $design = new design ( $title , $hmenu );
        $design->header();

        require_once($file);
      
        $design->footer();

      $ok=true;
			break;
    }
	}
}

if($ok != true){
  # dieser teil hier muss auch in die eigene self datei eingefuehgt werden.
  # die datei muss aber die endung .php haben!!! und dann einfach den teil hier
  # einfueghen und zwar bis zum #ENDE DESIGN 
  # und dann noch ganz am ende der self_ datei $design->footer();
  # allers natuerlich in den php bereich der seite.
  $title = $allgAr['title'];
  $hmenu = "";
  $design = new design ( $title , $hmenu );
  $design->header();
  #ENDE DESIGN
  
  # das muss auch in die self datei eingefueght werden wenn sie direkt aufgerufen
  # werden soll, davor aber auch noch das header ding am anfang ;9... 
  $design->footer();

}

?>
