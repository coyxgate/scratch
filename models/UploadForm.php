<?php
/**
 * Created by PhpStorm.
 * User: coy
 * Date: 16/4/10
 * Time: 下午12:09
 */

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $pic;

    public function rules()
    {
        return [
            [['pic'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->pic->saveAs('scratch/web/upload/' . $this->pic->baseName . '.' . $this->pic->extension);
            return true;
        } else {
            return false;
        }
    }
}

?>