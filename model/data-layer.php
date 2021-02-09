<?php

/* model/data-layer.php
 * returns data for my app
 *
 */

/** getMeals() returns an array of meals
 * @return meals array
 */
function getMeals()
{
    return array("breakfast", "2nd breakfast", "lunch", "dinner");
}

/** getCondiments() returns an array of condiments
 * @return condiments array
 */
function getCondiments()
{
    return array("ketchup", "mustard", "kimchi", "sriracha", "mayo");
}