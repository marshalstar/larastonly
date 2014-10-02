<?php

session_start();

require_once 'vendor/autoload.php';

Facebook\FacebookSession::setDefaultApplication('647197332061835', '3297885bee442af646f5729346818b2a');

$facebook = new Facebook\FacebookRedirectLoginHelper('http://localhost:8000/facebook');

try{
	if($session = $facebook->getSessionFromRedirect()) {
		$_SESSION['facebook'] = $session->getToken();
		//header('Location: views/fbteste.php');
	}
} catch(Facebook\FacebookRequestException $e) {

} catch (\Exeption $e) {

}

?>

<html>

<head></head>

<body>
	<?php if(!isset($_SESSION['facebook'])) { ?>
		<a href="<?php echo $facebook->getLoginUrl(); ?>"> Logar com o Facebook </a> 
	<?php } else { ?> 
		<p>Voce esta logado. </p><a href="facebook/singout">Sair</a>
	<?php } ?>

	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/pt_PT/sdk.js#xfbml=1&appId=647197332061835&version=v2.0";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
</body>

</html>