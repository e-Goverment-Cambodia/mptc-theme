<?php
/**
 * @package MPTC_THEME
 */

use App\Base\BaseController;
$init = new BaseController;
?>

<?php 
    $pdf = get_post_meta( get_the_ID(), $init->meta_key_document_file, true ); 
    if( $pdf ) :
        $chetra_pdf_url = $init->formatChetraDocument( $pdf );
        ?>
        <iframe src="https://docs.google.com/gview?url=<?php echo $chetra_pdf_url ?>&embedded=true" style="width:100%; height:1000px;" frameborder="0"></iframe>
        <div class="mb-5">
            <i class="text-success icofont-download"></i>
            <a href="<?php echo $chetra_pdf_url ?>">
            <?php echo __( "Download" ) ?>
            </a>
        </div>
        <?php
    endif;
?>
	
