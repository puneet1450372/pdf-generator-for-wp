<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://wpswings.com/
 * @since      1.0.0
 *
 * @package    Pdf_Generator_For_Wp
 * @subpackage Pdf_Generator_For_Wp/admin/partials
 */

if ( ! defined( 'ABSPATH' ) ) {

	exit(); // Exit if accessed directly.
}
/**
 * Function contains html for template 1;
 *
 * @param int    $post_id post id.
 * @param string $template_name template name to be used.
 * @since 1.0.0
 *
 * @return string
 */
function return_ob_html( $post_id, $template_name = '' ) {
	//echo "<pre>";
    
	 $images = get_field('gallery',$post_id);

	do_action( 'wps_pgfw_load_all_compatible_shortcode_converter' );

	// advanced settings.
	$pgfw_advanced_settings = get_option( 'pgfw_advanced_save_settings', array() );
	$pgfw_ttf_font_upload   = array_key_exists( 'pgfw_ttf_font_upload', $pgfw_advanced_settings ) ? $pgfw_advanced_settings['pgfw_ttf_font_upload'] : '';

	// header customisation settings.
	$pgfw_header_settings   = get_option( 'pgfw_header_setting_submit', array() );
	$pgfw_header_use_in_pdf = array_key_exists( 'pgfw_header_use_in_pdf', $pgfw_header_settings ) ? $pgfw_header_settings['pgfw_header_use_in_pdf'] : '';
	$pgfw_header_logo       = array_key_exists( 'sub_pgfw_header_image_upload', $pgfw_header_settings ) ? $pgfw_header_settings['sub_pgfw_header_image_upload'] : '';
	$pgfw_header_comp_name  = array_key_exists( 'pgfw_header_company_name', $pgfw_header_settings ) ? $pgfw_header_settings['pgfw_header_company_name'] : '';
	$pgfw_header_tagline    = array_key_exists( 'pgfw_header_tagline', $pgfw_header_settings ) ? $pgfw_header_settings['pgfw_header_tagline'] : '';
	$pgfw_header_color      = array_key_exists( 'pgfw_header_color', $pgfw_header_settings ) ? $pgfw_header_settings['pgfw_header_color'] : '';
	$pgfw_header_width      = array_key_exists( 'pgfw_header_width', $pgfw_header_settings ) ? $pgfw_header_settings['pgfw_header_width'] : '';
	$pgfw_header_font_style = array_key_exists( 'pgfw_header_font_style', $pgfw_header_settings ) ? $pgfw_header_settings['pgfw_header_font_style'] : '';
	$pgfw_header_font_style = ( 'custom' === $pgfw_header_font_style ) ? 'vanitas' : $pgfw_header_font_style;
	$pgfw_header_font_size  = array_key_exists( 'pgfw_header_font_size', $pgfw_header_settings ) ? $pgfw_header_settings['pgfw_header_font_size'] : '';
	$pgfw_header_top        = array_key_exists( 'pgfw_header_top', $pgfw_header_settings ) ? $pgfw_header_settings['pgfw_header_top'] : '';
	// body customisation settings.
	$pgfw_body_settings              = get_option( 'pgfw_body_save_settings', array() );
	$pgfw_body_title_font_style      = array_key_exists( 'pgfw_body_title_font_style', $pgfw_body_settings ) ? $pgfw_body_settings['pgfw_body_title_font_style'] : '';
	$pgfw_body_title_font_style      = ( 'custom' === $pgfw_body_title_font_style ) ? 'vanitas' : $pgfw_body_title_font_style;
	$pgfw_body_title_font_size       = array_key_exists( 'pgfw_body_title_font_size', $pgfw_body_settings ) ? $pgfw_body_settings['pgfw_body_title_font_size'] : '';
	$pgfw_body_title_font_color      = array_key_exists( 'pgfw_body_title_font_color', $pgfw_body_settings ) ? $pgfw_body_settings['pgfw_body_title_font_color'] : '';
	$pgfw_body_page_font_style       = array_key_exists( 'pgfw_body_page_font_style', $pgfw_body_settings ) ? $pgfw_body_settings['pgfw_body_page_font_style'] : '';
	$pgfw_body_page_font_style       = ( 'custom' === $pgfw_body_page_font_style ) ? 'vanitas' : $pgfw_body_page_font_style;
	$pgfw_body_page_font_size        = array_key_exists( 'pgfw_content_font_size', $pgfw_body_settings ) ? $pgfw_body_settings['pgfw_content_font_size'] : '';
	$pgfw_body_page_font_color       = array_key_exists( 'pgfw_body_font_color', $pgfw_body_settings ) ? $pgfw_body_settings['pgfw_body_font_color'] : '';
	$pgfw_body_border_size           = array_key_exists( 'pgfw_body_border_size', $pgfw_body_settings ) ? $pgfw_body_settings['pgfw_body_border_size'] : '';
	$pgfw_body_border_color          = array_key_exists( 'pgfw_body_border_color', $pgfw_body_settings ) ? $pgfw_body_settings['pgfw_body_border_color'] : '';
	$pgfw_body_margin_top            = array_key_exists( 'pgfw_body_margin_top', $pgfw_body_settings ) ? $pgfw_body_settings['pgfw_body_margin_top'] : '';
	$pgfw_body_margin_left           = array_key_exists( 'pgfw_body_margin_left', $pgfw_body_settings ) ? $pgfw_body_settings['pgfw_body_margin_left'] : '';
	$pgfw_body_margin_right          = array_key_exists( 'pgfw_body_margin_right', $pgfw_body_settings ) ? $pgfw_body_settings['pgfw_body_margin_right'] : '';
	$pgfw_body_margin_bottom         = array_key_exists( 'pgfw_body_margin_bottom', $pgfw_body_settings ) ? $pgfw_body_settings['pgfw_body_margin_bottom'] : '';
	$pgfw_body_rtl_support           = array_key_exists( 'pgfw_body_rtl_support', $pgfw_body_settings ) ? $pgfw_body_settings['pgfw_body_rtl_support'] : '';
	$pgfw_watermark_image_use_in_pdf = array_key_exists( 'pgfw_watermark_image_use_in_pdf', $pgfw_body_settings ) ? $pgfw_body_settings['pgfw_watermark_image_use_in_pdf'] : '';
	$pgfw_border_position_top        = array_key_exists( 'pgfw_border_position_top', $pgfw_body_settings ) ? $pgfw_body_settings['pgfw_border_position_top'] : '';
	$pgfw_border_position_bottom     = array_key_exists( 'pgfw_border_position_bottom', $pgfw_body_settings ) ? $pgfw_body_settings['pgfw_border_position_bottom'] : '';
	$pgfw_border_position_left       = array_key_exists( 'pgfw_border_position_left', $pgfw_body_settings ) ? $pgfw_body_settings['pgfw_border_position_left'] : '';
	$pgfw_border_position_right      = array_key_exists( 'pgfw_border_position_right', $pgfw_body_settings ) ? $pgfw_body_settings['pgfw_border_position_right'] : '';
	$pgfw_body_custom_css            = array_key_exists( 'pgfw_body_custom_css', $pgfw_body_settings ) ? $pgfw_body_settings['pgfw_body_custom_css'] : '';
	$pgfw_body_watermark_text        = array_key_exists( 'pgfw_body_watermark_text', $pgfw_body_settings ) ? $pgfw_body_settings['pgfw_body_watermark_text'] : '';
	$pgfw_body_add_watermark        = array_key_exists( 'pgfw_body_add_watermark', $pgfw_body_settings ) ? $pgfw_body_settings['pgfw_body_add_watermark'] : '';
	$pgfw_body_watermark_color        = array_key_exists( 'pgfw_body_watermark_color', $pgfw_body_settings ) ? $pgfw_body_settings['pgfw_body_watermark_color'] : '';
	$pgfw_body_villa_type     = array_key_exists( 'pgfw_body_villa_type', $pgfw_body_settings ) ? ( $pgfw_body_settings['pgfw_body_villa_type'] ) : '';
	// general settings.
	$general_settings_data     = get_option( 'pgfw_general_settings_save', array() );
	$pgfw_show_post_categories = array_key_exists( 'pgfw_general_pdf_show_categories', $general_settings_data ) ? $general_settings_data['pgfw_general_pdf_show_categories'] : '';
	$pgfw_show_post_tags       = array_key_exists( 'pgfw_general_pdf_show_tags', $general_settings_data ) ? $general_settings_data['pgfw_general_pdf_show_tags'] : '';
	$pgfw_show_post_taxonomy   = array_key_exists( 'pgfw_general_pdf_show_taxonomy', $general_settings_data ) ? $general_settings_data['pgfw_general_pdf_show_taxonomy'] : '';
	$pgfw_show_post_date       = array_key_exists( 'pgfw_general_pdf_show_post_date', $general_settings_data ) ? $general_settings_data['pgfw_general_pdf_show_post_date'] : '';
	$pgfw_show_post_author     = array_key_exists( 'pgfw_general_pdf_show_author_name', $general_settings_data ) ? $general_settings_data['pgfw_general_pdf_show_author_name'] : '';
	// meta fields settings.
	$pgfw_meta_settings = get_option( 'pgfw_meta_fields_save_settings', array() );
	// footer settings.
	$pgfw_footer_settings   = get_option( 'pgfw_footer_setting_submit', array() );
	$pgfw_footer_use_in_pdf = array_key_exists( 'pgfw_footer_use_in_pdf', $pgfw_footer_settings ) ? $pgfw_footer_settings['pgfw_footer_use_in_pdf'] : '';
	$pgfw_footer_tagline    = array_key_exists( 'pgfw_footer_tagline', $pgfw_footer_settings ) ? $pgfw_footer_settings['pgfw_footer_tagline'] : '';
	$pgfw_footer_color      = array_key_exists( 'pgfw_footer_color', $pgfw_footer_settings ) ? $pgfw_footer_settings['pgfw_footer_color'] : '';
	$pgfw_footer_width      = array_key_exists( 'pgfw_footer_width', $pgfw_footer_settings ) ? $pgfw_footer_settings['pgfw_footer_width'] : '';
	$pgfw_footer_font_style = array_key_exists( 'pgfw_footer_font_style', $pgfw_footer_settings ) ? $pgfw_footer_settings['pgfw_footer_font_style'] : '';
	$pgfw_footer_font_style = ( 'custom' === $pgfw_footer_font_style ) ? 'My_font' : $pgfw_footer_font_style;
	$pgfw_footer_font_size  = array_key_exists( 'pgfw_footer_font_size', $pgfw_footer_settings ) ? $pgfw_footer_settings['pgfw_footer_font_size'] : '';
	$pgfw_footer_bottom     = array_key_exists( 'pgfw_footer_bottom', $pgfw_footer_settings ) ? $pgfw_footer_settings['pgfw_footer_bottom'] : '';
	$pgfw_footer_customization     = array_key_exists( 'pgfw_footer_customization_for_post_detail', $pgfw_footer_settings ) ? $pgfw_footer_settings['pgfw_footer_customization_for_post_detail'] : '';
	$pgfw_body_meta_field_column     = array_key_exists( 'pgfw_body_meta_field_column', $pgfw_body_settings ) ? intval( $pgfw_body_settings['pgfw_body_meta_field_column'] ) : '';
	$pgfw_body_images_row_wise     = array_key_exists( 'pgfw_body_images_row_wise', $pgfw_body_settings ) ? $pgfw_body_settings['pgfw_body_images_row_wise'] : '';

	$status  = get_option( 'status' );

	if ( '' == $pgfw_footer_customization ) {
		$pgfw_footer_customization = array();
	}
	if ( '' == $status ) {
		$post = get_post( $post_id );
		$author_id = get_post_field( 'post_author', $post_id );
		$display_name = get_the_author_meta( 'display_name', $author_id );
		$post_date = get_the_date( 'd F Y', $post_id );
		$post_title = get_the_title( $post );
	}
		$display_author_name = in_array( 'author', $pgfw_footer_customization ) ? $display_name : '';
		$display_post_date = in_array( 'post_date', $pgfw_footer_customization ) ? $post_date : '';
		$display_post_title = in_array( 'post_title', $pgfw_footer_customization ) ? $post_title : '';
	if ( 'yes' === $pgfw_body_rtl_support ) {
		$pgfw_header_font_style     = 'DejaVu Sans, sans-serif';
		$pgfw_body_page_font_style  = 'DejaVu Sans, sans-serif';
		$pgfw_body_title_font_style = 'DejaVu Sans, sans-serif';
		$pgfw_footer_font_style     = 'DejaVu Sans, sans-serif';
	}

	$html = '';
	if ( '' !== $pgfw_ttf_font_upload && ( $pgfw_ttf_font_upload ) ) {
		$upload_dir     = wp_upload_dir();
		$upload_baseurl = $upload_dir['baseurl'] . '/pgfw_ttf_font/';
		$upload_basedir = $upload_dir['basedir'] . '/pgfw_ttf_font/';
		$font_url       = $upload_baseurl . $pgfw_ttf_font_upload;
		$font_path      = $upload_basedir . $pgfw_ttf_font_upload;

		$fontplanti_url  = $upload_baseurl.'PlantinInfantMTStd.ttf'; 
		if ( file_exists( $font_path ) ) {
			$html = '<style>
					@font-face{
						font-family : vanitas;
						src         : url("' . $font_url  . '")  format("truetype");
						font-weight : normal;
						font-style  : normal;
					}
					@font-face{
						font-family : vanitas;
						src         : url("' . $font_url . '")  format("truetype");
						font-weight : normal;
						font-style  : normal;
					}
					@font-face{
						font-family : planti;
						src         : url("' . $fontplanti_url . '")  format("truetype");
						font-weight : normal;
						font-style  : normal;
					}
					@font-face{
						font-family : planti;
						src         : url("' . $fontplanti_url. '")  format("truetype");
						font-weight : normal;
						font-style  : normal;
					}
				</style>';
		}
	}
	$html .= '<style>
			@page {
				margin-top    : ' . $pgfw_body_margin_top . ';
				margin-left   : ' . $pgfw_body_margin_left . ';
				margin-right  : ' . $pgfw_body_margin_right . ';
				margin-bottom : ' . $pgfw_body_margin_bottom . ';
			}
		</style>';
	if ( $pgfw_body_border_size > 0 ) {
		$html .= '<style>
			.pgfw-border-page {
				position      : fixed;
				margin-bottom : ' . $pgfw_border_position_bottom . ';
				margin-left   : ' . $pgfw_border_position_left . ';
				margin-top    : ' . $pgfw_border_position_top . ';
				margin-right  : ' . $pgfw_border_position_right . ';
				border        : ' . $pgfw_body_border_size . 'px solid ' . $pgfw_body_border_color . ';
			}
		</style>
		<div class="pgfw-border-page" ></div>';
	}
	if ( 'yes' == $pgfw_body_add_watermark ) {
		$watermark = $pgfw_body_watermark_text;
	} else {
		$watermark = '';
	}
	// Header for pdf.
	if ( 'yes' === $pgfw_header_use_in_pdf ) {
		$html .= '<style>
					.pgfw-pdf-header-each-page{
						position : fixed;
						left     : 0px;
						height   : 100px;
						top      : ' . $pgfw_header_top . ';
					}
					.pgfw-pdf-header{
						border-bottom  : 2px solid gray;
						padding        : ' . $pgfw_header_width . 'px;
						font-family    : ' . $pgfw_header_font_style . ';
						font-size      : ' . $pgfw_header_font_size . ';
						padding-bottom : 25px;
					}
					.pgfw-header-logo{
						width  : 50px;
						height : 50px;
						float  : left;
					}
					.pgfw-header-tagline{
						text-align : right;
						color      : ' . $pgfw_header_color . ';
					}
					#watermark {
						position: fixed;
						top: 35%;
						left:-30px;
						width: 100%;
						text-align: center;
						opacity: .3;
						transform: rotate(15deg);
						transform-origin: 50% 50%;
						z-index: 1000;
						font-size: 40px;
						font-weight:600;
						color : ' . $pgfw_body_watermark_color . ';
					  }
				</style>
				<div class="pgfw-pdf-header-each-page">
				<div id="watermark">
				' . $watermark . '
				</div>
					<div class="pgfw-pdf-header">
					
						<img src="' . esc_url( $pgfw_header_logo ) . '" alt="' . esc_html__( 'No image found', 'pdf-generator-for-wp' ) . '" class="pgfw-header-logo">
						<div class="pgfw-header-tagline" >
							<span><b>' . esc_html( strtoupper( $pgfw_header_comp_name ) ) . '</b></span><br/>
							<span>' . esc_html( $pgfw_header_tagline ) . '</span>
						</div>
					</div>
				</div>';
	}

		// footer for pdf.
	if ( 'yes' === $pgfw_footer_use_in_pdf ) {
		$html .= '<style>
			.pgfw-pdf-footer{
				position    : fixed;
				left        : 0px;
				bottom      : ' . $pgfw_footer_bottom . ';
				height      : 150px;
				border-top  : 2px solid gray;
				padding     : ' . $pgfw_footer_width . 'px;
				font-family : ' . $pgfw_footer_font_style . ';
				font-size   : ' . $pgfw_footer_font_size . ';
			}
			.pgfw-footer-tagline{
				color      : ' . $pgfw_footer_color . ';
				text-align : center;
				overflow   : hidden;
			}
			.pgfw-footer-pageno:after {
				content : "Page " counter(page);
			}
		</style>';
		$html .= '<div class="pgfw-pdf-footer">
					<span class="pgfw-footer-pageno"></span>
					<div style="text-align:right; margin-top:-15px;">
						<div> ' . esc_html( $display_author_name ) . '</div>
					</div>
					<div class="pgfw-footer-tagline" >
						<span>' . esc_html( $pgfw_footer_tagline ) . '</span>
					</div>
					<div style="text-align:right; margin-top:-15px;">
					<div>' . esc_html( $display_post_date ) . '</div>
					<div > ' . esc_html( $display_post_title ) . '</div>
					</div>
				</div>';
	}
	// body for pdf.
	if ( 'yes' === $pgfw_watermark_image_use_in_pdf ) {
		$html = apply_filters( 'pgfw_customize_body_watermark_image_pdf', $html );
	}
	if ( '' !== $pgfw_body_custom_css ) {
		$html .= '<style>
					' . $pgfw_body_custom_css . '
				</style>';
	}
	
	$post = get_post( $post_id );
	if ( is_object( $post ) ) {
		$html .= '<style>
		.pgfw-pdf-body{
			font-family : ' . $pgfw_body_page_font_style . ';
			font-size   : ' . $pgfw_body_page_font_size . ';
			color       : ' . $pgfw_body_page_font_color . ';
			
		}

		.pgfw-pdf-body li{ 
			padding-left:0;
			vertical-align: middle;
		}
		
		
		
				';

		if ( 'yes' == $pgfw_body_images_row_wise ) {

			$html .= '	</style>';
		}
//Viila 
$villa = '';
if( have_rows( 'villa_bullets', $post_id ) ) :
	while( have_rows( 'villa_bullets', $post_id ) ): the_row(); 
	$villa .="<li>".get_sub_field( 'bullet_text' )."</li>";

	endwhile;
endif;
//Pool
$Pool = '';
if( have_rows( 'pool_bullets' , $post_id) ) :
	while( have_rows( 'pool_bullets', $post_id ) ): the_row(); 
	$Pool .= "<li>".get_sub_field( 'bullet_text' )."</li>";

	endwhile;
endif;
//Grounds
$Grounds = '';
if( have_rows( 'ground_bullets', $post_id ) ) :
	while( have_rows( 'ground_bullets', $post_id ) ): the_row(); 
	$Grounds .= "<li>".get_sub_field( 'bullet_text' )."</li>";

	endwhile;
endif;
//Anmities
$Anmities = '';
if( have_rows( 'amenities_bullets' , $post_id) ) :
	while( have_rows( 'amenities_bullets', $post_id ) ): the_row(); 
	$Anmities .= "<li>".get_sub_field( 'bullet_text' )."</li>";

	endwhile;
endif;
//Location
$Location = '';
if( have_rows( 'location_bullets', $post_id ) ) :
	while( have_rows( 'location_bullets' , $post_id) ): the_row(); 
	$Location .= "<li>".get_sub_field( 'bullet_text' )."</li>";

	endwhile;
endif;

$a = wp_get_attachment_image_url(get_post_meta($post_id,'promo_image',true));
$promo_image = (explode("-150x150",$a)[0]).explode("-150x150",$a)[1];

			$html   .= '<div class="pgfw-pdf-body"><table style="width: 100%;color: #000;font-size: 24px;font-weight: 700;line-height: 1;border-collapse: collapse;">
			<tbody>
				<!-- page 01 start -->
				<tr>
					<td colspan="2" style="padding:0;">
						<div style="background-image:url('.$promo_image.');height: 600px;background-size: cover;background-position: center;text-align: center;">';
						if ('unbranded' !== $pgfw_body_villa_type ) {
						$html .='<div style="background-image:url('.PDF_GENERATOR_FOR_WP_DIR_URL.'/admin/src/images/shade-m.png);height: 400px;width:100%;background-size: cover;background-position: center;">
								<p style="margin:0;"><img src="'.PDF_GENERATOR_FOR_WP_DIR_URL.'/admin/src/images/logo-est.png" width="90.21" style="margin: 50px 0 0;"></p>
								<p style="margin:0;"><img src="'.PDF_GENERATOR_FOR_WP_DIR_URL.'/admin/src/images/logo.png" alt="logo" width="400" style="margin: 24px 0 0;"></p></div>';
						}
								$html .='
					</td>
				</tr>
				<tr>
					<td style="padding:20px 0 0 40px;vertical-align: top;">
						<div style="">
							<p style="margin: 0;color: #62AE94;font-size: 32px;font-weight: 700;line-height: 1;">'.get_the_title($post_id).'</p>
							<p style="margin: 0;padding:5px 0 0;font-size: 16px;font-weight: 700;line-height: 1;">'.strtoupper( get_field('location',$post_id) ).', '.strtoupper( get_field('island',$post_id) ).'</p>
							<p style="margin: 0;padding:30px 0 0;font-size: 16px;font-weight: 700;line-height: 1;"><span>PRICE:</span> '.get_field('price',$post_id).'</p>
						</div>
					</td>
					<td style="padding:20px 50px 0 0;vertical-align: middle;text-align:right;">
						<table style="width: 200px;text-align: center;margin: 0 0 0 auto;color: #000;font-size: 14px;font-weight: 700;line-height: 1;border-collapse: collapse;">
							<tbody>
								<tr>
									<td>
										<p style="margin: 0;"><img src="'.PDF_GENERATOR_FOR_WP_DIR_URL.'/admin/src/images/user.png" alt="logo-est" width="40"></p>
										<p style="margin: 0;font-family:vanitas;text-transform:uppercase;">Sleeps</p>
										<p style="margin: 0;padding:15px 0 0;font-family:vanitas;">'.get_field('sleeps',$post_id).'</p>
									</td>
									<td>
										<p style="margin: 0;"><img src="'.PDF_GENERATOR_FOR_WP_DIR_URL.'/admin/src/images/bed.png" alt="logo-est" width="40"></p>
										<p style="margin: 0;font-family:vanitas;text-transform:uppercase;">Bedrooms</p>
										<p style="margin: 0;padding:15px 0 0;font-family:vanitas;">'.get_field('bedrooms',$post_id).'</p>
									</td>
								</tr>
							</tbody>
						</table>
					</td>
				</tr>
				<!-- page 01 end -->
				<!-- page 02 start -->
				<tr>
					<td style="width:50%;vertical-align: top;">
						<p style="margin:80px 0 15px;padding:0 40px 0 100px; color: #62AE94;font-size: 16px;line-height: 1.25;font-family:planti;">'.get_field('short_description',$post_id).'</p>
						
						<p style="margin:0 0 40px;padding:0 40px 0 100px;color: #000;font-size: 16px;line-height: 1.25;font-family:planti;">'.get_field('long_description',$post_id).'</p>
					</td>
					<td style="width:50%;vertical-align: top;padding: 50px 30px 0 20px;">';

					$i = 0;
					foreach( $images as $image ) {
						if  ( $i == 0 || $i== 1){
						$html .='<p style="margin:0 0 25px;background-image:url('.$image['sizes']['large'].');height: 340px;background-size: cover;background-position: center;"></p>';			
						
					} 		
					$i++;
					}
						$html .='</td>
				</tr>
				<!-- page 02 end -->
				</tbody></table>
				<!-- page 03 start -->
			<div>
					';
					$i = 0;
					foreach( $images as $image ) {
					
						if  ( $i == 2 || $i == 7 || $i== 12 ){
							
						$html .='<div style="background-image:url('.$image['sizes']['extra-large'].');height: 793px;background-size: cover;background-position: center; text-align: center;">
						</div>';
							
						} 		

					//	$html .='';
						if  ( $i == 3 || $i== 4   ){
							$html .= '<img src="'.$image['sizes']['medium-crop'].'" width="530" height="341" style="margin:0; padding:0; max-width:auto;margin-top:48px; margin-left:20px;" >';
							//$html .='<div style="margin:40px 10px 20px 20px;background-image:url('.$image['sizes']['medium-crop'].');width:400px; height: 350px;background-size: cover;background-position: center;"></div>';			
						
						} 		
						if ( $i== 5 || $i== 6 ) {
							$html .= '<img src="'.$image['sizes']['medium-crop'].'" width="530" height="341" style="margin:0; padding:0; max-width:auto;margin-top:32px; margin-left:20px;" >';
						}
						if  ( $i == 8 || $i== 9 ){
							$html .='<img src="'.$image['sizes']['medium-crop'].'" width="530" height="341" style="margin:0; padding:0; max-width:auto;margin-top:48px; margin-left:20px;">';
							//$html .='<div style="margin:40px 20px 20px 10px;background-image:url('.$image['sizes']['medium-crop'].');width:400px; height: 350px;background-size: cover;background-position: center;"></div>';			
							
						} 
						if ( $i== 10 || $i== 11 ) {
							$html .='<img src="'.$image['sizes']['medium-crop'].'" width="530" height="341" style="margin:0; padding:0; max-width:auto;margin-top:32px; margin-left:20px;">';
						}
						if ( $i == 13 || $i == 14 ){
							$html .= '<img src="'.$image['sizes']['medium-crop'].'"  style="margin:0; padding:0; max-width:auto; width: 530px;height: 341px !important; margin-top:48px; margin-left:20px;" >';
						}

						// if ( $i == 15|| $i == 16 ){
						// 	$html .='<img src="'.$image['sizes']['medium-crop'].'"  style="margin:0; padding:0; max-width:auto; width: 530px;height: 350px !important; margin-top:35px; margin-left:20px;">';
						// }
						// if ($i==17){
						// 	$html .='<div style="background-image:url('.$image['sizes']['extra-large'].');height: 789px !important;background-size: cover;background-position: center; text-align: center;">
						// </div>';
						// }
						//$html .='</div>';
						$i++;
					}
					//$i = 0;
					$html .='</div>
				<!-- page 03 end -->
				<!-- page 04 start -->
				<table style="width: 100% !important;color: #000;line-height: 1;border-collapse: collapse;"><tbody>
		
				
				<tr>
					<td colspan="2" style="vertical-align: top;padding: 40px 80px;">
					<div style="width:600px;padding-left:15px;">
						<h2 style="margin:0;padding: 0 0 10px;color: #62AE94;font-size: 24px;line-height: 1.25;font-family:vanitas;">VILLA</h2>
						<ul style="margin:0 0 20px;padding-left:12px;color: #000;font-size: 14px;line-height: 1.25;font-family:planti;">
							'.$villa.'
						</ul>
						<h2 style="margin:0;padding: 0 0 10px;color: #62AE94;font-size: 24px;line-height: 1.25;font-family:vanitas;">POOL</h2>
						<ul style="margin:0 0 20px;padding-left:12px;color: #000;font-size: 14px;line-height: 1.25;font-family:planti;">
							'.$Pool.'
						</ul>
						<h2 style="margin:0;padding: 0 0 10px;color: #62AE94;font-size: 24px;line-height: 1.25;font-family:vanitas;">GROUNDS</h2>
						<ul style="margin:0 0 20px;padding-left:12px;color: #000;font-size: 14px;line-height: 1.25;font-family:planti;">
							'.$Grounds.'
						</ul>
					</div>
					</td>
				</tr>
				<!-- page 08 end -->
				<!-- page 09 start -->
				<tr>
					<td colspan="2" style="vertical-align: top;padding: 80px;">
					<div style="width:600px;padding-left:15px;">
						<h2 style="margin:0;padding: 0 0 10px;color: #62AE94;font-size: 24px;line-height: 1.25;font-family:vanitas;">AMENITIES</h2>
						<ul style="margin:0 0 20px;padding-left:12px;color: #000;font-size: 14px;line-height: 1.25;font-family:planti;">
							'.$Anmities.'
						</ul>
						<h2 style="margin:0;padding: 0 0 10px;color: #62AE94;font-size: 24px;line-height: 1.25;font-family:vanitas;">LOCATION</h2>
						<ul style="margin:0 0 20px;padding-left:12px;color: #000;font-size: 14px;line-height: 1.25;font-family:planti;">
							'.$Location.'
						</ul>
					</div>
					</td>
				</tr>
				<!-- page 09 end -->
				<!-- page 10 start -->
				<tr>
					<td style="width:400px;vertical-align:top;padding-left:15px;">
						
							<p style="margin:0;padding: 81px 0 10px 80px;color: #62AE94;font-size: 24px;font-weight: 700;line-height: 1.25;font-family:vanitas;">LOCATION MAP</p>
							<p style="margin:0 0 0px 80px;padding-right:40px;color: #000;font-size: 14px;line-height: 1.25;font-family:planti;">For security reasons we cant provide the exact location of this villa.</p>
							<p style="margin:0 0 0px 80px;padding-right:40px;color: #000;font-size: 14px;line-height: 1.25;font-family:planti;"> But this map shows the approximate area where it is located</p>
					
					</td>
					<td style=" ">
						<div style="margin:138px 0 50px 0;background-image:url(https://maps.googleapis.com/maps/api/staticmap?center='.get_field('google_lat',$post_id).','.get_field('google_long',$post_id).'&zoom=15&scale=1&size=400x400&maptype=roadmap&format=png&visual_refresh=true&key=AIzaSyDoDzbAPqfZi25g_I2Z3Gqp7Zret6IcH0s);height:400px;width:400px;background-size: 100% 100%;background-position:left;"></div>
					</td>
					
				</tr>';
				// <!-- page 10 end -->
				// <!-- page 11 start -->
				if ('unbranded' !== 	$pgfw_body_villa_type ) {
				$html .='<tr>
					<td colspan="2" style="padding:0;">
						<div style="background-image:url('.$images[0]['sizes']['extra-large'].');height: 596px;background-size: cover;background-position: center;text-align: center;">
						</div>
					</td>
				</tr>
				<tr>
					<td style="padding:0 0 0 50px;vertical-align: top;">
						<div style="padding-top:44px;">
							<p style="margin: 0 0 20px;color: #62AE94;font-size: 24px;font-weight: 700;line-height: 1;font-family:vanitas;">PLEASE CONTACT OUR TEAM TO BOOK THIS VILLA</p>
							<p style="margin: 0 0 0;"><a href="mailto: info@deliciouslysortedvillas.com" style="font-family:vanitas;margin: 0;color: #000;font-size: 16px;font-weight: 700;line-height: 1.25;text-decoration: none;">info@deliciouslysortedvillas.com</a></p>
							<p style="margin: 0 0 10px;"><a href="tel: +34 971 197 867" style="font-family:vanitas;margin: 0;color: #000;font-size: 16px;font-weight: 700;line-height: 1.25;text-decoration: none;">+34 971 197 867</a></p>
						</div>
					</td>
					<td style="padding:0 50px 0 50px;vertical-align: top;">
						<p style="margin:0;padding-top:49px;text-align: right;"><img src="'.PDF_GENERATOR_FOR_WP_DIR_URL.'/admin/src/images/green_logo.png" alt="logo" width="110"></p>
					</td>
				</tr>';
				}
				// <!-- page 11 end -->
			$html .='</tbody>
		</table></div>';
     

			
        // $html .=
		// '<div >
		// <h4>VILLA</h4>
		// <ul class="villa_bullets">'. $html2.'</ul>
		// </div>';
		// taxonomies for posts.
		$html1 = '';
		if ( 'yes' === $pgfw_show_post_taxonomy ) {
			$taxonomies = get_object_taxonomies( $post );
			if ( is_array( $taxonomies ) ) {
				foreach ( $taxonomies as $taxonomy ) {
					$prod_cat = get_the_terms( $post, $taxonomy );
					if ( is_array( $prod_cat ) ) {
						$html1 .= '<div><b>' . strtoupper( str_replace( '_', ' ', $taxonomy ) ) . '</b></div>';
						$html1 .= '<ol>';
						foreach ( $prod_cat as $category ) {
							$html1 .= '<li>' . $category->name . '</li>';
						}
						$html1 .= '</ol>';
					}
				}
			}
		}
		$html .= apply_filters( 'wps_pgfw_product_taxonomy_in_pdf_filter_hook', $html1, $post );
		// category for posts.

		if ( 'yes' === $pgfw_show_post_categories ) {
			$categories = get_the_category( $post->ID );
			if ( is_array( $categories ) && ! empty( $categories ) ) {
				$html .= '<div><b>' . esc_html__( 'Category', 'pdf-generator-for-wp' ) . '</b></div>';
				$html .= '<ol>';
				foreach ( $categories as $category ) {
					$html .= '<li>' . $category->name . '</li>';
				}
				$html .= '</ol>';
			}
		}
		// tags for posts.
		if ( 'yes' === $pgfw_show_post_tags ) {
			$tags = get_the_tags( $post );
			if ( is_array( $tags ) ) {
				$html .= '<div><b>' . __( 'Tags', 'pdf-generator-for-wp' ) . '</b></div>';
				$html .= '<ol>';
				foreach ( $tags as $tag ) {
					$html .= '<li>' . $tag->name . '</li> ';
				}
				$html .= '</ol>';
			}
		}
		// post created date.
		if ( 'yes' === $pgfw_show_post_date ) {
			$created_date = get_the_date( 'F Y', $post );
			$html        .= '<div><b>' . __( 'Date Created', 'pdf-generator-for-wp' ) . '</b></div>';
			$html        .= '<div>' . $created_date . '</div>';
		}
		// post author.
		if ( 'yes' === $pgfw_show_post_author ) {
			$author_id   = $post->post_author;
			$author_name = get_the_author_meta( 'user_nicename', $author_id );
			$html       .= '<div><b>' . __( 'Author', 'pdf-generator-for-wp' ) . '</b></div>';
			$html       .= '<div>' . $author_name . '</div>';
		}
		// meta fields.
		$post_type               = $post->post_type;
		$pgfw_show_type_meta_val = array_key_exists( 'pgfw_meta_fields_' . $post_type . '_show', $pgfw_meta_settings ) ? $pgfw_meta_settings[ 'pgfw_meta_fields_' . $post_type . '_show' ] : '';
		$pgfw_show_type_meta_arr = array_key_exists( 'pgfw_meta_fields_' . $post_type . '_list', $pgfw_meta_settings ) ? $pgfw_meta_settings[ 'pgfw_meta_fields_' . $post_type . '_list' ] : array();
		$pgfw_body_metafields_row_wise     = array_key_exists( 'pgfw_body_metafields_row_wise', $pgfw_body_settings ) ? $pgfw_body_settings['pgfw_body_metafields_row_wise'] : '';
		$html2                   = '';
		if ( 'yes' === $pgfw_show_type_meta_val ) {
			if ( is_array( $pgfw_show_type_meta_arr ) ) {
				$html2 .= '<div><b>' . __( 'Meta Fields', 'pdf-generator-for-wp' ) . '</b></div>';
				$html2 .= '<table><tr>';
				foreach ( $pgfw_show_type_meta_arr as $meta_key ) {
					$meta_val          = get_post_meta( $post->ID, $meta_key, true );
					$wpg_meta_key_name = ucwords( str_replace( '_', ' ', $meta_key ) );
					if ( $meta_val ) {
						if ( '_product_image_gallery' == $meta_key ) {

							$meta_val1 = explode( ',', $meta_val );
							foreach ( $meta_val1 as $key => $val ) {

								$thumbnail_url = get_the_guid( $val );
								$thumbnail = '<img  src=' . $thumbnail_url . ' alt="post thumbnail" style="height:100px; width: 100px; margin:17px;" height=50 weight=50/>';
								$html2 .= $thumbnail;
							}
							$html2 .= '<div><b> ' . $wpg_meta_key_name . '</b> </div>';

						} else {
							if ( 'yes' == $pgfw_body_metafields_row_wise ) {
								$i++;
								$html2 .= '<td><b>' . $wpg_meta_key_name . ' :</b></td>';
								$html2 .= '<td> ' . $meta_val . ' </td>';
								if ( 0 == $i % $pgfw_body_meta_field_column ) {
									$html2 .= '</tr><tr>';
								}
							} else {
									$html2 .= '<div><b>' . $wpg_meta_key_name . ' : </b> ' . $meta_val . '</div>';
							}
						}
					}
				}
				$html2 .= '</tr></table>';
			}
		}
		$html .= apply_filters( 'wps_pgfw_product_post_meta_in_pdf_filter_hook', $html2, $post );
		$html .= '</div></div><span style="page-break-after: always;overflow:hidden;"></span>';
	}

	return $html;
}