<?php
/*
© 1999 - 2022 Amaxwire.com

This is just an example of how you can query our categories. You will need to store these in a database yourself.
This information is fixed, and will not be changed -often-.

please contact us if you have any question
*/

define('AMAX_KEY_PUBLIC' , 'Your public api key'); //Your public api key -> https://amaxwire.com/dashboard/apikey

/* 
userlang ?
The available languages can be found at amawire.com 
We are working hard to add more in the near future. 
*/

$url = file_get_contents('https://amaxwire.com/api/get/?p='.AMAX_KEY_PUBLIC.'&receive=categories&userlang=en');


$content = json_decode($url);

if($content->status == 200){

            $catarray = $content->categories;

            

            foreach ($catarray as &$categoryname) {

                
                /* you can save $categoryname in your database */
                echo    $categoryname .'<br>';


            }


}
