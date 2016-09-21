<?php @ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '500' );

$submit = $_REQUEST['submit']; $devicetype = $_REQUEST['devicetype']; $pseudo_device_udid = $_REQUEST['pseudo_device_udid'];
$username = $_REQUEST['username'];
if(isset($submit) && $submit == 1){
      $temppath = $_FILES['png']['tmp_name']; $temppath2=$temppath;
    $filenamewithextension = uniqid(true) . '.png';//$_FILES['gif']['name'];
//echo $filenamewithextension;
    $fullurl = 'https://s3-us-west-1.amazonaws.com/giftgami/'.$filenamewithextension;
    $thumbname = 'thumb_'.$filenamewithextension;
    $urlthumb = 'https://s3-us-west-1.amazonaws.com/giftgami/'.$thumbname;
    echo $fullurl;//. ' =fullurl | '. sys_get_temp_dir(). ' | temppath= '.$temppath;
        require_once('s3.upload.php');

        UploadS3('giftgami',$filenamewithextension,$temppath);

        require_once('crop.img.php');
        echo $temppath2;
        makeThumb($temppath2);

        UploadS3('giftgami',$thumbname,$temppaththumb);

        require_once('/opt/app-root/src/_c0nn.php');
        //mysql_select_db('snapglasses');
        require_once('/opt/app-root/src/fn_mysql.php');
        $query = mins('snaps',array('url','username','url_thumb'),array($fullurl,$username,$urlthumb));
        mysql_query($query);

}else {  ?>
        <form enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="POST">
            <input type ="hidden" name="width" value="10" />
            <input type = "hidden" name = "devicetype" value = "browser <?php echo $_SERVER["HTTP_CLIENT_IP"] ?>" />
            <input type = "hidden" name = "pseudo_device_udid" value = "123456123456123456123456123456123456" />
            <input type = "hidden" name = "submit" value ="1" />
            <input name="png" type="file"><input type="submit" value="submit">
        </form>

<?php } ?>
