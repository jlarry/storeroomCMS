<?php

                $this->widget( 'xupload.XUpload', array(
                'url' => Yii::app( )->createUrl( "users/upload"),
                //our XUploadForm
                'model' => $photo,
                //We set this for the widget to be able to target our own form
                'htmlOptions' => array('id'=>'photo-form'),
                'attribute' => 'file',
                'multiple' => true,
                //Note that we are using a custom view for our widget
                //Thats becase the default widget includes the 'form' 
                //which we don't want here
                //'formView' => 'application.views.users._form',
                )    
            );
?>
