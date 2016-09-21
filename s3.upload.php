<?php
 use Aws\S3\S3Client;

// testing
/*if(isset($_FILES['userfile'])){
    $filepath = $_FILES['userfile']['tmp_name'];
    $filename = 'test';
    $bucket='gnomelytargets';
}
*/

/*if(!isset($bucket)||!isset($filename)||!isset($filepath)){


    // testing
    ?>
        <form enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="POST">
            <input name="userfile" type="file"><input type="submit" value="Upload">
        </form>

    <?php
    die('bucket filename filepath needed');

}*/

require '/opt/app-root/src/aws/aws-autoloader.php';




function UploadS3($bucket,$filename,$filepath){

$s3 = new S3Client([
    'version' => 'latest',
    'region'  => 'us-west-1',
    'credentials' => [
        'key'    => 'AKIAIGA2WMEE5PCZ7PRA',
        'secret' => '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'
    ]
]);

$upload = $s3->upload($bucket, $filename, fopen($filepath,'rb'),'public-read');

return $upload;

}

//UploadS3($bucket,$filename,$filepath);
