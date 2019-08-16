<?php

	function make_null($value){
        $value = $value->toArray();
        array_walk_recursive($value, function (&$item, $key) {
            $item =  $item === null ? "" : $item;
        });
        return $value;
    }
	function uploadImage($image, $path, $imageName ,$height , $width )
    {
        $image = Image::make($image->getRealPath());
        
        $path = public_path() .'/'. $path;
        
        File::exists($path) or mkdir($path, 0777, true);
        
        $image->fit($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path.'/'.$imageName);

        return $imageName;
    }
	function uploadModalReferenceFile($files,$upath ,$refe_table_field_name ,$ref_field_id , $type )
    {
		//$path = storage_path('app/public') .'/'. $upath;	
		//$path_thumb = storage_path('app/public') .'/'. $upath.'/thumb';	
		
		$path = public_path('storage') .'/'. $upath;	
		$path_thumb = public_path('storage') .'/'. $upath.'/thumb';	
		
        foreach ($files as $i => $file) {

			$timestamp = uniqid();
			$real_name = $file->getClientOriginalName();
			$name = $timestamp."_".$real_name;
			$extension = $file->getClientOriginalExtension();
			
			\File::exists($path_thumb) or mkdir($path_thumb, 0777, true);
			
			if(in_array($extension,['jpg','jpeg','png','PNG','JPEG','JPG'])){
			
				$img = Image::make($file->getRealPath(),array(

					'width' => 100,

					'height' => 100,

					'grayscale' => false

				));

				$img->save($path_thumb.'/'.$name);
				
			}
			$file->move($path,$name);
			
			$requestData = array();
			$requestData['refe_file_path'] = $upath;
			$requestData['refe_file_name'] = $name;
			$requestData['refe_file_real_name'] = $real_name;
			$requestData['refe_field_id'] = $ref_field_id;
			$requestData['refe_table_field_name'] = $refe_table_field_name;
			$requestData['refe_type'] = $type;
			\App\Refefile::create($requestData);
            
		}
        
     
        
		
    }
	function removeRefeImage($refe)
    {
		
		$path = public_path('storage');
		
		if ($refe->refe_file_name && $refe->refe_file_name !="" && \File::exists($path."/".$refe->refe_file_path."/".$refe->refe_file_name)) {
            unlink($path."/".$refe->refe_file_path."/".$refe->refe_file_name);
        }
		if ($refe->refe_file_name && $refe->refe_file_name !="" && \File::exists($path."/".$refe->refe_file_path."/thumb/".$refe->refe_file_name)) {
            unlink($path."/".$refe->refe_file_path."//thumb/".$refe->refe_file_name);
        }
	}

    
?>