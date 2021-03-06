<?php
/**
 * CampFire Manager is a scheduling tool predominently used at BarCamps to 
 * schedule talks based, mainly, on the number of people attending each talk
 * receives.
 *
 * PHP version 5
 *
 * @category Default
 * @package  CampFireManager2
 * @author   Jon Spriggs <jon@sprig.gs>
 * @license  http://www.gnu.org/licenses/agpl.html AGPLv3
 * @link     https://github.com/CampFireManager/cfm2 Version Control Service
 */
/**
 * This class defines the facilities available in a room, which may be requested
 * when proposing a talk.
 * 
 * @category Object_Resource
 * @package  CampFireManager2
 * @author   Jon Spriggs <jon@sprig.gs>
 * @license  http://www.gnu.org/licenses/agpl.html AGPLv3
 * @link     https://github.com/CampFireManager/cfm2 Version Control Service
 */

class Object_Resource extends Abstract_GenericObject
{
    // Generic Object Requirements
    protected $arrDBItems = array(
        'strResource' => array('type' => 'varchar', 'length' => 255, 'required' => 'admin', 'render_in_sub_views' => true),
        'lastChange' => array('type' => 'datetime')
    );
    protected $arrTranslations = array(
        'label_strResource' => array('en' => 'Resource'),
    );
    protected $strDBTable = "resource";
    protected $strDBKeyCol = "intResourceID";
    protected $reqAdminToMod = true;
    // Local Object Requirements
    protected $intResourceID = null;
    protected $strResource = null;
    protected $lastChange = null;
}

/**
 * This class defines some default and demo data for the use in demos.
 * 
 * @category Object_Resource
 * @package  CampFireManager2
 * @author   Jon Spriggs <jon@sprig.gs>
 * @license  http://www.gnu.org/licenses/agpl.html AGPLv3
 * @link     https://github.com/CampFireManager/cfm2 Version Control Service
 */
class Object_Resource_Demo extends Object_Resource
{
    protected $arrDemoData = array(
        array('intResourceID' => 1, 'strResource' => 'Projector'),
        array('intResourceID' => 2, 'strResource' => 'PA'),
        array('intResourceID' => 3, 'strResource' => 'Flat Screen TV')
    );
}