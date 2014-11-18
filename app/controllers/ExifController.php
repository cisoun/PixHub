<?php

class ExifController extends BaseController {

	public function createExif($exif)
	{
		if($exif) // Si données exif on créé une entrée dans la BDD
		{			

			$height = $exif['COMPUTED']['Height'];
			$width = $exif['COMPUTED']['Width'];	
			
			$brand = $exif['IFD0']['Make'];		
			$model = $exif['IFD0']['Model'];
			$orientation = $exif['IFD0']['Orientation'];
			
			$iso = $exif['EXIF']['ISOSpeedRatings'];		
			$exposure = $exif['EXIF']['ExposureTime'];
			$aperture = $exif['EXIF']['MaxApertureValue'];
			$datetimeoriginal = $exif['EXIF']['DateTimeOriginal'];
			$focallength = $exif['EXIF']['FocalLength'];
			$flash = $exif['EXIF']['Flash'];

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
}
