<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Image
 *
 * @author Tech
 */
class Image extends CFormModel {
        
        public $file;
        public $name;
        //public $mime_type;
        //public $size;
        //public $filename;


        /**
         * Declares the validation rules.
         * The rules state that username and password are required,
         * and password needs to be authenticated.
         */
        public function rules()
        {
                return array(
                        //array('file', 'required'),
                        //array('file', 'file'),
                        array('file', 'file', 'allowEmpty'=>false, 'types'=>'jpg, jpeg, gif, png', 'maxFiles'=>'1',
                            ),
                );
        }

        /**
         * Declares attribute labels.
         */
        public function attributeLabels()
        {
                return array(
                        'file'=>'Select Image File',
                );
        }
}

?>
