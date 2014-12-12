<?php

class ExifController extends BaseController {

	public function createExif($exif)
	{
		if($exif) // Si données exif on créé une entrée dans la BDD
		{			

			$height = 		ExifController::checkExif($exif,'COMPUTED','Height');
			$width = 		ExifController::checkExif($exif,'COMPUTED','Width');	
			
			$brand = 		ExifController::checkExif($exif,'IFD0','Make');	
			$model = 		ExifController::checkExif($exif,'IFD0','Model');
			$orientation = 	ExifController::checkExif($exif,'IFD0','Orientation');
			
			$iso = 			ExifController::checkExif($exif,'EXIF','ISOSpeedRatings');
				
			$exposure = 	ExifController::checkExif($exif,'EXIF','ExposureTime');
			$aperture = 	ExifController::checkExif($exif,'EXIF','MaxApertureValue');
			$datetimeoriginal = ExifController::checkExif($exif,'EXIF','DateTimeOriginal');
			$focallength = 	ExifController::checkExif($exif,'EXIF','FocalLength');
			$flash = 	ExifController::checkExif($exif,'EXIF','Flash');

			$data = [
					'height' =>$height,
					'width' => $width,
					'cameraModel' => $model,
					'cameraBrand' =>$brand,
					'iso' =>$iso,
					'aperture' => $aperture,
					'exposure' =>$exposure,
					'focal' =>$focallength,
					'flash' =>$flash,
					'orientation' =>$orientation,
					'date' =>$datetimeoriginal,
				];
				
			$exifID = Exif::create($data)['id'];
			
		}
		else{				
			$exifID = 1; // Entrée exif vide pour les photos sans exif 
		}

		return $exifID;
	}
	
	private static function checkExif($exif,$exifKey,$exifValue)
	{
		if(!isset($exif[$exifKey][$exifValue]))
		{
			if($exifValue == 'Height' OR $exifValue == 'Width' OR $exifValue == 'Flash')
				return 0;
			if($exifValue == 'DateTimeOriginal')
				return NULL;
			else
				return "-";
		}
		else
		{
			return $exif[$exifKey][$exifValue];
		}
	}
}
