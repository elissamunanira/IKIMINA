<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Saving;
use App\Models\Loan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;

class SavingController extends Controller
{



    public function index(){


        $user = User::all();
        $savings = $user->savings;
        return view('savings.index',compact('users','savings'));
 
        // $users = User::all();
        // $savings = Saving::all();
        // return view('savings.index',compact('users','savings'));
    }

    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|numeric|min:0',
            'month' => 'required|date',
        ]);

        $savings = new Saving;
        $savings->user_id = $validatedData['user_id'];
        $savings->amount = $validatedData['amount'];
        $savings->month = $validatedData['month'];
        $savings->save();

        return redirect()->route('savings.totalSavings')->with('success', 'Savings record added successfully.');
    }

    public function create(){
        $users = User::all();
        return view('savings.create',compact('users'));
    }

    public function showSavings(User $user)
    {
        $i = 0;
        $savings = Saving::where('user_id', $user->id)->get();
        return view('savings.index', compact('user', 'savings','i'));
    }
    public function edit($id){
        $saving = Saving::with('user')->find($id);
        $users = User::select(DB::raw("CONCAT(firstname, ' ', lastname) AS full_name"), 'id')->pluck('full_name', 'id');
        return view('savings.edit',compact('saving','users'));
    }

    public function update(Request $request,$id){

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|numeric|min:0',
            'month' => 'required|date',
        ]);

        $saving = Saving::find($id);

        $saving->user_id = $request->user_id;
        $saving->amount = $request->amount;
        $saving->month = $request->month;
        $saving->save();

        return redirect()->route('savings.totalSavings')->with('success', 'Savings record Updated successfully.');
    }

    public function totalSavings(){
        
        $users = User::with('savings')->get();

        foreach ($users as $user) {
            $totalSavings = $user->savings->sum('amount');
            return view('savings.totalSaving',compact('users','totalSavings'));
        }
    }

    public function singleTotalSavings(){

        $i=0;
        $users = User::with('savings')->get();
        return view('savings.totalSaving',compact('users','i'));
    }

    public function showForm()
    {
        return view('savings.import');
    }

    public function uploadContent(Request $request)
        {

        $file = $request->file('uploaded_file');

        if ($file) {
            
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension(); //Get extension of uploaded file
        $tempPath = $file->getRealPath();
        $fileSize = $file->getSize(); //Get size of uploaded file in bytes
        //Check for file extension and size
        $this->checkUploadedFileProperties($extension, $fileSize);
        //Where uploaded file will be stored on the server 
        $location = 'uploads'; //Created an "uploads" folder for that
        // Upload file
        $file->move($location, $filename);
        // In case the uploaded file path is to be stored in the database 
        $filepath = public_path($location . "/" . $filename);
        // Reading file
        $file = fopen($filepath, "r");
        $importData_arr = array(); // Read through the file and store the contents as an array
        $i = 0;
        //Read the contents of the uploaded file 
        while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
        $num = count($filedata);
        // Skip first row (Remove below comment if you want to skip the first row)
        if ($i == 0) {
        $i++;
        continue;
        }
        for ($c = 0; $c < $num; $c++) {
        $importData_arr[$i] = $filedata[$c];
        }
        $i++;
        }
        fclose($file); //Close after reading
        $j = 0;
        foreach ($importData_arr as $importData) {
        // $user_id = $importData[1]; //Get user names
        // $email = $importData[3]; //Get the user emails
        $j++;
        try {
        DB::beginTransaction();

        Saving::create([
        'user_id' => $importData[1],
        'amount' => $importData[2],
        'date' => $importData[3]
        ]);

        //Send Email
        $this->sendEmail($email, $name);
        DB::commit();
        } 
        
        catch (\Exception $e) {
        //throw $th;
        DB::rollBack();
        }
        }

        return response()->json([
        'message' => "$j records successfully uploaded"
        ]);

        } else {
        //no file was uploaded
        throw new \Exception('No file was uploaded', Response::HTTP_BAD_REQUEST);

        // return view('savings.import')->with('success','No file was uploaded');

        }
        }
        public function checkUploadedFileProperties($extension, $fileSize)
        {
            
        $valid_extension = array("csv", "xlsx"); //Only want csv and excel files
        $maxFileSize = 2097152; // Uploaded file size limit is 2mb

        if (in_array(strtolower($extension), $valid_extension)) {

        if ($fileSize <= $maxFileSize) {
        } 
        
        else {
        throw new \Exception('No file was uploaded', Response::HTTP_REQUEST_ENTITY_TOO_LARGE); //413 error
        }

        } 
        
        else {
        throw new \Exception('Invalid file extension', Response::HTTP_UNSUPPORTED_MEDIA_TYPE); //415 error
        }
        }


}
