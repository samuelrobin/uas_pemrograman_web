<?php require_once("../includes/db_connection.php"); ?>
<?php
 if(!isset($layout_context)){
 $layout_context = "public";
 }
 $sql = "SELECT *
		FROM logo
		ORDER BY id DESC
		LIMIT 1";
$hasil = mysqli_query($connection, $sql);
$baris = mysqli_fetch_assoc($hasil);
?>
<html>
<head>
<title>Tanya Pepo <?php if ($layout_context == "admin") {
			echo "Admin"; }?></title>
<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
</head>
<body bgcolor="#ffffff" topmargin="0">
<div align="center">
   		 <!-- Begin TopArea -->
		 <div id="toparea"> 
		 <div id="banner">
			<div id="logo">
			  <img src="<?php echo $baris["gambar"]; ?>"/>
			</div>
		 </div><!--
it works the same with all jquery version from 1.x to 2.x -->
		<script type="text/javascript" src="js/jquery.js"></script>
		<!-- use jssor.slider.mini.js (40KB) or jssor.sliderc.mini.js (32KB, with caption, no slideshow) or jssor.sliders.mini.js (28KB, no caption, no slideshow) instead for release -->
		<!-- jssor.slider.mini.js = jssor.sliderc.mini.js = jssor.sliders.mini.js = (jssor.js + jssor.slider.js) -->
		<script type="text/javascript" src="js/jssor.js"></script>
		<script type="text/javascript" src="js/jssor.slider.js"></script>
		<script>
			jQuery(document).ready(function ($) {
			var _CaptionTransitions = [];
				_CaptionTransitions["L"] = { $Duration: 800, x: 0.6, $Easing: { $Left: $JssorEasing$.$EaseInOutSine }, $Opacity: 2 };
				_CaptionTransitions["R"] = { $Duration: 800, x: -0.6, $Easing: { $Left: $JssorEasing$.$EaseInOutSine }, $Opacity: 2 };
				_CaptionTransitions["T"] = { $Duration: 800, y: 0.6, $Easing: { $Top: $JssorEasing$.$EaseInOutSine }, $Opacity: 2 };
				_CaptionTransitions["B"] = { $Duration: 800, y: -0.6, $Easing: { $Top: $JssorEasing$.$EaseInOutSine }, $Opacity: 2 };
				_CaptionTransitions["TL"] = { $Duration: 800, x: 0.6, y: 0.6, $Easing: { $Left: $JssorEasing$.$EaseInOutSine, $Top: $JssorEasing$.$EaseInOutSine }, $Opacity: 2 };
				_CaptionTransitions["TR"] = { $Duration: 800, x: -0.6, y: 0.6, $Easing: { $Left: $JssorEasing$.$EaseInOutSine, $Top: $JssorEasing$.$EaseInOutSine }, $Opacity: 2 };
				_CaptionTransitions["BL"] = { $Duration: 800, x: 0.6, y: -0.6, $Easing: { $Left: $JssorEasing$.$EaseInOutSine, $Top: $JssorEasing$.$EaseInOutSine }, $Opacity: 2 };
				_CaptionTransitions["BR"] = { $Duration: 800, x: -0.6, y: -0.6, $Easing: { $Left: $JssorEasing$.$EaseInOutSine, $Top: $JssorEasing$.$EaseInOutSine }, $Opacity: 2 };

				_CaptionTransitions["WAVE|L"] = { $Duration: 1500, x: 0.6, y: 0.3, $Easing: { $Left: $JssorEasing$.$EaseLinear, $Top: $JssorEasing$.$EaseInWave }, $Opacity: 2, $Round: { $Top: 2.5} };
				_CaptionTransitions["MCLIP|B"] = { $Duration: 600, $Clip: 8, $Move: true, $Easing: $JssorEasing$.$EaseOutExpo };
				
				var options = {
					$AutoPlay: true, 
					$DragOrientation: 1,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)
					$BulletNavigatorOptions: {
						$Class: $JssorBulletNavigator$,                       //[Required] Class to create navigator instance
						$ChanceToShow: 2                                //[Required] 0 Never, 1 Mouse Over, 2 Always
					},
					
					$CaptionSliderOptions: {                            //[Optional] Options which specifies how to animate caption
						$Class: $JssorCaptionSlider$,                   //[Required] Class to create instance to animate caption
						$CaptionTransitions: _CaptionTransitions,       //[Required] An array of caption transitions to play caption, see caption transition section at jssor slideshow transition builder
						$PlayInMode: 1,                                 //[Optional] 0 None (no play), 1 Chain (goes after main slide), 3 Chain Flatten (goes after main slide and flatten all caption animations), default value is 1
						$PlayOutMode: 3                                 //[Optional] 0 None (no play), 1 Chain (goes before main slide), 3 Chain Flatten (goes before main slide and flatten all caption animations), default value is 1
					}
				};

				var jssor_slider1 = new $JssorSlider$("slider1_container", options);
			});
		</script>
			<!-- Jssor Slider Begin -->
			<!-- You can move inline styles to css file or css block. -->
			<div id="slider1_container" class=slider1 title="Outer Container" style="position: relative; width: 972px; height: 264px; top: 0px; left: 0px;">
				
					<!-- Loading Screen -->
					<div u="loading" style="position: absolute; top: 0px; left: 0px;">
						<div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
							background-color: #000000; top: 0px; left:0px; width: 100%;height:100%;">
						
						<div style="position: absolute; display: block; background: url(/img/loading.gif) no-repeat center center;
							top: 0px; left: 0px;width: 100%;height:100%;">
						</div>
						</div>
					</div>
					<!-- Slides Container -->
					<div u="slides" title="Slides Container" style="cursor: pointer; position: absolute; left: 0px; top: 0px; width: 972px; height: 264px; overflow: hidden;">
					<div>
					<?php 
					 $sql = "SELECT * FROM banner where id='1'";
						$hasil = mysqli_query($connection, $sql);
						$baris = mysqli_fetch_assoc($hasil);
					?>	 
					<img style="width: 972px; height: 264px;" src="<?php echo $baris["banner"]; ?>"/>
							<div u="caption" t="MCLIP|B" style="position: absolute; top: 203px; left: 4px;Width: 489px; height: 50px;">
								<div style="position: absolute; top: 0px; left: 0px; width: 489px; height: 50px;
									background-color: #1a425a; ">
								</div>
								<div style="position: absolute; top: 0px; left: 0px; width: 489; height: 50px;
									color: White; font-size: 20px; font-weight: bold;  text-align: Left;">
									<span><?php echo $baris["title"]; ?></span></br>
									<span style="font-size: 14px; font-weight: 200;"><?php echo $baris["bawah"]; ?></span>
								</div>
							</div>
					</div>
					<div>
					<?php 
					 $sql = "SELECT * FROM banner where id='2'";
						$hasil = mysqli_query($connection, $sql);
						$baris = mysqli_fetch_assoc($hasil);
					?>	 
							<img style="width: 972px; height: 264px;" src="<?php echo $baris["banner"]; ?>"/>
							<div u="caption" t="MCLIP|B" style="position: absolute; top: 203px; left: 4px;Width: 489px; height: 50px;">
								<div style="position: absolute; top: 0px; left: 0px; width: 489px; height: 50px;
									background-color: #1a425a; ">
								</div>
								<div style="position: absolute; top: 0px; left: 0px; width: 489; height: 50px;
									color: White; font-size: 20px; font-weight: bold;  text-align: Left;">
									<span><?php echo $baris["title"]; ?></span></br>
									<span style="font-size: 14px; font-weight: 200;"><?php echo $baris["bawah"]; ?></span>
								</div>
							</div>
					</div>
					<div>
					 <?php 
					 $sql = "SELECT * FROM banner where id='3'";
						$hasil = mysqli_query($connection, $sql);
						$baris = mysqli_fetch_assoc($hasil);
					?>	 
					<img style="width: 972px; height: 264px;" src="<?php echo $baris["banner"]; ?>"/>
							<div u="caption" t="MCLIP|B" style="position: absolute; top: 203px; left: 4px;Width: 489px; height: 50px;">
								<div style="position: absolute; top: 0px; left: 0px; width: 489px; height: 50px;
									background-color: #1a425a; ">
								</div>
								<div style="position: absolute; top: 0px; left: 0px; width: 489; height: 50px;
									color: White; font-size: 20px; font-weight: bold;  text-align: Left;">
									<span><?php echo $baris["title"]; ?></span></br>
									<span style="font-size: 14px; font-weight: 200;"><?php echo $baris["bawah"]; ?></span>
								</div>
							</div>
					</div>
					</div>
 			</div>
			<!-- Jssor Slider End -->