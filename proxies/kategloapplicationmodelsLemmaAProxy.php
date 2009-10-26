<?php
namespace kateglo\proxies {
    /**
     * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
     */
    class kategloapplicationmodelsLemmaAProxy extends \kateglo\application\models\Lemma implements \Doctrine\ORM\Proxy\Proxy {
        private $_em;
        private $_assoc;
        private $_owner;
        private $_joinColumnValues;
        private $_loaded = false;
        public function __construct($em, $assoc, $owner, array $joinColumnValues) {
            $this->_em = $em;
            $this->_assoc = $assoc;
            $this->_owner = $owner;
            $this->_joinColumnValues = $joinColumnValues;
            parent::__construct();
        }
        private function _load() {
            if ( ! $this->_loaded) {
                $this->_assoc->load($this->_owner, $this, $this->_em, $this->_joinColumnValues);
                unset($this->_em);
                unset($this->_owner);
                unset($this->_assoc);
                unset($this->_joinColumnValues);
                $this->_loaded = true;
            }
        }
        public function __isInitialized__() { return $this->_loaded; }

        
        public function getId() {
            $this->_load();
            return parent::getId();
        }

        public function setLemma($lemma) {
            $this->_load();
            return parent::setLemma($lemma);
        }

        public function getLemma() {
            $this->_load();
            return parent::getLemma();
        }

        public function setSyllabel(\kateglo\application\models\Syllabel $syllabel) {
            $this->_load();
            return parent::setSyllabel($syllabel);
        }

        public function getSyllabel() {
            $this->_load();
            return parent::getSyllabel();
        }

        public function addType(\kateglo\application\models\Type $type) {
            $this->_load();
            return parent::addType($type);
        }

        public function removeType(\kateglo\application\models\Type $type) {
            $this->_load();
            return parent::removeType($type);
        }

        public function getTypes() {
            $this->_load();
            return parent::getTypes();
        }

        public function addDefinition(\kateglo\application\models\Definition $definition) {
            $this->_load();
            return parent::addDefinition($definition);
        }

        public function removeDefinition(\kateglo\application\models\Definition $definition) {
            $this->_load();
            return parent::removeDefinition($definition);
        }

        public function getDefinitions() {
            $this->_load();
            return parent::getDefinitions();
        }

        public function addGlossary(\kateglo\application\models\Glossary $glossary) {
            $this->_load();
            return parent::addGlossary($glossary);
        }

        public function removeGlossary(\kateglo\application\models\Glossary $glossary) {
            $this->_load();
            return parent::removeGlossary($glossary);
        }

        public function getGlossaries() {
            $this->_load();
            return parent::getGlossaries();
        }

        public function addRelation(\kateglo\application\models\Relation $relation) {
            $this->_load();
            return parent::addRelation($relation);
        }

        public function removeRelation(\kateglo\application\models\Relation $relation) {
            $this->_load();
            return parent::removeRelation($relation);
        }

        public function getRelations() {
            $this->_load();
            return parent::getRelations();
        }


        public function __sleep() {
            if (!$this->_loaded) {
                throw new \RuntimeException("Not fully loaded proxy can not be serialized.");
            }
            return array('id', 'lemma', 'syllabel', 'types', 'definitions', 'glossaries', 'relations');
        }
    }
}