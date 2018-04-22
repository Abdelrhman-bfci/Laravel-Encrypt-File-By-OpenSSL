<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

/*
 ****************************************************
   ************************************************ 
 ** File Encrypt Controller **
       *  Class Method *
   *GetFile For :
     **param:
      =>Request to get file from view
     *Upload File To My Server
     *Get File Details Such As File Name ,etc
     *Redirect to Main Page With This Details
   *encryptFile :
     **param: 
      =>Source : the file will encrypt (Source File)
      =>Key : The Key used to encrypt file
      =>Dest : The Encrypt File
     **Library
      =>open ssl 
     **Algorithm
      => AES “Advanced Encryption Standard”  
   *Save :
    **param:
     =>img : image name with extention
     * download file (Transfar file from server to local device)
  ******************************************************   
**********************************************************
*/
class EncryptFileControllerr extends Controller
{
    //



 public function GetFile(Request $request){

   // The Request Has File 
    if($request->hasFile('ency_file')){
        
        // Get File Nmae With Extension
        $FileNameWithExtension = $request->file('ency_file')->getClientOriginalName();
        // File Nmae Without Extension  
        $FileName = pathinfo($FileNameWithExtension,PATHINFO_FILENAME);
        // File Size 
        $FileSize = $request->file('ency_file')->getSize();
         // File Extension
        $FileEx = $request->file('ency_file')->extension();
         // File Real Path
        $FileRealPath = $request->file('ency_file')->getRealPath();
          // Upload File To Public Path
        $request->file('ency_file')->move(public_path().'/Files',$FileNameWithExtension);
          // Get File From Public Path And Encrypt     
        Self::encryptFile(public_path().'/Files/'.$FileNameWithExtension , 'AbdelrhmanTask' ,
         public_path().'/EncryptFile/'.$FileNameWithExtension );

         $State = True; // File select
         
    }else{
             // If Not File Select

                 $FileName ='No File Select';
                 $FileSize ='No File Select';
                 $FileEx ='No File Select';
                 $State = False;  //'Error No File Select File';
    }
    
     
      //view('welcome');
      //Rdirect To home Page
       return redirect('/')->with( [
                 
                 'FileName'=>$FileName,
                 'FileSize'=>$FileSize,
                 'FileEx'=>$FileEx,
                 'FileWithEx'=>$FileNameWithExtension,
                 'State' =>$State
         ]);
       //return Redirect::route('enFile')->with( ['FileDetails' => $FileDetails] );

    }

  public static function encryptFile($source, $key, $dest){
            // Encrypt My KEY By Use SHA1
			    $key = substr(sha1($key, true), 0, 16);
          // init Vector 
			    $iv = openssl_random_pseudo_bytes(16);

			    $error = false;
			    if ($fpOut = fopen($dest, 'w')) {
			        // Put the initialzation vector to the beginning of the file
			        fwrite($fpOut, $iv);
			        if ($fpIn = fopen($source, 'rb')) {
			            while (!feof($fpIn)) {
			                $plaintext = fread($fpIn, 16);
			                $ciphertext = openssl_encrypt($plaintext, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $iv);
			                // Use the first 16 bytes of the ciphertext as the next initialization vector
			                $iv = substr($ciphertext, 0, 16);
			                fwrite($fpOut, $ciphertext);
			            }
			            fclose($fpIn);
			        } else {
			            $error = true;
			        }
			        fclose($fpOut);
			    } else {
			        $error = true;
			    }

			    return $error ? false : $dest;
		}

public function Save( $img=null ){

    //public string UI\Window::save ( void );

       // dd(is_file( public_path().'/EncryptFile/'));
          // if File Not exit
            if (is_null($img)) {
                
                return redirect('/');
            }
            // I file Exit

            if(File::exists(public_path().'/EncryptFile/'.$img) && $img !=null){
                     // Download File
                  return response()->download(public_path().'/EncryptFile/'.$img,$img,[
                         
                         'content_length'=>filesize(public_path().'/EncryptFile/'.$img),
                         'content_Description'=>'File Transfar'
                  ]);

             }
    

      // header ("Content-Type: application/download");
      // header ("Content-Disposition: attachment; filename=".$img);
      // header("Content-Length: " . filesize(public_path().'/EncryptFile/'.$img));
      // $fp = fopen(public_path().'/EncryptFile/'.$img, "r");
      // return fpassthru($fp);

				
  }

}
