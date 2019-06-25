<?php
	$config = [
		'add_article_rules' => [
			[
				'field' => 'title',
                'label' => 'Article Title',
                'rules' => 'required',
                'errors' => [
                        'required' => 'Please Enter Article Title.',
                ]
			],

			[
				'field' => 'body',
                'label' => 'Article Body',
                'rules' => 'required'
			],

			[
				'field' => 'description',
                'label' => 'Article Description',
                'rules' => 'required'
			]
		]
	]
?>