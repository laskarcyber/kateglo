<?php
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
use kateglo\application\utilities;
use kateglo\application\services\interfaces;
use kateglo\application\helpers;
use kateglo\application\faces;
use kateglo\application\daos;
/**
 *
 *
 * @package kateglo\application\controllers
 * @license <http://www.gnu.org/licenses/old-licenses/gpl-2.0.html> GPL 2.0
 * @link http://code.google.com/p/kateglo/
 * @since $LastChangedDate$
 * @version $LastChangedRevision$
 * @author  Arthur Purnama <arthur@purnama.de>
 * @copyright Copyright (c) 2009 Kateglo (http://code.google.com/p/kateglo/)
 */
class EntryController extends Zend_Controller_Action_Stubbles {
	
	/**
	 * 
	 * Enter description here ...
	 * @var kateglo\application\services\interfaces\Entry;
	 */
	private $entry;
	
	/**
	 * 
	 * Enter description here ...
	 * @var kateglo\application\faces\interfaces\Search;
	 */
	private $search;
	
	/**
	 * 
	 * Enter description here ...
	 * @param kateglo\application\services\interfaces\Entry $entry
	 * 
	 * @Inject
	 */
	public function setEntry(interfaces\Entry $entry) {
		$this->entry = $entry;
	}
	
	/**
	 * 
	 * Enter description here ...
	 * @param kateglo\application\faces\interfaces\Search $entry
	 * 
	 * @Inject
	 */
	public function setSearch(faces\interfaces\Search $search) {
		$this->search = $search;
	}
	
	public function indexAction() {
		$this->view->appPath = APPLICATION_PATH;
		$this->view->search = $this->search;
		$this->view->formAction = '/kamus';
		if ($this->_request->isGet ()) {
			$text = urldecode ( $this->_request->getParam ( helpers\RouteParameter::TEXT ) );
			if ($text !== '') {
				$this->view->search->setFieldValue ( $text );
				$this->view->entry = $this->entry->getEntry ( $text );
			}
		} else {
			header ( 'location: ' . $this->_request->getBaseUrl () );
		}
	}
}
?>