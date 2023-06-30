<?php
    class RankingTable {
        private $players;
        private $results;
    
        public function __construct(array $players) {
            $this->players = $players;
            $this->results = [];
        }
    
        public function recordResult($player, $score) {
            if (!isset($this->results[$player])) {
                $this->results[$player] = ['score' => 0, 'gamesPlayed' => 0];
            }
    
            $this->results[$player]['score'] += $score;
            $this->results[$player]['gamesPlayed']++;
        }
    
        public function playerRank($rank) {
            $sortedResults = $this->sortResults();
    
            $player = array_search($rank, array_column($sortedResults, 'rank'));
            if ($player !== false) {
                return $this->players[$player];
            }
    
            return null;
        }
    
        private function sortResults() {
            uasort($this->results, function ($a, $b) {
                if ($a['score'] === $b['score']) {
                    if ($a['gamesPlayed'] === $b['gamesPlayed']) {
                        return 0;
                    }
                    return $a['gamesPlayed'] > $b['gamesPlayed'] ? -1 : 1;
                }
                return $a['score'] > $b['score'] ? 1 : -1;
            });

            $rank = 1;
            foreach ($this->results as &$result) {
                $result['rank'] = $rank++;
            }
            
            $this->results = array_reverse($this->results, true);
            return $this->results;
        }
    }

    $table = new RankingTable(array('Jan', 'Maks', 'Monika'));
    $table->recordResult('Jan', 2);
    $table->recordResult('Maks', 3);
    $table->recordResult('Monika', 5);
    echo $table->playerRank(1); 
?>