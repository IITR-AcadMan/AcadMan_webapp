<?php
require_once(dirname(__FILE__).'/theme/theme.php');
get_header();
?>
<script>
    $("#tab1").addClass("active");
    $("title").html("AcadMan | Dashboard");
</script>
<?php
get_footer();
?>