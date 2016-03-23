<?php 

/**
 * 	
 * @package Enhanced Blog Module
 * @author Richard Rudy @thezenmonkey http://designplusawesome.com
 */

class BlogTreeControllerExtension extends DataExtension
{
    
    public static $allowed_actions = array(
        'index',
        'rss',
        'tag',
        'date'
    );
    
    public function tag()
    {
        $blogName = $this->owner->Title . " - " . ucwords($this->owner->request->latestParam('ID'));
        
        if ($this->owner->request->param('Action') == 'tag' && $this->owner->request->param('OtherID') == "rss") {
            $entries = $this->owner->Entries(20, Convert::raw2xml($this->owner->request->latestParam('ID')));
            
            if ($entries) {
                $rss = new RSSFeed($entries, $this->owner->Link('rss'), $blogName, "", "Title", "RSSContent");
                return $rss->outputToBrowser();
            }
        } else {
            return $this->owner;
        }
    }
}
