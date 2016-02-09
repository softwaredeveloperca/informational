<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;
use App\DB;

class Informational extends Model {

	private $corename;
	public function __construct()
	{
		$this->corename=$_SESSION['corename'];
		$this->corename='freejokes';
	}

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	//protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
//	protected $fillable = ['name', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
//	protected $hidden = ['password', 'remember_token'];
	
	public function getLinks($SiteID)
	{
		$links =\DB::table("DBs")
                ->where('SiteID', $SiteID)
                ->where('Active', 1)
                ->get();


		$nav_links=array();
		//$nav_links[]=array('HomePage' => '/', 'Label' => 'Home');
		foreach($links as $link)
		{
			$nav_links[]=array('HomePage' => $link->HomePage, 'Label' => $link->Label);
		}

		return $nav_links;
	}
	public function getSiteData($Name)
	{
		$siteinfo =\DB::table('Sites')
		->where('SubDomain', $Name)
		->first();
		//$siteinfo =\DB::select('select * from Sites where SiteID = :id', ['id' => 23])->first();;
                return $siteinfo;

	}	
	public function getSiteDBs($SiteID, $WithData='', $DBID=null)
	{
		$database_data =\DB::table("DBs")
		->where('SiteID', $SiteID)
		->where('Active', 1)
		->get();
		//$database_data->get();

		if($WithData!='')
		{
			for($x=0; $x<count($database_data); $x++)
			{
				$Limit=25;
                        	$OrderBy=$database_data[$x]->PrimaryField;
                        	$OrderDir="ASC";

                        	if(isset($WithData['Limit'])){ $Limit=$WithData['Limit']; }
                        	if(isset($WithData['OrderBy'])){ $Limit=$WithData['OrderBy']; }
                        	if(isset($WithData['OrderDir'])){ $Limit=$WithData['OrderDir']; }				
				$data =\DB::connection($database_data[$x]->DB)
				//->select('Title')
                                ->table($database_data[$x]->Name)
		//		->select($database_data[$x]->PrimaryField . ' as Title', 'PageName', 'LEFT('.$database_data[$x]->ContentField  .', 5) as Content')
                                ->select(\DB::connection($database_data[$x]->DB)->raw($database_data[$x]->PrimaryField . ' as Title, PageName, LEFT('.$database_data[$x]->ContentField  .', 255) as Content'))
				->where('Title', '!=', '') 
				->take($Limit)
				->orderBy($OrderBy, $OrderDir)
				->get();
                                
                                $database_data[$x]->data=$data;
			}
		}
	
		return $database_data;
	}
	
	public function getPageContent($SiteID, $Category, $PageName, $Option=null)
	{
		$database_data =\DB::table("DBs")
                        ->where('SiteID', $SiteID)
                        ->where('Active', 1)
                        ->where('BaseDirectory', $Category)
                        ->first();

		$Limit=25;
                $OrderBy=$database_data->PrimaryField;
                $OrderDir="ASC";

                $data =\DB::connection($database_data->DB)
                	->table($database_data->Name)
                        ->take($Limit)
			->where('PageName', $PageName)
                        ->orderBy($OrderBy, $OrderDir)
                        ->first();

                $database_data->PageData=$data;

		$Limit=25;
                $OrderBy=$database_data->PrimaryField;
                $OrderDir="ASC";

                if(isset($Options['Limit'])){ $Limit=$Options['Limit']; }
                if(isset($Options['OrderBy'])){ $Limit=$Options['OrderBy']; }
                if(isset($Options['OrderDir'])){ $Limit=$Options['OrderDir']; }
                
		$sidedata =\DB::connection($database_data->DB)
                	->table($database_data->Name)
                        ->take($Limit)
                        ->orderBy($OrderBy, $OrderDir)
                        ->get();

                $database_data->sidedata=$sidedata;
		return $database_data;
	}

	public function getCategoryContent($SiteID, $CategoryHomePage, $Options=null)
	{
		$database_data =\DB::table("DBs")
                        ->where('SiteID', $SiteID)
                        ->where('Active', 1)
                        ->where('HomePage', $CategoryHomePage . '.html')
                        ->first();

		$Limit=25;
                $OrderBy=$database_data->PrimaryField;
                $OrderDir="ASC";
		$StartAt=0;

                if(isset($Options['Limit'])){ $Limit=$Options['Limit']; }
                if(isset($Options['OrderBy'])){ $Limit=$Options['OrderBy']; }
                if(isset($Options['OrderDir'])){ $Limit=$Options['OrderDir']; }

                $sidedata =\DB::connection($database_data->DB)
                        ->table($database_data->Name)
         //               ->take($Limit)
	//		->skip($StartAt)
                        ->orderBy($OrderBy, $OrderDir)
                 //       ->get();
														->simplePaginate(25);

                $database_data->data=$sidedata;
//->simplePaginate(15);
		return $database_data;
	}
	
	public function getContentPage($Category, $PageName, $Options=null)
        {
                $SiteInfo=$this->getSiteData($this->corename);
                $HomePageContent=$SiteInfo;

                if(isset($SiteInfo->SiteID) && $SiteInfo->SiteID > 0)
                {
                        $Content=$this->getPageContent($SiteInfo->SiteID, $Category, $PageName, $Options);
                        $HomePageContent->Data=$Content;
                }

                return (array) $HomePageContent;
        }

	public function getCategoryPage($CategoryHomePage)
        {
                $SiteInfo=$this->getSiteData($this->corename);
                $HomePageContent=$SiteInfo;

                if(isset($SiteInfo->SiteID) && $SiteInfo->SiteID > 0)
                {
                        $Content=$this->getCategoryContent($SiteInfo->SiteID, $CategoryHomePage, $Options=null);
			$HomePageContent->Dbs=$Content;
                }

                return (array) $HomePageContent;
        }


	public function getHomePageContent()
	{
		$SiteInfo=$this->getSiteData($this->corename);
		$HomePageContent=$SiteInfo;

		if(isset($SiteInfo->SiteID) && $SiteInfo->SiteID > 0)
		{
			$SiteDBs=$this->getSiteDBs($SiteInfo->SiteID, 1);
			$HomePageContent->Dbs=$SiteDBs;
		}

		return (array) $HomePageContent;
	}
}
//*/
