<?php 
    $fields = get_fields();
    $date = date_i18n(pll__('j F Y'), DateTime::createFromFormat('Ymd', $fields['date'][0]['data'])->getTimestamp());
    $n_dates = count($fields['date']);
    if ($n_dates > 1 && @$fields['date'][$n_dates - 1]['data']) {
        $date_end = date_i18n(pll__('j F Y'), DateTime::createFromFormat('Ymd', $fields['date'][$n_dates - 1]['data'])->getTimestamp());
    }
?>
<div class="seminary">
    <h3 class="title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
    <div class="info">
        <?php echo $date . (@$date_end ? ' - ' . $date_end : '') ?>
    </div>
</div>
<?php unset($date_end) ?>



