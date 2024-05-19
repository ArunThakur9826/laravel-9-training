<?php

namespace App\Http\Controllers;
use Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\formvalidate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class DashboardController extends Controller
{
  public function dashboard()
   {
    $users = User::orderby('id', 'DESC')->get();

    return view('admin.users.index')->with('users', $users);
   }


    public function search(Request $request)
    {
        $search_value = $request->srch_value;
        // $filterData = DB::table('users')->where('name', 'LIKE', '%'.$search_value.'%')->get();
          $filterData = User::where('name','LIKE',"%{$search_value}%")->get();
        return $filterData;
    }



     public function edit($tudent_id)
     {
       $edit_data = User::find($tudent_id);
       return view('admin.users.edit')->with('edit_data', $edit_data);
     }


     public function update(Request $request, $tudent_id)
     {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
        ]);
       $update = User::find($tudent_id);
       $update->name = $request['name'];
       $update->email = $request['email'];
       $update->update();
       return redirect('admin/users')->with('success', 'User data update successfully');
     }



     public function destroy(Request $request, $tudent_id)
     {
       User::find($tudent_id)->delete();
       return back()->with('success', 'Record Delete successfully');
     }




    public function store(Request $request)
     {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);
  
        if ($validator->fails()) {
            return response()->json([
            'error' => $validator->errors()->all()
          ]);
        } 
       
        $insert = new User;
        $insert->name = $request['name'];
        $insert->email = $request['email'];
        $insert->password = Hash::make($request['password']);

        $var = $insert->save();
       if($var){
         return ['status' => 'success'];  
       }
     }

     
     public function ajaxlisting(){
        $users = User::orderby('id', 'DESC')->get();
        return  $users;
 
     }


// start student functnallity 


   public function StudentIndex (){
        $students = DB::table('students')->orderBy('id', 'DESC')->get();
        return view ('admin.students.index')->with('students', $students);
    }

   public function getOption(){
        $usa = formvalidate::where('country', '=','U.S.A.')->get();
        $inda = formvalidate::where('country', '=','india')->get();
        $Canada = formvalidate::where('country', '=','Canada')->get();
        $country = [];
        $usacount = $usa->count();
        $indacount = $inda->count();
        $Canadacount = $Canada->count();
        for($i=1; $i<=3; $i++){
            if($i == 1){
              array_push($country, ['usa' =>  $usacount]);
            }elseif($i == 2){
              array_push($country, ['india' =>  $indacount]);  
            }elseif($i = 3){
              array_push($country, ['canada' =>  $Canadacount]);  
            }
        }

        return $country;
    }

    public function getOptiondata(Request $request){
         $contryfirst = $request->country;
         $quali = $request->quali;
         $gender = $request->gender;




        if(empty($contryfirst) && empty($quali) && empty($gender)){
            return formvalidate::get();
        }else{
            $filter = formvalidate::select('*');

            if(!empty($quali) || !empty($contryfirst) || !empty($gender)){
                if(!empty($quali) ){
                    $filter = $filter->where(function ($query) use ($quali){
                        foreach ($quali as $key => $value) {
                            if( $key == 0 ){
                                $query = $query->whereRaw("find_in_set('".$value."',qualification)");
                            }else{
                                $query = $query->orWhereRaw("find_in_set('".$value."',qualification)");
                            }
                        }
                    });
                }

                if(!empty($contryfirst)){
                    $filter = $filter->whereIn('country',$contryfirst);
                } 

                if(!empty($gender)){
                    $filter = $filter->whereIn('gender',$gender);
                }
            }
        }


        $filter = $filter->get();

           return $filter;
    }
 
}
