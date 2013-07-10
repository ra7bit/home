<?php

/**
 * Picture form base class.
 *
 * @method Picture getObject() Returns the current form's model object
 *
 * @package    home
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePictureForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'name'        => new sfWidgetFormTextarea(),
      'src'         => new sfWidgetFormTextarea(),
      'isidea'      => new sfWidgetFormInputText(),
      'classify_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Classify'), 'add_empty' => false)),
      'style_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Style'), 'add_empty' => false)),
      'city_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('City'), 'add_empty' => false)),
      'active'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'        => new sfValidatorString(array('max_length' => 500)),
      'src'         => new sfValidatorString(array('max_length' => 500)),
      'isidea'      => new sfValidatorInteger(array('required' => false)),
      'classify_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Classify'))),
      'style_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Style'))),
      'city_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('City'))),
      'active'      => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('picture[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Picture';
  }

}
