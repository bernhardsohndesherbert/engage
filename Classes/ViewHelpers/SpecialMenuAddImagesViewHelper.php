<?php
namespace Bwd2\Engage\ViewHelpers;

    /*                                                                        *
     * This script belongs to the FLOW3 package "Fluid".                      *
     *                                                                        *
     * It is free software; you can redistribute it and/or modify it under    *
     * the terms of the GNU Lesser General Public License as published by the *
     * Free Software Foundation, either version 3 of the License, or (at your *
     * option) any later version.                                             *
     *                                                                        *
     * This script is distributed in the hope that it will be useful, but     *
     * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHAN-    *
     * TABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU Lesser       *
     * General Public License for more details.                               *
     *                                                                        *
     * You should have received a copy of the GNU Lesser General Public       *
     * License along with the script.                                         *
     * If not, see http://www.gnu.org/licenses/lgpl.html                      *
     *                                                                        *
     * The TYPO3 project - inspiring people to share!                         *
     *                                                                        */



class SpecialMenuAddImagesViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper
{

    /**
     * Renders the image from page properties
     *
     * @param array $page
     * @return void
     * @author bwd2 (Bernhard Wendt)
     *
     */


    public function render($page) {

        $output = $this->renderChildren();

        return $output;
    }
}