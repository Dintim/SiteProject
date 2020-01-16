<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property int|null $id
 * @property string $title
 * @property string|null $content
 * @property string|null $created_at
 * @property string|null $author
 * @property string|null $img
 */
class Post extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title'], 'required'],
            [['title', 'created_at', 'author', 'anounce'], 'string', 'max' => 255],
            [['content'], 'string', 'max' => 10000],
            ['file_name', 'string'],
            [['file'], 'file'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'anounce' => 'Anounce',
            'content' => 'Content',
            'created_at' => 'Created at',
            'author' => 'Author',
            'file_name' => 'File name',
        ];
    }
}
