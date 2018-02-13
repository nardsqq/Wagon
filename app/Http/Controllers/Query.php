<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class Query extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('queries.personnel.index');
    }

    public function search(Request $req){
      $all = DB::table('tblpersonnel')
      ->join('tblrole', 'tblrole.intRoleID', '=', 'tblpersonnel.intPers_Role_ID')
      ->select('tblrole.strRoleName as role','tblpersonnel.strPersEmpType as regulation', 'tblpersonnel.strPersFName as f', 'tblpersonnel.strPersMName as m', 'tblpersonnel.strPersLName as l', 'tblpersonnel.strPersMobNo as mobile' )
      ->where('tblrole.strRoleName', 'LIKE', "%$req->intPers_Role_ID%")
      ->where('tblpersonnel.strPersEmpType', 'LIKE', "%$req->strPersEmpType%")
      ->where('tblpersonnel.strPersFName', 'LIKE', "%$req->strPersFName%")
      ->where('tblpersonnel.strPersMName', 'LIKE', "%$req->strPersMName%")
      ->where('tblpersonnel.strPersLName', 'LIKE', "%$req->strPersLName%")
      ->where('tblpersonnel.strPersMobNo', 'LIKE', "%$req->strPersMobNo%")
      ->get();
      $data = "";
      foreach ($all as $a) {
        $data.="<tr>";
          $data.="<td>$a->role</td>";
          $data.="<td>$a->regulation</td>";
          $data.="<td>$a->f $a->m $a->l</td>";
          $data.="<td>$a->mobile</td>";
        $data.="</tr>";
      }
      return $data;
    }

    public function searchservice(Request $req){
      try {
        $all = DB::table('tblservicearea')
        ->join('tblservicetype', 'tblservicetype.intServTypeID', '=', 'tblservicearea.intSA_ServType_ID')
        ->select('tblservicetype.strServTypeName as type','tblservicearea.strServAreaName as name', 'tblservicearea.txtServAreaDesc as description')
        ->where('tblservicetype.strServTypeName', 'LIKE', "%$req->intSA_ServType_ID%")
        ->where('tblservicearea.strServAreaName', 'LIKE', "%$req->strServAreaName%")
        ->where('tblservicearea.txtServAreaDesc', 'LIKE', "%$req->txtServAreaDesc%")
        ->get();
      } catch (Exception $e) {
        return $e;
      }

      $data = "";
      foreach ($all as $a) {
        $data.="<tr>";
          $data.="<td>$a->type</td>";
          $data.="<td>$a->name</td>";
          $data.="<td>$a->description</td>";
        $data.="</tr>";
      }
      return $data;
    }

    public function varzsearch(Request $req){
      try {
        $all = DB::table('tbl_product')
        ->join('tblvariant', 'tblvariant.intV_Prod_ID', '=', 'tbl_product.int_product_id')
        ->join('tbl_brand', 'tbl_brand.int_brand_id', '=', 'tblvariant.intV_Brand_ID')
        ->select('tblvariant.strVarPartNum as partnum','tbl_brand.str_brand_name as brand', 'tbl_product.str_product_name as product','tblvariant.strVarModel as model')
        ->where('tblvariant.strVarPartNum', 'LIKE', "%$req->strVarPartNum%")
        ->where('tbl_brand.str_brand_name', 'LIKE', "%$req->intV_Brand_ID%")
        ->where('tbl_product.str_product_name', 'LIKE', "%$req->intV_Prod_ID%")
        ->where('tblvariant.strVarModel', 'LIKE', "%$req->strVarModel%")
        ->get();
      } catch (Exception $e) {
        return $e;
      }

      $data = "";
      foreach ($all as $a) {
        $data.="<tr>";
          $data.="<td>$a->partnum</td>";
          $data.="<td>$a->brand</td>";
          $data.="<td>$a->product</td>";
          $data.="<td>$a->model</td>";
        $data.="</tr>";
      }
      return $data;
    }
}
