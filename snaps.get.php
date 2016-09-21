<?php error_reporting(E_ALL ^ E_DEPRECATED);
$username = $_REQUEST['username'];

if(!isset($username))die('username needed');

require_once('_c0nn.php'); $username=quoty($username);

$query = 'SELECT * FROM snaps WHERE username=\''.$username.'\' ORDER BY votes DESC'; //echo $query;

$result = @mysql_query($query);

while($row=mysql_fetch_assoc($result)){

$json[]=array('id'=>$row['id'] , 'url'=> $row['url'],'thumb'=>$row['url_thumb'],'caption'=>$row['caption'],'votes'=>$row['votes']);

}
if(isset($_REQUEST['json']))
  echo json_encode($json);
else{
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SnapGlass.es SnapBox</title>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <link href="https://fonts.googleapis.com/css?family=Just+Another+Hand" rel="stylesheet">
  <style>
  body {
    min-width: 750px;
    background-color: black;

    background-image: url(http://reasonerlandscaping.com/wp-content/uploads/2013/02/Wood-Background.jpg);

   /* Background image is centered vertically and horizontally at all times */
   background-position: center center;

   /* Background image doesn't tile */
   background-repeat: no-repeat;

   /* Background image is fixed in the viewport so that it doesn't move when
      the content's height is greater than the image's height */
   background-attachment: fixed;

   /* This is what makes the background image rescale based
      on the container's size */
   background-size: cover;

   padding:20px;
       font-family: 'Just Another Hand', cursive;
  }
  .bannertop{
    font-size: 48px;
    color: white;
    padding:50px;
    background-color:black;
    margin:-20px;
    margin-bottom:20px;
    font-family: 'Just Another Hand', cursive;
  }
  .column {
    width: 240px;
    float: left;
    padding-bottom: 240px;
  }
  .portlet {
    margin: 0 1em 1em 0;
    padding: 0.3em;
    font-family: 'Just Another Hand', cursive;
  }
  .portlet-header {
    padding: 0.2em 0.3em;
    position: relative;
  }
  .portlet-toggle {
    position: absolute;
    top: 50%;
    right: 0;
    margin-top: -8px;
  }
  .portlet-content {
font-family: 'Just Another Hand', cursive;
    padding: 0.2em;
    text-align: center;
  }
  .portlet-placeholder {
    border: 1px dotted black;
    margin: 0 1em 1em 0;
    height: 50px;
  }
  img{
    width: 200px;
    height: 200px;overflow:hidden;
  }
  </style>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( ".column" ).sortable({
      connectWith: ".column",
      handle: ".portlet-header",
      cancel: ".portlet-toggle",
      placeholder: "portlet-placeholder ui-corner-all"
    });

   $( ".portlet" )
      .addClass( "ui-widget ui-widget-content ui-helper-clearfix" );
    /*  .find( ".portlet-content" )
        .append( "<span class='ui-icon ui-icon-heart portlet-toggle'></span>");*/

    $( ".heart-toggle" ).on( "click", function() {
      var icon = $( this );

      if(icon.find(".ui-icon-red")){
        $.post( "http://php-mysnapglasses.0ec9.hackathon.openshiftapps.com/vote.add.php?id="+icon.closest("div").prop("id"), function( data ) {


      });

      icon.toggleClass( "ui-icon-red ui-icon-heart" );


      }
    });
  } );
  </script>
</head>
<body>

<div class="bannertop">My SnapGlass.es SnapBox x<?php echo count($json); ?></div>

<?php
for($i=0;$i<count($json);$i++){
  if($i%3==0)
    echo '<div class="column">';
?>
  <div class="portlet">
    <div class="portlet-header"><img src="<?php echo $json[$i]['thumb']; ?>" /></div>
    <div id="<?php echo $json[$i]['id'] ?>" class="portlet-content"><?php echo $json[$i]['caption']; ?><span class='ui-icon ui-icon-heart heart-toggle'></div>
  </div>
 <?php
  if($i%3==2 || $i==(count($json)-1))
    echo '</div>';
} ?>




</body>
</html>
<?php
}
