<?php 
    $imgUrl = get_the_post_thumbnail_url(null, 'medium');
    $fields = get_fields();
    $isSpecial = !!$fields['is_special'];
    $title = get_the_title() !== '' ? get_the_title() : $fields['first_name'] . ' ' . $fields['last_name'];
?>
<div class="col col-3">
    <div class="teacher">
    <img src="<?php echo $imgUrl; ?>">
    <div class="info">
    <h3 class="title"><?php echo $title; ?></h3>

        <?php if ($isSpecial) { ?>
            <div class="name"><?php echo $fields['first_name'] . ' ' . $fields['last_name']; ?></div>
         <?php } ?>

         <div class="email">
            <a href="mailto:<?php echo $fields['email']; ?>">
                <i class="fas fa-envelope"></i>
                <?php echo $fields['email']; ?>
            </a>
         </div>
         <?php if (array_key_exists('phone', $fields) && $fields['phone'] !== '') { ?>
         <div class="phone">
            <a href="tel:<?php echo $fields['phone']; ?>">
                <i class="fas fa-phone"></i>
                <?php echo $fields['phone']; ?>
            </a>
         </div>
         <?php } ?>

         <?php if (array_key_exists('receipt_hours', $fields) && $fields['receipt_hours'] !== '') { ?>
         <div class="receipt_hours">
            <i class="fas fa-clock"></i>
            <?php echo $fields['receipt_hours']; ?>
         </div>
         <?php } ?>
    </div>
</div>
</div>



