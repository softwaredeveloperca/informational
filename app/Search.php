<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;
use App\DB;

class Search extends Model {



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
	
	public function results($SearchTerm, $SiteID, $DBID=0, $PerPage, $CurrentPage)
	{
/*		
		if(isset($SiteID) && $SiteID > 0)
{
        $SiteText=" AND SiteID='" . $SiteID . "'";
}
if($DBID > 0){ $DBIDText=" AND DBID='" . $DBID . "'"; }

if(strlen($searchtext) > 0){
        $qty="SELECT * FROM Search.Content WHERE 1 " .  $DBIDText . $SiteText;
}
$qty="SELECT *, MATCH(Title, Content) AGAINST ('" . addslashes($searchtext) . "') as score  FROM Search.Content where MATCH(Title, Content) AGAINST ('" . addslashes($searchtext) . "')" . $DBIDText . $SiteText . " ORDER BY score DESC ";



if(trim($qty)=="SELECT * FROM () ts ORDER BY score DESC")
{
        ?><b>No Items Found</b><br><br>

        <? if($_SERVER['HTTP_REFERER'] != "http://www.informational.ca/Search/index.html"){ ?><a href="<?=$_SERVER['HTTP_REFERER']?>">Go Back</a><? } ?>
        <br><br><?
        if($SiteID == 0) $DBID=0;
                $ins=mysql_query("INSERT INTO clf55_informational.InformationalSearches (SearchText, IP, SiteID, DBID, Stamp, Found) VALUES ('" . addslashes($searchtext) . "', '" . addslashes($_SERVER['REMOTE_ADDR']) . "', '" . $SiteID . "', '" . $DBID . "', NOW(), '0')") or die(mysql_error());
        if($SiteID)
                {
                        ?>Try a Network Wide search by selecting all from the dropdown<br><br>
                        <a href="index.html?searchtext=<?=$searchtext?>">Search Entire Network</a><br><br><?
                }
}




else
{
        $re=mysql_query($qty) or die(mysql_error());
        $numofrecords=mysql_num_rows($re);
        if($numofrecords == 0)
        {
                if($SiteID == 0) $DBID=0;
                $ins=mysql_query("INSERT INTO clf55_informational.InformationalSearches (SearchText, IP, SiteID, DBID, Stamp, Found) VALUES ('" . addslashes($searchtext) . "', '" . addslashes($_SERVER['REMOTE_ADDR']) . "', '" . $SiteID . "', '" . $DBID . "', NOW(), '0')") or die(mysql_error());

                if(!($SiteID > 0 && $DBID > 0)){
                ?>
                <b>No Items Found</b><br><br>
                <?
                }
                if($_SERVER['HTTP_REFERER'] != "http://www.informational.ca/Search/index.html"){ ?><a href="<?=$_SERVER['HTTP_REFERER']?>">Go Back</a><? } ?>
        <br><br><?
                if($SiteID && !($DBID > 0))
                {
                        ?>Try a Network Wide search by selecting all from the dropdown or select a topic to view all of the content<br><br>
                        <a href="index.html?searchtext=<?=$searchtext?>">Search Entire Network</a><br><br><?
                }
                if($SiteID != 0 && $DBID != 0)
                {
                        $qty="SELECT *, 1 as score  FROM Search.Content where 1" . $DBIDText . $SiteText . "";
                        $re=mysql_query($qty) or die(mysql_error());
                        $numofrecords=mysql_num_rows($re);
                }
        }
        if($numofrecords > 0)
        {
                if($SiteID == 0) $DBID=0;
                $ins=mysql_query("INSERT INTO clf55_informational.InformationalSearches (SearchText, IP, SiteID, DBID, Stamp, Found) VALUES ('" . addslashes($searchtext) . "', '" . addslashes($_SERVER['REMOTE_ADDR']) . "', '" . $SiteID . "', '" . $DBID . "', NOW(), '1')") or die(mysql_error());

                if((($start)*$perpage) > $numofrecords)
                {
                        $endnumber=(($start)*$perpage) + ($numofrecords-($start)*$perpage);
                }
                else
                {
                        $endnumber=($start)*$perpage;
                }
 $qty.= " LIMIT " . ($start-1) . ", $perpage";
                $re=mysql_query($qty) or die(mysql_error());
                while($rw=mysql_fetch_array($re))
                { //do_saveSiteInfo
                // do_saveSiteInfo(\'' . $rw[PageName] . '\'); "

                
                getContent($rw[DBID], $rw[PageName], ' onClick="javascript:do_saveSiteInfo(\'' . $rw[PageName] . '\', \'' . $rw['DBID'] . '\');"');
                        <br>
                        <?
                        $rw[Content]=trim(strip_tags(stripslashes($rw[Content])));

                        $rw[Content]=substr($rw[Content], 0, 188);

                        foreach(explode(" ", $rw[Content]) as $key => $value)
                        {
                                $searcharr=explode(" ", $searchtext);

                                array_push($searcharr, $searchtext);
                                foreach($searcharr as $key2 => $value2)
                                {


                                        $findarr[$key2]=trim($value2);
                                        $findarr[$key2."1"]=trim($value2 . "s");
                                        $findarr[$key2."2"]=trim($value2 . "es");
                                        $findarr[$key2."3"]=trim(substr($value2, 0, strlen($value2) - 1));
                                        $findarr[$key2."4"]=trim(substr($value2, 0, strlen($value2) - 2));
                                }
                                //$arrsearch=array(',', ';', '.');
                                //$value=str_replace($arrsearch, '', $value);
                                if(in_array(trim($value), $findarr))
                                {
                                        $arrDesc[$key]="<b>$value</b>";
                                }
                                else
                                {
                                        $arrDesc[$key]=$value;
                                }

                                empty($findarr);
                                empty($searcharr);
                                empty($arrDesc);

 $rw[Content]=implode(" ", $arrDesc);

                        ?><?=$rw[Content]?>...<br>
                        <span class="small"><a href="http://www.informational.ca/AddLink.html?DBID=<?=$rw[DBID]?>&PageName=<?=$rw[PageName]?>" class="small">Bookmark</a><? if($SiteID==0){ ?><? $TheSiteID=getSiteID($rw[DBID], $PageName); ?> - <a href="<?=getSiteURL($TheSiteID)?>" class="small"><?=getSiteName($TheSiteID)?></a><? } ?></span>
                        <br><br><?
                }
        }
}


*/






	}
}
//*/
