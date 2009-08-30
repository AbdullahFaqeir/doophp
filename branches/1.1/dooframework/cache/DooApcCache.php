<?php
/**
 * DooApcCache class file.
 *
 * @author Leng Sheng Hong <darkredz@gmail.com>
 * @link http://www.doophp.com/
 * @copyright Copyright &copy; 2009 Leng Sheng Hong
 * @license http://www.doophp.com/license
 */


/**
 * DooApcCache provides caching methods utilizing the APC extension.
 *
 * @author Leng Sheng Hong <darkredz@gmail.com>
 * @version $Id: DooFrontCache.php 1000 2009-08-22 19:36:10
 * @package doo.cache
 * @since 1.1
 */

Doo::loadCore('cache/DooCache');

class DooApcCache extends DooCache{

    /**
     * Adds a cache with an unique Id.
     *
     * @param string $id Cache Id
     * @param mixed $data Data to be stored
     * @param int $expire Seconds to expired
     * @return bool True if success
     */
    function set($id, $data, $expire=3600){
        return apc_store($id, $data, $expire);
    }

    /**
     * Retrieves a value from cache with an Id.
     *
     * @param string A unique key identifying the cache
     * @return mixed The value stored in cache. Return false if no cache found or already expired.
     */
    public function get($id){
        return apc_fetch($id);
    }

    /**
     * Retrieves multiple cached data from a list of Ids
     * @param array List of Ids
     * @return array List of cached values
     */
    public function getValues($ids){
        return array_combine($ids,apc_fetch($ids));
    }

    /**
     * Deletes an APC data cache with an identifying Id
     *
     * @param string $id Id of the cache
     * @return bool True if success
     */
    public function flush($id){
        return apc_delete($id);
    }

    /**
     * Deletes all APC data cache
     * @return bool True if success
     */
    public function flushAll(){
        return apc_clear_cache('user');
    }

}

?>