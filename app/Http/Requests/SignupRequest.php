<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class SignupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        
        return [
            'body'=>[
                'required',
                'min:10',
                'max:200',
                function($attribute,$value,$fail){
                    $badWord=['bastard','baka','ngu','baby','fuck','ばか','バカ','畜生','ちくしょう','てめえ','馬鹿'];
                    // $checkWord=explode(" ",$value);
                    // $inWord=implode(" ",$checkWord);
                    // $checkWord1=htmlentities($value);
                    $value2 = preg_replace('/\s+/', '', $value);
                    $value3=  str_replace('　', '', $value2);
                    $value4=strtolower($value3);
                    // $value1=implode(' ', array_filter(explode(' ', $value)));
                    // $value = str_replace(' ', '', $value);
                    foreach($badWord as $bad){
                        $findWord=strpos($value4,$bad);
                        if($findWord!==false){
                            return $fail("悪い言葉入っています。正しく入力してください！");
                        }

                   
                    // foreach($checkWord as $word){
                    //     if(in_array($word,$badWord)){
                
                        
                        
                        
                            // return $fail("You can not type that because you have the bad word in the sentences");
                        }
                    }

                    
                
            ]
            
        ];
    }
            
                    
            // },


                
                // foreach($badWord as $bad){
                //     $searchWord=strpos($checkWord,$bad);
        
            
       
        
        
    public function messages(){
        return [
            'body.required'=>'空白にしないでください',
            'body.min'=>'短すぎます。もうちょっと記入してください！',
            'body.max'=>'長すぎます。短くしてください！ ',
        ];
    }
}
