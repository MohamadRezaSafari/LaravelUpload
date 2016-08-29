<?php

namespace MohammadReza\Laravel;


/**
* 
*/
class LaravelUpload 
{
	protected $name;
	protected $fileExtension;
	protected $dir;
	protected $requestName;
	protected $extension;


	public function upload($file, $fileExtension, $dir, $requestName)
	{
		try {
			
			$this->requestName 	= $requestName;
			$this->dir 			= $dir;

			if($file->hasFile($this->requestName)){
	            if ($file->file($this->requestName)->isValid()) {

	            	$this->fileExtension 	= explode('|', $fileExtension);
	            	$this->extension 		= $file->file($this->requestName)->getClientOriginalExtension();


	            	if(in_array($this->extension, $this->fileExtension)){

	            		$this->name = md5(time() . $file->file($this->requestName)->getClientOriginalName()) . '.' . $this->extension;
	            		$file->file($this->requestName)->move(base_path() . $this->dir, $this->name);
	            		return $this->name;

	            	}else{
	            		
	            		throw new \Exception("Invalid extension");
	            		
	            	}
	            }
	        }

		} catch (\Exception $e) {
			
			die($e->getMessage());

		}
		
	}
}