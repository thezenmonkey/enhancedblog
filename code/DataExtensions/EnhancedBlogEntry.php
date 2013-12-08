<?php

class EnhancedBlogEntry extends DataExtension {
	
	private static $db = array(
		"Summary" => "HTMLText"
	);
	
	private static $has_one = array(
		"FeatureImage" => "Image",
		"AuthorMember" => "Member"
	);
	
	private static $has_many = array(
		
	);
	
	public function updateCMSFields(FieldList $fields) {
		
		$group = Group::get()
			->filter(array('code' => BlogEntry::config()->defaultGroup))
			->first();
		
		$contentAuthors = $group->Members()->map('ID', 'Title');
		
		$fields->insertAfter(HTMLEditorField::create("Summary")->setRows(4), "Content");
		$fields->insertAfter(UploadField::create("FeatureImage"), "Summary");
		$fields->insertAfter(DropdownField::create('AuthorMemberID', 'Author (Member)', $contentAuthors)->setEmptyString('(Select one)'),'Date');
		$fields->removeByName('Author');
		$fields->insertAfter(TextField::create('Author', "Guest Author"), "AuthorMemberID");
	}
}