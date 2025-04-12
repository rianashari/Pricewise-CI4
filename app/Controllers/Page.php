<?php namespace App\Controllers;
class Page extends BaseController

{

	public function home()
	{
		echo view("home");
	}
	public function login()
	{
		echo view("login");
	}
	public function register_user()
	{
		echo view("sign_up_page");
	}
	public function search()
	{
		echo view("search_page");
	}
	public function store()
	{
		echo view("store");
	}
	public function redirect_store()
	{
		echo view("redirect_store");
	}
	public function cupon_claim()
	{
		echo view("cupon_claim_store");
	}
	public function product_page()
	{
		echo view("product_page");
	}
	public function redirect_product()
	{
		echo view("redirect_product");
	}
	public function faqs()
	{

		// membuat data untuk dikirim ke view

		$data['data_faqs'] = [

			[

				'question' => 'Apa itu Codeigniter?',

				'answer' => 'Codeigniter adalah framework untuk membuat web'

			],

			[

				'question' => 'Siapa yang membuat Codeiginter?',

				'answer' => 'CI awalnya dibuat oleh Ellislab'

			],

			[

				'question' => 'Codeigniter versi berapakah yang digunakan pada tutoril ini?',

				'answer' => 'Codeigniter versi 4.0.4'

			]

		];



		// load view dengan data

		echo view("faqs", $data);

	}


}
