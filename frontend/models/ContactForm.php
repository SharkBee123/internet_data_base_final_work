<?php

/**
 * Team: 啊对对队
 * Coding by 蔡鸿 2212989, 20241220
 * 联系我们php
 */

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\Contact;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $subject;
    public $body;
    public $verifyCode;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'subject', 'body'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }

     /**
     * Creates a new contact based on the provided attributes.
     *
     * @return bool whether the creating new contact was successful and saved.
     */
    public function createContact()
    {
        $contact = new Contact();
    
        $contact->name = $this->name;
        
        $contact->email = $this->email;

        $contact->subject = $this->subject;

        $contact->body = $this->body;

        return $contact->save(false); // We skip validation here because we've already validated in this model
    }
}
