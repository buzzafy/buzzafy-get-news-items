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

            
 
    foreach ($content->items as $catid => $item) {
    
       
 
      // the category id, news items will have this id, you can use  this, or save it to your database
      $maincatID = $catid; 
      
      // the main category name, you can use  this, or save it to your database 
      $maincatname = $item->catname;

                        /* EG, 
                        insert into DB table categories
                        id = $maincatID
                        belongsto = 0
                        name = $maincatname                        
                        */      
 
                 
                
                /* are there any children of the main category ? */
                if(!empty($item->subcats)){

                    

                    foreach ($item->subcats as $subid => $subcatname) {

                   
                        // the sub category id, news items will have this sub cat id, you can use  this, or save it to your database 
                        $subcatID = $subid;
                        
                         // the sub category name, you can use  this, or save it to your database 
                        $subcatname = $subcatname;
                        
                        /* EG, 
                        insert into DB table categories
                        id = $subcatID
                        belongsto = $maincatID
                        name = $subcatname                        
                        */



                    }
                }
            }
}
