
        <?php
        class Thesaurus {
            private $thesaurusData;

            public function __construct() {
                $this->thesaurusData = array(
                    "market" => array("trade"),
                    "small" => array("little", "compact")
                );
            }

            public function getSynonyms($word) {
                if (array_key_exists($word, $this->thesaurusData)) {
                    $synonyms = $this->thesaurusData[$word];
                } else {
                    $synonyms = array();
                }

                $result = array(
                    "word" => $word,
                    "synonyms" => $synonyms
                );

                return json_encode($result);
            }
        }

        $thesaurus = new Thesaurus();
        echo $thesaurus->getSynonyms("small");
        echo $thesaurus->getSynonyms("asleast");
        ?>
