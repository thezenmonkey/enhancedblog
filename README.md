# Enhanced Blog Module
A module to provide added functionality to the default SilverStripe Blog Module and bring it more in line with competing blogging platforms

## Requirements
* SilverStripe 3.1
* silverstripe-blog module

## Feature Overview
* Custom Summaries for Blog Entries
* Feature Image for Blog Entries
* Enhanced Authors by Extending the Member Class
** Bio, Headshot and Social Media Profiles
* RSS feeds of Tags

## Configuration Options
The module adds a has_many/has_one relation between BlogEntry and Member. The Author drop down on BlogEntry is pulled from the 'content-author' member group by default. If you only have Default Admin you'll need to make sure you add that user to the content-author group. You can use any other member group by setting defaultGroup on BlogEntry in your config.yml to the desired group code.
```yml
BlogEntry:
  defaultGroup: 'content-author'
```

## Tag RSS Feed
The rss feed of any tag can be accessed via 
http://example.com/blogHolderTitle/tag/tagName/rss/
