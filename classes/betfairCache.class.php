<?php
/**
    Copyright Christopher Lacy-Hulbert 2009

    This file is part of Bflib.

    Bflib is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    Bflib is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with Bflib.  If not, see <http://www.gnu.org/licenses/>.
*/

/**
* Cacheing class for developer logs
*
* @author Chris Lacy-Hulbert <chris@spiration.co.uk>
*/
class betfairCache {

	// check to see if apc is installed
	// if it is, use apc methods
	// otherwise, cache to disk, but caveat security issues with that

        private $cacheHandle;
	private $cacheElements = array();
        private static $instance;

        private function __construct(){
        }

        public static function getInstance(){
                if(!isset(self::$instance)){
                        $c = __CLASS__;
                        self::$instance = new $c;
                }
                return self::$instance;
        }

        public function store( $key, $value, $ttl=120 ){
			$this->cacheElements[$key]=$value;
		return(TRUE);
        }

        public function fetch( $key ){
			if(TRUE === isset($this->cacheElements[$key])){
				return($this->cacheElements[$key]);
			}
			return(FALSE);
	}

        public function remove( $key ){
			unset($this->cacheElements[$key]);
		return(TRUE);
	}
}
?>
