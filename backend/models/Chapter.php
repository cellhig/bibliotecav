<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "chapter".
 *
 * @property integer $id
 * @property string $name
 * @property string $pdf_url
 * @property integer $book_id
 *
 * @property Book $book
 */
class Chapter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $pdfFile;

    public static function tableName()
    {
        return 'chapter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['book_id'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['pdf_url'], 'string', 'max' => 255],
            [['pdfFile'], 'file','extensions' => 'pdf', 'on' => ['insert', 'update']],
            [['book_id'], 'exist', 'skipOnError' => true, 'targetClass' => Book::className(), 'targetAttribute' => ['book_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'pdf_url' => 'Pdf Url',
            'book_id' => 'Book ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBook()
    {
        return $this->hasOne(Book::className(), ['id' => 'book_id']);
    }
}
