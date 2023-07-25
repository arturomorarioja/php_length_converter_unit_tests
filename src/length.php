<?php
/**
 * Length class
 * 
 * @author  Arturo Mora-Rioja
 * @version 1.0, February 2022
 */

    class Length {
        const METRIC = 'M';
        const IMPERIAL = 'I';

        private float $measure;
        private string $system;

        /**
         * @param   measure: numeric length measure to convert in either centimeters (metric) or inches (imperial)
         * @param   system: the measure's length system: 'M' (metric), 'I' (imperial)
         */
        function __construct(float $measure, string $system = Length::METRIC) {
            if (!in_array($system, [Length::METRIC, Length::IMPERIAL])) {
                throw new InvalidArgumentException('Invalid length system');
            } else {
                $this->measure = abs($measure);
                $this->system = $system;
            }
        }

        /**
         * @return  the conversion from either centimeters to inches or viceversa
         */
        public function convert() {
            if ($this->system == Length::METRIC) {
                return round($this->measure * 0.393701, 2);
            } else {
                return round($this->measure * 2.54, 2);
            }
        }
    }    
?>