<?php require_once('header.php'); ?>

<?php
$about = getPageAbout($pdo); // returns an associative array
?>

<div class="page-banner" style="background-image: url(assets/uploads/<?php echo $about['about_banner']; ?>);">
    <div class="inner">
        <h1><?php echo htmlspecialchars($about['about_title']); ?></h1>
    </div>
</div>

<div class="page">
    <div class="container">
        <div class="row">            
            <div class="col-md-12">
                <p>
                    <?php echo $about['about_content']; ?>
                </p>
            </div>
        </div>
    </div>
</div>

<?php require_once('footer.php'); ?>
