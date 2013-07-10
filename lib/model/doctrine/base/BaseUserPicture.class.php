<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('UserPicture', 'doctrine');

/**
 * BaseUserPicture
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $user_id
 * @property integer $picture_id
 * @property string $action
 * @property User $User
 * @property Picture $Picture
 * 
 * @method integer     getId()         Returns the current record's "id" value
 * @method integer     getUserId()     Returns the current record's "user_id" value
 * @method integer     getPictureId()  Returns the current record's "picture_id" value
 * @method string      getAction()     Returns the current record's "action" value
 * @method User        getUser()       Returns the current record's "User" value
 * @method Picture     getPicture()    Returns the current record's "Picture" value
 * @method UserPicture setId()         Sets the current record's "id" value
 * @method UserPicture setUserId()     Sets the current record's "user_id" value
 * @method UserPicture setPictureId()  Sets the current record's "picture_id" value
 * @method UserPicture setAction()     Sets the current record's "action" value
 * @method UserPicture setUser()       Sets the current record's "User" value
 * @method UserPicture setPicture()    Sets the current record's "Picture" value
 * 
 * @package    home
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseUserPicture extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('user_picture');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => true,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('user_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => true,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('picture_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => true,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('action', 'string', 100, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => 'share',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 100,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('User', array(
             'local' => 'user_id',
             'foreign' => 'id'));

        $this->hasOne('Picture', array(
             'local' => 'picture_id',
             'foreign' => 'id'));
    }
}