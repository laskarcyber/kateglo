<?php
namespace kateglo\application\services;
/*
 *  $Id$
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the GPL 2.0. For more information, see
 * <http://code.google.com/p/kateglo/>.
 */
use kateglo\application\utilities\collections;
use kateglo\application\configs;
/**
 *  
 * 
 * @package kateglo\application\services
 * @license <http://www.gnu.org/licenses/old-licenses/gpl-2.0.html> GPL 2.0
 * @link http://code.google.com/p/kateglo/
 * @since 2009-11-10
 * @version 0.0
 * @author  Arthur Purnama <arthur@purnama.de>
 * @copyright Copyright (c) 2009 Kateglo (http://code.google.com/p/kateglo/)
 */
class Lucene implements interfaces\Lucene {
	
	public static $CLASS_NAME = __CLASS__;
	
	/**
	 * 
	 * @var kateglo\application\utilities\interfaces\Configs
	 */
	private $configs;
	
	/**
	 *
	 * @params kateglo\application\utilities\interfaces\Configs $configs
	 * @return void
	 * 
	 * @Inject
	 */
	public function setConfigs(configs\interfaces\Configs $configs){
		$this->configs = $configs;
	}
	
	/**
	 * 
	 * @param string $searchText
	 * @return kateglo\application\utilities\collections\ArrayCollection
	 */
	public function lemma($searchText){
		$index = \Zend_Search_Lucene::open(INDEX_PATH.$this->configs->get()->index->lemma);
		\Zend_Search_Lucene_Search_QueryParser::setDefaultEncoding('UTF-8');
		$query = \Zend_Search_Lucene_Search_QueryParser::parse($searchText);
		$result = new collections\ArrayCollection($index->find($query));
		return $result;
	}
	
	/**
	 * 
	 * @param string $searchText
	 * @param int $offset
	 * @param int $count
	 * @return kateglo\application\utilities\collections\ArrayCollection
	 */
	public function lemmaPaginated($searchText, $offset, $count){
		$result = new collections\ArrayCollection(iterator_to_array(new LimitIterator($this->lemma($searchText)->getIterator(), $offset, $count)));
		return $result;
	}
	
	/**
	 * 
	 * @param string $searchText
	 * @return kateglo\application\utilities\collections\ArrayCollection
	 */
	public function glossary($searchText){
		$index = \Zend_Search_Lucene::open(INDEX_PATH.$this->configs->get()->index->glossary);
		\Zend_Search_Lucene_Search_QueryParser::setDefaultEncoding('UTF-8');
		$query = \Zend_Search_Lucene_Search_QueryParser::parse($searchText);
		$result = new collections\ArrayCollection($index->find($query));
		return $result;
	}
	
	/**
	 * 
	 * @param string $searchText
	 * @param int $offset
	 * @param int $count
	 * @return unknown_type
	 */
	public function glossaryPaginated($searchText, $offset, $count){
		$result = new collections\ArrayCollection(iterator_to_array(new \LimitIterator($this->glossary($searchText)->getIterator(), $offset, $count)));
		return $result;
	}
}
?>