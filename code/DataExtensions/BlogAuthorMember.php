<?php

class BlogAuthorMember extends DataExtension {
	
	private static $db = array(
		"Bio" => "HTMLText",
		"Website" => "Varchar(255)",
		"Twitter" => "Varchar(30)",
		"Facebook" => "Varchar(255)",
		"GooglePlus" => "Varchar(255)"
	);
	
	private static $has_one = array(
		"Headshot" => "Image"
	);
	
	private static $has_many = array(
		"BlogEntries" => "BlogEntry"
	);
	
	public function updateCMSFields(FieldList $fields) {
		$fields->insertAfter(TextField::create("Website"), "Email");
		$fields->insertAfter(TextField::create("Twitter", "Twitter User Name")->setDescription("Do NOT include the '@'"), "Website");
		$fields->insertAfter(TextField::create("Facebook", "Facebook Page or Profile"), "Twitter");
		$fields->insertAfter(TextField::create("GooglePlus", "Google+ Profile"), "Facebook");
		$fields->insertAfter(UploadField::create("Headshot"), "Facebook");
		$fields->insertAfter(HTMLEditorField::create("Bio"), "Headshot");
	}
}