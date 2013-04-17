<?php

class UploadController extends Controller
{
        //public $tmpPath = "/../images/uploads/tmp/";
        //public $IMGPUBLICPATH = "/images/uploads/tmp/";
        
        public function actionIndex()
	{
		$this->render('index');
	}
        
        public function actionUpload(){
            //Yii::import( "xupload.models.XUploadForm" );
    //Here we define the paths where the files will be stored temporarily
    $path = realpath( Yii::app( )->getBasePath( )."/../images/uploads/tmp/" )."/";
    $publicPath = Yii::app( )->getBaseUrl( )."/images/uploads/tmp/";
    //$testPath = realpath(Yii::app()->getBasePath().);
 
    //This is for IE which doens't handle 'Content-type: application/json' correctly
    header( 'Vary: Accept' );
    if( isset( $_SERVER['HTTP_ACCEPT'] ) 
        && (strpos( $_SERVER['HTTP_ACCEPT'], 'application/json' ) !== false) ) {
        header( 'Content-type: application/json' );
    } else {
        header( 'Content-type: text/plain' );
    }
 
    //Here we check if we are deleting and uploaded file
    /*if( isset( $_GET["_method"] ) ) {
        if( $_GET["_method"] == "delete" ) {
            if( $_GET["file"][0] !== '.' ) {
                $file = $path.$_GET["file"];
                if( is_file( $file ) ) {
                    unlink( $file );
                    Yii::app( )->user->setState( 'images', null );
                }
            }
            echo json_encode( true );
        }
    } else { */
        $model = new Image();
        $model->file = CUploadedFile::getInstance( $model, 'file' );
        //We check that the file was successfully uploaded
        if( $model->file !== null ) {
            //Grab some data
            //$model->mime_type = $model->file->getType( );
            //$model->size = $model->file->getSize( );
            $model->name = $model->file->getName( );
            //(optional) Generate a random name for our file
            $filename = md5( Yii::app( )->user->id.microtime( ).$model->name);
            $filename .= ".".$model->file->getExtensionName( );
            if( $model->validate( ) ) {
                //check to make sure the directory is available
                if($path == "/"){
                    throw new CHttpException( 500, "Application Error. Contact Admin Error:Path does not exist".$path);
                }
                //Move our file to our temporary dir
                else{
                   $model->file->saveAs( $path.$filename );
                   chmod( $path.$filename, 0777 );
                   //here you can also generate the image versions you need 
                //using something like PHPThumb
                    $file=$path.$filename;
                    $img = Yii::app()->simpleImage->load($file);
                    $img->resizeToWidth(100);
                    $img->save($path.$model->name);
                }
                
 
                //Now we need to save this path to the user's session
                if( Yii::app( )->user->hasState( 'images' ) ) {
                    $userImages = Yii::app( )->user->getState( 'images' );
                } else {
                    $userImages = array();
                }
                 $userImages[] = array(
                    "path" => $path.$filename,
                    "thumb" => $path.$model->name,
                    //the same file or a thumb version that you generated
                    //"thumb" => $publicPath."thumbs".$filename,
                    "filename" => $filename,
                    //'size' => $model->size,
                    "fileExt" => $model->file->getExtensionName(),
                    "name" => $model->name,
                );
                Yii::app( )->user->setState( 'images', $userImages );
 
                //Now we need to tell our widget that the upload was succesfull
                //We do so, using the json structure defined in
                // https://github.com/blueimp/jQuery-File-Upload/wiki/Setup
                echo json_encode( array(
                        "status"=>"OK",
                        "name" => $model->name,
                        //"type" => $model->mime_type,
                       // "size" => $model->size,
                        "url" => $publicPath.$model->name,
                        "thumbnail_url" =>$publicPath."thumbs/".$filename,
                        "delete_url" => $this->createUrl( "upload/delete", array(
                            //"_method" => "delete",
                            "file" => $model->name,
                            "tmpfile"=>$filename,
                        ) ),
                        "delete_type" => "POST"
                    ) );
            } else {
                //If the upload failed for some reason we log some data and let the widget know
               echo json_encode(
                    array("status"=>"ERROR", "errorMessage"=>$model->getError( 'file' )));
                    
                //) );
                //Yii::log( "XUploadAction: ".CVarDumper::dumpAsString( $model->getErrors( ) ),
                 //   CLogger::LEVEL_ERROR, "xupload.actions.XUploadAction" 
               // );
            }
        } else {
            throw new CHttpException( 500, "Could not upload file" );
        }
    }

        public function getTmpPath(){
            $tmpPath = realpath( Yii::app( )->getBasePath( ).$this->tmpPath).'/';
            return $tmpPath;
        }
        public function getSavePath(){
            $savePath = realpath( Yii::app( )->getBasePath( ).$this->savePath).'/';
            return $savePath;
        }
        
        public function actionDelete (){
            if(isset($_GET['file']))
		{
                $path = realpath( Yii::app( )->getBasePath( )."/../images/uploads/tmp/")."/";
                
                //$publicPath = Yii::app( )->getBaseUrl( ).$this->IMGPUBLICPATH;
                          $name = $_GET['file'];
                          $tmpname = $_GET['tmpfile'];
                          $file = $path.$name;
                          $tmpfile = $path.$tmpname;
                          if( is_file( $file )&& is_file($tmpfile)) {
                                unlink( $file );
                                unlink( $tmpfile );
                                Yii::app( )->user->setState( 'images', null );
                            }
                            if(Yii::app()->request->isAjaxRequest){
                                 echo CJSON::encode(array(
                                     'status'=>'success',
                                     'data'=>'file deleted',
                                 ));
                                 Yii::app()->end();
                            }
		
                else{
                   if(Yii::app()->request->isAjaxRequest){ 
                    echo CJSON::encode(array(
                            'status'=>'error',
                            'data'=>'appllication error',
                    ));
                    }
                } 
                }
        }
        
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}