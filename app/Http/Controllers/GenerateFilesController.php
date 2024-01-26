<?php

namespace App\Http\Controllers;

use App\Data\GenerateFilesInputDTO;
use App\Services\GenerateFiles\GenerateFilesServiceInterface;
use Illuminate\Http\Request;
use App\Validators\GenerateFilesInputValidator;

class GenerateFilesController extends Controller
{

    public function __construct(
        private readonly GenerateFilesServiceInterface $generateFilesService,
        private readonly GenerateFilesInputValidator $validator
    ) {
    }


    public function handle(Request $request)
    {

        try {


            $inputDTO = new GenerateFilesInputDTO();

            $inputDTO->setSelectedModule($request->input('selectedModule'));
            $inputDTO->setClickout($request->input('clickout'));
            $inputDTO->setWidth($request->input('width'));
            $inputDTO->setHeight($request->input('height'));
            $inputDTO->setTop($request->input('top'));
            $inputDTO->setLeft($request->input('left'));

            // dd($inputDTO);
            // App\Data\GenerateFilesInputDTO {#300 // app/Http/Controllers/GenerateFilesController.php:34
            //     -selectedModule: "BACKGROUND"
            //     -clickout: "https://appverk.com"
            //     -width: "50"
            //     -height: "50"
            //     -top: "0"
            //     -left: "0"
            //   }


            $isValid = $this->validator->validate($inputDTO);
            (false === $isValid) ? throw new \Exception('Invalid input') : null;



            //return response as file for download

            $tempFolderPath = $this->generateFilesService->getUniqueTempSubFolderForRequest();
            // Generate files in the temporary subfolder
            $generatedZipPath = $this->generateFilesService->generateFiles($inputDTO, $tempFolderPath);

            // Return response as file for download
            $response = response()->download($generatedZipPath)->deleteFileAfterSend(true);

            // Delete the temporary subfolder
            $this->generateFilesService->removeTempFolder($tempFolderPath);

            return $response;

        } catch (\Throwable $e) {
            return response()->json([
                'status' => 'error,',
                'message' => $e->getMessage(),
                'error' => $e->getTraceAsString()
            ], 500);
        }


    }
}
