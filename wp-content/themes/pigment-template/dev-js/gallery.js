function viewGallery(){
console.log('hhh')

    $("#gallery").unitegallery({
        gallery_width:"100%",
        tile_border_color:"#7a7a7a",
        tile_outline_color:"#8B8B8B",
        tile_enable_shadow:true,
        tile_shadow_color:"#8B8B8B",
        tile_overlay_opacity:0.3,
        tile_show_link_icon:true,
        tile_image_effect_type:"sepia",
        tile_image_effect_reverse:true,
        tile_enable_textpanel:true,
        lightbox_textpanel_title_color:"e5e5e5",
        tiles_col_width:230,
        tiles_space_between_cols:20
    }); 
}

function docReady(fn) {
    // see if DOM is already available
    if (document.readyState === "complete" || document.readyState === "interactive") {
        setTimeout(fn, 100);
    } else {
        document.addEventListener("DOMContentLoaded", fn);
    }
} 
  docReady(viewGallery);
  