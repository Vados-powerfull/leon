<?
    /**
     * Модель работы с таблицей pages
     */
    class tPage
    {
        private $id;
        private $metaTitle;
        private $metaDescription;
        private $metaKeywords;
        private $pageTitle;
        private $pageText;
        private $sysName;
        private $ordering;
        
        public function __construct($sysname = '')
        {
            if($sysname != ''){
                $page = mqo("SELECT * FROM pages WHERE sys_name = ?",[$sysname]);
                if($page){
                    $this->id = $page['id'];
                    $this->metaTitle = $page['meta_title'];
                    $this->metaDescription = $page['meta_desc'];
                    $this->metaKeywords = $page['meta_key'];
                    $this->pageTitle = $page['page_title'];
                    $this->pageText = $page['page_text'];
                    $this->sysName = $page['sys_name'];
                    $this->ordering = $page['ordering'];
                    return true;
                }
                else return false;
            }
        }
        
        public function getId(){
            return $this->id;
        }
        public function getMetaTitle(){
            return $this->metaTitle;
        }
        public function getMetaDescription(){
            return $this->metaDescription;
        }
        public function getMetaKeyword(){
            return $this->metaKeywords;
        }
        public function getPageTitle(){
            return $this->pageTitle;
        }
        public function getPageText(){
            return $this->pageText;
        }
        public function getSysName(){
            return $this->sysName;
        }
        public function getOrdering(){
            return $this->ordering;
        }
    }