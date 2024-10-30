<?php

function monkeyinsilk_homeselector_shortcode( $atts ) {
	$options = get_option( 'monkeyinsilk_settings' );

	$defaults=array(
		'projectid' => 'd67c32b2-25b7-5244-a97c-aef524a17967',
		'width' => '100%',
		'inlinemenu' => '1'
	);

	if( isset( $options[ 'project_id' ] ) ) {
		$defaults['projectid'] = esc_html( strtolower(trim($options['project_id'])) );
	}

    if( isset( $options[ 'homeselector_inline_menu' ] ) ) {
        $defaults['inlinemenu'] = esc_html( $options['homeselector_inline_menu'] );
    }
  
	$atts = shortcode_atts( array(
		'projectid' => $defaults['projectid'],
		'width' => $defaults['width'],
		'inlinemenu' => $defaults['inlinemenu']
    ), $atts );
	
	$url = esc_url("https://hs.monkeyinsilk.se/".$atts['projectid'].'/');
	$padding = '56.25%';

	if (!filter_var($atts['inlinemenu'], FILTER_VALIDATE_BOOLEAN)) {
		$padding = '120%';
		$url.='?sm';
	}

    $html = '<div style="width:'.esc_attr($atts['width']).'; display: inline-block;">';
    $html .= '  <div style="width:100%; position:relative; height:0; padding-bottom: '.$padding.';">';
    $html .= '    <iframe style="position: absolute; width:100%; height: 100%; left:0; top:0; border:0;" src="'.$url.'" allowFullScreen></iframe>';
    $html .= '  </div>';
    $html .= '</div>';


	return $html;
}
add_shortcode( 'homeselector', 'monkeyinsilk_homeselector_shortcode' );

function monkeyinsilk_homestyler_shortcode( $atts ) {
	$options = get_option( 'monkeyinsilk_settings' );

	$defaults=array(
		'projectid' => 'd67c32b2-25b7-5244-a97c-aef524a17967',
		'width' => '100%',
		'name' => 'kitchen',
		'dimensions' => '1920x1080'
	);

	if( isset( $options[ 'project_id' ] ) ) {
		$defaults['projectid'] = esc_html( strtolower(trim($options['project_id'])) );
	}
  
	$atts = shortcode_atts( array(
		'projectid' => $defaults['projectid'],
		'width' => $defaults['width'],
		'name' => $defaults['name'],
		'dimensions' => $defaults['dimensions']
    ), $atts );
	
	$url = esc_url("https://hs.monkeyinsilk.se/".$atts['projectid'].'/'.'homestyler/'.$atts['name']);
	$padding = $padding = monkeyinsilk_get_padding($atts['dimensions']);

    $html = '<div style="width:'.esc_attr($atts['width']).'; display: inline-block;">';
    $html .= '  <div style="width:100%; position:relative; height:0; padding-bottom: '.$padding.';">';
    $html .= '    <iframe style="position: absolute; width:100%; height: 100%; left:0; top:0; border:0;" src="'.$url.'" allowFullScreen></iframe>';
    $html .= '  </div>';
    $html .= '</div>';

	return $html;
}
add_shortcode( 'homestyler', 'monkeyinsilk_homestyler_shortcode' );

function monkeyinsilk_objectviewer_shortcode( $atts ) {
	$options = get_option( 'monkeyinsilk_settings' );

	$defaults=array(
		'projectid' => 'e57ed747-ad18-4f1d-9c95-70b2909fcc84',
		'width' => '100%',
		'name' => 'hus',
		'dimensions' => '1920x1080'
	);

	if( isset( $options[ 'project_id' ] ) ) {
		$defaults['projectid'] = esc_html( strtolower(trim($options['project_id'])) );
	}
  
	$atts = shortcode_atts( array(
		'projectid' => $defaults['projectid'],
		'width' => $defaults['width'],
		'name' => $defaults['name'],
		'dimensions' => $defaults['dimensions']
    ), $atts );
	
	$url = esc_url("https://hs.monkeyinsilk.se/".$atts['projectid'].'/'.'objectviewer/'.$atts['name']);
	$padding = monkeyinsilk_get_padding($atts['dimensions']);

    $html = '<div style="width:'.esc_attr($atts['width']).'; display: inline-block;">';
    $html .= '  <div style="width:100%; position:relative; height:0; padding-bottom: '.$padding.';">';
    $html .= '    <iframe style="position: absolute; width:100%; height: 100%; left:0; top:0; border:0;" src="'.$url.'" allowFullScreen></iframe>';
    $html .= '  </div>';
    $html .= '</div>';

	return $html;
}
add_shortcode( 'objectviewer', 'monkeyinsilk_objectviewer_shortcode' );

