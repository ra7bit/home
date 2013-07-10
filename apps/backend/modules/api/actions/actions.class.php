<?php

/**
 * api actions.
 *
 * @package    home
 * @subpackage api
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class apiActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('default', 'module');
  }
  
  public function executeLoadPic(sfWebRequest $request){
  	$num = $request->getParameter("num");
  	$this->pictures = Doctrine_Core::getTable("Picture")->getHomePicture($num);
  }
  
  public function executeLoadClassify(sfWebRequest $request){
  	$classfies = Doctrine_Core::getTable("Classify")->getAllClassifies();
  	$this->classifiesStr = "";
  	foreach ($classfies as $c){
  		$this->classifiesStr .= '{"id":"'.$c->getId().'", "name":'.'"'.$c->getName().'"},';
  	}
  	
  	$this->classifiesStr = substr($this->classifiesStr, 0, strlen($this->classifiesStr) - 1);
  }
  
  public function executeLoadClassifyPic(sfWebRequest $request){
  	$classifyId = $request->getParameter("classifyId");
  	$num = $request->getParameter("num");
  	$this->pictures = Doctrine_Core::getTable("Picture")->getClassifyPicture($classifyId, $num);
  }
  
  public function executeLoadClassifyAndStylePic(sfWebRequest $request){
  	$classifyId = $request->getParameter("classifyId");
  	$style = $request->getParameter("styleId");
  	$num = $request->getParameter("num");
  	$this->pictures = Doctrine_Core::getTable("Picture")->getClassifyAndStylePicture($classifyId, $style, $num);
  }
  
  public function executeLoadRecomPic(sfWebRequest $request){
  	$num = $request->getParameter("num");
  	$this->pictures = Doctrine_Core::getTable("Picture")->getRecomPicture($num);
  }
  
  public function executeLogin(sfWebRequest $request){
  	
  	$username = $request->getParameter("username");
  	$password = $request->getParameter("password");
  	if($username == null || $password == null || $username == "" || $password == ""){
  		$this->result = '"result":"-1"';
  	}
  	$user = Doctrine_Core::getTable("User")->getUserByNameAndPasswd($username, $password);
  	if($user == null || empty($user)){
  		$this->result = '"result":"-1"';
  	}
  	else {
  		$this->result = '"result":"'.$user->getId().'"';
  	}
  }
  
  public function executeRegister(sfWebRequest $request){
  	$email = $request->getParameter("email");
  	$username = $request->getParameter("username");
  	$password = $request->getParameter("password");
  	
  	if(empty($email) || empty($username) || empty($password) || $email == null || $username == null || $password == null){
  		$this->result = '"result":"-1"';
  	}
  	else{
	  	$user = Doctrine_Core::getTable("User")->getUserByName($username);
	  	if(!empty($user) || $user != null){
	  		$this->result = '"result":"-1"';
	  	}
	  	
	  	else{
	  		$user = new User();
	  		$user->setName($username);
	  		$user->setPassword($password);
	  		$user->setEmail($email);
	  		$user->setActive(1);
	  		$user->save();
	  		$this->result = '"result":"'.$user->getId().'"';
	  	}
  	}
  }
  
  public function executeLoadStyle(sfWebRequest $request){
  	$styles = Doctrine_Core::getTable("Style")->getAllStyles();
  	$this->stylesStr = "";
  	foreach ($styles as $s){
  		$this->stylesStr .= '{"id":"'.$s->getId().'", "name":'.'"'.$s->getName().'"},';
  	}
  	
  	$this->stylesStr = substr($this->stylesStr, 0, strlen($this->stylesStr) - 1);
  }
  
  public function executeStore(sfWebRequest $request){
  	$pictureId = $request->getParameter("pictureId");
  	$userId = $request->getParameter("userId");
  	
  	if(empty($pictureId) || empty($userId) || $pictureId == null || $userId == null){
  		$this->result = '"result":"-1"';
  	}
  	else {
  		$userPicture = Doctrine_Core::getTable("UserPicture")->getObject($userId, $pictureId, "store");
  		if(empty($userPicture) || $userPicture == null){
  			$userPicture = new UserPicture();
  			$userPicture->setPicture($pictureId);
  			$userPicture->setUser($userId);
  			$userPicture->setAction("store");
  			$userPicture->save();
  		}
  		$this->result = '"result":"1"';
  	}
  }
  
  public function executeFavour(sfWebRequest $request){
    $pictureId = $request->getParameter("pictureId");
  	$userId = $request->getParameter("userId");
  	
  	if(empty($pictureId) || empty($userId) || $pictureId == null || $userId == null){
  		$this->result = '"result":"-1"';
  	}
  	else {
  		$userPicture = Doctrine_Core::getTable("UserPicture")->getObject($userId, $pictureId, "favour");
  		if(empty($userPicture) || $userPicture == null){
  			$userPicture = new UserPicture();
  			$userPicture->setPicture($pictureId);
  			$userPicture->setUser($userId);
  			$userPicture->setAction("favour");
  			$userPicture->save();
  		}
  		$this->result = '"result":"1"';		
  	}
  }
}
