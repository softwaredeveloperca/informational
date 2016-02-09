<?php namespace App\Http\Controllers;
//use Auth;
use App\Informational;
use Illuminate\Support\Facades\Request;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	//	if (Auth::check())
//{
//		print "auth";
    // The user is logged in...
//}
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */

	public function search($DBID=0)
	{
		$new_informational=new Informational();
		$arr_replace_all=array('www.', '.ca', '.com', '.net', '.org');
                $arr_replace=array('www.');
                $Array['Name']=str_replace($arr_replace, '', $_SERVER['HTTP_HOST']);
                $corename=str_replace($arr_replace_all, '', $_SERVER['HTTP_HOST']);
		$home_data=$new_informational->getHomePageContent($corename);
		$home_data['Links']=$new_informational->getLinks($home_data['SiteID']);

		$ExternalIP="23.94.43.232";
		$url = 'http://' . $ExternalIP . '/Informational/Search/index.php';

		$start=0;
		$perpage=25;
		$searchtext = Request::input('srch-term');
		$fields = array(
			'start'=>urlencode($start),
			'perpage'=>urlencode($perpage),
			'SiteID'=>urlencode($home_data['SiteID']),
			'DBID'=>urlencode($DBID),
			'searchtext'=>urlencode($searchtext),
		);


		$fields_string='';
		foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
	
		rtrim($fields_string,'&');
		$curl_handle=curl_init();
		curl_setopt($curl_handle,CURLOPT_URL,$url);
		curl_setopt($curl_handle,CURLOPT_POST,count($fields));
		curl_setopt($curl_handle,CURLOPT_POSTFIELDS,$fields_string);
		curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,60);
		curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);

		$buffer = curl_exec($curl_handle);
		curl_close($curl_handle);

		if (empty($buffer))
		{
    			$searchresults= "Sorry, there was an error.<p>";
		}
		else
		{
   			$buffer=str_replace('AD-ONE', '<script type="text/javascript"><!--
				google_ad_client = "pub-0859992975261405";
				/* 468x15, created 7/26/08 */
				google_ad_slot = "9144571005";
				google_ad_width = 468;
				google_ad_height = 15;
				//-->
				</script>
				<script type="text/javascript"
				src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
				</script>', $buffer);

			$buffer=str_replace('AD-TWO', '<script type="text/javascript"><!--
				google_ad_client = "pub-0859992975261405";
				google_ad_width = 120;
				google_ad_height = 600;
				google_ad_format = "120x600_as";
				google_ad_type = "text";
				google_ad_channel = "";
				google_color_border = "FFFFFF";
				google_color_bg = "FFFFFF";
				google_color_link = "FF0000";
				google_color_text = "000000";
				google_color_url = "999999";
				//-->
				</script>
				<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
				</script>', $buffer);
    			$searchresults=$buffer;
		}
		$home_data['SearchContent']=$searchresults;
	
		return view('sites/' . $corename . '/search', $home_data);

	}
	public function privacy()
	{
		$arr_replace_all=array('www.', '.ca', '.com', '.net', '.org');
                $arr_replace=array('www.');
		$Array['Name']=str_replace($arr_replace, '', $_SERVER['HTTP_HOST']);
		$corename=str_replace($arr_replace_all, '', $_SERVER['HTTP_HOST']);

		$home_data=$new_informational->getHomePageContent($corename);

		$home_data=$this->setColors($home_data);

		return view('sites/' . $corename . '/content', $home_data);
	}
	public function content($Category, $PageName)
        {
                $arr_replace_all=array('www.', '.ca', '.com', '.net', '.org');
                $arr_replace=array('www.');
                //$Array['Name']=str_replace($arr_replace, '', $_SERVER['HTTP_HOST']);
                $corename=str_replace($arr_replace_all, '', $_SERVER['HTTP_HOST']);

                if(view()->exists('sites/' . $_SESSION['corename'] . '/content')){
                        $new_informational=new Informational();
                        $home_data=$new_informational->getContentPage($Category, $PageName);
			$home_data['Links']=$new_informational->getLinks($home_data['SiteID']);

			if(isset($home_data['Data']->PageData->Title))
			{
				$home_data['PageName']=$home_data['Data']->PageData->Title;
			}

			$home_data=$this->setColors($home_data);

			return view('sites/' . $_SESSION['corename'] . '/content', $home_data);
                }

        }
	public function category($CategoryHomePage)
	{
		if(view()->exists('sites/' . strtolower($CategoryHomePage))){
			$new_informational=new Informational();
			if(view()->exists('sites/' . $_SESSION['corename'] . '/' . strtolower($CategoryHomePage))){
				$home_data=$new_informational->getHomePageContent();
                        	$home_data['Links']=$new_informational->getLinks($home_data['SiteID']);
				$home_data['PageName']=$CategoryHomePage;
				$home_data=$this->setColors($home_data);

                        	return view('sites/' . $_SESSION['corename'] . '/' . strtolower($CategoryHomePage), $home_data);
			}
			else {
				return view('sites/' . strtolower($CategoryHomePage));
			}

		}
		elseif(view()->exists('sites/' . $_SESSION['corename'] . '/category')){
                 $new_informational=new Informational();

                        $home_data=$new_informational->getCategoryPage($CategoryHomePage);
                        $home_data['Links']=$new_informational->getLinks($home_data['SiteID']);
			$home_data['PageName']=$home_data['Dbs']->Label;

			$home_data=$this->setColors($home_data);

			return view('sites/' . $_SESSION['corename'] . '/category', $home_data);
                }

	}
	private function setColors($home_data)
	{
		if($home_data['AdLink'] == 'FFFFFF')
		{
                	$home_data['AdLink']=$home_data['AdBackground'];
               		$home_data['AdBackground']='FFFFFF';
                }

                $home_data['ColorActive']='CCC';
                $home_data['ColorBackground']=$home_data['AdLink'];
                $home_data['ColorBackgroundActive']=$home_data['AdText'];
                $home_data['ColorDefault']=$home_data['AdBackground'];

		return $home_data;
	}
	public function index()
	{
		if(view()->exists('sites/' . $_SESSION['corename'] . '/index')){
			return view('sites/' . $_SESSION['corename'] . '/index');
		}
		elseif(view()->exists('sites/' . $_SESSION['corename'] . '/home')){
			$new_informational=new Informational();
			$home_data=$new_informational->getHomePageContent($_SESSION['corename']);
			$home_data['Links']=$new_informational->getLinks($home_data['SiteID']);
			$home_data['PageName']=$home_data['Name'];
			$home_data=$this->setColors($home_data);

			return view('sites/' . $_SESSION['corename'] . '/home', $home_data);
                }
		else 
		{
			$arr_replace=array('www.');
			$Array['Name']=str_replace($arr_replace, '', $_SERVER['HTTP_HOST']);
			return view('welcome', $Array);
		}
	}

}
