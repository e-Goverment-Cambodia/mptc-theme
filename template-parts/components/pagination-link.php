<?php
/**
 * @package MPTC_THEME
 */
?>


<?php if ( paginate_links() ) : ?>
  <div class="mb-md-6 mb-sm-4 mb-3">
    <nav aria-label="Page navigation ">
        <div class="pagination-link d-flex justify-content-center align-items-center">
            <?php echo paginate_links() ?>
        </div>
    </nav>
  </div>
<?php endif ?>