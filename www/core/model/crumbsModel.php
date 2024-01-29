<?
    /**
     * Класс хлебных крошек
     */
    class crumbs
    {

        private $crumbs = [];
        private $delimiter = '';
        private $crumbClass = 'bcrumb';

        public function delimiter ( $delimiter ) {

            $this->delimiter = $delimiter;

        }

        public function crumbClass ( $class ) {

            $this->crumbClass = $class;

        }

        public function addCrumb ( $name, $link = '' ) {

            array_push( $this->crumbs, [ $name, $link ] );

        }
        
        public function __invoke () {

            $result = '';
            $crumbs = [];
            $delimiter = '<span class="bcrumb-delimiter">' . $this->delimiter . '</span>';

            foreach ( $this->crumbs as list( $name, $link ) ) {

                if ( $link == '' ){

                    array_push( $crumbs, '<span class="' . $this->crumbClass . '">' . $name . '</span>' );

                }
                else {

                    array_push( $crumbs, '<span class="' . $this->crumbClass . '"><a href="' . $link . '">' . $name . '</a></span>' );

                }

            }

            return implode( $delimiter, $crumbs );

        }

    }