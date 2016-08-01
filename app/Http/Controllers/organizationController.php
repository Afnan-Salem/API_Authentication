<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
/**
 * Created by PhpStorm.
 * User: user
 * Date: 7/24/2016
 * Time: 4:39 AM
 */





class organizationController extends BaseController
{
    const status_code = 200;
    const status_txt = 'OK' ;

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {

        $organizations = $this->setOrganizations();
        $header = $this->setHeader();
        return $this->getResponse($organizations, $header);
    }

    /**
     * @return organizations array
     */
    protected function setOrganizations()
    {
        $organizations= [
            ["organization_id" => "1000001", "name" => "Sleighdogs", "account_created_date" => "20160224"],
            ["organization_id" => "1000002", "name" => "Example", "account_created_date" => "20160225"]
        ];
        return $organizations;
    }

    /**
     * @param $organizations
     * @param $header
     * @return \Illuminate\Http\JsonResponse
     */
    protected function getResponse($organizations, $header)
    {
        echo head($header).' '.'Content-Type:'.last($header).'  ';
        return response()->json(['organizations'=>$organizations],self::status_code,$header);
    }

    /**
     * @return array
     */
    protected function setHeader()
    {
        $v1 = 'HTTP/1.1 ' . self::status_code . ' ' . self::status_txt ;
        $v2 = 'application/json;/charset=UTF-8';
        $header =[$v1,'Content-Type'=>$v2];
        return $header;
    }

}