<?php
defined('BASEPATH') or exit('No direct script access allowed');
include("libraries/autoload.php");

use GroceryCrud\Core\GroceryCrud;

class NaiveBayes extends CI_Controller
{
  var $footer = [];
  var $menu = [];
  function __construct()
  {
    parent::__construct();
    $database   = include('database.php'); //config database Grocery
    $config     = include('config.php'); //config library Grocery
    $this->crud = new GroceryCrud($config, $database); //initialize Grocery
    $this->crud->unsetBootstrap();
    $this->crud->unsetExport();
    $this->crud->unsetPrint();
    $this->footer = array(
      "copyright" => APPNAME,
      "aboutus" => "#LinktoYour",
      "contactus" => "#LinktoContact",
      "help" => "#LinktoHelp"
    );
    $this->menu = array(
      "navbar" => array(
        "menu" => array(
          array(
            "name" => "Dashboard",
            "icon" => "remixicon-dashboard-line",
            "link" => base_url() . "NaiveBayes"
          ),
          array(
            "name" => "Naive Bayes",
            "icon" => "remixicon-honour-line",
            "link" => base_url() . "NaiveBayes/process"
          ),
          // array(
          //     "name"=>"History Prediksi",
          //     "icon"=>"remixicon-honour-line",
          //     "link"=>base_url()."NaiveBayes/history"
          // ),
          array(
            "name" => "Logout",
            "icon" => "remixicon-honour-line",
            "link" => base_url() . "auth/logout"
          )
        )
      )
    );
  }

  /**
   * index
   */
  public function index()
  {
    $var['menu'] = $this->menu;
    $var['module'] = "naivebayes/dashboard";
    $var['var_module'] = array();
    $var['content_title'] = "";
    $var['breadcrumb'] = array(
      "Home" => "",
      "Dashboard" => "active"
    );
    $var['footer'] = $this->footer;
    $this->load->view('main', $var);
  }
  /**
   * proses data set naive bayes
   */
  public function process($page = "dataset")
  {
    $var['menu'] = $this->menu;
    $var['module'] = "naivebayes/process";
    $var['var_module'] = array("page" => $page);
    $var['content_title'] = "Metode Naive Bayes";
    $var['breadcrumb'] = array(
      "Home" => "",
      "Naive Bayes" => "active"
    );
    $var['footer'] = $this->footer;
    $this->load->view('main', $var);
  }


  function history()
  {
    $var = array();
    $var['menu'] = $this->menu;
    $var['footer'] = $this->footer;
    $var['gcrud'] = 0;
    $var['content_title'] = "Data History";
    $var['breadcrumb'] = array(
      "Data History" => ""
    );
    $var['module'] = "naivebayes/history";
    $this->load->view('main', $var);
  }
  function export()
  {
    $this->load->view('module/export');
  }
  
  function debug()
  {
    $data = array(
      ['overcast', 'hot', 'high', 'FALSE', 'yes'],
      ['overcast', 'cool', 'normal', 'TRUE', 'yes'],
      ['overcast', 'mild', 'high', 'TRUE', 'yes'],
      ['overcast', 'hot', 'normal', 'FALSE', 'yes'],
      ['rainy', 'mild', 'high', 'FALSE', 'yes'],
      ['rainy', 'cool', 'normal', 'FALSE', 'yes'],
      ['rainy', 'cool', 'normal', 'TRUE', 'no'],
      ['rainy', 'mild', 'normal', 'FALSE', 'yes'],
      ['rainy', 'mild', 'high', 'TRUE', 'no'],
      ['sunny', 'hot', 'high', 'FALSE', 'no'],
      ['sunny', 'hot', 'high', 'TRUE', 'no'],
      ['sunny', 'mild', 'high', 'FALSE', 'no'],
      ['sunny', 'cool', 'normal', 'FALSE', 'yes'],
      ['sunny', 'mild', 'normal', 'TRUE', 'yes']
    );
    $predict = array("rainy", "cool", "normal", "TRUE");
    $this->naivebayes->init($data, $predict);
    print_r($this->naivebayes->predict());
    print_r($this->naivebayes->resall);
    print_r($this->naivebayes->reslabel);
  }
}
