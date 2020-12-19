<?php
class Produk extends CI_Controller {
	public function __construct(){
		parent::__construct();
        $this->load->model('ProdukModel');
        $this->load->model('KategoriModel');
    }
    
    public function index(){
        $site               = $this->KonfigurasiModel->listing();
        $listing_kategori   = $this->ProdukModel->listing_kategori();
        $total              = $this->ProdukModel->total_produk();
        //paginasi
        $this->load->library('pagination');

        $config['base_url']         = base_url().'produk/index/';
        $config['total_rows']       = $total->total;
        $config['use_page_numbers'] = TRUE;
        $config['per_page']         = 12;
        $config['uri_segment']      = 3;
        $config['num_links']        = 5;
        $config['full_tag_open']    = '<ul class="pagination">';
        $config['full_tag_close']   = '</ul>';
        $config['first_link']       = 'First';
        $config['first_tag_open']   = '<li>';
        $config['first_tag_close']  = '</li>';
        $config['last_link']        = 'Last';
        $config['last_tag_open']    = '<li class="disabled"> <li class="active"> <a href="#">';
        $config['last_tag_close']   = '<span class="sr-only"></a></li></li>';
        $config['next_link']        = '&gt;';
        $config['next_tag_open']    = '<div>';
        $config['next_tag_close']   = '</div>';
        $config['prev_link']        = '&lt;';
        $config['prev_tag_open']    = '<div>';
        $config['prev_tag_close']   = '</div>';
        $config['cur_tag_open']     = '<b>';
        $config['cur_tag_close']    = '</b>';
        $config['first_url']        = base_url().'/produk/';

        $this->pagination->initialize($config);
        //ambil data produk
        $page   = ($this->uri->segment(3)) ? ($this->uri->segment(3)-1) * $config['per_page']:0;
        $produk = $this->ProdukModel->produk($config['per_page'], $page);
        
        //end paginasi

        $data = array(
            'title'             => 'Produk '.$site->namaweb,
            'site'              => $site,
            'listing_kategori'  => $listing_kategori,
            'produk'            => $produk,
            'pagin'             => $this->pagination->create_links(),
            'isi'               => 'produk/list'
        );
        $this->load->view('templates2/wrapper', $data, FALSE);
    }
    //list data per/kategori
    public function kategori($slug_kategori){
        $kategori           = $this->KategoriModel->read($slug_kategori);
        $id_kategori        = $kategori->id_kategori;
        //semua data / global
        $site               = $this->KonfigurasiModel->listing();
        $listing_kategori   = $this->ProdukModel->listing_kategori();
        $total              = $this->ProdukModel->total_kategori($id_kategori);
        //paginasi
        $this->load->library('pagination');

        $config['base_url']         = base_url().'produk/kategori/'.$slug_kategori.'/index/';
        $config['total_rows']       = $total->total;
        $config['use_page_numbers'] = TRUE;
        $config['per_page']         = 12;
        $config['uri_segment']      = 5;
        $config['num_links']        = 5;
        $config['full_tag_open']    = '<ul class="pagination">';
        $config['full_tag_close']   = '</ul>';
        $config['first_link']       = 'First';
        $config['first_tag_open']   = '<li>';
        $config['first_tag_close']  = '</li>';
        $config['last_link']        = 'Last';
        $config['last_tag_open']    = '<li class="disabled"> <li class="active"> <a href="#">';
        $config['last_tag_close']   = '<span class="sr-only"></a></li></li>';
        $config['next_link']        = '&gt;';
        $config['next_tag_open']    = '<div>';
        $config['next_tag_close']   = '</div>';
        $config['prev_link']        = '&lt;';
        $config['prev_tag_open']    = '<div>';
        $config['prev_tag_close']   = '</div>';
        $config['cur_tag_open']     = '<b>';
        $config['cur_tag_close']    = '</b>';
        $config['first_url']        = base_url().'/produk/kategori/'.$slug_kategori;

        $this->pagination->initialize($config);
        //ambil data produk
        $page   = ($this->uri->segment(5)) ? ($this->uri->segment(5)-1) * $config['per_page']:0;
        $produk = $this->ProdukModel->kategori($id_kategori, $config['per_page'], $page);
        
        //end paginasi

        $data = array(
            'title'             => $kategori->nama_kategori,
            'site'              => $site,
            'listing_kategori'  => $listing_kategori,
            'produk'            => $produk,
            'pagin'             => $this->pagination->create_links(),
            'isi'               => 'produk/list'
        );
        $this->load->view('templates2/wrapper', $data, FALSE);
    }

    //detail produk
    public function detail($slug_produk){
        $site           = $this->KonfigurasiModel->listing();
        $produk         = $this->ProdukModel->read($slug_produk);
        $id_produk      = $produk->id_produk;
        $gambar         = $this->ProdukModel->gambar($id_produk);
        $produk_related = $this->ProdukModel->home();

        $data = array(
            'title'             => $produk->nama_produk,
            'kategori'          => $produk->nama_kategori,
            'site'              => $site,
            'produk'            => $produk,
            'produk_related'    => $produk_related,
            'gambar'            => $gambar,
            'isi'               => 'produk/detail'
        );
        $this->load->view('templates2/wrapper', $data, FALSE);

    }

}
