<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\formvalidate;
use Image;
use App\Rules\ReCaptcha;

class SimpleFormController extends Controller
{

    public function index (){
        
        $students = DB::table('students')->orderBy('id', 'DESC')->get();

        return view ('simpleform')->with('students', $students);
    }



    public function register (Request $request){

            /*---------------------------------
                model use valadation
            ---------------------------------*/

            $test=new formvalidate;             // create model object
            $validator = Validator::make($request->all(),$test->rules);   
              $request->validate($test->rules, $test->custom);
              
           
  
            /*---------------------------------
                image crop save in folder and data insert
            ---------------------------------*/
                $input = $request->all();


                $image = $request->file('image');
                $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        
                $destinationPath = public_path('/thumbnail');
                $img = Image::make($image->getRealPath());
                $img->resize(100, 100, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'/'.$input['imagename']);
        
                $destinationPath = public_path('/images');
                $image->move($destinationPath, $input['imagename']);
    
               // $this->postImage->add($input);

                        
            $students = new formvalidate;
            $students->fname = $input['fname'];
            $students->lname = $input['lname'];
            $students->email = $input['email'];
            $students->phone = $input['phone'];
            $students->gender = $input['gender'];
            $students->qualification = implode(',', $input['qualification']);
            $students->country = $input['country'];
            $students->image = $input['imagename'];
            $students->save();
    
            return back()
                ->with('success','Data inserted success')
                ->with('imageName',$input['imagename']);

    }

    /*--------------------------------------------
        Delete functnality
    ----------------------------------------------*/

    public function destroy($student_id){

        formvalidate::find($student_id)->delete();
        
        return back()->with('delete','Record delete successfull');
    }



    
    /*--------------------------------------------
        edit fuctnallity functnality
    ----------------------------------------------*/


    public function edit($student_id)
    {

        // echo $student_id;
        // die();
      if(empty($student_id)){
          return back()->with('delete','Id no. {{ $student_id }} is out of filter');
      }else{
        $stud = formvalidate::findOrFail($student_id);
        $quali = explode(",",$stud->qualification);

          $students = DB::table('students')->orderBy('id', 'DESC')->get();
         
        return view ('simpleform',compact('students','stud'))->with('quali', $quali);
     }
    }
   
   
    /*--------------------------------------------
        update fuctnallity functnality
    ----------------------------------------------*/


    public function update(Request $request, $student_id)
    {

         /*---------------------------------
                model use valadation
        ---------------------------------*/

            $test=new formvalidate;             // create model object
            $validator = Validator::make($request->all(),$test->rulesupdate);   
              $request->validate($test->rulesupdate, $test->customupdate);


              $input = $request->all();

              $studentsid = formvalidate::find($student_id);

              $studentsid->fname = $input['fname'];
              $studentsid->lname = $input['lname'];
              $studentsid->email = $input['email'];
              $studentsid->phone = $input['phone'];
              $studentsid->gender = $input['gender'];
              $studentsid->qualification = implode(",",$input['qualification']);
              $studentsid->country = $input['country'];



            
                if($request->file('image')){
                  $destination = public_path('/images').$studentsid->image;
                    if(File::exists($destination)){
                       File::delete($destination);
                    }
                }
                

            
                $image = $request->file('image');
                if(!empty($image)){  
                    $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

                    $destinationPath = public_path('/thumbnail');
                    $img = Image::make($image->getRealPath());
                    $img->resize(100, 100, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath.'/'.$input['imagename']);

                    $destinationPath = public_path('/images');
                    $image->move($destinationPath, $input['imagename']);
            
                 $studentsid->image = $input['imagename'];
            }
         $studentsid->update();
         

         $students = DB::table('students')->orderBy('id', 'DESC')->get();
         return redirect('/simpleform')->with('delete','Record updated successfully')->with('students', $students);
    }


    public function show (Request $request, $stu_id) {

        echo $stu_id;

    }


}
