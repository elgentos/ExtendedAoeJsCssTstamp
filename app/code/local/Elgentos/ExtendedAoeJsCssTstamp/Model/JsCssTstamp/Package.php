<?php
/**
 * Created by PhpStorm.
 * User: peterjaap
 * Date: 08/11/2016
 * Time: 09:09
 */ 
class Elgentos_ExtendedAoeJsCssTstamp_Model_JsCssTstamp_Package extends Aoe_JsCssTstamp_Model_Package {
    /**
     * Add version to js/css files
     *
     * @param string $file
     * @param array $params
     * @return string
     */
    public function getSkinUrl($file = null, array $params = array())
    {
        $result = Mage_Core_Model_Design_Package::getSkinUrl($file, $params);

        if ($this->addTstampToAssetsCss) {
            $matches = array();
            if (preg_match('/(.*)\.(css)$/i', $result, $matches)) {
                $result = $matches[1] . '.' . $this->getVersionKey() . '.' . $matches[2];
            }
        }
        if ($this->addTstampToAssetsJs) {
            $matches = array();
            if (preg_match('/(.*)\.(js)$/i', $result, $matches)) {
                $result = $matches[1] . '.' . $this->getVersionKey() . '.' . $matches[2];
            }
        }
        if ($this->addTstampToAssets) {
            $matches = array();
            if (preg_match('/(.*)\.(gif|png|jpg)$/i', $result, $matches)) {
                $result = $matches[1] . '.' . $this->getVersionKey() . '.' . $matches[2];
            }
        }

        return $result;
    }

    public function getVersionKey()
    {
        return parent::getVersionKey();
    }

    public function getAddTstampToAssetsJs()
    {
        return $this->addTstampToAssetsJs;
    }
}