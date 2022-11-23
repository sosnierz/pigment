<?php
//C_IMG (LAZY LOADING IMAGES)
function c_img($image_arr, $id=null, $class=null, $background_image_mobile=null, $img_size=[null, null]){
    $dataSrc = 'data-src';
    $dataSrcSet = 'data-srcset';
    $isSplide= false;
    if($class == true){ //need add 'isSplide' class for correctly display sliders from SplideJS API
      $classes = explode(" ", $class);
      foreach($classes as $string){
        if($string == 'isSplide'){
          $dataSrc = 'data-splide-lazy';
          $dataSrcSet = 'data-splide-lazy-srcset';
        }
      }
    }
    $svg = false;
    if(strpos($image_arr['filename'],'.svg')>0){
      $svg = true;
    }
    if($id==null){
      $e_id='';
    }else{
      $e_id='id="'.$id.'" ';
    }
    if($class==null){
      $e_class='';
    }else{
      $e_class=$class;
    }
    if($background_image_mobile==null){
      $e_bg='';
    }else{
      $e_bg=true;
    }
    if($e_bg){
      //mobile bg bigger then normal becouse of cover size to dont show pixels
      //there is no thumbnail
      $thumbnail = '';
    }else{
      $thumbnail = ','.$image_arr['sizes']['thumbnail'].' '.$image_arr['sizes']['thumbnail-width'].'w';
    }
    if($svg){
      return '<img  class="lazy '.$e_class.'" '.$e_id.' data-src="'.$image_arr['sizes']['thumbnail'].'" width="'.$img_size[0].'"
            height="'.$img_size[1].'"'.
           'alt="'.$image_arr['title'].'">';
    }else{
      return '<img  class="lazy '.$e_class.'" '.$e_id. $dataSrc.'="'.$image_arr['sizes']['thumbnail'].'" width="'.$image_arr['sizes']['large-width'].'"
            height="'.$image_arr['sizes']['large-height'].'"'.
            $dataSrcSet.'="'.$image_arr['sizes']['large'].' '.$image_arr['sizes']['large-width'].'w,
                      '.$image_arr['url'].' '.$image_arr['width'].'w,
                      '.$image_arr['sizes']['medium'].' '.$image_arr['sizes']['medium-width'].'w'.
                      $thumbnail.'" '.
          'alt="'.$image_arr['title'].'">';
    }
}
  
//ADDING SVG TYPE IMAGES VIA WORDPRESS
function add_file_types_to_uploads($file_types){
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg';
    $file_types = array_merge($file_types, $new_filetypes );
  
    return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');

//DO IMAGES SIZE (GENERATE ARRAY IMAGE WITH SIZES)
function do_img_sizes($id = null) {
    $sizes = get_intermediate_image_sizes();//
    if (!empty($id)){
      $attachment_id = get_post_thumbnail_id($id);//
    }else{
      $attachment_id = get_post_thumbnail_id();
    }
    $images_sizes = array();//
    foreach ($sizes as $size) {
      $images_sizes[] = wp_get_attachment_image_src($attachment_id, $size);
    }
  
    $image = array(
      'url' => $images_sizes[1][0],
      'title' => get_the_title($id),
      'width' => $images_sizes[5][1],
      'height' => $images_sizes[5][2],
      'sizes' => array(
            'thumbnail' => $images_sizes[0][0],
            'thumbnail-width' => $images_sizes[0][1],
            'thumbnail-height' => $images_sizes[0][2],
            'medium' => $images_sizes[1][0],
            'medium-width' => $images_sizes[1][1],
            'medium-height' => $images_sizes[1][2],
            'large' => $images_sizes[3][0],
            'large-width' =>  $images_sizes[3][1],
            'large-height' => $images_sizes[3][2]
          )
    );
    return $image;
}

//ADD OPTIONS MENU
if( function_exists('acf_add_options_page') ) {
	
    acf_add_options_page();

    acf_add_options_page(array(
      'page_title' 	=> 'Filtry',
      'menu_title'	=> 'Filtry',
      'icon_url' => 'dashicons-image-filter',
      'position' => 58
  ));
  
    $header = acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
	));

    $footer = acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
	));

    $general = acf_add_options_sub_page(array(
		'page_title' 	=> 'General Settings',
		'menu_title'	=> 'General',
	));
}

//SAVE THE ORPHANS (SIEROTKI)
function add_nbsp($title, $id = null){
  $title = preg_replace('/ ([a-zA-Z0-9]{1}) /', " $1&nbsp;", $title);
  //html signs
  return preg_replace('/\>([a-zA-Z0-9]{1}) /', ">$1&nbsp;", $title);
}

//CUTTING TEXT 
function cut_str($string, $your_desired_width) {
  $parts = preg_split('/([\s\n\r]+)/', $string, null, PREG_SPLIT_DELIM_CAPTURE);
  $parts_count = count($parts);
  $length = 0;
  $last_part = 0;
  for (; $last_part < $parts_count; ++$last_part) {
    $length += strlen($parts[$last_part]);
    if ($length > $your_desired_width) { break; }
  }
  return implode(array_slice($parts, 0, $last_part));
}

//SHORTI ( <S> => <SPAN>, <B> => <STRONG>)
function shorti($string) {
  $string = preg_replace('/\<b\>/','<strong>',$string);
  $string = preg_replace('/\<\/b\>/','</strong>',$string);
  $string = preg_replace('/\<s\>/','<span>',$string);
  $string = preg_replace('/\<\/s\>/','</span>',$string);
  return add_nbsp($string);
}

//RETURN CURRENT YEAR 
function currentYear(){
  return date('Y');
}

//HIDE CLASSIC EDITOR
add_action('init', 'init_remove_editor',100);
function init_remove_editor(){
  $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
  if( !isset( $post_id ) ) return;

  if($post_id!=3){
    $post_type = 'page';
    remove_post_type_support( $post_type, 'editor');
  }
}

//CREATE SLUG 
function createSlug($string) {
  $table = array(
          'Š'=>'S', 'š'=>'s', 'Đ'=>'Dj', 'đ'=>'dj', 'Ž'=>'Z', 'ž'=>'z', 'Č'=>'C', 'č'=>'c', 'Ć'=>'C', 'ć'=>'c',
          'À'=>'A', 'Ą'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
          'Ê'=>'E', 'Ë'=>'E', 'Ę'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ł'=>'L', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
          'Õ'=>'O', 'Ś'=>'S', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Ż'=>'Z', 'Ź'=>'Z', 'Þ'=>'B', 'ß'=>'Ss',
          'à'=>'a', 'á'=>'a', 'ą'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
          'ê'=>'e', 'ë'=>'e', 'ę'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ł'=>'l', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
          'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ś'=>'s', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'ż'=>'z','ź'=>'z', 'þ'=>'b','ń'=>'n','Ń'=>'N',
          'ÿ'=>'y', ','=>'', '„'=>'', '”'=>'', '.'=>'', '?'=>'', 'Ŕ'=>'R', 'ŕ'=>'r', '/' => '-', ' ' => '-'
  );

  // -- Remove duplicated spaces
  $stripped = preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $string);

  // -- Returns the slug
  return strtolower(strtr($string, $table));
}

//FUNCTION THAT ALLOWS USE <SPAN> IN WORDPRESS EDITOR 
function override_mce_options($initArray) {
  $opts = '*[*]';
	$initArray['valid_elements'] = $opts;
	$initArray['extended_valid_elements'] = $opts;
	return $initArray;
}
add_filter('tiny_mce_before_init', 'override_mce_options');

?>
