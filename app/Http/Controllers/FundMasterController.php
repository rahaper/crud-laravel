<?php

namespace App\Http\Controllers;

use App\Models\FundMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class FundMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $datas = $req->all();

        // var_dump($datas);
        $fundMaster = DB::table('fund_master AS fm')
            ->leftjoin('fund_subtype As fs', 'fm.fundType', '=', 'fs.fundSubType')
            ->select('fm.*', 'fs.fundSubTypeName');
 
        if(!empty($datas["search"])){
            $fundMaster->where('fm.fundName', 'LIKE', '%'.$datas['search'].'%');
        }

        $result = $fundMaster->paginate(4);

        return view('fundMaster.index', ['fundMaster' => $result]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
        $req = $request->all();

        if(!empty($req['data'])){
            $data = $req['data'];
       
            $validated = $request->validate([
                'data.fund_code'  => 'required',
                'data.fund_name'  => 'required',
                'data.fund_th_name'  => 'required',
                'data.fund_type'  => 'required',
            ], [
                'data.fund_code.required'=>'Field Fund Code tidak boleh kosong',
                'data.fund_name.required'=>'Field Fund Name tidak boleh kosong',
                'data.fund_th_name.required'=>'Field Fund TH Name tidak boleh kosong',
                'data.fund_type.required'=>'Field Fund Type tidak boleh kosong',
            ]);

            // var_dump($validated);

            DB::table('fund_master')->insert([
                'fundCode' => $data['fund_code'],
                'fundName' => $data['fund_name'],
                'fundTHName' => $data['fund_th_name'],
                'fundType' => $data['fund_type']
            ]);

            return redirect()->back()->with('message', 'Success create new data!');
        }

        return view('fundMaster.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FundMaster  $fundMaster
     * @return \Illuminate\Http\Response
     */
    public function show(Request $req)
    {
        // $fundmaster = DB::table('fund_master')->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FundMaster  $fundMaster
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $req = $request->all();


        $fundMaster = DB::table('fund_master AS fm')
            ->select('fm.*')
            ->where('fm.fundCode', $id)
            ->get();

        // var_dump($fundMaster);

        return view('fundMaster.edit', ['fundMaster' => $fundMaster[0]]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FundMaster  $fundMaster
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $fundMaster = DB::table('fund_master')->where('fundCode', '=', $id)->delete();

        // var_dump($fundMaster);

        return redirect('fundmaster/')->with('message', 'Success delete data!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FundMaster  $fundMaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $req = $request->all();

        if(!empty($req['data'])){
            $data = $req['data'];
       
            $validated = $request->validate([
                'data.fund_name'  => 'required',
                'data.fund_th_name'  => 'required',
                'data.fund_type'  => 'required',
            ], [
                'data.fund_name.required'=>'Field Fund Name tidak boleh kosong',
                'data.fund_th_name.required'=>'Field Fund TH Name tidak boleh kosong',
                'data.fund_type.required'=>'Field Fund Type tidak boleh kosong',
            ]);

            // var_dump($validated);

            DB::table('fund_master')
            ->where('fundCode', '=', $data['fund_code'])
            ->update([
                'fundName' => $data['fund_name'],
                'fundTHName' => $data['fund_th_name'],
                'fundType' => $data['fund_type']
            ]);

            return redirect('fundmaster/edit/'.$data['fund_code'])->with('message', 'Success update data!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FundMaster  $fundMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(FundMaster $fundMaster)
    {
        //
    }
}