function monkeyinsilk_customizer_shortcode( $atts ) {
	$options = get_option( 'monkeyinsilk_settings' );

	$defaults=array(
		'projectid' => 'e57ed747-ad18-4f1d-9c95-70b2909fcc84',
		'width' => '100%',
		'name' => 'Glasvägg',
		'dimensions' => '1920x1080'
	);

	if( isset( $options[ 'project_id' ] ) ) {
		$defaults['projectid'] = esc_html( strtolower(trim($options['project_id'])) );
	}
  
	$atts = shortcode_atts( array(
		'projectid' => $defaults['projectid'],
		'width' => $defaults['width'],
		'name' => $defaults['name'],
		'dimensions' => $defaults['dimensions']
    ), $atts );
	
	$url = esc_url("https://hs.monkeyinsilk.se/".$atts['projectid'].'/'.'flex/'.$atts['name']);
	$padding = $padding = monkeyinsilk_get_padding($atts['dimensions']);

    $html = '<div style="width:'.esc_attr($atts['width']).'; display: inline-block;">';
    $html .= '  <div style="width:100%; position:relative; height:0; padding-bottom: '.$padding.';">';
    $html .= '    <iframe style="position: absolute; width:100%; height: 100%; left:0; top:0; border:0;" src="'.$url.'" allowFullScreen></iframe>';
    $html .= '  </div>';
    $html .= '</div>';

	return $html;
}
add_shortcode( 'customizer', 'monkeyinsilk_customizer_shortcode' );

function monkeyinsilk_get_padding($dims) {
	$padding = '56.25%';
	$parts = explode('x',strtolower($dims));
	if (count($parts) == 2) {
		$w = intval($parts[0]);
		$h = intval($parts[1]);
		if ($w>0 && $h>0) {
			$padding = number_format($h/$w*100,2,'.','') . '%';
		}
	}
	return $padding;
}

function monkeyinsilk_fake3d_shortcode( $atts ) {
	$options = get_option( 'monkeyinsilk_settings' );

	$defaults=array(
		'projectid' => 'e57ed747-ad18-4f1d-9c95-70b2909fcc84',
		'width' => '100%',
		'name' => 'vardagsrum',
		'dimensions' => '1920x1080'
	);

	if( isset( $options[ 'project_id' ] ) ) {
		$defaults['projectid'] = esc_html( strtolower(trim($options['project_id'])) );
	}
  
	$atts = shortcode_atts( array(
		'projectid' => $defaults['projectid'],
		'width' => $defaults['width'],
		'name' => $defaults['name'],
		'dimensions' => $defaults['dimensions'],
		'ht' => '', // Default is 20 if not set
		'vt' => '' // Default is 20 if not set
    ), $atts );
	 
	$url = "https://hs.monkeyinsilk.se/".$atts['projectid'].'/'.'fake3d/'.$atts['name'];
	if (strlen($atts['ht'])) $url = add_query_arg(array('ht'=>$atts['ht']),$url);
	if (strlen($atts['vt'])) $url = add_query_arg(array('vt'=>$atts['vt']),$url);

	$padding = monkeyinsilk_get_padding($atts['dimensions']);

    $html = '<div style="width:'.esc_attr($atts['width']).'; display: inline-block;">';
    $html .= '  <div style="width:100%; position:relative; height:0; padding-bottom: '.$padding.';">';
    $html .= '    <iframe style="position: absolute; width:100%; height: 100%; left:0; top:0; border:0;" src="'. esc_url($url) .'" allowFullScreen></iframe>';
    $html .= '  </div>';
    $html .= '</div>';

	return $html;
}

add_shortcode('fake3d', 'monkeyinsilk_fake3d_shortcode' );
?>
