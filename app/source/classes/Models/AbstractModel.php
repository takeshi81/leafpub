<?php
/**
 * Leafpub: Simple, beautiful publishing. (https://leafpub.org)
 *
 * @link      https://github.com/Leafpub/leafpub
 * @copyright Copyright (c) 2017 Leafpub Team
 * @license   https://github.com/Leafpub/leafpub/blob/master/LICENSE.md (GPL License)
 */

namespace Leafpub\Models;

use Leafpub\Leafpub;

abstract class AbstractModel implements ModelInterface {
    
    abstract protected static function getModel();

    public static function truncate(){
        if (!Session::isRole(['owner', 'admin'])){
            throw new \Exception('Only owner and admin are allowed to truncate tables!');
        }

        return self::getModel()->truncate();
    }
}