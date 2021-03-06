<?php
namespace App\Controllers;
use App\Models\SearchModel;
use CodeIgniter\Controller;

helper('url');
helper('cookie');

class Search extends Controller{
  public function searchresult(){
    $result = new SearchModel();
	if (!$this->request->getVar('query')){
		return redirect()->to(base_url());
		} else{
	    $query = $this->request->getVar('query');
	    $data['results'] = $result->getResults( $query, $table );
	    $data['query'] = $query;

	    echo view('templates/header');
	    echo view('search/searchresult', $data);
	    echo view('templates/footer');
		}
  }
}
?>
