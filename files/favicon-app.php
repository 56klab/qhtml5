<?php
/*
 * http://www.favicon-generator.org/
 * Inserire l'icona nel sito http://www.favicon-generator.org/, selezionare
 * "Generate icons for Web, Android, Microsoft, and iOS (iPhone and iPad) Apps"
 * scaricare il pacchetto e caricarlo in /templates/qhtm5/images/favicon
 * Poi copia incollare qua i link generati da favicon-generator
 */

/*
$icon-57x57	= 'templates/' . $this->template . '/images/icons/favicon.ico';
$icon-60x60 = 'templates/' . $this->template . '/images/icons/touch-icon-iphone.png';
$icon-72x72 = 'templates/' . $this->template . '/images/icons/touch-icon-ipad.png';
$icon-76x76 = 'templates/' . $this->template . '/images/icons/touch-icon-iphone-retina.png';
$icon-114x114 = 'templates/' . $this->template . '/images/icons/touch-icon-ipad-retina.png';
?>
<?php if (file_exists($favicon)) { ?>
<link rel="shortcut icon" href="<?php echo $favicon; ?>" type="image/x-icon">
<?php } ?>
<?php if (file_exists($icon1)) { ?>
<link rel="apple-touch-icon" href="<?php echo $icon1; ?>">
<?php } ?>
<?php if (file_exists($icon2)) { ?>
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo $icon2; ?>">
<?php } ?>
<?php if (file_exists($icon3)) { ?>
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo $icon3; ?>">
<?php } ?>
<?php if (file_exists($icon4)) { ?>
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo $icon4; ?>">
<link rel="icon" sizes="192x192" href="<?php echo $icon4; ?>">
<?php } */ ?>
<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="<?php echo $this->params->get('msapplication-TileColor'); ?>">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="<?php echo $this->params->get('theme-color');?>">
