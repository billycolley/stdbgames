<?php
namespace App\Controllers;
use App\Models\PricesModel;
use CodeIgniter\Controller;

helper(['url','text','cookie']);

class Prices extends Controller{
	public function pricehistory($gameid){
		$price = new PricesModel();
		$data['price'] = $price->getPrices($gameid);

		return view('prices/pricehistory', $data);
	}
	public function price(){
		return view('prices/price');
	}
	public function pricehistoryaddon($addonid){
		$price = new PricesModel();
		$data['price'] = $price->getPricesAddons($addonid);

		return view('prices/pricehistoryaddon', $data);
	}
	public function newprice(){
		$price = new PricesModel();
		$data['Price'] = $this->request->getVar('Price');
		$data['Date'] = $this->request->getVar('Date');
		if($this->request->getVar('Datetill') != NULL){
			$data['Datetill'] = $this->request->getVar('Datetill');
		} else {
			$data['Datetill'] = date('Y-m-d', strtotime($data['Date'].'+7 days'));
		}
		$data['Discounttype'] = $this->request->getVar('Discounttype');
		$data['Gameid'] = $this->request->getVar('Gameid');
		$price->newPrice($data);

		return redirect()->to(session('current_url'));
	}
	public function deleteprice($priceid){
		$delete = new PricesModel();
		$delete->deletePrice($priceid);

		return redirect()->to(session('current_url'));
	}
	public function newpriceaddon(){
		$price = new PricesModel();
		$slug = $this->request->getVar('Slug');
		$data['Price'] = $this->request->getVar('Price');
		$data['Date'] = $this->request->getVar('Date');
		$data['Discounttype'] = $this->request->getVar('Discounttype');
		$data['Addonid'] = $this->request->getVar('Addonid');
		$price->newPriceAddon($data);

		return redirect()->to('/addons/addon/'.$slug);
	}
}

 ?>
