<?php

/**
 * Picture filter form base class.
 *
 * @package    home
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePictureFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'src'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'isidea'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'classify_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Classify'), 'add_empty' => true)),
      'style_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Style'), 'add_empty' => true)),
      'city_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('City'), 'add_empty' => true)),
      'active'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'name'        => new sfValidatorPass(array('required' => false)),
      'src'         => new sfValidatorPass(array('required' => false)),
      'isidea'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'classify_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Classify'), 'column' => 'id')),
      'style_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Style'), 'column' => 'id')),
      'city_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('City'), 'column' => 'id')),
      'active'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('picture_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Picture';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'name'        => 'Text',
      'src'         => 'Text',
      'isidea'      => 'Number',
      'classify_id' => 'ForeignKey',
      'style_id'    => 'ForeignKey',
      'city_id'     => 'ForeignKey',
      'active'      => 'Number',
    );
  }
}
