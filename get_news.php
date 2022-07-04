<?php
/*
© 1999 - 2022 Amaxwire.com

This is just a simple example of how you can query our news items. You will need to store these in a database yourself.


With the following url you will receive an overview of the latest news items in a json format. It is updated once every 15 minutes. You can/ access this url only once every 15 minutes.

Any photos you need to copy to your own server. Hotlinking is not allowed.

please contact us if you have any question
*/

define('AMAX_KEY_PUBLIC' , 'Your public api key'); //Your public api key -> https://amaxwire.com/dashboard/apikey



/* 
lang ?
The available languages can be found at amawire.com 
We are working hard to add more in the near future. 
*/

$url = file_get_contents('https://amaxwire.com/api/get/?p='.AMAX_KEY_PUBLIC.'&receive=news&lang=en');


$content = json_decode($url);

/* status 200 = ok */
if($content->status == 200){

    $pagetime = $content->time;// when was this last time updated?

    //handle items
    foreach ($content->items as &$item) {


        $item_id            = $item->id;

        /* the above id is the id of the news item, 
        please check if this already exists in your database before inserting the new item to prevent double entries
        */

 

        $item_category      = $item->category;
        $item_publishtime   = $item->publishtime;        
        $item_featured      = $item->featured;//featured item?
        $item_title         = $item->title;
        $item_intro         = $item->intro;
        $item_text          = $item->text;
        $item_city          = $item->city;
        $item_url           = $item->url;//url added by author, for more information or company website


        if(!empty($item->images)){

            foreach ($item->images as &$imgur) {

                    /*  $imgur is an url to an image uploaded by author, 
                        Any photos you need to copy to your own server. Hotlinking is not allowed.

                        eg you can copy each image intro a seperate db table
                    */

                    
                  /* eg:
                  insert into photos
										(newsid,photourl)
                                        */

            }



        }else{

            $images = '';

        }
      

        /* you can save this data in a news db */


        /* insert into newsitem eg..
        (externalid,category,publishtime,featured,title,intro,text,city,url) */
        
     
        

    }

}


 
